//Storeを定義
import { defineStore } from 'pinia';

//import { useloginStore } from '@/store/pinia_login.js'

export const useStore = defineStore({
  //defineStore(一意のidを定義,)
  id:'user_store',

  state: () => ({
    user: {
        name: '',
        login_flg:false,
    }
  }),

  actions:{
    updateUserState (authUser){
      // console.log(authUser);
      this.user = authUser;
      console.log(this.user)
      
    }
  }
});
  
  
  
  
  // 'myStore', {
  //   state: () => ({
  //     count: 0,
  //   }),
  //   getters: {
  //     doubleCount(state) {
  //       return state.count * 2;
  //     },
  //   },
  //   actions: {
  //     increment() {
  //       this.count++;
  //     },
  //   },
  // });