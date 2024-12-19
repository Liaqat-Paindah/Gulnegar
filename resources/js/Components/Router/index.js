import { createRouter, createWebHistory } from 'vue-router';
import Home from '../Home.vue';
import Abouts from '../Abouts.vue';
import Orders from '../Orders.vue';
import Contact from '../Contact.vue';
import Catagories from '../Catagories.vue';
import Gallary from '../Gallary.vue';
import Models from '../Models.vue';
import fabric from '../fabric.vue';
import Products from '../Products.vue';
import ShopItem from '../Shop-Item.vue';
import Preview from '../Preview.vue';
import add_cart from '../add_cart.vue';
import orders_recieve from '../orders_recieve.vue';
import NotFound from '../NotFound.vue';


// admin routes
import login from '../admin/login.vue';
import register from '../admin/register.vue';
import Logout from '../admin/Logout.vue';
import add_product from '../admin/add_product.vue';
const token=localStorage.getItem('token');
import store from '../store/index';
import product_list from '../admin/product_list.vue';
import product_edit from '../admin/product_edit.vue';
import order_list from '../admin/order_list.vue';
import order_remove from '../admin/order_remove.vue';
import product_remove from '../admin/product_remove.vue';
import Approved from '../admin/Approved.vue';
import Pendding from '../admin/Pendding.vue';
import pendding_edit from '../admin/pendding_edit.vue';
import confirmation from '../admin/confirmation.vue';
import delivery_list from '../admin/delivery_list.vue';
import delivery_remove from '../admin/delivery_remove.vue';
import customers from '../admin/customers.vue';
import customer_details from '../admin/customer_details.vue';
import customer_remove from '../admin/customer_remove.vue';
import img_list from '../admin/img_list.vue';
import img_remove from '../admin/img_remove.vue';
import add_image from '../admin/add_image.vue';



const routes=[
    // start of admin routes
    {
        path: '/login',
        name: 'login',
        component: login,  
    },
    {
        path: '/register',
        name: 'register',
        component: register,
        meta: {LoginRequired: true}     
    },
    {
        path: '/add_product',
        name: 'add_product',
        component: add_product,  
        meta: {LoginRequired: true}

    },
    {
        path: '/product_remove:id',
        name: 'product_remove',
        component: product_remove,
    },
    {
        path: '/product_list',
        name: 'product_list',
        component: product_list,
       meta: {LoginRequired: true}
    },
    {
        path: '/order_list',
        name: 'order_list',
        component: order_list,
      meta: {LoginRequired: true}
    },
    {
        path: '/order_remove:id',
        name: 'order_remove',
        component: order_remove,
    },
    {
        path: '/product_edit/:id',
        name: 'product_edit',
        component: product_edit,
       meta: {LoginRequired: true}
    },
    {
        path: '/img_list',
        name: 'img_list',
        component: img_list,
       meta: {LoginRequired: true}

    },
    {
        path: '/img_remove:id',
        name: 'img_remove',
        component: img_remove,
    },
    {
        path: '/add_image',
        name: 'add_image',
        component: add_image,
       meta: {LoginRequired: true}
    },
    {
        path: '/Approved',
        name: 'Approved',
        component: Approved,
        meta: {LoginRequired: true}

    },
    {
        path: '/customers',
        name: 'customers',
        component: customers,
      meta: {LoginRequired: true}

    },
    {
        path: '/customer_details:id',
        name: 'customer_details',
        component: customer_details,  
      meta: {LoginRequired: true}
    },
    {
        path: '/customer_remove:id',
        name: 'customer_remove',
        component: customer_remove,  

    },
    {
        path: '/delivery_list',
        name: 'delivery_list',
        component: delivery_list,  
      meta: {LoginRequired: true}

    },
    {
        path: '/delivery_remove:id',
        name: 'delivery_remove',
        component: delivery_remove,  

    },
    {
        path: '/Pendding',
        name: 'Pendding',
        component: Pendding,  
        meta: {LoginRequired: true}
    },
    {
        path: '/pendding_edit:id',
        name: 'pendding_edit',
        component: pendding_edit,  
        meta: {LoginRequired: true}
    },
    {
        path: '/confirmation:id',
        name: 'confirmation',
        component: confirmation,  
      meta: {LoginRequired: true}

    },
    {
        path: '/Logout',
        name: 'Logout',
        component: Logout,
        meta: {LoginRequired: true}
    },
    // end of admin routes

    {
        path: '/:catchAll(.*)',
        Name: 'NotFound',
        component: NotFound,
    },
    {
        path: '/fabric:id',
        name: 'fabric',
        component: fabric,
        
    },
    {
        path: '/Models:id',
        name: 'Models',
        component: Models,
        
    },
    {
        path: '/orders_recieve:message',
        name: 'orders_recieve',
        component: orders_recieve,
    },
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/Preview:id',
        name: 'Preview',
        component: Preview,
    },
    {
        path: '/Abouts',
        name: 'Abouts',
        component: Abouts,
    },
    {
        path: '/Contact',
        name: 'Contact',
        component: Contact,
    },
    {
        path: '/Orders',
        name: 'Orders',
        component: Orders,
    },
    {
        path: '/Catagories:id',
        name: 'Catagories',
        component: Catagories,
    },
    {
        path: '/Gallary',
        name: 'Gallary',
        component: Gallary,
    },

    {
        path: '/Products',
        name: 'Products',
        component: Products,
      //  meta: {LoginRequired: true}
    },
    {
        path: '/ShopItem:id',
        name: 'ShopItem',
        component: ShopItem,
    },
    {
        path: '/add_cart:id',
        name: 'add_cart',
        component: add_cart,
    },
    
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
})
router.beforeEach((to, from) => {
    if (to.meta.LoginRequired && !store.state.isAuthenticated) {
      return {
        path: '/login',
        query: { redirect: to.fullPath },
      }
    }
    else if (to.meta.LoginRedirect && store.state.isAuthenticated) {
        return {
          path: '/Products',
          query: { redirect: to.fullPath },
        }
      }

  })
export default router