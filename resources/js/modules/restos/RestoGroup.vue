<template>
    <div class="resto-group__wrapper mb-5">
        <div class="row">
            <div class="col-md-4 mb-4" v-for="resto in restos" :key="resto.id">
            <card-component>
                <template slot="title">{{resto.name}}</template>
                <template slot="body">{{resto.location}}</template>
            </card-component>
            </div>
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
        </div>
    </div>
</template>
<script>
import RestoAddForm from './RestoAddForm';
export default {
    components: {
RestoAddForm
    },
 props: ['restos'],
 created() {
     console.log('this.restos.length', this.restos.length);
 },
 computed: {
     showAddForm() {
         return (this.restos.length < 5)?true:false;
     }
 },
 data() {
     return {}
 },
 methods: {
     handleAddNewResto() {
         this.$modal.show('add-new-resto');
     },
     handleCancelResto() {
         this.$modal.hide('add-new-resto');
     },
     handleSaveResto(restoData) {
         console.log('restoData', restoData);
     }
   }
}
</script>