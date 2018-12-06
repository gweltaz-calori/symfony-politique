<template>
  <div id="app">
    <NavHeader />
    <RouterView class="router" />
  </div>
</template>
<script>
import NavHeader from '@/components/NavHeader.vue';

export default {
  components: { NavHeader },
  mounted() {
    const colors = this.$store.state.colors;
    Object.keys(colors).forEach(key => {
      document.documentElement.style.setProperty(`--${key}`, colors[key]);
    });
  }
};
</script>

<style>
@import url('./assets/css/reset.css');

html {
  --max-width: 960px;
  --ctt-width: 600px;
  --header-height: 50px;
}

body {
  font-family: monospace;
  background: #fff;
}

.router {
  margin: var(--header-height) auto;
}

.page {
  max-width: var(--max-width);
  width: 90%;
  padding: var(--header-height) 0;
}

.link {
  color: var(--black);
  border-bottom: 2px solid var(--dark-grey);
  text-decoration: none;
}
</style>
