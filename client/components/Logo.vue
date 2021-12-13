<template>
  <div class="flex items-center">
    <img v-if="loaded" src="https://s.gravatar.com/avatar/ae1c9a85ae64371b1d7f03dca3d010a0?s=120" alt="Ian Torres" class="rounded-full border shadow-lg w-40 h-40">
    <div v-if="!loaded" class="skeleton rounded-full border shadow-lg w-40 h-40" />
  </div>
</template>

<script>
export default {
  data () {
    return {
      loaded: true,
    }
  },
  async mounted () {
    // setTimeout(() => this.loaded = true, 3000)
  },
}
</script>
