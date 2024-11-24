import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";
import axios from "axios";

window.Alpine = Alpine;

Alpine.data("paypalGateWay", () => ({
    item: null,
    orderData: null,
    getSubscription(data) {
        this.item = {
            id: data.id,
            name: data.name,
            amount: { value: data.price },
        };
    },
    init() {
        const buttonsContainer = this.$refs.buttonsContainer;
        console.log(buttonsContainer);
        this.$watch("item", () => {
            const item = this.item;

            console.log(item, "init paypal");
            paypal
                .Buttons({
                    style: {
                        layout: "vertical",
                        color: "gold",
                        shape: "rect",
                        label: "paypal",
                    },
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            purchase_units: [item],
                        });
                    },
                    onApprove: (data, actions) => {
                        return actions.order.capture().then((orderData) => {
                            this.orderData = orderData;

                            console.log(orderData);
                        });
                    },
                })
                .render(buttonsContainer);
        });

        this.$watch("orderData", () => {
            document.getElementById("FormPaypal").submit();
        });
    },
}));

Alpine.data("DeleteModal", () => ({
    open: false,

    trigger: {
        ["x-ref"]: "trigger",
        ["@click"]() {
            this.open = true;
        },
    },

    dialogue: {
        ["x-show"]() {
            return this.open;
        },
        ["@click.outside"]() {
            this.open = false;
        },
    },
}));

Alpine.data("paypalGateWayOrder", () => ({
    item: null,
    orderData: null,
    quantity: 1,
    getSubscription(data) {
        this.item = {
            id: data.id,
            name: data.name,
            amount: { value: data.price },
        };
    },
    changeQuantity(action) {
        if (action === "add") {
            this.quantity++;
        } else if (action === "minus" && this.quantity > 1) {
            this.quantity--;
        }
        this.updateAmount();
    },

    updateAmount() {
        this.item = {
            amount: {
                value: this.item.amount.value * this.quantity,
            },
        };

        this.renderPaypalButtons();
    },

    renderPaypalButtons() {
        const buttonsContainer = this.$refs.buttonsContainer;

        // Remove previous buttons to prevent duplication
        while (buttonsContainer.firstChild) {
            buttonsContainer.removeChild(buttonsContainer.firstChild);
        }

        // Render the new PayPal buttons
        paypal
            .Buttons({
                style: {
                    layout: "vertical",
                    color: "gold",
                    shape: "rect",
                    label: "paypal",
                },
                createOrder: (data, actions) => {
                    // Use updated item and quantity when creating the order
                    return actions.order.create({
                        purchase_units: [
                            {
                                ...this.item,
                                amount: {
                                    value: (
                                        this.quantity *
                                        parseFloat(this.item.amount.value)
                                    ).toFixed(2), // Dynamically calculate the total
                                },
                            },
                        ],
                    });
                },
                onApprove: (data, actions) => {
                    return actions.order.capture().then((orderData) => {
                        this.orderData = orderData;
                        console.log(orderData);
                    });
                },
            })
            .render(buttonsContainer); // Render in the container
    },
    init() {
        const buttonsContainer = this.$refs.buttonsContainer;

        const item = this.item;

        console.log(item, "init paypal");

        this.$watch("item", () => {
            if (this.item) {
                this.renderPaypalButtons(); // Render PayPal buttons after item is initialized
            }
        });
        this.$watch("orderData", () => {
            document.getElementById("FormPaypal").submit();
        });
    },
}));

