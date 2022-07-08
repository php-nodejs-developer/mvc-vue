<template>
<div v-for="climb in climbs"
     :key="climb.id">
  <p>{{climb.start}} - {{climb.end}}</p>
  <p>{{climb.mountain_name}} ({{climb.mountain_country}})</p>
</div>
</template>

<script>
export default {
  data(){
    return {
      climbs: []
    }
  }
}
</script>

<style scoped>

</style>