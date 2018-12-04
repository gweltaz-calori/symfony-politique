<template>
  <div>
    <PageTitle label="Liste des présidents" />
    <ul>
      <li
        v-for="president in presidents"
        :key="president.key"
      >
        <RouterLink
          :to="`/presidents/${president.uuid}`"
          class="list__item__link"
        >
          {{ president.name }}
        </RouterLink>
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
      presidents: this.$store.state.presidents
    };
  }
};
</script>
<style scoped>
.list__item__link {
  font-size: 18px;
  color: var(--black);
  text-decoration: none;
  border-bottom: 2px solid var(--light-purple);
}
</style>
