<template>
    <div class="mb-3">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" v-if="label" :for="componentId">{{ label }}</label>
            <div class="col-sm-10">
                <select class="form-control" @change="change">
                    <option v-for="option in options"
                            :value="option.id"
                            :selected="option.id === modelValue"
                    >{{ option.text }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
import {uuid} from 'vue-uuid';
export default {
    emits: ['update:modelValue'],
    data() {
        return {
            componentId: null,
        };
    },
    props: {
        label: String,

        name: {
            type: String,
            required: true,
        },

        options: {
            type: Array,
            default: () => [],
        },

        modelValue: {
            default: null
        }
    },

    methods: {
        change(event) {
            this.$emit('update:modelValue', +event.target.value);
        },
    },

    created() {
        this.componentId = this.name + '_' + uuid.v4();
    }
};
</script>
