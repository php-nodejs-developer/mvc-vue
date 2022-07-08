<template>
  <h2>Добавление нового альпиниста</h2>
  <p v-if="message === 'ERROR'">
    Добавить альпиниста не удалось.
    Попробуйте еще раз
  </p>

  <p v-if="climber.id">
    Альпинист под номером {{climber.id}} добавлен.
    Уникальный номер выслан на указанный e-mail.
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
      message: ""
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
        this.message = json.message;
      });
    }
  }
}
</script>

<style scoped>

</style>