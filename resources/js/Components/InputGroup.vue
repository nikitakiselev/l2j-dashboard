<template>
    <div class="mb-3">
        <div :class="{ 'input-group' : icon, 'form-group': ! icon, 'has-validation': true, 'row': horizontal}">
            <label class="col-sm-2 col-form-label" v-if="label" :for="componentId">{{ label }}</label>

            <div class="col-sm-10" v-if="horizontal">
                <input
                    class="form-control"
                    :class="{ 'is-invalid' : error }"
                    :type="type"
                    :placeholder="placeholder"
                    :value="modelValue"
                    :name="name"
                    :id="componentId"
                    :disabled="disabled"
                    @input="$emit('update:modelValue', $event.target.value)"
                />
                <div v-if="icon" class="input-group-append">
                    <div class="input-group-text">
                        <span :class="['fas', 'fa-' + icon]"></span>
                    </div>
                </div>

                <small v-if="error" class="text-help text-red">
                    {{ error }}
                </small>
            </div>

            <template v-else>
                <input
                    class="form-control"
                    :class="{ 'is-invalid' : error }"
                    :type="type"
                    :placeholder="placeholder"
                    :value="modelValue"
                    :name="name"
                    :id="componentId"
                    :disabled="disabled"
                    @input="$emit('update:modelValue', $event.target.value)"
                />
                <div v-if="icon" class="input-group-append">
                    <div class="input-group-text">
                        <span :class="['fas', 'fa-' + icon]"></span>
                    </div>
                </div>
            </template>
        </div>

        <small v-if="! horizontal ?? error" class="text-help text-red">
            {{ error }}
        </small>
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
        type: {
            type: String,
            default: 'text',
        },

        placeholder: {
            type: String,
            default: '',
        },

        icon: {
            type: String,
            default: '',
        },

        error: {
            type: String,
            default: '',
        },

        modelValue: {
            type: String,
            default: '',
        },

        name: {
            type: String,
            default: '',
        },

        label: String,

        horizontal: Boolean,

        disabled: {
            type: Boolean,
            default: false,
        }
    },

    created() {
        this.componentId = this.name + '_' + uuid.v4();
    }
};
</script>
