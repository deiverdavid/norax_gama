<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de usuarios
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Crear un usuario</h3>
                            <p class="text-lg text-black">Luego de crear la podras editar</p>
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bgwhite md:rounded-md p-4">
                           <form @submit.prevent="submit">
                              
                               <label class="block font-medium text-sm text-gray-700">Nombre</label>
                               <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.name"></textarea>

                               <label class="block font-medium text-sm text-gray-700">Primer apellido</label>
                               <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.lastname1"></textarea>

                               <label class="block font-medium text-sm text-gray-700">Segundo apellido</label>
                               <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.lastname2"></textarea>

                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                    Crear
                                </button>
                           </form>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Link,
        },
        data (){
            return {
                form:{
                    name: '',
                    lastname1: '',
                    lastname2: '',
                }
            }
        },
        methods:{
            submit() {
                this.$inertia.post(this.route('clients.store'), this.form)
            }
        }
    })
</script>