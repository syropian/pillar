<script setup lang="ts">
import BaseButton from '@/components/core/base-button.vue'
import BaseTextInput from '@/components/core/base-textinput.vue'

useHead({
  title: 'Sign in',
})

const flash = useProperty('flash')

const form = useForm({
  method: 'POST',
  url: route('login.store'),
  fields: {
    email: '',
    password: '',
  },
})
</script>

<template>
  <main class="w-screen h-screen grid place-items-center">
    <div class="max-w-md w-full">
      <div class="bg-gray-100 p-8 rounded-3xl">
        <h1 class="text-2xl font-black text-gray-700 text-center">Sign in</h1>

        <div class="mt-2 space-y-3">
          <div
            v-if="flash?.success"
            class="mt-6 rounded-md border-2 border-green-600 bg-green-100 p-2 text-center text-green-700"
          >
            {{ flash.success }}
          </div>

          <form
            class="mt-8 flex w-full flex-col space-y-4"
            @submit.prevent="form.submit"
          >
            <div class="w-full">
              <BaseTextInput
                v-model="form.fields.email"
                placeholder="Your email"
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

            <div>
              <BaseTextInput
                v-model="form.fields.password"
                type="password"
                placeholder="Your password"
                class="w-full"
              />

              <p
                v-if="form.errors.password"
                class="mt-2 text-left text-xs font-semibold text-red-500"
              >
                {{ form.errors.password }}
              </p>
            </div>

            <div class="!mt-2">
              <router-link
                :href="`${route('password.request')}?email=${form.fields.email}`"
                class="text-sm font-semibold text-primary-600 hover:text-primary-700"
                >Forgot your password?</router-link
              >
            </div>

            <BaseButton
              type="submit"
              :disabled="form.processing"
              >Sign In</BaseButton
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
