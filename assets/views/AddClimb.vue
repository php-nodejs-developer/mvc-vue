<template>
  <p v-if="message">{{message}}</p>
  <form @submit.prevent="addClimb">
    <input type="datetime-local" v-model="climb.start" placeholder="Начало восхождения"> <br>
    <input type="datetime-local" v-model="climb.end" placeholder="Завершение восхождения"> <br>
    <select v-model="climb.mountainId">
     <option v-for="mountain in mountains"
             :key="mountain.id"
             @select="selectMountain(mountain.id, mountain.name)">
       {{mountain.name}}
     </option>
    </select>
    <input type="submit" value="Добавить">
  </form>
</template>

<script>
export default {
  data() {
    return {
      mountains: [],
      climb: {
        start: "",
        end: "",
        mountainId: "",
        mountainName: ""
      },
      message: null
    }
  },
  created() {
    fetch("/api/mountains")
    .then(response => response.json())
    .then(json => this.mountains = json);
  },
  methods: {
    selectMountain(id, name){
      this.climb.mountainId = id;
      this.climb.mountainName = name;
    },
    addClimb(){
      const fd = new FormData();
      fd.append("start", this.climb.start);
      fd.append("end", this.climb.end);
      fd.append("mountain_id", this.climb.mountainId);

      fetch("/api/climb", {
        method: "POST",
        body: fd
      })
          .then(response => response.text())
          .then(text => {
            if (text === 'SUCCESS') {
              this.message = 'Восхождение на ' + this.climb.mountainName + ' добавлено';
            } else {
              this.message = 'Восхождение не было добавлено';
            }
          });
    }
  }
}
</script>

<style scoped>

</style>