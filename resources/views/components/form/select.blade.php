<select {{ $attributes->merge(['class' => 'form-select form-select-sm']) }}>
    {{ $slot }}
</select>

<x-error :name="$attributes->get('name')" />