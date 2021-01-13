<template>
  <div class="container">
    <div>
      <Logo />
      <h1 class="title">resources</h1>
      <div v-if="user" class="rounded p-2 my-3 bg-green-600 text-white">
        Logged in
        <hr class="my-3" />
        <ul class="text-left text-sm">
          <li v-for="(v, k) in user" :key="k">
            <dl class="flex">
              <dt class="font-medium pr-1">{{ k }}:</dt>
              <dd>{{ v }}</dd>
            </dl>
          </li>
        </ul>
      </div>
      <div v-else class="rounded p-2 my-3 bg-red-600 text-white">
        Not logged in
      </div>
      <div class="links">
        <a
          href="https://nuxtjs.org/"
          target="_blank"
          rel="noopener noreferrer"
          class="button--green"
        >
          Documentation
        </a>
        <a
          href="https://github.com/nuxt/nuxt.js"
          target="_blank"
          rel="noopener noreferrer"
          class="button--grey"
        >
          GitHub
        </a>
        <span class="button--grey cursor-pointer" @click="login">Login</span>
        <span v-if="user" class="button--grey cursor-pointer" @click="logout"
          >Logout</span
        >
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  data() {
    return {
      user: null,
    }
  },
  mounted() {
    this.$axios.$get('/user').then((data) => {
      this.user = data
    })
  },
  methods: {
    async login() {
      await this.$axios.get('/sanctum/csrf-cookie')
      await this.$axios.$post('/login', {
        email: 'absolute_test1@example.com',
        password: '12341234',
      })
      this.user = await this.$axios.$get('/user')
    },
    async logout() {
      await this.$axios.$post('/logout')
      this.user = null
    },
  },
})
</script>

<style lang="sass">
.container
  @apply min-h-screen flex justify-center items-center text-center mx-auto

.title
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif
  color: #35495e
  font-size: 100px
  @apply font-light
  letter-spacing: 1px

.subtitle
  color: #526488
  font-size: 42px
  @apply font-light
  word-spacing: 5px
  padding-bottom: 15px

.links
  padding-top: 15px
</style>
