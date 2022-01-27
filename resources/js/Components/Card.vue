<template>
    <div class="card">
        <div class="card-body" :class="class">
            <slot/>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        class: {
            type: String,
            default: '',
        }
    }
};
</script>
