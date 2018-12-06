<template>
  <h1 class="page-title">
    {{ label }}
  </h1>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      default: '',
      required: false
    }
  }
};
</script>
<style scoped>
.page-title {
  margin: 20px 0 35px 0;
  font-size: 20px;
  /* font-weight: bold; */
}
</style>
