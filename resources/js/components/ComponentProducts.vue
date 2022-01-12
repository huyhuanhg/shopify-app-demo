<template>
  <div>
    <div class="content">This is {{ page }} page</div>
    <div class="link">
      <ul>
        <li>
          <a href="/">Home page</a>
        </li>
        <li>
          <a href="/#/ex">Example page</a>
        </li>
      </ul>
    </div>
    <div class="list-products">
      <product v-for="product in products" :key="product.id" :product="product"/>
    </div>
  </div>
</template>

<script>
import Product from './ComponentProduct';
export default {
  name: 'CompExample',
  data() {
    return {
      page: 'Products',
      products: [
        {
          id: 1,
          name: 'product1',
        },
        {
          id: 2,
          name: 'product2',
        },
        {
          id: 3,
          name: 'product3',
        },
      ],
    };
  },
  components: {
    Product,
  },
};
</script>
