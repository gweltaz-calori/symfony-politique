<template>
  <div class="page">
    <PageTitle label="Liste des lois" />
    <CardList
      :list="laws"
      base-url="laws"
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
      laws: this.$store.state.laws
    };
  }
};
</script>
