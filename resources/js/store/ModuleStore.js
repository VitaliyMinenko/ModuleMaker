import { defineStore } from "pinia";

export const useModuleStore = defineStore("moduleStore", {
    state: () => ({
        available: [
            {
                id: 1,
                name: 'BACKGROUND',
                settings: {
                    "clickout": "",
                    "dimensions": {
                        "width": 0,
                        "height": 0
                    },
                    "position": {
                        "X": 0,
                        "Y": 0
                    }
                },
            },
            {
                id: 2,
                name: 'TYPO',
                settings: {
                    "clickout": "",
                    "dimensions": {
                        "width": 0,
                        "height": 0
                    },
                    "position": {
                        "X": 0,
                        "Y": 0
                    }
                },
            },
        ],
        selected: {},
    }),
    getters: {
        getAvailable() {
            return this.available;
        },
        getSelected() {
            return this.selected;
        },
        hasSelected() {
            return Object.keys(this.selected).length > 0;
        },
    },
    actions: {
        setSelected(id) {
            this.selected = this.available.find((el) => el.id === id);
        }
    },
});