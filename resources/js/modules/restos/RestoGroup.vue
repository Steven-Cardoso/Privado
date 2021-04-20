<template>
    <div class="resto-group__wrapper mb-5">
        <div class="row">
            <div class="col-lg-4 ">
            <card-component>
                <template slot="title">ORDERS</template>
                 <template slot="body">
                    O Farol, katembe
                    <br/>
                    <button onclick="window.location.href='/restaurants/orders'" class="btn btn-link">Orders</button>
                 </template>
            </card-component>
            </div>
            <!--Vou mudar
            <div class="col-md-4" v-if="showAddForm">
                <card-component>
                    <template slot="title">Add new Restaurant</template>
                    <template slot="body">
                        <span @click="handleAddNewResto">+</span>
                    </template>
                </card-component>
                <modal name="add-new-resto" height="55%">
                    <div class="container-padding">
                        <RestoAddForm 
                        @addRestoEvent="handleSaveResto"
                        @modalCancel="handleCancelResto"></RestoAddForm>
                    </div>
                </modal>
            </div>
            -->
        </div>
    </div>
</template>
<script>
import RestoAddForm from './RestoAddForm';
import axios from 'axios';
export default {
    components: {
RestoAddForm
    },
 props: ['restos'],
 created() {
     console.log('this.restos.length', this.restos.length);
     this.localResto = this.restos;
 },
 computed: {
     showAddForm() {
         return (this.localResto.length < 5)?true:false;
     }
 },
 data() {
     return {
         localResto: []
     }
 },
 methods: {
     handleOrder(){
     axios.name('restos.orders');
     },
     handleAddNewResto() {
         this.$modal.show('add-new-resto');
     },
     handleCancelResto() {
         this.$modal.hide('add-new-resto');
     },
     handleSaveResto(restoData) {
         console.log('restoData', restoData);
         axios.post('/api/resto', restoData).then(response => {
             console.log('response', response.data);
             this.localResto.unshift(response.data);
         })
     this.$modal.hide('add-new-resto');
     }
   }
}
</script>