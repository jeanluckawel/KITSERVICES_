

@props(['label', 'name', 'value' => '', 'type' => 'text', 'disabled' => false, 'required' => false])

<label class="block text-sm flex-1">
    <span class="text-gray-700">{{ $label }} @if($required)<sup class="text-red-600">*</sup>@endif</span>
    <input type="{{ $type }}" name="{{ $name }}"
           {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}
           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"  autocomplete="off"/>
</label>
