<template>
  <li>
    <p>
      <span class="highlight">
        {{ value }} {{ percent }}% - {{ count }} results
      </span>
    </p>
  </li>
</template>

<script>
export default {
  props: ['value', 'id', 'percent', 'count'],
};
</script>

<style scoped>
li {
  margin: 1rem 0;
  border: 1px solid #ccc;
  padding: 1rem;
}

h3,
p {
  font-size: 1rem;
  margin: 0.5rem 0;
}

.highlight {
  font-weight: bold;
}
</style>