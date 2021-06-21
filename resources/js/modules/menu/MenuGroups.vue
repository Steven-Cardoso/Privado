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
                  <button class="btn btn-sm btn-success mb-4">Editar</button> 
                  <br>
                  <button class="btn btn-sm btn-warning" @click="handleDeleteMenuItem(item)">Apagar</button> 
               </td>
             </tr>
          </tbody>
        </table>
    </div>
</template>

<script>
export default {
   props: ['items'],
   data() {
        return {
            localItems: null
        }
    },
    created() {
        this.localItems = this.items;
    },
   methods: {
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
        },
   }
}
</script>