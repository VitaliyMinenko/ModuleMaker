<template>
  <nav class="nav">
    <img src="/img/logo.svg" alt="logo"/>
    <button class="button" :class="{ 'disabled': !moduleStore.hasSelected }" @click="generateModule">{{ logo }}</button>
  </nav>
</template>

<script>
import axios from 'axios';

export default {
  name: "Header",
  props: {
    moduleStore: Object,
  },
  data() {
    return {
      logo: 'GENERATE FILES'
    }
  },
  methods: {
    generateModule: function () {
      axios.post('api/v1/generateModule', this.moduleStore.getSelected, {
        responseType: 'arraybuffer'
      })
          .then(response => {
            const blob = new Blob([response.data], {type: 'application/zip'});
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'template_files.zip';
            link.click();
          })
          .catch(error => {
            console.error(error);
          });
    },
  }
}
</script>

<style scoped>
button.disabled {
  cursor: default;
  background-color: #4a5568;
}
</style>