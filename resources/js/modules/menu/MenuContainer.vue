<template>
<div class="wrapper menu__container">
      <div class="row">
          <div class="col-md-8">
              <card-component>
                  <template slot="title">My menu Items</template>
                     <template slot="body">
                          <!-- Content will come here -->
                          <div class="section">
                              <multi-select
                              v-model="menu"
                              :options="categories"
                              ></multi-select>
                          </div>
                          <menu-groups :items="currentMenuItems"></menu-groups>
                      </template>
              </card-component>
          </div>
          <div class="col-md-4">
              <card-component>
                  <template slot="title">Add menu Item</template>
                  <template slot="body">
                   <menu-add-form
                     :categories="categories"
                     :resto-id="restoId"
                     v-on:newMenuItemAdded="handleNewMenuItem"
                   ></menu-add-form>
                   </template>
              </card-component>
          </div>
      </div>
    </div>
</template>

<script>
import _ from 'lodash';
import MultiSelect from 'vue-multiselect';
import MenuGroups from './MenuGroups';
import MenuAddForm from './MenuAddForm';

export default {
    props: ['items', 'restoId'],
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
      handleNewMenuItem(item) {
        console.log('item',item);
      }
  }
}
</script>
