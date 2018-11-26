<template>
  <div>
    <h1>Liste des parties</h1>
    <ul>
      <li
        v-for="party in parties"
        :key="party.key"
      >
        <RouterLink :to="`/parties/${party.uuid}`">
          {{ party.name }}
        </RouterLink>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      parties: this.$store.state.parties
    };
  }
};
</script>
