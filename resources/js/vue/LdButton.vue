<script setup lang="ts">
import { computed } from 'vue'

interface Props {
  text?: string
  icon?: string
  iconPosition?: 'left' | 'right'
  variant?: 'primary' | 'secondary' | 'danger' | 'success' | 'warning' | 'ghost' | 'link'
  size?: 'xs' | 'sm' | 'md' | 'lg' | 'xl'
  rounded?: 'none' | 'sm' | 'md' | 'lg' | 'xl' | 'full'
  type?: 'button' | 'submit' | 'reset'
  disabled?: boolean
  loading?: boolean
  loadingText?: string
  href?: string
  target?: '_self' | '_blank' | '_parent' | '_top'
}

const props = withDefaults(defineProps<Props>(), {
  text: '',
  icon: '',
  iconPosition: 'left',
  variant: 'primary',
  size: 'md',
  rounded: 'md',
  type: 'button',
  disabled: false,
  loading: false,
  loadingText: '',
  href: '',
  target: '_self',
})

const emit = defineEmits<{
  click: [event: MouseEvent]
}>()

const variants = {
  primary: {
    base: 'bg-gray-900 text-white shadow-sm hover:bg-gray-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900',
    disabled: 'bg-gray-400 text-gray-200 cursor-not-allowed',
  },
  secondary: {
    base: 'bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50',
    disabled: 'bg-gray-100 text-gray-400 cursor-not-allowed',
  },
  danger: {
    base: 'bg-red-600 text-white shadow-sm hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600',
    disabled: 'bg-red-300 text-red-100 cursor-not-allowed',
  },
  success: {
    base: 'bg-green-600 text-white shadow-sm hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600',
    disabled: 'bg-green-300 text-green-100 cursor-not-allowed',
  },
  warning: {
    base: 'bg-yellow-500 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500',
    disabled: 'bg-yellow-300 text-yellow-100 cursor-not-allowed',
  },
  ghost: {
    base: 'text-gray-700 hover:bg-gray-100 hover:text-gray-900',
    disabled: 'text-gray-400 cursor-not-allowed',
  },
  link: {
    base: 'text-gray-900 underline-offset-4 hover:underline',
    disabled: 'text-gray-400 cursor-not-allowed',
  },
}

const sizes = {
  xs: 'px-2 py-1 text-xs',
  sm: 'px-2.5 py-1.5 text-sm',
  md: 'px-3 py-2 text-sm',
  lg: 'px-4 py-2.5 text-base',
  xl: 'px-5 py-3 text-base',
}

const roundedClasses = {
  none: 'rounded-none',
  sm: 'rounded-sm',
  md: 'rounded-md',
  lg: 'rounded-lg',
  xl: 'rounded-xl',
  full: 'rounded-full',
}

const iconSizes = {
  xs: 'size-3',
  sm: 'size-4',
  md: 'size-5',
  lg: 'size-5',
  xl: 'size-6',
}

const variantClasses = computed(() => {
  const variant = variants[props.variant]
  return props.disabled ? variant.disabled : variant.base
})

const sizeClasses = computed(() => sizes[props.size])
const roundedClass = computed(() => roundedClasses[props.rounded])
const iconSizeClass = computed(() => iconSizes[props.size])

const computedClasses = computed(() => {
  const classes = [
    'inline-flex items-center justify-center gap-x-2 font-semibold transition-all duration-200',
    variantClasses.value,
    sizeClasses.value,
    roundedClass.value,
  ]

  if (props.loading) {
    classes.push('cursor-wait')
  }

  return classes.join(' ')
})

const isDisabled = computed(() => props.disabled || props.loading)
const tag = computed(() => (props.href ? 'a' : 'button'))

const displayText = computed(() => {
  if (props.loading && props.loadingText) {
    return props.loadingText
  }
  return props.text
})

function handleClick(event: MouseEvent) {
  if (!isDisabled.value) {
    emit('click', event)
  }
}
</script>

<template>
  <component
    :is="tag"
    :href="href || undefined"
    :target="href ? target : undefined"
    :type="!href ? type : undefined"
    :disabled="isDisabled && !href"
    :aria-disabled="isDisabled"
    :class="computedClasses"
    @click="handleClick"
  >
    <!-- Loading spinner -->
    <svg
      v-if="loading"
      class="animate-spin -ml-0.5"
      :class="iconSizeClass"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
    >
      <circle
        class="opacity-25"
        cx="12"
        cy="12"
        r="10"
        stroke="currentColor"
        stroke-width="4"
      />
      <path
        class="opacity-75"
        fill="currentColor"
        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
      />
    </svg>

    <!-- Left icon slot -->
    <slot v-if="iconPosition === 'left' && !loading" name="icon-left" />

    <!-- Button text -->
    <span v-if="displayText">{{ displayText }}</span>
    <slot v-else />

    <!-- Right icon slot -->
    <slot v-if="iconPosition === 'right' && !loading" name="icon-right" />
  </component>
</template>
