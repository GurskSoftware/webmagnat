<template>
  <div class="container">
    <p>You can answer a test question?</p>
    <button @click="confirmInput">Yes</button>
  </div>
</template>

<script>
export default {
  methods: {
    confirmInput() {
      this.$router.push('/question');
    }
  },
};
</script>

<style scoped>
.container {
  display: grid;
  justify-content: center;
}

.container button {
  padding: 10px;
  margin: 5px;
}
</style>