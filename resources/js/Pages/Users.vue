<template>
<div class="p-8">
    <h1 class="text-3xl font-bold mb-4">All Users</h1>

    <!-- Tabela korisnika -->
    <table class="table-auto border-collapse border border-gray-300 w-full mb-6">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray px-4 py-2">Name</th>
                <th class="border border-gray px-4 py-2">Email</th>
            </tr>
        </thead>
        <tbody v-if="users">
            <tr v-for="user,index in users" :key="index" class="text-gray-700">
                <td class="border border-gray-200 px-4 py-2">{{ user.name }}</td>
                <td class="border border-gray-200 px-4 py-2">{{ user.email }}</td>
            </tr>
        </tbody>
    </table>
</div>
</template>


<script setup>
import AppLayouts from '@/Layouts/AppLayouts.vue';


defineOptions({
    layout: AppLayouts
});

defineProps({
    users: {
        type: Array,
        required: true
    }
});


//console.log("Users received:", users);

</script>

<style>

h1{
    font-size: 1.5em;
    
}
tr{
    text-align: center;
    font-size: 1em;
    font-weight: bold;
    color: gray;

}

</style> 