<template>
  <div v-if="president">
    <SheetHeader
      :image="president.image"
      :title="president.name"
      :subtitle="lawsCount > 1 ? 'Lois' : 'Loi'"
      :counter="lawsCount"
    />
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
              :to="`/parties/${president.party.uuid}`"
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
import SheetHeader from '@/components/SheetHeader';
import SvgIcon from '@/components/SvgIcon';

export default {
  components: { SheetHeader, SvgIcon },
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
