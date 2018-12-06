<template>
  <header class="header">
    <div class="header__part header__part--left">
      <img
        :src="image"
        class="header__image"
      >
      <h1 class="header__title">
        {{ title }}
      </h1>
    </div>
    <div class="header__part header__part--right">
      <p class="header__subtitle">
        {{ subtitle }}
      </p>
      <p class="header__counter">
        {{ counter }}
      </p>
    </div>
  </header>
</template>
<script>
export default {
  props: {
    image: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    subtitle: {
      type: String,
      required: true
    },
    counter: {
      type: Number,
      required: true
    }
  }
};
</script>
<style scoped>
.header {
  max-width: var(--ctt-width);
  width: 90%;
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: auto;
  padding: 12px 16px;
}
.header::before {
  content: '';
  width: 100vw;
  height: 100%;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.18);
}
.header__part {
  display: flex;
  align-items: center;
}
.header__part--right {
  flex-direction: column;
}
.header__subtitle {
  font-size: 16px;
  color: var(--dark-grey);
}
.header__counter {
  font-size: 30px;
  font-weight: bold;
}
.header__image {
  width: 75px;
  height: 75px;
  object-fit: cover;
  border-radius: 50%;
}
.header__title {
  margin-left: 20px;
  font-size: 20px;
  font-weight: bold;
}
</style>
