<template>
  <section class="pane module-settings-pane">
    <h3>{{name}}</h3>
    <form ref="selectedModule">
      <div class="form-group" v-if="moduleStore.hasSelected">
        <div class="row">
          <div class="col">
            <label for="clickout">Clickout</label>
            <input
                id="clickout"
                type="text"
                placeholder="https://appverk.com"
                v-model="selectedModule.settings.clickout"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="width">Width (%)</label>
            <input
                id="width"
                type="number"
                v-model.number="selectedModule.settings.dimensions.width"
            />
          </div>
          <div class="col">
            <label for="height">Height (%) </label>
            <input
                id="height"
                type="number"
                v-model.number="selectedModule.settings.dimensions.height"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="position_x">Position X (%)</label>
            <input
                id="position_x"
                type="number"
                v-model.number="selectedModule.settings.position.X"
            />
          </div>
          <div class="col">
            <label for="position_y">Position Y (%)</label>
            <input
                id="position_y"
                type="number"
                v-model.number="selectedModule.settings.position.Y"
            />
          </div>
        </div>
      </div>
    </form>
  </section>
</template>

<script>
export default {
  name: "SettingsSection",
  props: {
    name: String,
    moduleStore: Object,
    selectedModule: Object | null,
  },
}
</script>

<style scoped>
.form-group label {
  display: block;
  font-size: 0.875rem;
  line-height: 1.5rem;
  font-weight: 500;
}

.form-group .row {
  display: flex;
  align-items: center;
  margin-top: 0.5rem;
}

.form-group .col {
  flex: 1;
  margin-right: 0.5rem;
}

.form-group input {
  display: block;
  width: 100%;
  padding: 0.375rem 1.5rem;
  line-height: 1.5rem;
  border: solid 1px var(--gray-dark);
}
</style>