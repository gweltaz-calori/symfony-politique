import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';
import Presidents from './views/Presidents.vue';
import President from './views/President.vue';
import Parties from './views/Parties.vue';
import Party from './views/Party.vue';
import Laws from './views/Laws.vue';
import Law from './views/Law.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  linkActiveClass: 'list__item__link--active',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/presidents',
      name: 'presidents',
      component: Presidents
    },
    {
      path: '/presidents/:presidentUuid',
      name: 'president',
      component: President
    },
    {
      path: '/parties',
      name: 'parties',
      component: Parties
    },
    {
      path: '/parties/:partyUuid',
      name: 'party',
      component: Party
    },
    {
      path: '/laws',
      name: 'laws',
      component: Laws
    },
    {
      path: '/laws/:lawUuid',
      name: 'law',
      component: Law
    }
  ]
});
