<script setup lang="ts">
import BaseTextInput from '@/components/core/base-textinput.vue'
import BaseButton from '@/components/core/base-button.vue'
import { tryOnMounted } from '@vueuse/core'

useHead({
  title: 'Forgot password',
})

const flash = useProperty('flash')

const form = useForm({
  method: 'POST',
  url: route('password.email'),
  fields: {
    email: '',
  },
})

tryOnMounted(() => {
  form.fields.email = new URLSearchParams(location.search).get('email') ?? ''
})
</script>

<template>
  <main class="w-screen h-screen grid place-items-center">
    <div class="max-w-md w-full">
      <div class="bg-gray-100 p-8 rounded-3xl">
        <h1 class="text-2xl font-black text-gray-700 text-center">Forgot your password?</h1>

        <div
          v-if="flash?.success"
          class="mt-6 rounded-md border-2 border-green-600 bg-green-100 p-2 text-center text-green-700"
        >
          {{ flash.success }}
        </div>

        <div
          class="mt-2 space-y-3"
          v-else
        >
          <p class="mt-4 text-center text-gray-600">
            No problem. Enter your email address associated with your account, and we'll send you a link to reset your
            password.
          </p>

          <form
            class="mt-8 flex w-full flex-col space-y-4"
            @submit.prevent="form.submit"
          >
            <div class="w-full">
              <BaseTextInput
                v-model="form.fields.email"
                placeholder="you@example.com"
                class="w-full"
                type="email"
              />

              <p
                v-if="form.errors.email"
                class="mt-2 text-left text-xs font-semibold text-red-500"
              >
                {{ form.errors.email }}
              </p>
            </div>

            <BaseButton
              type="submit"
              :disabled="form.processing"
              >Send reset link</BaseButton
            >
          </form>
        </div>
      </div>

      <div class="p-4 max-w-md w-full text-center">
        <router-link
          href="/"
          class="text-primary-500 font-semibold text-sm"
          >Home</router-link
        >
      </div>
    </div>
  </main>
</template>
