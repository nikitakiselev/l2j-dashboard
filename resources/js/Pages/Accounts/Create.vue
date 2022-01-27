<template>
    <Head title="Accounts"/>

    <BreezeAuthenticatedLayout>
        <div class="col-md-6">
            <Card title="Register new account" :loading="form.processing">
                <form autocomplete="off" @submit.prevent="submit">
                    <InputGroup
                        type="text"
                        name="login"
                        placeholder="Lineage2 login"
                        label="Login"
                        horizontal
                        :error="form.errors.login"
                        v-model="form.login"
                    />

                    <InputGroup
                        type="password"
                        name="password"
                        placeholder="Password for login"
                        label="Password"
                        horizontal
                        :error="form.errors.password"
                        v-model="form.password"
                    />

                    <InputGroup
                        type="email"
                        name="email"
                        placeholder="johndoe@mail.com"
                        label="Email"
                        horizontal
                        :error="form.errors.email"
                        v-model="form.email"
                    />

                    <SelectGroup
                        name="accessLevel"
                        label="Access Level"
                        :options="accessLevels"
                        :error="form.errors.accessLevel"
                        v-model="form.accessLevel"
                    />
                </form>

                <template v-slot:footer>
                    <button type="button"
                            class="btn btn-primary"
                            @click="submit"
                    >
                        Register new account
                    </button>
                </template>
            </Card>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Card from '@/Components/Card';
import InputGroup from "@/Components/InputGroup";
import SelectGroup from "@/Components/SelectGroup";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Card,
        InputGroup,
        SelectGroup,
    },

    data() {
        return {
            form: this.$inertia.form({
                login: '',
                password: '',
                email: '',
                accessLevel: 0,
            }),
        };
    },

    props: {
        accounts: {
            type: Array,
            default: () => [],
        },

        accessLevels: {
            type: Array,
            default: () => [],
        },
    },

    methods: {
        submit() {
            this.form.post(this.route('accounts.store'));
        }
    },
}
</script>
