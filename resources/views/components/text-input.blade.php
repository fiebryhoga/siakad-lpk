@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-gray-300 focus:ring-gray-300 shadow-sm']) }}>