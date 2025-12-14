@php
    $tag = $href ? 'a' : 'button';
    $spinnerClass = config('ld-button.loading.spinner_class');
@endphp

<{{ $tag }}
    @if($href)
        href="{{ $href }}"
        target="{{ $target }}"
    @else
        type="{{ $type }}"
    @endif
    @if($disabled || $loading)
        {{ $disabled ? 'disabled' : '' }}
        aria-disabled="true"
    @endif
    {{ $attributes->merge(['class' => $computedClasses()]) }}
>
    {{-- Loading spinner --}}
    @if($loading)
        <svg class="{{ $spinnerClass }} {{ $iconSizeClasses() }} -ml-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @endif

    {{-- Left icon --}}
    @if($icon && $iconPosition === 'left' && !$loading)
        <x-dynamic-component :component="$icon" class="{{ $iconSizeClasses() }} -ml-0.5" />
    @endif

    {{-- Button text --}}
    @if($loading && $loadingText)
        {{ $loadingText }}
    @elseif($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif

    {{-- Right icon --}}
    @if($icon && $iconPosition === 'right' && !$loading)
        <x-dynamic-component :component="$icon" class="{{ $iconSizeClasses() }} -mr-0.5" />
    @endif
</{{ $tag }}>
