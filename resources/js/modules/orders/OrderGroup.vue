<template>
  <div>
      <div class="row mb-3">
          <div class="col-md-12">
              <!--<button class="btn btn-primary float-right ml-4">Solicitar Pagamento</button>-->
            <button @click="handleOrderSave" class="btn btn-success float-right">Enviar Pedido</button>
            
          </div>
      </div>
    <div class="row">
        <div class="col-md-7">
            <h3>Detalhes do Cliente</h3>
            <order-form @customerDetailsChanged = "customerDetailsHandle"></order-form>
            
            <h3>Detalhes da Ordem <span class="float-right" v-if="finalAmount > 0">Total a Pagar: {{finalAmount}} MZN</span></h3>
            <!-- <order-details :order-details="orderDetails"></order-details> -->
            <OrderList :items="orderDetails"></OrderList>
        </div>

        <div class="col-md-5">
            <b-tabs card>
                <b-tab title="Soupas" @click="loadRestoMenuItems(1)">
                    <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Frango" @click="loadRestoMenuItems(2)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Arroz" @click="loadRestoMenuItems(3)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Noodles" @click="loadRestoMenuItems(4)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Bebidas" @click="loadRestoMenuItems(5)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
             </b-tabs>
        </div>
    </div>
  </div>
</template>
<script>
import OrderForm from './OrderForm';
import OrderMenuItems from './OrderMenuItems';
import axios from 'axios';
import OrderDetails from './OrderDetails';
import OrderList from './OrderList';


export default {
    props: ['restoId','category_id'],
    components: {
        OrderForm,
        OrderMenuItems,
        OrderDetails,
        OrderList
    },
    created() {
        this.loadRestoMenuItems();
        window.eventBus.$on('menuItemAdded', this.handleNewMenuItem);
        window.eventBus.$on('filteredList', this.handleFilteredList);
        window.eventBus.$on('clearFilteredList', this.handleClearFilteredList);
        window.eventBus.$on('removeOrderedItem', this.handleRemoveOrderedItem);
        // window.eventBus.$on('customerDetailsChanged', this.)

    },
    computed: {
        finalAmount() {
            let price = 0;
            this.orderDetails.forEach(order => {
                price = price + order.price;
            });
            return price;
        },
        pratos() {
            let prato = []; //prato="";
            let plates = [];
            this.orderDetails.forEach(order => {
                prato = prato + order.name + "\n\t";
            });
            return prato;
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
        loadRestoMenuItems(param) {
            let postData = {category_id: param}
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
        handleRemoveOrderedItem(item) {
            this.orderDetails = this.orderDetails.filter(orderDetails => orderDetails.id != item.id);
        },
        handleOrderSave() {
            alert('A ordem foi enviada com sucesso!');
            let orderDetails = [];
            this.orderDetails.forEach(item => {
                orderDetails.push(item.id);
            });

            let orderData = {
                resto_id: this.restoId, 
                order_data: {
                    costumerDetails: this.costumerDetails,
                    finalAmount: this.finalAmount,
                    pratos: this.pratos,
                    orderDetails: this.orderDetails
                }
            };

            console.log(orderData);
            axios.post('/api/order/save', orderData).then(response => console.log('response', response));
        }
    }
}
</script>