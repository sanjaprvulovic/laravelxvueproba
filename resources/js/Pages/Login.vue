<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-800">
      <div class="bg-white dark:bg-gray-900 p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Login</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
            <input type="email" id="email" v-model="form.email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-[#e5e7eb] dark:bg-[#616161] text-gray-700 dark:text-white">
            <div v-if="props.errors.email" class="text-red-500 text-xs mt-1">{{props.errors.email }}</div>
          </div>

          <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
            <input type="password" id="password" v-model="form.password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-[#e5e7eb] dark:bg-[#616161] text-gray-700 dark:text-white">
            <div v-if="props.errors.password" class="text-red-500 text-xs mt-1">{{ props.errors.password }}</div>
          </div>

          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-[#ec1d1e] hover:bg-[#A90F0F] text-white rounded">Login</button>
          </div>
        </form>
      </div>
    </div>
  </template>

  <script setup>
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

const form = ref({
    email: "",
    password:""
});

const props = defineProps({
  errors: {
    type: Object,
    default: () => ({})
  }
});

console.log("Errors received:", props.errors);

const submitForm = () =>{
    Inertia.post(route('loginSubmit'), form.value);
}


  </script>