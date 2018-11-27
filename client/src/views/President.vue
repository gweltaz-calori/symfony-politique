<template>
  <div>
    <h1>{{ president.name }}</h1>
    <p>Pays : {{ president.country }}</p>
    <p>
      Partie : <RouterLink :to="`/parties/${party.uuid}`">
        {{ party.name }}
      </RouterLink>
    </p>
  </div>
</template>
<script>
export default {
  computed: {
    president() {
      return this.$store.state.presidents.find(
        p => p.uuid === this.$route.params.presidentUuid
      );
    },
    party() {
      return this.$store.state.parties.find(
        party => party.uuid === this.president.politicalParty
      );
    }
  }
};
</script>
