import Vuex from 'vuex';

export const store= new Vuex.Store({

	state:{
		nots:[]
	},
	getters: {
		allNots(state){
			return state.nots;
		},
		allNotsCount(state){
			return state.nots.length;
		}
	},
	mutations: {
		addNot(state, not){

			state.nots.push(not);
		}
	},
	actions: {

	}
});