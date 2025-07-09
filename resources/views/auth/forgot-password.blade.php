<x-guest-layout>
    <div class="mb-6 text-center text-gray-900 dark:text-gray-900 text-lg font-semibold">
        Silahkan hubungi admin staff untuk meminta perubahan password.
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="flex justify-center">
        <a href="{{ route('login') }}"
            class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 transition">
            Kembali ke Login
        </a>
    </div>
</x-guest-layout>
