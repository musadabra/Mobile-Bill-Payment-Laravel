import VueRouter from 'vue-router';

let routes = [
    { path: '/Vendor', component: require('./components/Admin/Vendor.vue').default },
    { path: '/Offer', component: require('./components/Admin/Offer.vue').default },
    { path: '/Complain', component: require('./components/Admin/Complain.vue').default },
    { path: '/', component: require('./components/Admin/Vendor.vue').default },              
];

export default new VueRouter({
  routes 
});