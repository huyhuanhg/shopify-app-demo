<template>
  <footer>
    <h1>This is {{ text }}</h1>
  </footer>
</template>

<script>
export default {
  name: 'comp-footer',
  data () {
    return {
      text: 'Footer'
    };
  }
};
</script>

<style>
</style>
