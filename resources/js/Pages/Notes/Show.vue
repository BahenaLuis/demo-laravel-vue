<template>
    <app-layout title="Notes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                
                <p>{{ note.excerpt }}</p>
                <hr>
                <br>
                <p>{{ note.content }}</p>
                <hr>
                <br>
                <Link :href="route('notes.index')">Volver</Link>                

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
        }
    })
</script>
