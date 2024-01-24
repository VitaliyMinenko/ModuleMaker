<template>
  <main class="main">
    <AvailableSection :moduleStore="moduleStore" :availableModules="moduleStore.getAvailable"
                      :name="'AVAILABLE MODULES'"></AvailableSection>
    <SelectedSection :moduleStore="moduleStore" :selectedModule="moduleStore.getSelected"
                     :name="'SELECTED MODULE'"></SelectedSection>
    <SettingsSection :moduleStore="moduleStore" :selectedModule="moduleStore.getSelected"
                     :name="'MODULE SETTINGS'"></SettingsSection>
  </main>
</template>

<script>
import Section from "./AvailableSection.vue";
import SettingsSection from "./SettingsSection.vue";
import AvailableSection from "./AvailableSection.vue";
import SelectedSection from "./SelectedSection.vue";

export default {
  name: "Main",
  props: {
    moduleStore: Object,
  },
  components: {SelectedSection, AvailableSection, Section, SettingsSection},
}
</script>

<style scoped>

</style>