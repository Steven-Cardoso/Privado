<template>
    <div class="section">
         <table class="table table-hover table-striped">
              <thead>
                    <tr>
                 <th>Nome &amp; Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
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
             </tr>
          </tbody>
        </table>
    </div>
</template>

<script>
export default {
   props: ['items'] 
}
</script>