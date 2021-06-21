<template>
  <card-component>
    <template slot="title">Adicionar novo item no Menu.</template>
        <template slot="body">
          <menu-add-form
          :categories="categories"
          v-on:newMenuItemAdded="handleNewMenuItem"
          ></menu-add-form>
        </template>
  </card-component>
</template>

<script>
import _ from 'lodash';
import MenuAddForm from './MenuAddForm';

export default {
    props: ['items'],
    components: {
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