<div class="inline-block">
@php
    $baseStyles = 'display: inline-flex; align-items: center; justify-content: center; font-weight: 500; border-radius: 0.5rem; transition: all 0.15s; cursor: pointer; border: none; text-decoration: none;';

    $variantStyles = match($variant) {
        'primary' => 'background-color: #2563eb; color: white;',
        'secondary' => 'background-color: #e5e7eb; color: #111827;',
        'success' => 'background-color: #16a34a; color: white;',
        'danger' => 'background-color: #dc2626; color: white;',
        'warning' => 'background-color: #eab308; color: white;',
        'outline' => 'background-color: transparent; color: #374151; border: 2px solid #d1d5db;',
        'ghost' => 'background-color: transparent; color: #374151;',
        default => 'background-color: #2563eb; color: white;',
    };

    $sizeStyles = match($size) {
        'xs' => 'padding: 0.25rem 0.5rem; font-size: 0.75rem;',
        'sm' => 'padding: 0.375rem 0.75rem; font-size: 0.875rem;',
        'md' => 'padding: 0.5rem 1rem; font-size: 0.875rem;',
        'lg' => 'padding: 0.625rem 1.25rem; font-size: 1rem;',
        'xl' => 'padding: 0.75rem 1.5rem; font-size: 1.125rem;',
        default => 'padding: 0.5rem 1rem; font-size: 0.875rem;',
    };

    $disabledStyles = ($disabled || $loading) ? 'opacity: 0.5; cursor: not-allowed;' : '';
    $allStyles = "$baseStyles $variantStyles $sizeStyles $disabledStyles";
@endphp

@if($href)
    <a
        href="{{ $href }}"
        style="{{ $allStyles }}"
        @if($disabled) aria-disabled="true" tabindex="-1" @endif
    >
        @if($loading)
            <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24">
                <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
        @elseif($icon && $iconPosition === 'left')
            <span style="margin-right: 0.5rem;">{!! $icon !!}</span>
        @endif

        {{ $slot ?? '' }}

        @if($icon && $iconPosition === 'right' && !$loading)
            <span style="margin-left: 0.5rem;">{!! $icon !!}</span>
        @endif
    </a>
@else
    <button
        type="{{ $type }}"
        style="{{ $allStyles }}"
        @if($disabled || $loading) disabled @endif
    >
        @if($loading)
            <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24">
                <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
        @elseif($icon && $iconPosition === 'left')
            <span style="margin-right: 0.5rem;">{!! $icon !!}</span>
        @endif

        {{ $slot ?? '' }}

        @if($icon && $iconPosition === 'right' && !$loading)
            <span style="margin-left: 0.5rem;">{!! $icon !!}</span>
        @endif
    </button>
@endif
</div>
