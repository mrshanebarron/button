<?php

namespace MrShaneBarron\Button\Livewire;

use Livewire\Component;

class Button extends Component
{
    public string $type = 'button';
    public string $variant = 'primary';
    public string $size = 'md';
    public bool $disabled = false;
    public bool $loading = false;
    public ?string $href = null;
    public ?string $icon = null;
    public string $iconPosition = 'left';

    public function mount(
        string $type = 'button',
        string $variant = 'primary',
        string $size = 'md',
        bool $disabled = false,
        bool $loading = false,
        ?string $href = null,
        ?string $icon = null,
        string $iconPosition = 'left'
    ): void {
        $this->type = $type;
        $this->variant = $variant;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->loading = $loading;
        $this->href = $href;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
    }

    public function render()
    {
        return view('sb-button::livewire.button');
    }
}
