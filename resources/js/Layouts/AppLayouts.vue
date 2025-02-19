<template>
    <div>
        <nav class="bg-gray-200 text-white px-6 py-4 flex justify-between items-center">
            
            <div>
                <img src="images/logopives.jpg" alt="Logo" class="h-12">
            </div>

            <div class="space-x-8">
                <Link :href="route('users')" class="text-gray-700 hover:text-gray-900">All Users</Link>
                <Link :href="route('update')" class="text-gray-700 hover:text-gray-900">Update Profile</Link>
                <button @click="logout" class="text-red-500 px-4 py-2 font-bold  rounded hover:text-red-700">Logout</button>
            </div>
        </nav>

        <main>
            <slot />
        </main>
    </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';

const logout = () => {
    Inertia.post(route('logout'));
};
</script>