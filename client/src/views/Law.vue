<template>
  <div
    v-if="law"
    class="Page"
  >
    <PageTitle :label="law.description" />
    <ul>
      <p class="list__title">
        Nombre de votes : <span class="list__title__number">
          {{ law.votes.length }}
        </span>
      </p>
      <li
        v-for="vote in law.votes"
        :key="vote.key"
        class="list__item"
      >
        <CardItem
          :image="vote.person.image"
          :label="vote.person.name"
        />
      </li>
    </ul>
  </div>
</template>
<script>
import PageTitle from '@/components/PageTitle';
import CardItem from '@/components/CardItem';

export default {
  components: { PageTitle, CardItem },
  computed: {
    law() {
      return this.$store.state.laws.find(
        p => p.uuid === this.$route.params.lawUuid
      );
    }
  }
};
</script>
<style scoped>
.list__title {
  margin-bottom: 20px;
  font-size: 16px;
  font-weight: bold;
  color: var(--dark-grey);
}
.list__title__number {
  color: var(--black);
}
.list__item {
  width: 50%;
  margin-bottom: 16px;
}
</style>
