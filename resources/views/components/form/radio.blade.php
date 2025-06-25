
@props([
    'name',
    'value',
    'label',
    'checked' => false,
    'disabled' => false
])

<label class="inline-flex items-center">
    <input type="radio" name="{{ $name }}" value="{{ $value }}"
           {{ $checked ? 'checked' : '' }} {{ $disabled ? 'disabled' : '' }}
           class="text-orange-600 form-radio focus:ring-orange-500">
    <span class="ml-2 text-gray-700">{{ $label }}</span>
</label>
