<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-3 bg-black border border-transparent font-semibold text-base text-white hover:bg-gray-800 focus:outline-none focus:ring-0 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>