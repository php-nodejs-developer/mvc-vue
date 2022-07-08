<template>
  <router-link to="/add">Добавить гору</router-link>

  <router-link to="/edit">Редактировать гору</router-link>

  <router-link to="/climber/add">Зарегистрировать нового альпиниста</router-link>
  <router-link to="/climb/add">Зарегистрировать новое восхождение</router-link>
  <router-link to="/climb/show">Все восхождения</router-link>

  <section>
    <router-view/>
  </section>

</template>