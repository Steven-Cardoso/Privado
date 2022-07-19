<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Nome do Prato</label>
                <input class="form-control" type="text" placeholder="Introduza o nome do prato."
                v-model="food.item">
                <div class="validation-message" v-text="validation.getMessage('item')"></div>
            </div>

            <div class="form-group">
                <label for="name">Escolha a Categoria</label>
                <multi-select
                v-model="food.category"
                :options="categories"
                ></multi-select>
                <div class="validation-message" v-text="validation.getMessage('category')"></div>
            </div>

            <div class="form-group">
                <label for="name">Preço</label>
                <input class="form-control" type="number" placeholder="Introduza o preco do prato."
                v-model="food.price">
                <div class="validation-message" v-text="validation.getMessage('price')"></div>
            </div>

            <div class="form-group">
                <label for="name">Quantidade</label>
                <input class="form-control" type="number" placeholder="Introduza a quantidade do prato."
                v-model="food.quantity">
                <div class="validation-message" v-text="validation.getMessage('quantity')"></div>
            </div>

          <div class="form-group">
            <label for="name">Descrição</label>
            <textarea class="form-control" placeholder="Faca a descricao do prato."
                      v-model="food.description"></textarea>
            <div class="validation-message" v-text="validation.getMessage('description')"></div>
          </div>

            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
</template>
<script>
import MultiSelect from 'vue-multiselect';
import Validation from './../../utils/Validation';
export default {
    props: ['categories', 'restoId'],
    components: {
        MultiSelect
    },
    data(){
        return {
            food: this.emptyFoodItem(),
            validation: new Validation()
        }
    },
    methods: {

        emptyFoodItem() {
          return{
              item: '',
              category: '',
              price: 100,
              quantity: 20,
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
            
          }).catch(error => {
              console.log('error', error.response);
            if(error.response.status == 422 ) {
                this.validation.setMessages(error.response.data.errors);
            
            }
          });
        }
    }
}
</script>
