import Vue from 'vue';
import Vuex from 'vuex';

import dataPresidents from '@/data/presidents.json';
import dataParties from '@/data/parties.json';

Vue.use(Vuex);

const state = {
  presidents: {},
  parties: {}
};

const actions = {
  async loadPresidents({ commit }) {
    // const presidents = await fetch('')
    const presidents = dataPresidents;
    commit('setPresidents', presidents);
  },
  async loadParties({ commit }) {
    // const presidents = await fetch('')
    const parties = dataParties;
    commit('setParties', parties);
  }
};

const mutations = {
  setPresidents(state, presidents) {
    state.presidents = presidents;
  },
  setParties(state, parties) {
    state.parties = parties;
  }
};

export default new Vuex.Store({
  state,
  actions,
  mutations
});
