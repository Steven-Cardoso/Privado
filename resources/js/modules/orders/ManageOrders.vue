<template>
    <table class="table table-hover table-bordered table-striped">
        <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Valor Total</th>
                        <th>Estado</th>
                        <th>Detalhes do cliente</th>
                        <th>Pratos</th> 
                        <th>Mesa nr</th>                       
                        <th>Pago</th>
                        <th>Accoes</th>

                    </tr>
                </thead>

        <order-items :orders="orders.data" @onComplete="handleOrderComplete" @onDelete="handleDeleteOrder" @onPaid="handlePaid"></order-items>
    </table>
</template>
<script>
import axios from "axios";
import OrderItems from './../../components/OrderItems';
export default {
    props: ['orders'],
    components: {
        OrderItems
    },
    data() {
        return {
            localOrders: null
        }
    },
    created() {
        this.localOrders = this.orders;
    },
    methods: {
        handleOrderComplete(order)
        {
            if (!confirm("Tem a certeza que o seu pedido esta terminado?")) {
                return;
            }
            const postData = {order_id: order.id};
            axios.post("/api/order/complete", postData).then(response => {
                this.localOrders.data.forEach((order, index) => {
                    if (order.id === response.data.id) {
                        this.localOrders.data[index].isComplete = 1;
                    }
                })
            });
        },
        handleDeleteOrder(order){
            if (!confirm("Tem a certeza que deseja apagar o pedido?")) {
                return;
            }
            
            const postData = {order_id: order.id};
            axios.post("/api/order/remove", postData).then(response => {
                this.localOrders.data = this.localOrders.data.filter(localOrder => {
                    return localOrder.id !== order.id;
                });
            });
        },
        handlePaid(order){
            if (!confirm("Tem a certeza que a conta foi paga?")) {
                return;
            }
            const postData = {order_id: order.id};
            axios.post("/api/order/paid", postData).then(response => {
                this.localOrders.data.forEach((order, index) => {
                    if (order.id === response.data.id) {
                        this.localOrders.data[index].isPaid = 1;
                        axios.post("/api/order/mail", this.localOrders.data[index]);
                    }
                })
            });
        }
    }
}
</script>