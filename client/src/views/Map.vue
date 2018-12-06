<template>
  <div class="map" />
</template>
<script>
import loadGoogleMapsApi from 'load-google-maps-api';

export default {
  mounted() {
    loadGoogleMapsApi()
      .then(googleMaps => {
        new googleMaps.Map(document.querySelector('.map'), {
          center: {
            lat: 40.7484405,
            lng: -73.9944191
          },
          zoom: 12,
          options: {
            key: 'AIzaSyDsEmPsG5p132tzfk-QaeISrrd9_FBEvsg'
          }
        });
      })
      .catch(function(error) {
        console.error(error);
      });
  }
};
</script>
<style scoped>
.map {
  width: 100vw;
  height: 100vh;
}
</style>
