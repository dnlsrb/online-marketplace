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
 
var options = {
    chart: {
      height: 350,
      type: "line",
      stacked: false
    },
    dataLabels: {
      enabled: false
    },
    colors: ["#FF1654", "#247BA0"],
    series: [
      {
        name: "Series A",
        data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
      },
      {
        name: "Series B",
        data: [20, 29, 37, 36, 44, 45, 50, 58]
      }
    ],
    stroke: {
      width: [4, 4]
    },
    plotOptions: {
      bar: {
        columnWidth: "20%"
      }
    },
    xaxis: {
      categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
    },
    yaxis: [
      {
        axisTicks: {
          show: true
        },
        axisBorder: {
          show: true,
          color: "#FF1654"
        },
        labels: {
          style: {
            colors: "#FF1654"
          }
        },
        title: {
          text: "Series A",
          style: {
            color: "#FF1654"
          }
        }
      },
      {
        opposite: true,
        axisTicks: {
          show: true
        },
        axisBorder: {
          show: true,
          color: "#247BA0"
        },
        labels: {
          style: {
            colors: "#247BA0"
          }
        },
        title: {
          text: "Series B",
          style: {
            color: "#247BA0"
          }
        }
      }
    ],
    tooltip: {
      shared: false,
      intersect: true,
      x: {
        show: false
      }
    },
    legend: {
      horizontalAlign: "left",
      offsetX: 40
    }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  
  chart.render();
  


 