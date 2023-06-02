<script setup lang="ts">
import BaseTextInput from '@/components/core/base-textinput.vue'
import BaseButton from '@/components/core/base-button.vue'
import { tryOnMounted } from '@vueuse/core'

useHead({
  title: 'Reset password',
})

const props = defineProps<{ token: string }>()

const form = useForm({
  method: 'POST',
  url: route('password.update'),
  fields: {
    email: '',
    password: '',
    password_confirmation: '',
    token: props.token,
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
        <h1 class="text-2xl font-black text-gray-700 text-center">Reset your password</h1>

        <div class="mt-2 space-y-3">
          <form
            class="mt-8 flex w-full flex-col space-y-4"
            @submit.prevent="form.submit"
          >
            <div class="w-full">
              <BaseTextInput
                v-model="form.fields.password"
                placeholder="Create a new password"
                class="w-full"
                type="password"
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
                placeholder="Confirm your password"
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
              >Save new password</BaseButton
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
