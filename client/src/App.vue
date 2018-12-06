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
  max-width: var(--max-width);
  width: 90%;
  margin: var(--header-height) auto;
}

.Page {
  padding: var(--header-height) 0;
}

.Link {
  color: var(--black);
  border-bottom: 2px solid var(--dark-grey);
  text-decoration: none;
}

.List {
  margin: 50px 0;
}
.List__title {
  font-size: 16px;
  font-weight: bold;
}
.List__item {
  margin: 22px 0;
  display: flex;
  align-items: center;
  font-size: 16px;
}
.List__item__icon {
  width: 25px;
}
.List__item__label {
  margin-left: 5px;
}
</style>
