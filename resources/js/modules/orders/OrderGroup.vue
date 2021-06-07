<template>

  <div>
      <div class="row mb-3">
          <div class="col-md-12">
              <!--<button class="btn btn-primary float-right ml-4">Solicitar Pagamento</button>-->
            <button @click="handleOrderSave(); name2;" class="btn btn-success float-right">Enviar Pedido</button>
            
          </div>
      </div>
      <b-carousel
      id="carousel-1"
      :interval="0"
      controls
      indicators
      background="#ababab"
      img-width="1024"
      img-height="1024"
      style="text-shadow: 1px 1px 2px #333;"
    >
    
      <b-carousel-slide
        img-src="imagem/foto1.jpg"
      >
            <h1>Detalhes do Cliente</h1>
            <h3>Introduza os seus dados</h3>
            <!--<h3>Detalhes do Cliente</h3>-->
            <div class="back">
            <order-form @customerDetailsChanged = "customerDetailsHandle"></order-form>
            <!-- <order-details :order-details="orderDetails"></order-details> -->
            </div>
      </b-carousel-slide>
      <b-carousel-slide img-src="imagem/foto2.jpg">
        <h1>Detalhes da Ordem</h1>
        <div class="row">
    <div class="col-md-5">
        <h3><span class="" v-if="finalAmount > 0">Total a Pagar: {{finalAmount}} MZN</span></h3>
        <OrderList :items="orderDetails"></OrderList>
    </div>
        <div class="col-md-7">
            <b-tabs card>
                <b-tab title="Entradas" active @click="loadRestoMenuItems(1)">
                    <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Salgadinhos" @click="loadRestoMenuItems(2)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Mariscos" @click="loadRestoMenuItems(3)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Refeições" @click="loadRestoMenuItems(4)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Sobremesa" @click="loadRestoMenuItems(5)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
                <b-tab title="Bebidas" @click="loadRestoMenuItems(6)">
                     <h3>Menu</h3>
                    <order-menu-items 
                    :items="menuItems"
                    @menuItemAdded="handleNewMenuItem"
                    ></order-menu-items>
                </b-tab>
             </b-tabs>
        </div>
        </div>
    </b-carousel-slide>
    <b-carousel-slide
        img-src="imagem/foto2.jpg"
      >
            <h1>Pedidos Feitos</h1>
            <div class="back2">
                <table class="bg-white table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Valor Total</th>
                        <th>Estado</th>
                        <th>Detalhes do cliente</th>
                        <th>Pratos</th> 

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order in name2" :key="order.id">
                        <td>{{order.id}}</td>
                        <td>{{order.amount}} Mzn</td>
                        <td>{{(order.isComplete) ? 'Completo' : 'Incompleto'}}</td>
                        <td>
                                Nome: {{order.order_details.customer_name}}
                                <br>
                                Telefone: {{order.order_details.customer_phone}}
                                <br>
                                Email: {{order.order_details.customer_address}}
                            </td>
                            <td>
                               {{order.pratos}}
                            </td>
                    </tr>
                </tbody>
                </table>
            </div>
      </b-carousel-slide>
      </b-carousel>
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
    data() {
        return {
            orders: []
        }
    },
    created() {
         axios.get('./api/order')
        .then(response => this.orders = response.data);
        this.loadRestoMenuItems(1);
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
        },
         name2: function () {
            //console.log(this.name)
            return this.orders.filter(i => i.order_details.customer_name === this.name || i.order_details.customer_phone === this.phone)
            //console.log(this.orderDetails);
        }
    },
    data() {
        return {
            menuItems: [],
            orderDetails: [],
            originalMenuItems: [],
            costumerDetails: null,
            name: '',
            phone: ''
        }
    },
    methods: {
        loadRestoMenuItems(param) {
            let postData = {category_id:param}
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
            this.name = this.costumerDetails['name'];//para ver conta
            this.phone = this.costumerDetails['phone'];//para ver conta
            console.log(this.pratos)
            let orderData = {
                resto_id: this.restoId, 
                order_data: {
                    costumerDetails: this.costumerDetails,
                    finalAmount: this.finalAmount,
                    pratos: this.pratos,
                    orderDetails: this.orderDetails,
                    
                }
            };

            console.log(orderData);
            axios.post('/api/order/save', orderData).then(response => console.log('response', response));
        }
    }
}
</script>
<style>
.back {
    max-height: 400px;
    min-height: 470px;
}
.back2 {
    max-height: 500px;
    min-height: 650px;
}
</style>