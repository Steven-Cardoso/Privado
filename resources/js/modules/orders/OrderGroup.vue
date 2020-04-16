<template>
    <div class="row">
        <div class="col-md-7">
            <h3>Detalhes do Cliente</h3>
            <order-form></order-form>
            
            <h3>Detalhes da Ordem <span class="float-right" v-if="finalAmount > 0">Total a Pagar: {{finalAmount}}</span></h3>
            <order-details :order-details="orderDetails"></order-details>
        </div>

        <div class="col-md-5">
            <h3>Menu</h3>
            <order-menu-items 
            :items="menuItems"
            @menuItemAdded="handleNewMenuItem"
            ></order-menu-items>
        </div>
    </div>
</template>
<script>
import OrderForm from './OrderForm';
import OrderMenuItems from './OrderMenuItems';
import axios from 'axios';
import OrderDetails from './OrderDetails';

export default {
    props: ['restoId'],
    components: {
        OrderForm,
        OrderMenuItems,
        OrderDetails
    },
    created() {
        this.loadRestoMenuItems();
    },
    computed: {
        finalAmount() {
            let price = 0;
            this.orderDetails.forEach(order => {
                price = price + order.price;
            });
            return price;
        }
    },
    data() {
        return {
            menuItems: [],
            orderDetails: []
        }
    },
    methods: {
        loadRestoMenuItems() {
            let postData = {restoId: this.restoId}
            axios.post('/api/resto/menu', postData)
            .then(response => console.log('response', this.menuItems = response.data))
            .catch(error => console.error(error.response));
        },
        handleNewMenuItem(item) {
            this.orderDetails.unshift(item);
        }
    }
}
</script>