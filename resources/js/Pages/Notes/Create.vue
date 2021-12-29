<template>
    <app-layout title="Notes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create note
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <form @submit.prevent="submit">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-input" name="excerpt" id="excerpt" cols="30" rows="10" v-model="form.excerpt"></textarea>

                    <label for="content">Content</label>
                    <textarea class="form-input" name="content" id="content" cols="30" rows="10" v-model="form.content"></textarea>

                    <button>Save</button>
                </form>                     

            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'   

    export default defineComponent({
        components: {
            AppLayout
        },        
        data() {
            return {
                form: {
                    excerpt: '',
                    content: ''
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post(this.route('notes.store'), this.form)
            }
        }
    })
</script>
