require('./bootstrap');

// require vue
import Vue from 'vue';

// id app
Vue.component('show-items', require('./components/ShowItems.vue').default)

import ShowItems from './components/ShowItems.vue'

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

//load items
const app = new Vue({
  el: '#app',
  components: { 'show-items': ShowItems }
});
