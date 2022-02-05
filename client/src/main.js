import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';
import ShoesList from '@/components/ShoesList.vue';
import NewShoe from '@/components/NewShoe.vue';
import ShoeDetail from '@/components/ShoeDetail.vue';
import EditShoe from '@/components/EditShoe.vue';

Vue.config.productionTip = false
Vue.use (VueRouter);


const routes = [
  {
    path: "/",
    name: "shoes_list",
    component: ShoesList,
  },
  {
    path: "/newshoe",
    name: "new_shoe",
    component: NewShoe,
  },
  {
    path: "/shoedetail/:id",
    name: "shoe_detail",
    component: ShoeDetail,
  },
  {
    path: "/edit/:id",
    name: "edit_shoe",
    component: EditShoe,
  },

];

const router= new VueRouter({
mode: "history",
routes,
});

new Vue({
render: h => h(App),
router,
}).$mount('#app')
