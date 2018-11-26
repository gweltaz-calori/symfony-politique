import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';

Vue.config.productionTip = false;

const loadDatas = async () => {
  await store.dispatch('loadPresidents');
  await store.dispatch('loadParties');

  new Vue({
    router,
    store,
    render: h => h(App)
  }).$mount('#app');
};

loadDatas();
