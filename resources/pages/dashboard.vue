<script setup lang="ts">
import { useAuth } from '@/composables/use-auth'

const { user } = useAuth()
</script>

<template>
  <main class="w-screen h-screen grid place-items-center">
    <div
      class="max-w-md w-full"
      v-if="user"
    >
      <div class="bg-gray-100 p-8 rounded-3xl">
        <p class="text-center">{{ user.name }}</p>

        <p class="text-center">{{ user.email }}</p>
      </div>

      <div class="p-4 max-w-md w-full text-center">
        <router-link
          :href="route('logout')"
          class="text-primary-500 font-semibold text-sm"
          >Sign out</router-link
        >
      </div>
    </div>
  </main>
</template>
