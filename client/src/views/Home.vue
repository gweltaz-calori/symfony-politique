<template>
  <div class="Page home">
    <p class="text">
      Vous trouverez sur ce site une liste de différents présidents, de leur partie respectifs et des lois qu'ils proposent.
    </p>
    <p class="text">
      Ce projet est un exercice dans le cadre du workshop Symfony à l'école des Gobelins. Il a été réalisé par Gweltaz Calori et Roch Bouchayer sous l'enseignemant de Sebastien Fleury.
    </p>
  </div>
</template>
<script>
export default {
  name: 'Home'
};
</script>
<style scoped>
.home {
  width: var(--ctt-width);
}
.text {
  margin: 15px 0;
  line-height: 1.5;
}
.text:first-child {
  margin-top: 0;
}
</style>
