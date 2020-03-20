<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input class="form-control" type="text" placeholder="Enter food item name"
                v-model="food.item">
            </div>

            <div class="form-group">
                <label for="name">Select Category</label>
                <multi-select
                v-model="food.category"
                :options="categories"
                ></multi-select>
            </div>

            <div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" type="number" placeholder="Enter food item price"
                v-model="food.price">
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
</template>
<script>
import MultiSelect from 'vue-multiselect';
export default {
    props: ['categories'],
    components: {
        MultiSelect
    },
    data(){
        return {
            food: {
                item: '',
                category: '',
                price: 100
            }
        }
    },
    methods: {
        handleSubmit() {
            console.log('form data', this.food)

        }
    }
}
</script>