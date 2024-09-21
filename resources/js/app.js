import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.data("paypalGateWay", () => ({
    item: null,
    orderData : null,
    getSubscription(data) {
        this.item = {
            id: data.id,
            name: data.name,
            amount: { value: data.price },
        };
    },
    init() {
        const buttonsContainer = this.$refs.buttonsContainer;

        this.$watch("item", () => {
            const item = this.item;
            paypal.Buttons({
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

 

Alpine.start();
 
 