<template>
    <Head title="Log in" />

     <div class="container bg-white w-full grid grid-cols-3 ">

                <div class="flex items-stretch my-3 justify-end mr-2">
                <!--Necesito poner una imagen acá-->
                <img src="public/storage/img/Norax.jpg" alt="IMAGEN" class="flex ">
                </div>

                <div class="flex mt-4 ">
                    <a href="" class="mx-2 hover:text-gray-500">About</a>
                    <a href="" class="mx-2 hover:text-gray-500">Products</a>
                    <a href="" class="mx-2 hover:text-gray-500">Pricing</a>
                    <a href="" class="mx-2 hover:text-gray-500">Blog</a>
                    <a href="" class="mx-2 hover:text-gray-500">Jobs</a>
                    <a href="" class="mx-2 hover:text-gray-500">Mores</a>
                </div>

                <div class="flex justify-end">
                    <jet-button class="p-2 bg-norax my-1 mt-1" :disabled="form.processing">
                        Registrarse
                    </jet-button>
                </div>
            </div>


    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>
            </div>

            <div class="flex justify-center w-full mt-4">
                    <jet-button class="mx-auto bg-norax" :disabled="form.processing">
                        Ingresar
                    </jet-button>
            </div>

        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    })
</script>
