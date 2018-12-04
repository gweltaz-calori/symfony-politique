<template>
  <div>
    <PageTitle :label="president.name" />
    <p class="field">
      Pays : {{ president.country }}
    </p>
    <p>
      <!-- Partie : <RouterLink :to="`/parties/${party.uuid}`">
        {{ party.name }}
      </RouterLink> -->
    </p>
  </div>
</template>
<script>
import PageTitle from '@/components/PageTitle';

export default {
  components: { PageTitle },
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
<style scoped>
.field {
  font-size: 16px;
}
</style>
