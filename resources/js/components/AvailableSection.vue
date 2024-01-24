<template>
  <section :class="['available-modules-pane', 'pane']">
    <h3>{{ name }}</h3>
    <button v-for="(module) in availableModules" @click="setModule(module.id)"
            :class="['available-modules-pane__button', 'button']">
      {{ module.name }}{{ module.id }}
    </button>
  </section>
</template>

<script>
export default {
  name: "AvailableSection",
  props: {
    name: String,
    moduleStore: Object,
    availableModules: Object | null,
  },
  methods: {
    setModule: function (id) {
      this.moduleStore.setSelected(id)
    }
  }
}
</script>

<style scoped>

</style>