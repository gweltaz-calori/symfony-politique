<template>
  <div
    class="card"
    :class="{'card--link': inLink }"
  >
    <img
      v-if="image"
      :src="image"
      class="card__image"
    >
    <p class="card__name">
      {{ label }}
    </p>
  </div>
</template>
<script>
export default {
  props: {
    image: {
      type: String,
      default: '',
      required: false
    },
    label: {
      type: String,
      required: true
    },
    inLink: {
      type: Boolean,
      default: false,
      required: false
    }
  }
};
</script>
<style scoped>
.card {
  display: flex;
  align-items: center;
  padding: 18px 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.18);
  transition: box-shadow 0.3s;
}
.card--link:hover {
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
