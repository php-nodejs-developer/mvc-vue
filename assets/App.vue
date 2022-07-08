<template>
  <nav>
    <router-link to="/climber/add">Зарегистрировать нового альпиниста</router-link>
    <router-link to="/climb/add">Зарегистрировать новое восхождение</router-link>
    <router-link to="/climb/show">Все восхождения</router-link>
  </nav>

  <section>
    <router-view/>
  </section>

</template>

<style>

nav {
  display: flex;
  justify-content: space-around;
  background-color: aquamarine;
  margin-bottom: 20px;
}

nav a {
  padding-top: 10px;
  padding-bottom: 10px;
  text-decoration: none;
}

</style>