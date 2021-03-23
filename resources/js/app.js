require('./bootstrap');

// require vue
import Vue from 'vue';

import ShowItems from './components/ShowItems.vue'
import CreateItems from './components/CreateItems.vue'

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

//load items
const app = new Vue({
  el: '#app',
  components: {
    'show-items': ShowItems,
    'create-items': CreateItems
  },
  methods: {
    checkForm: function (e) {
      if (
        this.product.name &&
        this.product.category &&
        this.products.date &&
        this.product.description
      ) {
        return true;
      }

      this.errors = [];

      if (this.product.name) {
        this.errors.push("Name is Required");
      }

      if (this.product.category) {
        this.errors.push("Category is Required");
      }

      if (this.product.date) {
        this.errors.push("Date is Required");
      }

      if (this.product.description) {
        this.errors.push("Description is Required");
      }
    },
  }

});
