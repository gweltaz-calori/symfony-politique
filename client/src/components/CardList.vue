<template>
  <ul class="list">
    <li
      v-for="item in list"
      :key="item.key"
      class="list__item"
    >
      <RouterLink
        :to="`/${baseUrl}/${item.uuid}`"
        class="list__item__link card"
      >
        <CardItem
          :image="item.image"
          :label="item.name || item.description"
          in-link
        />
      </RouterLink>
    </li>
  </ul>
</template>
<script>
import CardItem from '@/components/CardItem';

export default {
  components: { CardItem },
  props: {
    list: {
      type: Array,
      required: true
    },
    baseUrl: {
      type: String,
      required: true
    }
  }
};
</script>
<style scoped>
.list {
  display: flex;
  flex-flow: wrap;
  justify-content: space-between;
}

.list__item {
  width: 48%;
  margin: 12px 0;
}

.list__item__link {
  display: block;
  font-size: 18px;
  color: var(--black);
  text-decoration: none;
}
</style>
