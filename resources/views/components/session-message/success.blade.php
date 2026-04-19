
@props(['theme', 'message'])

@php
    $classes = $theme === 'success' ? 
                'dark:text-green-300 border-green-300'
                :
                'dark:text-red-300 border-red-300'
@endphp

<p  x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="setTimeout(() => show = false, 2000)"
    {{$attributes->merge(['class' => "text-sm p-2 my-2 border rounded-lg " . $classes])}}>
    {{$message ?? $slot}}
</p>