<template>
  <p>{{ answer }}</p>
<form>
  <input type="text" placeholder="Название" v-model="mountain.name">
  <input type="text" placeholder="Страна" v-model="mountain.country">
  <input type="submit" value="Отправить">
</form>
</template>

<script>
export default {
  data() {
    return {
      mountain: {
        name: "",
        country: ""
      },
      answer: ""
    }
  }
}
</script>
