import Vue from 'vue';
import Vuex from 'vuex';

import dataPresidents from '@/data/presidents.json';
import dataParties from '@/data/parties.json';
import dataLaws from '@/data/laws.json';

Vue.use(Vuex);

const state = {
  presidents: {},
  parties: {},
  laws: {}
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
  },
  async loadLaws({ commit }) {
    // const presidents = await fetch('')
    const laws = dataLaws;
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
