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
    <div id="map" />
  </div>
</template>
<script>
import L from 'leaflet';
import './../../node_modules/leaflet/dist/leaflet.css';
import api from '@/api';
import SheetHeader from '@/components/SheetHeader';
import SvgIcon from '@/components/SvgIcon';

export default {
  components: { SheetHeader, SvgIcon },
  data() {
    return {
      presidentUuid: this.$route.params.presidentUuid,
      coordinates: {}
    };
  },
  computed: {
    president() {
      return this.$store.state.presidents.find(
        p => p.uuid === this.presidentUuid
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
  },
  mounted() {
    this.fetchCoordinates();
  },
  methods: {
    async fetchCoordinates() {
      const coord = await api.fetchPresidentCoordinates({
        params: {
          presidentUuid: this.presidentUuid
        }
      });
      if (!coord.error) {
        this.createMap(coord);
      }
    },
    createMap(coord) {
      const map = L.map('map').setView([coord.lat, coord.lon], 6);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
      const myIcon = L.icon({
        iconUrl:
          'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/images/marker-icon.png'
      });
      L.marker([coord.lat, coord.lon], { icon: myIcon }).addTo(map);
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

#map {
  width: 100vw;
  height: 400px;
  position: relative;
  top: var(--header-height);
  left: 50%;
  transform: translateX(-50%);
  margin-top: calc(-1 * var(--header-height));
}
</style>
