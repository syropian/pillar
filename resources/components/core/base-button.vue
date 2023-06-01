<script lang="ts" setup>
import { RouterLink } from 'hybridly/vue'
import { computed } from 'vue'

interface Props {
  as?: 'button' | 'link'
  size?: 'sm' | 'base'
  href?: string
  type?: 'button' | 'submit'
  variant?: 'primary' | 'secondary' | 'danger'
}

const props = defineProps<Props>()

const buttonElement = computed(() => {
  if (props.as === 'link') {
    if (props.href && props.href.startsWith('http')) {
      return 'a'
    }

    return RouterLink
  }

  return 'button'
})
const buttonType = computed(() => (props.as === 'link' ? null : props.type))

const classesForVariant = computed(() => {
  return {
    primary: 'text-white hover:bg-primary-700 bg-primary-600 ring-primary-300 focus-visible:ring-2',
    secondary: 'bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50',
    danger: 'text-white hover:bg-red-700 bg-red-600 ring-red-300 focus-visible:ring-2',
  }[props.variant || 'primary']
})

const classesForSizeProp = computed(() => {
  return {
    sm: 'px-2.5 py-1.5 text-sm',
    base: 'px-3 py-2 text-sm',
  }[props.size || 'base']
})
</script>

<template>
  <component
    :is="buttonElement"
    :href="href"
    :type="buttonType"
    class="inline-flex items-center justify-center whitespace-nowrap rounded-lg font-semibold transition-colors focus-visible:outline-none disabled:opacity-60"
    :class="[classesForVariant, classesForSizeProp]"
  >
    <slot />
  </component>
</template>
