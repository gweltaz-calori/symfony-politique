<template>
  <div
    v-if="law"
    class="Page"
  >
    <PageTitle :label="law.description" />
    <ul>
      <p class="list__title">
        Nombre de votes : <span class="list__title__number">
          {{ law.votes.length }}
        </span>
      </p>
      <li
        v-for="vote in law.votes"
        :key="vote.key"
        class="list__item"
      >
        <CardItem
          :image="vote.person.image"
          :label="vote.person.name"
        />
      </li>
    </ul>
    <div
      v-if="persons"
      class="List"
    >
      <p class="List__title">
        Ajouter un vote
      </p>
      <div class="vote">
        <div class="vote__select">
          <select
            v-model="selectedVoterUuid"
            class="vote__select__tag"
          >
            <option
              disabled
              value=""
            >
              Sélectionner un voteur
            </option>
            <option
              v-for="person in persons"
              :key="person.key"
              :value="person.uuid"
              class="List__item"
            >
              {{ person.name }}
            </option>
          </select>
        </div>
        <button
          class="vote__button"
          @click="sendVoter"
        >
          Voter !
        </button>
      </div>
    </div>
  </div>
</template>
<script>
import api from '@/api';
import PageTitle from '@/components/PageTitle';
import CardItem from '@/components/CardItem';

export default {
  components: { PageTitle, CardItem },
  data() {
    return {
      lawUuid: this.$route.params.lawUuid,
      selectedVoterUuid: ''
    };
  },
  computed: {
    law() {
      return this.$store.state.laws.find(p => p.uuid === this.lawUuid);
    },
    persons() {
      const persons = this.$store.state.persons;
      if (!persons.length) {
        return null;
      }
      const votersUuid = this.law.votes
        .map(vote => vote.person)
        .map(person => person.uuid);
      return persons.filter(p => votersUuid.indexOf(p.uuid) < 0);
    }
  },
  mounted() {
    this.$store.dispatch('loadPersons');
  },
  methods: {
    sendVoter() {
      const voter = this.persons.find(p => p.uuid === this.selectedVoterUuid);
      if (!voter) {
        return null;
      }
      api.postLawsVotes(
        {
          body: {
            person: voter
          },
          params: {
            lawUuid: this.lawUuid
          }
        },
        () => {
          // TODO: fetch only law and inject result in state.laws
          this.$store.dispatch('loadLaws');
        }
      );
    }
  }
};
</script>
<style scoped>
.list__title {
  margin-bottom: 20px;
  font-size: 16px;
  font-weight: bold;
  color: var(--dark-grey);
}
.list__title__number {
  color: var(--black);
}
.list__item {
  width: 48%;
  display: inline-block;
  margin-bottom: 16px;
}
.list__item:nth-child(2n) {
  margin-right: 2%;
}

.vote {
  margin-top: 20px;
}
.vote__select {
  display: inline-block;
  position: relative;
}
.vote__select::before {
  content: '';
  width: 0;
  height: 0;
  position: absolute;
  top: 50%;
  right: 5%;
  transform: translateY(-25%);
  border-style: solid;
  border-width: 8px 4px 0 4px;
  border-color: var(--dark-grey) transparent transparent transparent;
}
.vote__select__tag,
.vote__button {
  padding: 5px 8px;
  font-size: 14px;
  font-family: monospace;
  appearance: none;
  border: none;
  border-radius: 4px;
  background: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}
.vote__select__tag {
  padding-right: 30px;
}
.vote__button {
  width: 125px;
  margin-left: 25px;
  cursor: pointer;
  color: var(--white);
  background: var(--color);
}
</style>
