<template>
  <div v-if="president">
    <SheetHeader
      :image="president.image"
      :title="president.name"
      :subtitle="lawsCount > 1 ? 'Lois' : 'Loi'"
      :counter="lawsCount"
    />
    <div class="content">
      <ul class="List">
        <p class="List__title">
          Informations
        </p>
        <li class="List__item">
          <div class="List__item__icon">
            <SvgIcon
              icon="pin"
              :color="$store.state.colors['dark-grey']"
            />
          </div>
          <p class="List__item__label">
            {{ president.country }}
          </p>
        </li>
        <li class="List__item">
          <div class="List__item__icon">
            <SvgIcon
              icon="politics"
              :color="$store.state.colors.black"
            />
          </div>
          <p class="List__item__label">
            <RouterLink
              :to="`/parties/${president.party.uuid}`"
              class="Link"
            >
              {{ president.party.name }}
            </RouterLink>
          </p>
        </li>
      </ul>
      <ul class="List">
        <p class="List__title">
          Lois
        </p>
        <li
          v-for="law in president.laws"
          :key="law.key"
          class="List__item"
        >
          <RouterLink
            :to="`/laws/${law.uuid}`"
            class="Link"
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
</style>
