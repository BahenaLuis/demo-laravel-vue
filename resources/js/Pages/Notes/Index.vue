<template>
    <app-layout title="Notes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <input type="text" class="form-input rounded-md shadow-sm" placeholder="Buscar..." v-model="q">
                <Link :href="route('notes.create')">New note</Link>


                <table>
                    <tr v-for="(note, i) in notes" :key="i">
                        <td class="border">
                            {{ note.excerpt }}
                        </td>
                        <td>
                            <Link :href="route('notes.show', note)">View</Link>
                        </td>
                        <td>
                            <Link :href="route('notes.edit', note)">Edit</Link>
                        </td>     
                        <td>
                            <Link :href="route('notes.destroy', note)" method="delete">Remove</Link>
                        </td>                   
                    </tr>
                </table>                    

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
            notes: Array
        },
        data() {
            return {
                q: ''
            }
        },
        watch: {
            q: function(value) {
                this.$inertia.replace(this.route('notes.index', {q:value}))
            }
        }
    })
</script>
