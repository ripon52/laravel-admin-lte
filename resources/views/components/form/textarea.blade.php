@props([
    'placeholder'   => localize('Ex.Your content here'),
])

@php
    $name = $attributes->get('name');
@endphp

<textarea {{ $attributes->merge(['class' => 'form-control form-control-sm', 'is-invalid' =>  $errors->has($name)]) }}
          placeholder="{{ $placeholder ?? '' }}">{{ old($name,$value) }}{{ $slot }}</textarea>

<x-error :name="$attributes->get('name')" />
