# Laravel Design Button

Flexible, beautiful button components for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require laraveldesign/button
```

For Vue components:
```bash
npm install @laraveldesign/button
```

## Usage

### Livewire Component

```blade
<livewire:ld-button text="Save" variant="primary" />

<livewire:ld-button
    text="Delete"
    variant="danger"
    wire-click="delete"
    confirm
    confirm-message="Are you sure you want to delete this?"
/>

<livewire:ld-button
    text="Loading..."
    :loading="$saving"
    loading-text="Saving..."
/>
```

### Blade Component

```blade
<x-ld-button text="Click me" />

<x-ld-button variant="secondary" size="lg">
    Custom Content
</x-ld-button>

<x-ld-button href="/dashboard" variant="link">
    Go to Dashboard
</x-ld-button>
```

### Vue 3 Component

```vue
<script setup>
import { LdButton } from '@laraveldesign/button'
</script>

<template>
  <LdButton text="Save" variant="primary" @click="save" />

  <LdButton variant="danger" :loading="deleting">
    <template #icon-left>
      <TrashIcon class="size-5" />
    </template>
    Delete
  </LdButton>
</template>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `text` | string | `''` | Button text |
| `variant` | string | `'primary'` | `primary`, `secondary`, `danger`, `success`, `warning`, `ghost`, `link` |
| `size` | string | `'md'` | `xs`, `sm`, `md`, `lg`, `xl` |
| `rounded` | string | `'md'` | `none`, `sm`, `md`, `lg`, `xl`, `full` |
| `type` | string | `'button'` | `button`, `submit`, `reset` |
| `disabled` | boolean | `false` | Disable the button |
| `loading` | boolean | `false` | Show loading spinner |
| `loadingText` | string | `''` | Text to show when loading |
| `icon` | string | `''` | Icon component name (Blade) |
| `iconPosition` | string | `'left'` | `left`, `right` |
| `href` | string | `''` | Render as link |
| `target` | string | `'_self'` | Link target |

### Livewire-specific Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wireClick` | string | `''` | Livewire click action |
| `wireSubmit` | string | `''` | Livewire submit action |
| `confirm` | boolean | `false` | Show confirmation dialog |
| `confirmMessage` | string | `'Are you sure?'` | Confirmation message |

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-button-config
```

Customize variants, sizes, and defaults in `config/ld-button.php`.

## Customization

### Adding Custom Variants

```php
// config/ld-button.php
'variants' => [
    'brand' => [
        'base' => 'bg-purple-600 text-white hover:bg-purple-500',
        'disabled' => 'bg-purple-300 text-purple-100 cursor-not-allowed',
    ],
],
```

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-button-views
```

## License

MIT
