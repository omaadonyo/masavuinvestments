<x-filament::page>

<x-filament::callout
    icon="heroicon-o-information-circle"
    color="primary"
>
    <x-slot name="heading" color="primary">
        Payment Proceedure
    </x-slot>

    <x-slot name="description">
        Please first make payment to this Stanbic Bank Account: <strong>903 002 720 258 5</strong>.
        Then proceed with filling this form.
    </x-slot>
    
</x-filament::callout>

{{ $this->content }}

</x-filament::page>