<template>
    <Head title="Log in" />

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>L2J</b>Dashboard</a>
        </div>

        <Card class="login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form @submit.prevent="submit">
                <InputGroup
                    type="email"
                    name="password"
                    placeholder="Email"
                    icon="envelope"
                    :error="form.errors.email"
                    v-model="form.email"
                />

                <InputGroup
                    type="password"
                    name="password"
                    placeholder="Password"
                    icon="lock"
                    :error="form.errors.password"
                    v-model="form.password"
                />

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" v-model="form.remember" class="mr-2">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </Card>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Card from '@/Components/Card.vue';
import InputGroup from '@/Components/InputGroup.vue';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Card,
        InputGroup,
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            email: '',
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: true
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    },

    mounted() {
        ['login-page', 'hold-transition'].forEach(item => document.body.classList.add(item));
    }
}
</script>
