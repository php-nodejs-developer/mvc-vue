<template>
  <h2>Добавление нового альпиниста</h2>
  <p v-if="result.message === 'ERROR'">
    Добавить альпиниста не удалось.
    Попробуйте еще раз
  </p>

  <p v-if="climber.id && result.message === 'SUCCESS'">
    Альпинист под номером {{climber.id}} добавлен.
    <span v-if="result.sent">
      Уникальный номер выслан на указанный e-mail.
    </span>
    <span v-else>
      Уникальный номер не удалось выслать на указанный e-mail.
      Запомните его.
    </span>
  </p>
  <form @submit.prevent="addClimber">
    <input type="text" v-model="climber.name" placeholder="Введите имя">
    <input type="text" v-model="climber.address" placeholder="Введите адрес">
    <input type="email" v-model="climber.email" placeholder="Введите e-mail">
    <input type="submit" value="Добавить">
  </form>
</template>

<script>
export default {
  data(){
    return {
      climber: {
        id: null,
        name: "",
        address: "",
        email: ""
      },
      result: {
        message: "",
        sent: false
      }
    }
  },
  methods: {
    addClimber(){
      const fd = new FormData();
      fd.append("name", this.climber.name);
      fd.append("address", this.climber.address);
      fd.append("email", this.climber.email);


      fetch("/api/climber", {
        method: "POST",
        body: fd
      })
      .then(response => response.json())
      .then(json => {

        this.climber.id = json.id;
        this.result.message = json.message;
        this.result.sent = json.sent;
      });
    }
  }
}
</script>
