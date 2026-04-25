<?php extract((new \Illuminate\Support\Collection($attributes->getAttributes()))->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['errorMessage','errorMessages','areHtmlErrorMessagesAllowed','shouldShowAllValidationMessages','field'])
<x-filament-forms::field-wrapper :error-message="$errorMessage" :error-messages="$errorMessages" :are-html-error-messages-allowed="$areHtmlErrorMessagesAllowed" :should-show-all-validation-messages="$shouldShowAllValidationMessages" :field="$field" >

{{ $slot ?? "" }}
</x-filament-forms::field-wrapper>