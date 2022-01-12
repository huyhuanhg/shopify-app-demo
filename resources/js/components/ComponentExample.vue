<template>
  <header>
    <div class="content">This is {{ page }} page</div>
    <div class="link">
      <ul>
        <li>
          <a href="/">Home page</a>
        </li>
        <li>
          <a href="/#/products">Products page</a>
        </li>
      </ul>
    </div>
  </header>
</template>

<script>
export default {
  name: 'CompExample',
  data() {
    return {
      page: 'Example',
    };
  },
};
</script>

<style>
</style>
