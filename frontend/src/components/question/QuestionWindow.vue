<template>
  <div class="container" v-if="success">
    <p>You want to see the result for everyone else?</p>
    <button @click="confirmInput">Yes</button>
    <button @click="declineInput">No</button>
  </div>

  <p v-if="invalidInput">You must select an answer!</p>
  <p v-if="error">{{ error }}</p>

  <div class="question">
    <form @submit.prevent="submitForm">
      <h3>How do you find our service?</h3>
      <input type="radio" id="A.Good" name="question" value="A.Good" v-model.trim="questionValue"/>
      <label for="A.Good">A.Good</label><br>
      <input type="radio" id="B.Fair" name="question" value="B.Fair" v-model.trim="questionValue"/>
      <label for="B.Fair">B.Fair</label><br>
      <input type="radio" id="C.Neutral" name="question" value="C.Neutral" v-model.trim="questionValue"/>
      <label for="C.Neutral">C.Neutral</label><br>
      <input type="radio" id="D.Bad" name="question" value="D.Bad" v-model.trim="questionValue"/>
      <label for="D.Bad">D.Bad</label><br>
      <input type="submit" value="Reply">
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      questionValue: '',
      invalidInput: false,
      error: null,
      success: false,
    };
  },
  emits: ['survey-submit'],
  methods: {
    submitForm() {
      if (this.questionValue === '') {
        this.invalidInput = true;
        return;
      }
      this.invalidInput = false;

      this.$emit('survey-submit', {
        value: this.questionValue,
      });

      this.error = null;
      fetch('http://localhost:8000/api/question', {
        method: 'POST',
        headers: {
          "Access-Control-Allow-Origin": "http://localhost:8080/api/question",
          "Allow": "POST",
          "Content-type": "Application/json",
        },
        body: JSON.stringify({
          value: this.questionValue,
        }),
      }).then((response) => {
        if (response.ok) {
          this.success = true;
        }
      }).catch((error) => {
        this.error = error.message;
      });

      this.questionValue = '';
      this.success = false;
    },
    confirmInput() {
      this.$router.push('/questions');
    },
    declineInput() {
      this.$router.push('/');
    }
  },
};
</script>

<style scoped>

.question {
  background-color: #ccc;
  color: #252525;
  padding: 0.25rem 1rem;
  display: flex;
  justify-content: center;
}
p{
  text-align: center;
  color: red;
}
</style>