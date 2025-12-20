# Button

A versatile, customizable button component for Laravel applications. Supports multiple variants, sizes, loading states, and icons. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/button
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-button>Click Me</livewire:sb-button>
```

### Variants

```blade
<livewire:sb-button variant="primary">Primary</livewire:sb-button>
<livewire:sb-button variant="secondary">Secondary</livewire:sb-button>
<livewire:sb-button variant="success">Success</livewire:sb-button>
<livewire:sb-button variant="danger">Danger</livewire:sb-button>
<livewire:sb-button variant="warning">Warning</livewire:sb-button>
<livewire:sb-button variant="outline">Outline</livewire:sb-button>
<livewire:sb-button variant="ghost">Ghost</livewire:sb-button>
```

### Sizes

```blade
<livewire:sb-button size="xs">Extra Small</livewire:sb-button>
<livewire:sb-button size="sm">Small</livewire:sb-button>
<livewire:sb-button size="md">Medium</livewire:sb-button>
<livewire:sb-button size="lg">Large</livewire:sb-button>
<livewire:sb-button size="xl">Extra Large</livewire:sb-button>
```

### Loading State

```blade
<livewire:sb-button :loading="true">Processing...</livewire:sb-button>
```

### As Link

```blade
<livewire:sb-button href="/dashboard">Go to Dashboard</livewire:sb-button>
```

### Disabled

```blade
<livewire:sb-button :disabled="true">Disabled</livewire:sb-button>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | `'button'` | Button type: `button`, `submit`, `reset` |
| `variant` | string | `'primary'` | Visual style variant |
| `size` | string | `'md'` | Size: `xs`, `sm`, `md`, `lg`, `xl` |
| `disabled` | boolean | `false` | Disable button |
| `loading` | boolean | `false` | Show loading spinner |
| `href` | string | `null` | Render as anchor link |

## Vue 3 Usage

### Setup

```javascript
import { SbButton } from './vendor/sb-button';
app.component('SbButton', SbButton);
```

### Basic Usage

```vue
<template>
  <SbButton @click="handleClick">Click Me</SbButton>
</template>
```

### Variants

```vue
<template>
  <SbButton variant="primary">Primary</SbButton>
  <SbButton variant="secondary">Secondary</SbButton>
  <SbButton variant="success">Success</SbButton>
  <SbButton variant="danger">Danger</SbButton>
  <SbButton variant="warning">Warning</SbButton>
  <SbButton variant="outline">Outline</SbButton>
  <SbButton variant="ghost">Ghost</SbButton>
</template>
```

### With Icons

```vue
<template>
  <!-- Icon on left (default) -->
  <SbButton icon="<svg>...</svg>" icon-position="left">
    Save
  </SbButton>

  <!-- Icon on right -->
  <SbButton icon="<svg>...</svg>" icon-position="right">
    Next
  </SbButton>

  <!-- Using slots -->
  <SbButton>
    <template #iconLeft>
      <MyIcon />
    </template>
    Download
  </SbButton>
</template>
```

### Loading State

```vue
<template>
  <SbButton :loading="isSubmitting" @click="submit">
    {{ isSubmitting ? 'Saving...' : 'Save' }}
  </SbButton>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | String | `'button'` | Button type attribute |
| `variant` | String | `'primary'` | Style: `primary`, `secondary`, `success`, `danger`, `warning`, `outline`, `ghost` |
| `size` | String | `'md'` | Size: `xs`, `sm`, `md`, `lg`, `xl` |
| `disabled` | Boolean | `false` | Disable interactions |
| `loading` | Boolean | `false` | Show spinner, disable button |
| `href` | String | `null` | Render as `<a>` tag |
| `icon` | String | `null` | HTML icon content |
| `iconPosition` | String | `'left'` | Position: `left` or `right` |

### Slots

| Slot | Description |
|------|-------------|
| default | Button content |
| `iconLeft` | Left icon slot |
| `iconRight` | Right icon slot |

## Styling

The button uses Tailwind CSS classes. Each variant has distinct colors:

- **primary**: Blue background
- **secondary**: Gray background
- **success**: Green background
- **danger**: Red background
- **warning**: Yellow background
- **outline**: Border only
- **ghost**: No background, hover effect

## Accessibility

- Proper `disabled` and `aria-disabled` attributes
- Focus ring for keyboard navigation
- Loading state disables interaction
- Supports native button types

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
