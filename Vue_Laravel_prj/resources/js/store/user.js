import Vuex from "vuex";

// const state = {
//     user: []
// };

// const store = new Vuex.Store({
//     state
// });

// export default store;

export default new Vuex.Store({
    state: { 
        message: 'Hello, Vuex!',
        count: 0 
    },
    mutations: {
        increment(state) { state.count++; }
    }
});