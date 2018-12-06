<template>
  <div>
    <SheetHeader
      :image="party.image"
      :title="party.name"
      :subtitle="presidentsCount > 1 ? 'Présidents' : 'Président'"
      :counter="presidentsCount"
    />
    <CardList
      :list="presidents"
      base-url="presidents"
    />
  </div>
</template>
<script>
import SheetHeader from '@/components/SheetHeader';
import CardList from '@/components/CardList';

export default {
  components: { SheetHeader, CardList },
  computed: {
    party() {
      return this.$store.state.parties.find(
        p => p.uuid === this.$route.params.partyUuid
      );
    },
    presidents() {
      return this.$store.state.presidents.filter(
        p => p.party.uuid === this.party.uuid
      );
    },
    presidentsCount() {
      return this.presidents.length;
    }
  }
};
</script>
