<template>
  <section>
    <h2>Answers sent</h2>
    <p v-if="error">{{ error }}</p>
    <ul v-else>
      <question-item
          v-for="result in results"
          :key="result.id"
          :id="result.id"
          :count="result.count"
          :percent="result.percent"
          :value="result.value">
      </question-item>
    </ul>
  </section>
</template>

<script>
import QuestionItem from './QuestionItem.vue';

export default {
  components: {
    QuestionItem,
  },
  data() {
    return {
      results: [],
      error: false,
      token: localStorage.getItem('user-token'),
    };
  },
  methods: {
    loadQuestions() {
      fetch('http://localhost:8000/api/question-calc')
          .then((response) => {
            if (response.ok) {
              return response.json();
            }
          })
          .then((data) => {
            this.results = data['questions_custom'];
          })
          .catch(() => {
            this.error = 'Failed to fetch data - please try again later.';
          });
      this.error = false;
    },
  },
  mounted() {
    this.loadQuestions();
  },
};
</script>

<style scoped>
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
</style>