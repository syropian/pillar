<script setup lang="ts">
import BaseButton from '@/components/core/base-button.vue'

useHead({
  title: 'Home',
})
</script>

<template>
  <main class="w-screen h-screen grid place-items-center">
    <div class="bg-gray-100 p-8 rounded-3xl max-w-md w-full">
      <h1 class="text-2xl font-black text-gray-700 text-center">Welcome</h1>

      <div class="mt-6 space-y-3">
        <BaseButton
          as="link"
          :href="route('register.show')"
          class="w-full"
          >Sign up</BaseButton
        >

        <BaseButton
          as="link"
          :href="route('login.show')"
          variant="secondary"
          class="w-full"
          >Sign in</BaseButton
        >
      </div>
    </div>
  </main>
</template>
