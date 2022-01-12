<template>
  <header>
    <h3>{{titleHeader}}</h3>
  </header>
</template>

<script>
export default {
  name: 'CompHeader',
  data() {
    return {};
  },
  props: {
    titleHeader: {
      type: String,
      default: 'This is header section',
    },
  },
};
</script>
