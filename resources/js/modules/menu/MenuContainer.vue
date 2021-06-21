<template>
 <div class="wrapper menu__container">
    <card-component>
        <template slot="title">Menu do Restaurante O Farol "Pool Bar"</template>
           <template slot="body">
            <div class="section">
              <multi-select
               v-model="menu"
               :options="categories"
              ></multi-select>
            </div>
            <menu-groups class="list-group" :items="currentMenuItems"></menu-groups>
        </template>
    </card-component>
        
          <!--
          <div class="col-md-4">
              <card-component>
                  <template slot="title">Add menu Item</template>
                  <template slot="body">
                   <menu-add-form
                     :categories="categories"
                     v-on:newMenuItemAdded="handleNewMenuItem"
                   ></menu-add-form>
                   </template>
              </card-component>
          </div>-->
 </div>
</template>

<script>
import _ from 'lodash';
import MultiSelect from 'vue-multiselect';
import MenuGroups from './MenuGroups';
import MenuAddForm from './MenuAddForm';

export default {
    props: ['items'],
    components: {
        MultiSelect,
        MenuGroups,
        MenuAddForm
    },
    created() {
        _.forEach(this.items, (item, key) => {
          this.categories.push(key);

        });
        this.menu = this.categories[0];
        this.localItems = this.items;
    },
    data() {
        return {
            localItems: '',
            menu: '',
            categories: []
        }
    },
    computed: {
        currentMenuItems() {
            return this.localItems[this.menu];
        }
    },
  methods: {
      handleNewMenuItem(item, category) {
        console.log('item',item);
        this.localItems[category].unshift(item);
      }
  }
}
</script>