Alpine.data("checkOutProducts", () => ({
    cartProducts: [],

    checkoutData: {
        selectProducts: [],
        total: 0,
        paymentDetails: null,
    },
    count: 0,
    openPayment: false,
    errors: {},
    init() {
        this.$watch("checkoutData.selectProducts", () => {
            this.checkoutData.total = this.checkoutData.selectProducts.reduce(
                (total, product) => {
                    return total + (product.total || 0);
                },
                0
            );
        });
    },
    getProductsInitData(data) {
        console.log(data, "getProductsInit");
        this.cartProducts = [...data];
    },
    changeQuantity(id, action) {
        const product = this.cartProducts.find((item) => item.id === id);
        const deleteModal = this.$refs[`deleteModal-${product.id}`];

        console.log(deleteModal);

        if (action === "add") {
            product.quantity++;
            product.total = product.product.price * product.quantity;
        } else {
            product.quantity--;
            product.total = product.product.price * product.quantity;
        }

        this.cartProducts = [
            ...this.cartProducts.map((item) => {
                if (item.id === product.id) {
                    return product;
                }

                return item;
            }),
        ];
    },

    selectCarProduct(data, event) {
        const { checked } = event.target;

        if (!checked) {
            this.checkoutData.selectProducts =
                this.checkoutData.selectProducts.filter(
                    (item) => item.id !== data.id
                );
        } else {
            this.checkoutData.selectProducts = [
                ...this.checkoutData.selectProducts,
                data,
            ];
        }

        console.log(this.checkoutData);
    },
    openCheckoutPayment() {
        if (this.checkoutData.selectProducts.length === 0) {
            this.errors = {
                selectProduct: "Select Product First",
            };
            return;
        }
        this.errors = {};
        this.openPayment = true;
        const buttonsContainer = this.$refs.buttonsContainer;

        const checkoutData = this.checkoutData;

        console.log("init paypal", buttonsContainer);
        if (buttonsContainer) {
            paypal
                .Buttons({
                    style: {
                        layout: "vertical",
                        color: "gold",
                        shape: "rect",
                        label: "paypal",
                    },
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            purchase_units: [
                                ...checkoutData.selectProducts.map((item) => {
                                    return {
                                        id: item.id,
                                        name: item.product.name,
                                        amount: {
                                            value: (
                                                item.quantity *
                                                parseFloat(item.total)
                                            ).toFixed(2),
                                        },
                                    };
                                }),
                            ],
                        });
                    },
                    onApprove: (data, actions) => {
                        // document.getElementById("FormPaypal").submit()
                        return actions.order.capture().then((orderData) => {
                            this.checkoutData = {
                                ...this.checkoutData,
                                paymentDetails: orderData,
                            };

                            this.submitCheckoutData();
                        });


                    },
                })
                .render(buttonsContainer);
        }
    },
    closeCheckoutPayment() {
        this.openPayment = false;
        location.reload();
    },
    async submitCheckoutData() {
        try {

            const data = {
                orderData : this.checkoutData
            }

            const response = axios.post('/customer/products/checkout',data)

            this.openPayment = false;
            location.reload();
        } catch (error) {
            console.log(error)
        }
    }
}));

Alpine.data("chat", () => ({
    conversations: [],
    selectedConversation: null,
    authId: null,
    message: {
        content: null,
        conversationId: null,
    },
    ringtone: new Audio("/1.mp3"),
    init() {
        this.$watch("selectedConversation", () => {
            this.message = {
                ...this.message,
                conversationId: this.selectedConversation.id,
            };
        });

        this.$watch("authId", () => {
            window.Echo.private(`chat.${this.authId}`).listen(
                "GotMessage",
                (event) => {
                    console.log(this.$refs.playRingtone.click());
                    this.playRingtone();
                    this.selectedConversation.messages = [
                        event.message,
                        ...this.selectedConversation.messages,
                    ];

                    this.scrollToBottom();
                }
            );
        });
    },
    initConversation(data, authId) {
        console.log(data, authId);
        this.conversations = [...data];
        this.authId = authId;
    },
    selectConversation(conversation) {
        if (!conversation) return;
        console.log(conversation, "selected conversation");
        this.selectedConversation = {
            ...conversation,
        };
    },
    async sendMessage() {
        try {
            console.log(this.message);
            const { data } = await axios.post("/customer/chat", this.message);
            this.selectedConversation = {
                ...this.selectedConversation,
                messages: [data.message, ...this.selectedConversation.messages],
            };

            this.message.content = null;
            this.scrollToBottom();
        } catch (error) {
            console.timeLog(error);
        }
    },
    playRingtone() {
        this.ringtone.play().catch((error) => {
            console.error("Audio play error:", error);
        });
    },
    scrollToBottom() {
        this.$nextTick(() => {
            if (this.$refs.chatContainer) {
                this.$refs.chatContainer.scrollTop =
                    this.$refs.chatContainer.scrollHeight;
            }
        });
    },
}));

Alpine.start();
