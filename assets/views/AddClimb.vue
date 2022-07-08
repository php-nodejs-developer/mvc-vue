<template>
  <p v-if="message">{{ message }}</p>
  <form @submit.prevent="addClimb">
    <input type="datetime-local" v-model="climb.start" placeholder="Начало восхождения"> <br>
    <input type="datetime-local" v-model="climb.end" placeholder="Завершение восхождения"> <br>
    <select v-model="climb.mountainId">
      <option v-for="mountain in mountains"
              :key="mountain.id"
              :value="mountain.id">
        {{ mountain.name }}
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
        mountainId: 1,
        mountainName: ""
      },
      message: null,
    }
  },
  created() {
    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("get", "/api/mountains", true);
    xmlRequest.send();

    xmlRequest.onload = function() {
      if (xmlRequest.status !== 200) {
        // ошибка запроса, например, ресурс не был найден
      } else {
        let response = xmlRequest.response;
        this.mountains = JSON.parse(response);
      }
    }.bind(this);

    xmlRequest.onprogress = function(event) {
      if (event.lengthComputable) {
        let total = event.total;
        let loaded = event.loaded;
        console.log(total, loaded);
      } else {
        let loaded = event.loaded;
        console.log(loaded);
      }
    };

    // fetch("/api/mountains")
    //     .then(response => response.json())
    //     .then(json => this.mountains = json);
  },
  methods: {
    addClimb() {
      const fd = new FormData();
      fd.append("start", this.climb.start.replace("T", " "));

      fd.append("end", this.climb.end.replace("T", " "));
      fd.append("mountain_id", this.climb.mountainId);

      let xmlRequest = new XMLHttpRequest();
      xmlRequest.open("POST", "/api/climb");
      xmlRequest.send(fd);

      xmlRequest.onload = function () {
        if (xmlRequest.status !== 200) {
          // ошибка запроса, например, ресурс не был найден
        } else {
          console.log(xmlRequest.response)
          let response = xmlRequest.response;
          if (response === 'SUCCESS') {
            this.message = 'Восхождение добавлено';
          } else {
            this.message = 'Восхождение не было добавлено';
          }
        }
      }.bind(this);

      // fetch("/api/climb", {
      //   method: "POST",
      //   body: fd
      // })
      //     .then(response => response.text())
      //     .then(text => {
      //       if (text === 'SUCCESS') {
      //         this.message = 'Восхождение добавлено';
      //       } else {
      //         this.message = 'Восхождение не было добавлено';
      //       }
      //     });
    }
  }
}
</script>

<style scoped>

</style>