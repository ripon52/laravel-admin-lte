@props([
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
])

@php
    $name = $attributes->get("name");
@endphp

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'form-control','is-invalid' =>  $errors->has($name)]) }}
    >
    <x-error name="{{ $name }}" />
</div>
