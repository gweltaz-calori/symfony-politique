<template>
  <h1>{{ president.name }}</h1>
</template>
<script>
export default {
  computed: {
    president() {
      return this.$store.state.presidents.find(
        p => p.uuid === this.$route.params.presidentUuid
      );
    }
  }
};
</script>
