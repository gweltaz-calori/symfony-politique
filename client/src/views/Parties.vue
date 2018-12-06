<template>
  <div class="Page">
    <PageTitle label="Liste des parties" />
    <CardList
      :list="parties"
      base-url="parties"
    />
  </div>
</template>
<script>
import PageTitle from '@/components/PageTitle';
import CardList from '@/components/CardList';

export default {
  components: { PageTitle, CardList },
  data() {
    return {
      parties: this.$store.state.parties
    };
  }
};
</script>
