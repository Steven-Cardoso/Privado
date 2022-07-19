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
            <menu-item class="list-group" :items="currentMenuItems"></menu-item>
        </template>
    </card-component>
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