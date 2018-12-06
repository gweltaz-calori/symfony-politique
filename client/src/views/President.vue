<template>
  <div>
    <header class="header">
      <div class="header__part header__part--left">
        <img
          :src="president.image"
          class="header__image"
        >
        <h1 class="header__name">
          {{ president.name }}
        </h1>
      </div>
      <div class="header__part header__part--right">
        <p class="header__part__subtitle">
          {{ lawsCount > 1 ? 'Lois' : 'Loi' }}
        </p>
        <p class="header__part__number">
          {{ lawsCount }}
        </p>
      </div>
    </header>
    <div class="content">
      <ul class="list">
        <p class="list__title">
          Informations
        </p>
        <li class="list__item">
          <div class="list__item__icon">
            <SvgIcon
              icon="pin"
              :color="$store.state.colors['dark-grey']"
            />
          </div>
          <p class="list__item__label">
            {{ president.country }}
          </p>
        </li>
        <li class="list__item">
          <div class="list__item__icon">
            <SvgIcon
              icon="politics"
              :color="$store.state.colors.black"
            />
          </div>
          <p class="list__item__label">
            <RouterLink
              :to="president.party.name"
              class="link"
            >
              {{ president.party.name }}
            </RouterLink>
          </p>
        </li>
      </ul>
      <ul class="list">
        <p class="list__title">
          Lois
        </p>
        <li
          v-for="law in president.laws"
          :key="law.key"
          class="list__item"
        >
          <RouterLink
            :to="`/laws/${law.uuid}`"
            class="link"
          >
            Loi {{ law.description }}
          </RouterLink>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
import SvgIcon from '@/components/SvgIcon';

export default {
  components: { SvgIcon },
  computed: {
    president() {
      return this.$store.state.presidents.find(
        p => p.uuid === this.$route.params.presidentUuid
      );
    },
    lawsCount() {
      return this.president.laws.length;
    },
    party() {
      return this.$store.state.parties.find(
        party => party.uuid === this.president.politicalParty
      );
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
.header__part__subtitle {
  font-size: 16px;
  color: var(--dark-grey);
}
.header__part__number {
  font-size: 30px;
  font-weight: bold;
}
.header__name {
  margin-left: 20px;
  font-size: 20px;
  font-weight: bold;
}
.header__image {
  width: 75px;
  height: 75px;
  object-fit: cover;
  border-radius: 50%;
}

.content {
  max-width: var(--ctt-width);
  width: 90%;
  margin: 40px auto;
}

.list {
  margin: 50px 0;
}
.list__title {
  font-size: 16px;
  font-weight: bold;
}
.list__item {
  margin: 22px 0;
  display: flex;
  align-items: center;
  font-size: 16px;
}
.list__item__icon {
  width: 25px;
}
.list__item__label {
  margin-left: 5px;
}
</style>
