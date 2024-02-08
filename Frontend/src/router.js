import {createRouter, createWebHistory} from 'vue-router';
import HomeVue from './views/Home.vue';
import ShopVue from './views/Shop.vue';
import PromotionVue from './views/Promotion.vue';
import ContactVue from './views/Contact.vue'
import LoginVue from './views/Login.vue'
import RegisterVue from './views/Register.vue'
import CartVue from './views/Cart.vue'

const routes = [
    {path: '/', name: 'homepage', component: HomeVue},
    {path: '/shop', name: 'shoppage', component: ShopVue},
    {path: '/promotion', name: 'promotionpage', component: PromotionVue},
    {path: '/contact', name: 'contactpage', component: ContactVue},
    {path: '/login', name: 'loginpage', component: LoginVue},
    {path: '/cart', name: 'cartpage', component: CartVue},
    {path: '/register', name: 'registerpage', component: RegisterVue},
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;