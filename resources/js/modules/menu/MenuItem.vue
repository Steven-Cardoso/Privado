<template>
    <div class="section">
         <table class="table table-hover table-striped">
              <thead>
                    <tr>
                 <th>Nome &amp; Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade <br> Disponivel</th>
                    <th>Quantidade <br> Consumida</th>
                    <th>Acções</th>
                 </tr>
              </thead>
           <tbody>
                  <tr v-for="item in items" :key="item.id">
               <td>
                  <strong>{{item.name}}</strong>
                  <p>{{item.description}}</p>
               </td>
               <td>
                 <span>{{item.price}}</span>
               </td>
               <td>
                 <span>{{item.quantityA}}</span>
               </td>
               <td>
                <span>{{item.quantityC}}</span>
               </td>
               <td>
                  <!--<button class="btn btn-sm btn-success mb-4">Editar</button>-->
                  <button type="button" class="btn btn-sm btn-success mb-4" @click="setDados(item)">Editar Preco</button> 
                  <br>
                  <button type="button" class="btn btn-sm btn-success mb-4" @click="addStock(item)">Adicionar Stock</button>
                  <br>
                  <button class="btn btn-sm btn-warning" @click="handleDeleteMenuItem(item)">Apagar</button>
                  
                  <div class="modal fade" id="exampleModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar {{form.name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                             <div class="form-group">
                                <label for="price" class="col-form-label">Preço:</label>
                                <input type="number" v-model="form.price" class="form-control" id="preco">
                             </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click="handleEditMenuItem(form)">Actualizar</button>
                        </div>
                        </div>
                    </div>
                  </div> 

                  <div class="modal fade" id="exampleModal2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar {{form.name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="quantity" class="col-form-label">Quantidade actual: {{form.quantityA}}</label><br>
                                <label for="quantity" class="col-form-label">Quantidade Consumida: {{form.quantityC}}</label>
                                 <br>Adicionar:
                                <input type="number" v-model="form.quantityA" class="form-control" id="quantidade">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click="handleEditMenuItem(form)">Actualizar</button>
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
import Form from "vform";
export default {
   props: ['items'],
   data() {
        return {
            localItems: null,
            form: new Form({
                id: '',
                name: '',
                category: '',
                price: 0,
                quantityA: 0,
                quantityC: 0,
                description: ''
            })
        };
    },
    created() {
        this.localItems = this.items;
    },
   methods: {

        setDados(item) {
        //document.getElementById('item').value = params;
        //this.form.reset();
        $('#exampleModal').modal("show");
        this.form.fill(item);

     },
        addStock(item) {
        this.form.reset();
        $('#exampleModal2').modal("show");
        this.form.fill(item);    
     },
      handleDeleteMenuItem(item){
        console.log(item.name);
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
            location.reload(); //funciona para fazer refresh da pagina corrente mas demora
            
        },
        handleEditMenuItem(item){
            const postData = {item_id: item.id,
                              item_category: item.category.id,
                              item_price: item.price,
                              item_quantityA: item.quantityA,
                              item_quantityC: item.quantityC};
                              console.log(postData.item_price);
        axios.post("/api/menu/edit", postData).then(response => {});
        
        }
   }
}
</script>