import Vue from 'vue';
import Router from 'vue-router';
import Home from '../components/ComponentHome';
import Example from '../components/ComponentExample';
import Products from '../components/ComponentProducts';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: Home,
    },
    {
      path: '/ex',
      name: 'Example',
      component: Example,
    },
    {
      path: '/products',
      name: 'Products',
      component: Products,
    },
  ],
});
