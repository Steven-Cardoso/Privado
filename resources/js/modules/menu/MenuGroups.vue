<template>
    <div class="section">
         <table class="table table-hover table-striped">
              <thead>
                    <tr>
                 <th>Nome &amp; Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Acções</th>
                 </tr>
              </thead>
           <tbody>
                  <tr v-for="(item, key) in items" :key="key">
               <td>
                  <strong v-text="item.name"></strong>
                  <p v-text="item.description"></p>
               </td>
               <td>
                 <span v-text="item.price"></span>
               </td>
               <td>
                 <span v-text="item.quantity"></span>
               </td>
               <td>
                  <!--<button class="btn btn-sm btn-success mb-4">Editar</button>-->
                  <button class="btn btn-sm btn-success mb-4" data-toggle="modal" data-target="#exampleModal">Editar</button> 
                  <br>
                  <button class="btn btn-sm btn-warning" @click="handleDeleteMenuItem(item)">Apagar</button>
                  
                  <div class="modal fade" id="exampleModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar {{item.name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="price" class="col-form-label">Preço:</label>
                                <input type="number" v-model="item.price" class="form-control" id="preco">
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="col-form-label">Quantidade actual: {{item.quantity}}</label>
                                 <br>Adicionar:
                                <input type="number" v-model="item.quantity" class="form-control" id="quantidade">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click="handleEditMenuItem(item)">Update</button>
                        </div>
                        </div>
                    </div>
                  </div> 
               </td>
             </tr>
          </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
export default {
   props: ['items'],
   data() {
        return {
            localItems: null,
            menu: this.editMenuItem(),
        }
    },
    created() {
        this.localItems = this.items;
    },
   methods: {
       editMenuItem() {
          return{
              id: '',
              category: '',
              price: 100,
              quantity: 20
          };
        },
      handleDeleteMenuItem(item){
            if (!confirm("Tem a certeza que deseja apagar o pedido?")) {
                return;
            }
            const postData = {item_id: item.id,
                              item_category: item.category_id};
                              console.log(postData);
            axios.post("/api/menu/remove", postData).then(response => {
                this.localItems.data = this.localItems.data.filter(localItem => {
                    return localItem.id !== item.id || localItem.category_id !== item.category_id;
                });
            });
            location.reload(); //funciona para fazer refresh da pagina corrente
        },
        handleEditMenuItem(item){
            const postData = {item_id: item.id,
                              item_category: item.category_id,
                              item_price: item.price,
                              item_quantity: item.quantity};
                              console.log(postData);
        }
   }
}
</script>