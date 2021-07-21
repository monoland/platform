import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import state from '@plugins/store/state';
import mutations from '@plugins/store/mutations';
import actions from '@plugins/store/actions';

export default new Vuex.Store({
    state,
    mutations,
    actions,
});