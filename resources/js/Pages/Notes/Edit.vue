<template>
    <app-layout title="Notes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update note
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <form @submit.prevent="submit">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-input" name="excerpt" id="excerpt" cols="30" rows="10" v-model="form.excerpt"></textarea>

                    <label for="content">Content</label>
                    <textarea class="form-input" name="content" id="content" cols="30" rows="10" v-model="form.content"></textarea>

                    <button>Update</button>
                </form>    

                <hr class="my-6"> 

                <a href="#" @click.prevent="destroy">Eliminar nota</a>                

            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'   
    import { Link } from '@inertiajs/inertia-vue3' 

    export default defineComponent({
        components: {
            AppLayout,
            Link      
        },
        props: {
            note: Object
        },
        data() {
            return {
                form: {
                    excerpt: this.note.excerpt,
                    content: this.note.content
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.put(this.route('notes.update', this.note), this.form)
            },
            destroy() {
                if (confirm('¿Desea eliminar el registro?')) {
                    this.$inertia.delete(this.route('notes.destroy', this.note.id))
                }
            }
        }
    })
</script>
