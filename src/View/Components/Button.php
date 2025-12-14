<?php

namespace MrShaneBarron\Button\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $text;
    public string $icon;
    public string $iconPosition;
    public string $variant;
    public string $size;
    public string $rounded;
    public string $type;
    public bool $disabled;
    public bool $loading;
    public string $loadingText;
    public string $href;
    public string $target;

    public function __construct(
        string $text = '',
        string $icon = '',
        string $iconPosition = 'left',
        string $variant = '',
        string $size = '',
        string $rounded = '',
        string $type = 'button',
        bool $disabled = false,
        bool $loading = false,
        string $loadingText = '',
        string $href = '',
        string $target = '_self',
    ) {
        $config = config('ld-button');

        $this->text = $text;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->variant = $variant ?: $config['defaults']['variant'];
        $this->size = $size ?: $config['defaults']['size'];
        $this->rounded = $rounded ?: $config['defaults']['rounded'];
        $this->type = $type ?: $config['defaults']['type'];
        $this->disabled = $disabled;
        $this->loading = $loading;
        $this->loadingText = $loadingText;
        $this->href = $href;
        $this->target = $target;
    }

    public function variantClasses(): string
    {
        $variants = config('ld-button.variants');
        $variant = $variants[$this->variant] ?? $variants['primary'];

        return $this->disabled ? $variant['disabled'] : $variant['base'];
    }

    public function sizeClasses(): string
    {
        $sizes = config('ld-button.sizes');
        return $sizes[$this->size] ?? $sizes['md'];
    }

    public function roundedClasses(): string
    {
        $rounded = config('ld-button.rounded');
        return $rounded[$this->rounded] ?? $rounded['md'];
    }

    public function iconSizeClasses(): string
    {
        $iconSizes = config('ld-button.icon_sizes');
        return $iconSizes[$this->size] ?? $iconSizes['md'];
    }

    public function computedClasses(): string
    {
        $classes = [
            'inline-flex items-center justify-center gap-x-2 font-semibold transition-all duration-200',
            $this->variantClasses(),
            $this->sizeClasses(),
            $this->roundedClasses(),
        ];

        if ($this->loading) {
            $classes[] = 'cursor-wait';
        }

        return implode(' ', array_filter($classes));
    }

    public function render()
    {
        return view('ld-button::components.button');
    }
}
