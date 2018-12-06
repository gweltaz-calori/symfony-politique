import Vue from 'vue';
import Vuex from 'vuex';

import api from '@/api';

Vue.use(Vuex);

const state = {
  colors: {
    black: '#333',
    color: 'rgb(50, 145, 160)',
    'dark-grey': '#666',
    'light-grey': '#bbb',
    white: '#fff'
  },
  presidents: {},
  parties: {},
  laws: {}
};

const actions = {
  async loadPresidents({ commit }) {
    const presidents = await api.fetchPresidents();
    commit('setPresidents', presidents);
  },
  async loadParties({ commit }) {
    const parties = await api.fetchParties();
    commit('setParties', parties);
  },
  async loadLaws({ commit }) {
    const laws = await api.fetchLaws();
    commit('setLaws', laws);
  }
};

const mutations = {
  setPresidents(state, presidents) {
    state.presidents = presidents;
  },
  setParties(state, parties) {
    state.parties = parties;
  },
  setLaws(state, laws) {
    state.laws = laws;
  }
};

export default new Vuex.Store({
  state,
  actions,
  mutations
});
