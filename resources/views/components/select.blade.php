@props([
'options' => [],
'placeholder' => null,
'defaultValue' => null
])

<select {{ $attributes->merge(['class' => 'mt-2 py-1 text-base border-gray-300 focus:outline-none focus:ring-0
  focus:border-gray-300']) }}>
  @if ($placeholder)
  <option value="" disabled {{ $defaultValue === null ? "selected" : null }}>{{ $placeholder }}</option>
  @endif

  @foreach ($options as $value => $label)
  <option value="{{ $value }}" {{ $defaultValue !== null && $value == $defaultValue ? "selected" : null }}>{{ $label }}</option>
  @endforeach
</select>