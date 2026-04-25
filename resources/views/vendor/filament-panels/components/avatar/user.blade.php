@props([
    'user' => filament()->auth()->user(),
])

@php

    $src = filament()->getUserAvatarUrl($user);
    $alt = __('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)]);
@endphp


@if($user->avatar_url)

    <x-filament::avatar
        src="{{ Storage::url($user->avatar_url) }}"
        alt="Dan Harrin"
        :circular="false"
    />


@else


    <x-filament::avatar
        :src="$src"
        :alt="$alt"
        :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->class(['fi-user-avatar'])"
    />


@endif





