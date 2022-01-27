<template>
    <Head title="Accounts"/>

    <BreezeAuthenticatedLayout>
        <div class="col-md-6">
            <Card title="Edit account" :loading="form.processing">
                <form autocomplete="off" @submit.prevent="submit">
                    <InputGroup
                        type="text"
                        name="login"
                        placeholder="Lineage2 login"
                        label="Login"
                        horizontal
                        :error="form.errors.login"
                        :disabled="true"
                        v-model="form.login"
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
                            :disabled="! form.isDirty"
                            @click="submit"
                    >
                        Update account
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
        account: {
            required: true,
            type: Object,
        },

        accessLevels: {
            type: Array,
            default: () => [],
        },
    },

    methods: {
        submit() {
            this.form.put(this.route('accounts.update', this.account.login));
        }
    },

    created() {
        this.form = this.$inertia.form(this.account);
    }
}
</script>
