<template>
    <div class="mb-3">
        <div :class="[icon ? 'input-group' : 'form-group', 'has-validation']">
            <input
                class="form-control"
                :class="{ 'is-invalid' : error }"
                :type="type"
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            />
            <div v-if="icon" class="input-group-append">
                <div class="input-group-text">
                    <span :class="['fas', 'fa-' + icon]"></span>
                </div>
            </div>
        </div>
        <small v-if="error" class="text-help text-red">
            {{ error }}
        </small>
    </div>
</template>

<script>
export default {
    emits: ['update:modelValue'],
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
        }
    },
};
</script>
