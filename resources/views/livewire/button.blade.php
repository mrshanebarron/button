@php
    $baseClass = config('ld-button.base');
    $variantClass = config('ld-button.variants.' . $variant, config('ld-button.variants.primary'));
    $sizeClass = config('ld-button.sizes.' . $size, config('ld-button.sizes.md'));
    $classes = "$baseClass $variantClass $sizeClass";
@endphp

@if($href)
    <a
        href="{{ $href }}"
        class="{{ $classes }}"
        @if($disabled) aria-disabled="true" tabindex="-1" @endif
    >
        @if($loading)
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
        @elseif($icon && $iconPosition === 'left')
            <span class="mr-2">{!! $icon !!}</span>
        @endif

        {{ $slot }}

        @if($icon && $iconPosition === 'right' && !$loading)
            <span class="ml-2">{!! $icon !!}</span>
        @endif
    </a>
@else
    <button
        type="{{ $type }}"
        class="{{ $classes }}"
        @if($disabled || $loading) disabled @endif
    >
        @if($loading)
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
        @elseif($icon && $iconPosition === 'left')
            <span class="mr-2">{!! $icon !!}</span>
        @endif

        {{ $slot }}

        @if($icon && $iconPosition === 'right' && !$loading)
            <span class="ml-2">{!! $icon !!}</span>
        @endif
    </button>
@endif
