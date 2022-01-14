<template>
  <div id="app">
    <comp-header :titleHeader="titleHeader" />
    <router-view />
    <comp-footer />
  </div>
</template>

<script>
import CompHeader from './components/ComponentHeader';
import CompFooter from './components/ComponentFooter';
export default {
  name: 'App',
  components: {
    CompHeader,
    CompFooter,
  },
  data() {
    return {
      titleHeader: 'This is Header',
    };
  },
};
</script>
