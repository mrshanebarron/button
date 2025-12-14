<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Button Settings
    |--------------------------------------------------------------------------
    |
    | These are the default settings applied to all buttons. You can override
    | these on a per-component basis using props.
    |
    */

    'defaults' => [
        'variant' => 'primary',
        'size' => 'md',
        'rounded' => 'md',
        'type' => 'button',
    ],

    /*
    |--------------------------------------------------------------------------
    | Variants
    |--------------------------------------------------------------------------
    |
    | Define button variants with their Tailwind classes. Add custom variants
    | or modify existing ones to match your design system.
    |
    */

    'variants' => [
        'primary' => [
            'base' => 'bg-gray-900 text-white shadow-sm hover:bg-gray-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900',
            'disabled' => 'bg-gray-400 text-gray-200 cursor-not-allowed',
        ],
        'secondary' => [
            'base' => 'bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50',
            'disabled' => 'bg-gray-100 text-gray-400 cursor-not-allowed',
        ],
        'danger' => [
            'base' => 'bg-red-600 text-white shadow-sm hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600',
            'disabled' => 'bg-red-300 text-red-100 cursor-not-allowed',
        ],
        'success' => [
            'base' => 'bg-green-600 text-white shadow-sm hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600',
            'disabled' => 'bg-green-300 text-green-100 cursor-not-allowed',
        ],
        'warning' => [
            'base' => 'bg-yellow-500 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500',
            'disabled' => 'bg-yellow-300 text-yellow-100 cursor-not-allowed',
        ],
        'ghost' => [
            'base' => 'text-gray-700 hover:bg-gray-100 hover:text-gray-900',
            'disabled' => 'text-gray-400 cursor-not-allowed',
        ],
        'link' => [
            'base' => 'text-gray-900 underline-offset-4 hover:underline',
            'disabled' => 'text-gray-400 cursor-not-allowed',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sizes
    |--------------------------------------------------------------------------
    |
    | Define button sizes. Each size includes padding and text size classes.
    |
    */

    'sizes' => [
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-2.5 py-1.5 text-sm',
        'md' => 'px-3 py-2 text-sm',
        'lg' => 'px-4 py-2.5 text-base',
        'xl' => 'px-5 py-3 text-base',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rounded
    |--------------------------------------------------------------------------
    |
    | Border radius options for buttons.
    |
    */

    'rounded' => [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        'full' => 'rounded-full',
    ],

    /*
    |--------------------------------------------------------------------------
    | Icons
    |--------------------------------------------------------------------------
    |
    | Icon sizing based on button size. Uses Heroicons by default.
    |
    */

    'icon_sizes' => [
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-5',
        'xl' => 'size-6',
    ],

    /*
    |--------------------------------------------------------------------------
    | Loading Spinner
    |--------------------------------------------------------------------------
    |
    | Classes for the loading spinner animation.
    |
    */

    'loading' => [
        'spinner_class' => 'animate-spin',
    ],
];
