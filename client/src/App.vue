<template>
  <div id="app">
    <NavHeader />
    <RouterView class="page" />
  </div>
</template>
<script>
import NavHeader from '@/components/NavHeader.vue';

export default {
  components: { NavHeader }
};
</script>

<style>
@import url('./assets/css/reset.css');

html {
  --black: #333;
  --dark-purple: #5603ad;
  --light-purple: #8367c7;
  --green: #b3e9c7;
  --white: #f0fff1;

  --header-height: 50px;
}

body {
  font-family: monospace;
  background: #fff;
}

.page {
  max-width: 1280px;
  width: 90%;
  margin: calc(2 * var(--header-height)) auto;
}
</style>
