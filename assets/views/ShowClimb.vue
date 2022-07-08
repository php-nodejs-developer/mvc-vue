<template>
  <div v-for="climb in climbs"
       :key="climb.id">
    <p>{{ climb.start }} - {{ climb.end }}</p>
    <p>{{ climb.mountain_name }} ({{ climb.mountain_country }})</p>
    <hr>
  </div>

</template>

<script>
export default {
  data() {
    return {
      climbs: []
    }
  },
  created() {
    fetch("/api/climb")
        .then(response => response.json())
        .then(json => this.climbs = json);
  },
}
</script>

<style scoped>

</style>