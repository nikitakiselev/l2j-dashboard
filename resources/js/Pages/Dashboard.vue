<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <Card title="Dashboard">
            Start creating your amazing application!
        </Card>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Card from '@/Components/Card';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Card,
    },
}
</script>
