<template>
    <Head title="Accounts"/>

    <BreezeAuthenticatedLayout>
        <Card title="Accounts">
            <template v-slot:tools>
                <ul class="pagination pagination-sm">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </template>

            <div class="mb-2">
                <Link :href="route('accounts.create')" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Register new account
                </Link>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Created Time</th>
                    <th>Last Active</th>
                    <th>Access Level</th>
                    <th>Last IP</th>
                    <th>Last Server</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="account in accounts">
                    <td>{{ account.login }}</td>
                    <td>{{ account.email }}</td>
                    <td>{{ account.created_time }}</td>
                    <td>{{ account.lastactive }}</td>
                    <td>{{ account.accessLevel }}</td>
                    <td>{{ account.lastIP }}</td>
                    <td>{{ account.last_game_server?.host }}</td>
                    <td></td>
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

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Card,
    },

    props: {
        accounts : {
            type: Array,
            default: () => [],
        },
    }
}
</script>
