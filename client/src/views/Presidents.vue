<template>
  <div class="page">
    <PageTitle label="Liste des présidents" />
    <CardList :list="presidents" />
  </div>
</template>
<script>
import PageTitle from '@/components/PageTitle';
import CardList from '@/components/CardList';

export default {
  components: { PageTitle, CardList },
  data() {
    return {
      presidents: this.$store.state.presidents
    };
  }
};
</script>
