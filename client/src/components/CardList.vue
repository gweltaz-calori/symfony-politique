<template>
  <ul class="list">
    <li
      v-for="item in list"
      :key="item.key"
      class="list__item"
    >
      <RouterLink
        :to="`/presidents/${item.uuid}`"
        class="list__item__link card"
      >
        <img
          v-if="item.image"
          :src="item.image"
          class="card__image"
        >
        <p class="card__name">
          {{ item.name }}
        </p>
      </RouterLink>
    </li>
  </ul>
</template>
<script>
export default {
  props: {
    list: {
      type: Array,
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

.card {
  display: flex;
  align-items: center;
  padding: 18px 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.18);
  transition: box-shadow 0.3s;
}
.card:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}
.card__image {
  width: 50px;
  height: 50px;
  object-fit: cover;
  border-radius: 50%;
}
.card__name {
  margin-left: 12px;
}
</style>
