<template>
  <section :class="['selected-module-pane', 'pane']">
    <h3>{{ name }}</h3>
    <div v-if="moduleStore.hasSelected" :class="['selected-module-pane__module']">
      {{ selectedModule.name }}
    </div>
  </section>
</template>

<script>
export default {
  name: "SelectedSection",
  props: {
    name: String,
    moduleStore: Object,
    selectedModule: Object | null,
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