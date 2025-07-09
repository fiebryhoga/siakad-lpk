<x-guest-layout>
    <!-- Session Status (jika ada pesan, misal: reset password berhasil) -->
    @if (session('status'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-800 px-4 py-3 text-sm" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Wrapper untuk seluruh komponen login -->
    <div class="w-full max-w-4xl mx-auto">

        <!-- Header: Logo Kiri, Judul, Logo Kanan -->
        <div class="flex justify-between items-center mb-4">
            <!-- Logo Kiri -->
            <img src="{{ asset('build/assets/logo-asa.png') }}" alt="Logo LPK ASA METRO Kiri" class="w-28 h-28 object-contain">

            <!-- Judul Utama -->
            <div class="text-center">
                <h1 class="text-4xl font-bold text-black">LPK ASA METRO</h1>
            </div>

            <!-- Logo Kanan -->
            <img src="{{ asset('build/assets/logo-asa.png') }}" alt="Logo LPK ASA METRO Kanan" class="w-28 h-28 object-contain">
        </div>

        <!-- Sub-judul Login -->
        <div class="text-center my-12">
            <h2 class="text-3xl font-semibold text-black">Login</h2>
        </div>

        <!-- Form Login yang diletakkan di tengah -->
        <div class="w-full max-w-md mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Input Username -->
                <div class="mb-6">
                    {{-- Label diubah menjadi USERNAME sesuai gambar --}}
                    <label for="email" class="block text-sm font-medium text-gray-500 tracking-wider mb-1">USERNAME</label>
                    <x-text-input id="email" class="block mt-1 w-full border-gray-400 shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Input Password -->
                <div class="mb-10">
                    <label for="password" class="block text-sm font-medium text-gray-500 tracking-wider mb-1">PASSWORD</label>
                    <x-text-input id="password" class="block mt-1 w-full border-gray-400 shadow-sm"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-center space-x-6">
                    {{-- Tombol Login Utama --}}
                    <x-primary-button class="w-full justify-center bg-black text-white py-3 text-base hover:bg-gray-800 focus:ring-0">
                        {{ __('login') }}
                    </x-primary-button>

                    {{-- Tombol Lupa Password (dibuat sebagai link) --}}
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="inline-flex items-center justify-center w-full px-4 py-3 bg-black border border-transparent font-semibold text-base text-white hover:bg-gray-800 focus:outline-none focus:ring-0 transition ease-in-out duration-150">
                            {{ __('Lupa Password') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
