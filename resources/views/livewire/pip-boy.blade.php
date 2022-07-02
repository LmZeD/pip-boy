<div class="screen">
    <div class="screen-reflection"></div>
    <div class="scan"></div>

    <div wire:model="page" wire:poll>
        @livewire('pip-boy.stats')
        @livewire('pip-boy.inventory')
        @livewire('pip-boy.data')
        @livewire('pip-boy.map')
        @livewire('pip-boy.radio')
    </div>

</div>
