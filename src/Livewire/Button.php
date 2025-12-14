<?php

namespace MrShaneBarron\Button\Livewire;

use Livewire\Component;
use Livewire\Attributes\Locked;

class Button extends Component
{
    // Content
    public string $text = '';
    public string $icon = '';
    public string $iconPosition = 'left';

    // Styling
    public string $variant = '';
    public string $size = '';
    public string $rounded = '';
    public string $class = '';

    // Behavior
    public string $type = 'button';
    public bool $disabled = false;
    public bool $loading = false;
    public string $loadingText = '';

    // Link behavior
    public string $href = '';
    public string $target = '_self';

    // Wire actions
    public string $wireClick = '';
    public string $wireSubmit = '';

    #[Locked]
    public string $confirmMessage = '';
    public bool $confirm = false;

    public function mount(
        string $text = '',
        string $icon = '',
        string $iconPosition = 'left',
        string $variant = '',
        string $size = '',
        string $rounded = '',
        string $class = '',
        string $type = 'button',
        bool $disabled = false,
        bool $loading = false,
        string $loadingText = '',
        string $href = '',
        string $target = '_self',
        string $wireClick = '',
        string $wireSubmit = '',
        string $confirmMessage = '',
        bool $confirm = false,
    ): void {
        $config = config('ld-button');

        $this->text = $text;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->variant = $variant ?: $config['defaults']['variant'];
        $this->size = $size ?: $config['defaults']['size'];
        $this->rounded = $rounded ?: $config['defaults']['rounded'];
        $this->class = $class;
        $this->type = $type ?: $config['defaults']['type'];
        $this->disabled = $disabled;
        $this->loading = $loading;
        $this->loadingText = $loadingText;
        $this->href = $href;
        $this->target = $target;
        $this->wireClick = $wireClick;
        $this->wireSubmit = $wireSubmit;
        $this->confirmMessage = $confirmMessage;
        $this->confirm = $confirm;
    }

    public function getVariantClasses(): string
    {
        $variants = config('ld-button.variants');
        $variant = $variants[$this->variant] ?? $variants['primary'];

        return $this->disabled ? $variant['disabled'] : $variant['base'];
    }

    public function getSizeClasses(): string
    {
        $sizes = config('ld-button.sizes');
        return $sizes[$this->size] ?? $sizes['md'];
    }

    public function getRoundedClasses(): string
    {
        $rounded = config('ld-button.rounded');
        return $rounded[$this->rounded] ?? $rounded['md'];
    }

    public function getIconSizeClasses(): string
    {
        $iconSizes = config('ld-button.icon_sizes');
        return $iconSizes[$this->size] ?? $iconSizes['md'];
    }

    public function getComputedClasses(): string
    {
        $classes = [
            'inline-flex items-center justify-center gap-x-2 font-semibold transition-all duration-200',
            $this->getVariantClasses(),
            $this->getSizeClasses(),
            $this->getRoundedClasses(),
            $this->class,
        ];

        if ($this->loading) {
            $classes[] = 'cursor-wait';
        }

        return implode(' ', array_filter($classes));
    }

    public function render()
    {
        return view('ld-button::livewire.button');
    }
}
