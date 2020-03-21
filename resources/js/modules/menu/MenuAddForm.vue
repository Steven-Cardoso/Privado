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
            <label for="name">Description</label>
            <textarea class="form-control" placeholder="Enter food description"
                      v-model="food.description"></textarea>
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
    props: ['categories', 'restoId'],
    components: {
        MultiSelect
    },
    data(){
        return {
            food: this.emptyFoodItem()
        }
    },
    methods: {

        emptyFoodItem() {
          return{
              item: '',
              category: '',
              price: 100,
              description: ''
          };
        },
        handleSubmit() {
            console.log('form data', this.food)
          let postData = this.food;
            postData.restoId = this.restoId;
          window.axios.post('api/item/save', postData).then(response => {
            console.log('response', response.data);

            this.$emit('newMenuItemAdded', response.data, postData.category);
            this.food = this.emptyFoodItem();
          }).catch(error => console.log('error', error.response));
        }
    }
}
</script>
