<template>
  <div>
    <h1>{{ party.name }}</h1>
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
  computed: {
    party() {
      return this.$store.state.parties.find(
        p => p.uuid === this.$route.params.partyUuid
      );
    },
    presidents() {
      return this.$store.state.presidents.filter(
        p => p.politicalParty === this.party.uuid
      );
    }
  }
};
</script>
