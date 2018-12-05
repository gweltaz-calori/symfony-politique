<template>
  <div>
    <PageTitle label="Liste des lois" />
    <ul>
      <li
        v-for="law in laws"
        :key="law.key"
      >
        Loi {{ law.uuid.substring(4, 8) }}
      </li>
    </ul>
  </div>
</template>
<script>
import PageTitle from '@/components/PageTitle';

export default {
  components: { PageTitle },
  data() {
    return {
      laws: this.$store.state.laws
    };
  }
};
</script>
