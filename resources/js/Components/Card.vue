<template>
    <div class="card">
        <div class="card-header" v-if="title">
            <h3 class="card-title">{{ title }}</h3>
            <div class="card-tools">
                <slot name="tools"/>
            </div>
        </div>

        <div class="card-body" :class="class">
            <slot/>
        </div>

        <div class="card-footer" v-if="$slots.footer">
            <slot name="footer"/>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        class: {
            type: String,
            default: '',
        },

        title: {
            type: String,
            default: '',
        }
    }
};
</script>
