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
                          <!-- <div class="section">
                              <table class="table table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Name &amp; description</th>
                                          <th>Price</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr v-for="(item, key) in currentMenuItems" :key="key">
                                          <td>
                                              <strong v-text="item.name"></strong>
                                                <p v-text="item.description"></p>
                                          </td>
                                          <td>
                                              <span v-text="item.price"></span>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div> -->
                          <menu-groups :items="currentMenuItems"></menu-groups>
                      </template>
              </card-component>
          </div>
          <div class="col-md-4">
              <card-component>
                  <template slot="title">Add menu Item</template>
                  <template slot="body">
                   <menu-add-form :categories="categories"></menu-add-form>
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
    },
    data() {
        return {
            menu: '',
            categories: []
        }
    },
    computed: {
        currentMenuItems() {
            return this.items[this.menu];
        }
    }
}
</script>