<template>
  <div>
    <h1>Liste des lois</h1>
    <ul>
      <li
        v-for="law in laws"
        :key="law.key"
      >
        Loi n°{{ law.uuid }}
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      laws: this.$store.state.laws
    };
  }
};
</script>
