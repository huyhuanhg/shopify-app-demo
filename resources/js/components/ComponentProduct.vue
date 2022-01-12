<template>
  <div>
    <div class="content">This is {{ page }} Component</div>
    <div class="product-info">
      <p><b>ID</b>: {{product.id}}</p>
      <p><b>Name</b>: {{product.name}}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Product',
  data() {
    return {
      page: 'Product',
    };
  },
  props: {
    product: Object,
  },
};
</script>

<style>
  .content {
    color: blue;
    font-size: 20px;
  }
</style>
