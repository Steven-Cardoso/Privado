<template>
    <div class="section">
         <table class="table table-hover table-striped">
              <thead>
                    <tr>
                 <th>Nome &amp; Descrição</th>
                 </tr>
              </thead>
           <tbody>
                  <tr v-for="(item, key) in items" :key="key">
               <td>
                  <strong v-text="item.name"></strong>
                  <p v-text="item.description"></p>
               </td>
               <td>
                imagem talvez
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