<?php extract((new \Illuminate\Support\Collection($attributes->getAttributes()))->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['field','class'])
<x-filament-forms::plain-field-wrapper :field="$field" :class="$class" >

{{ $slot ?? "" }}
</x-filament-forms::plain-field-wrapper>