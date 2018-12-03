<template>
  <nav class="nav-header">
    <ul class="list">
      <li class="list__item">
        <RouterLink
          exact
          to="/"
          class="list__item__link"
        >
          Accueil
        </RouterLink>
      </li>
      <li class="list__item">
        <RouterLink
          exact
          to="/presidents"
          class="list__item__link"
        >
          Présidents
        </RouterLink>
      </li>
      <li class="list__item">
        <RouterLink
          exact
          to="/parties"
          class="list__item__link"
        >
          Parties
        </RouterLink>
      </li>
      <li class="list__item">
        <RouterLink
          exact
          to="/laws"
          class="list__item__link"
        >
          Lois
        </RouterLink>
      </li>
      <li class="list__item">
        <RouterLink
          exact
          to="/map"
          class="list__item__link"
        >
          Carte
        </RouterLink>
      </li>
    </ul>
  </nav>
</template>
<style scoped>
.nav-header {
  width: 100%;
  height: var(--header-height);
  position: fixed;
  top: 0;
  left: 0;
  border-bottom: 1px solid var(--black);
}

.list {
  height: 100%;
  display: flex;
  align-items: center;
  margin: 0 12px;
}
.list__item {
  margin: 0 12px;
}
.list__item__link {
  padding: 5px 0;
  color: var(--black);
  text-decoration: none;
}
.list__item__link:hover,
.list__item__link--active {
  border-bottom: 2px solid var(--dark-purple);
}
</style>
