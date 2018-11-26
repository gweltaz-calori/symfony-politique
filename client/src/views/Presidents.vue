<template>
  <div>
    <h1>List des présidents</h1>
    <ul>
      <li
        v-for="president in presidents"
        :key="president.key"
      >
        <RouterLink :to="`/presidents/${president.uuid}`">
          {{ president.name }}
        </RouterLink>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      presidents: this.$store.state.presidents
    };
  }
};
</script>
