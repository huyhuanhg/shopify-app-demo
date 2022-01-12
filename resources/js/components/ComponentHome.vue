<template>
  <div class="content">
    This is {{ page }} page.
    <div class="link">
      <ul>
        <li>
          <a href="/#/ex">Example page</a>
        </li>
        <li>
          <a href="/#/products">Products page</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data() {
    return {
      page: 'Home',
    };
  },
};
</script>
