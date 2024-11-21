//Storeを定義
import { defineStore } from 'pinia';

export const useLoginStore = defineStore({
  //defineStore(一意のidを定義,)
  id:'user_login',

  state: () => ({
    user: {
        name: '',
        company: '',
        login_flg:false,
    }
  }),
});