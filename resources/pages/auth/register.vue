<script setup lang="ts">
import BaseButton from '@/components/core/base-button.vue'
import BaseTextInput from '@/components/core/base-textinput.vue'

const form = useForm({
  method: 'POST',
  url: route('register.store'),
  fields: {
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  },
})
</script>

<template>
  <main class="w-screen h-screen grid place-items-center">
    <div class="max-w-md w-full">
      <div class="bg-gray-100 p-8 rounded-3xl">
        <h1 class="text-2xl font-black text-gray-700 text-center">Sign up</h1>

        <div class="mt-2 space-y-3">
          <form
            class="mt-8 flex w-full flex-col space-y-4"
            @submit.prevent="form.submit"
          >
            <div class="w-full">
              <BaseTextInput
                v-model="form.fields.name"
                placeholder="Your name"
                class="w-full"
                type="email"
              />

              <p
                v-if="form.errors.name"
                class="mt-2 text-left text-xs font-semibold text-red-500"
              >
                {{ form.errors.name }}
              </p>
            </div>

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
                placeholder="Enter a password"
                class="w-full"
              />

              <p
                v-if="form.errors.password"
                class="mt-2 text-left text-xs font-semibold text-red-500"
              >
                {{ form.errors.password }}
              </p>
            </div>

            <div>
              <BaseTextInput
                v-model="form.fields.password_confirmation"
                type="password"
                placeholder="Confirm password"
                class="w-full"
              />

              <p
                v-if="form.errors.password_confirmation"
                class="mt-2 text-left text-xs font-semibold text-red-500"
              >
                {{ form.errors.password_confirmation }}
              </p>
            </div>

            <BaseButton
              type="submit"
              :disabled="form.processing"
              >Sign up</BaseButton
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
