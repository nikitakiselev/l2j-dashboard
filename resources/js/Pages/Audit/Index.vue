<template>
    <Head title="Audit"/>

    <BreezeAuthenticatedLayout>
        <Card title="Audit">
            <template v-slot:tools>
                <ul class="pagination pagination-sm">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </template>

            <table class="table table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Event</th>
                    <th>Auditable Type</th>
                    <th>Auditable ID</th>
                    <th>Old Values</th>
                    <th>New Values</th>
                    <th>Url</th>
                    <th>IP Address</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="audit in audits">
                    <td>{{ audit.id }}</td>
                    <td>{{ audit.user_id }}</td>
                    <td>{{ audit.event }}</td>
                    <td>{{ audit.auditable_type }}</td>
                    <td>{{ audit.auditable_id }}</td>
                    <td>{{ audit.old_values }}</td>
                    <td>{{ audit.new_values }}</td>
                    <td>{{ audit.url }}</td>
                    <td>{{ audit.ip_address }}</td>
                    <td>{{ audit.created_at }}</td>
                </tr>
                </tbody>
            </table>
        </Card>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Card from '@/Components/Card';
import moment from 'moment';
import swal from 'sweetalert2';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Card,
    },

    props: {
        audits: {
            type: Array,
            default: () => [],
        },
    },

    methods: {

    },
}
</script>
