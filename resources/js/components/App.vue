<template>
  <div>
    <Header :moduleStore="moduleStore" ></Header>
    <Main :moduleStore="moduleStore"></Main>
  </div>
</template>

<script>
import Header from './Header.vue';
import Main from "./Main.vue";
import { useModuleStore } from "../store/ModuleStore.js";

export default {
  components: { Main, Header },
  setup() {
    const moduleStore = useModuleStore();
    return {
      moduleStore,
    };
  },
}
</script>
