<template>
  <div>
      <div class="row mb-3">
          <div class="col-md-12">
            <button @click="handleOrderSave" class="btn btn-success float-right">Save</button>
          </div>
      </div>
    <div class="row">
        <div class="col-md-7">
            <h3>Detalhes do Cliente</h3>
            <order-form @customerDetailsChanged = "customerDetailsHandle"></order-form>
            
            <h3>Detalhes da Ordem <span class="float-right" v-if="finalAmount > 0">Total a Pagar: {{finalAmount}} MZN</span></h3>
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
        window.eventBus.$on('menuItemAdded', this.handleNewMenuItem);
        window.eventBus.$on('filteredList', this.handleFilteredList);
        window.eventBus.$on('clearFilteredList', this.handleClearFilteredList);
        // window.eventBus.$on('customerDetailsChanged', this.)

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
            orderDetails: [],
            originalMenuItems: [],
            costumerDetails: null
        }
    },
    methods: {
        loadRestoMenuItems() {
            let postData = {restoId: this.restoId}
            axios.post('/api/resto/menu', postData)
            .then(response => { 
                this.menuItems = response.data
                this.originalMenuItems = response.data
                })
            .catch(error => console.error(error.response));
        },
        handleNewMenuItem(item) {
            this.orderDetails.unshift(item);
        },
        handleFilteredList(filteredList) {
            this.menuItems = filteredList;
        },
        handleClearFilteredList() {
            this.menuItems = this.originalMenuItems;
        },
        customerDetailsHandle(customer) {
            this.costumerDetails = customer;
        },
        handleOrderSave() {
            let orderData = {
                costumerDetails: this.costumerDetails,
                finalAmount: this.finalAmount,
                orderDetails: this.orderDetails
            };
            console.log(orderData);
            axios.post('/api/order/save', orderData).then(response => console.log('response', response));
        }
    }
}
</script>