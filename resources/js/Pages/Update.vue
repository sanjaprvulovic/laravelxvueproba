<template>
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Update Your Profile</h1>

    <form @submit.prevent="updateUser">
    <!-- Ime -->
    <div class="mb-4">
        <label for="name" class="block font-medium mb-1">Name</label>
        <input type="text" id="name" v-model="form.name" class="w-full border rounded-lg px-4 py-2">
        <div v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</div>
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block font-medium mb-1">Email</label>
        <input type="email" id="email" v-model="form.email" class="w-full border rounded-lg px-4 py-2">
        <div v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</div>
    </div>

    <!-- Lozinka -->
    <div class="mb-4">
        <label for="password" class="block font-medium mb-1">New Password (Optional)</label>
        <input type="password" id="password" v-model="form.password" class="w-full border rounded-lg px-4 py-2">
        <div v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</div>
    </div>

    <!-- Potvrda lozinke -->
    <div class="mb-4">
        <label for="password_confirmation" class="block font-medium mb-1">Confirm New Password</label>
        <input type="password" id="password_confirmation" v-model="form.password_confirmation" class="w-full border rounded-lg px-4 py-2">
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Update
    </button>

    <!-- Poruka o uspešnom ažuriranju -->
    <div v-if="message" class="mt-4 bg-green-100 text-green-800 p-4 rounded">{{ message }}</div>
    </form>
</div>
</template>



<script setup>
import { ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AppLayouts from '@/Layouts/AppLayouts.vue';

const props = defineProps({
    auth: Object,
    errors: Object
});

defineOptions({
    layout: AppLayouts
});

const message = ref("");

const user = computed(() => props.auth?.user || { name: "", email: "" });


const form = ref({
    name: user.value.name,
    email: user.value.email,
    password: "",
    password_confirmation: ""
});


const updateUser = () => {
    Inertia.post(route("updateSubmit"), form.value, { method: "post",
    onSuccess: () => {
            message.value = "Profile updated successfully!"; // Postavi poruku nakon uspešnog ažuriranja
        }
    });
};
</script>
