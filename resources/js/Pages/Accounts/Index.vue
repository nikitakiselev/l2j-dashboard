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
                    <td>
                        {{ account.login }}
                        <span
                            :class="{'badge': true, 'badge-danger': account.accessLevel === -1, 'badge-success': account.accessLevel !== -1}">
                            {{ account.accessLevel === -1 ? 'Inactive' : 'Active' }}
                        </span>
                    </td>
                    <td>{{ account.email }}</td>
                    <td>{{ formatDate(account.created_time) }}</td>
                    <td>{{ formatDate(account.lastactive) }}</td>
                    <td :title="account.accessLevel">{{ account.access_level_text }}</td>
                    <td>{{ account.lastIP }}</td>
                    <td>{{ account.last_game_server?.host }}</td>
                    <td>
                        <div class="btn-group">
                            <Link
                                :href="route('accounts.edit', account.login)"
                                class="btn btn-sm btn-default"
                            >
                                <i class="fas fa-pen"></i>
                            </Link>

                            <button
                                class="btn btn-sm btn-default"
                                title="Ban account"
                                v-if="account.accessLevel > -1"
                                @click.prevent="banAccount(account)"
                            >
                                <i class="fa fa-ban"></i>
                            </button>

                            <button
                                class="btn btn-sm btn-default"
                                title="Unlock account"
                                v-if="account.accessLevel === -1"
                                @click.prevent="unlockAccount(account)"
                            >
                                <i class="fa fa-user-check"></i>
                            </button>

                            <button
                                class="btn btn-sm btn-default"
                                title="Delete account"
                                @click.prevent="deleteAccount(account)"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
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
        accounts: {
            type: Array,
            default: () => [],
        },
    },

    methods: {
        formatDate(date) {
            if (!date) {
                return '';
            }

            return moment(date).format('llll');
        },

        banAccount(account) {
            account.accessLevel = -1;
            this.$inertia.put(route('accounts.update', account.login), account);
        },

        unlockAccount(account) {
            account.accessLevel = 0;
            this.$inertia.put(route('accounts.update', account.login), account);
        },

        deleteAccount(account) {
            swal.fire({
                title: `Are you sure want to delete ${account.login}?`,
                text: 'It will be difficult to restore the account and the gameplay after deleting the account.',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: `Yes, delete ${account.login}`,
                confirmButtonColor: '#dc3545',
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(route('accounts.delete', account.login), {
                            onSuccess: () => {
                                swal.fire(
                                    'Deleted!',
                                    `Account ${account.login} has been deleted.`,
                                    'success'
                                );
                            },
                        });
                    }
                });
        }
    },
}
</script>
