<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Nama Lengkap -->
            <div>
                <x-input-label for="nama_lengkap" :value="'Nama Lengkap'" />
                <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap"
                    :value="old('nama_lengkap')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
            </div>

            <!-- Nama Panggilan -->
            <div>
                <x-input-label for="nama_panggilan" :value="'Nama Panggilan'" />
                <x-text-input id="nama_panggilan" class="block mt-1 w-full" type="text" name="nama_panggilan"
                    :value="old('nama_panggilan')" required />
                <x-input-error :messages="$errors->get('nama_panggilan')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <x-input-label for="jenis_kelamin" :value="'Jenis Kelamin'" />
                <select id="jenis_kelamin" name="jenis_kelamin" required
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>

            <!-- Tempat Lahir -->
            <div>
                <x-input-label for="tempat_lahir" :value="'Tempat Lahir'" />
                <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir"
                    :value="old('tempat_lahir')" required />
                <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <x-input-label for="tanggal_lahir" :value="'Tanggal Lahir'" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir"
                    :value="old('tanggal_lahir')" required />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <!-- Agama -->
            <div>
                <x-input-label for="agama" :value="'Agama'" />
                <select id="agama" name="agama" required
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
                <x-input-error :messages="$errors->get('agama')" class="mt-2" />
            </div>

            <!-- Status -->
            <div>
                <x-input-label for="status" :value="'Status'" />
                <select id="status" name="status" required
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">-- Pilih Status --</option>
                    <option value="Belum Menikah" {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Sudah Menikah" {{ old('status') == 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <!-- Tinggi Badan -->
            <div>
                <x-input-label for="tinggi_badan" :value="'Tinggi Badan (cm)'" />
                <x-text-input id="tinggi_badan" class="block mt-1 w-full" type="number" name="tinggi_badan"
                    :value="old('tinggi_badan')" />
                <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
            </div>

            <!-- Berat Badan -->
            <div>
                <x-input-label for="berat_badan" :value="'Berat Badan (kg)'" />
                <x-text-input id="berat_badan" class="block mt-1 w-full" type="number" name="berat_badan"
                    :value="old('berat_badan')" />
                <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <!-- Nomor Telp -->
            <div>
                <x-input-label for="nomor_telp" :value="'Nomor Telp'" />
                <x-text-input id="nomor_telp" class="block mt-1 w-full" type="text" name="nomor_telp"
                    :value="old('nomor_telp')" required />
                <x-input-error :messages="$errors->get('nomor_telp')" class="mt-2" />
            </div>

            <!-- Nomor Telp Orang Tua -->
            <div>
                <x-input-label for="nomor_telp_orang_tua" :value="'Nomor Telp Orang Tua'" />
                <x-text-input id="nomor_telp_orang_tua" class="block mt-1 w-full" type="text" name="nomor_telp_orang_tua"
                    :value="old('nomor_telp_orang_tua')" required />
                <x-input-error :messages="$errors->get('nomor_telp_orang_tua')" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <!-- Pendidikan Terakhir -->
            <div>
                <x-input-label for="pendidikan_terakhir" :value="'Pendidikan Terakhir'" />
                <select id="pendidikan_terakhir" name="pendidikan_terakhir" required
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">-- Pilih --</option>
                    <option value="SMA" {{ old('pendidikan_terakhir') == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="D1" {{ old('pendidikan_terakhir') == 'D1' ? 'selected' : '' }}>D1</option>
                    <option value="D2" {{ old('pendidikan_terakhir') == 'D2' ? 'selected' : '' }}>D2</option>
                    <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                    <option value="D4" {{ old('pendidikan_terakhir') == 'D4' ? 'selected' : '' }}>D4</option>
                    <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>S1</option>
                    <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                </select>
                <x-input-error :messages="$errors->get('pendidikan_terakhir')" class="mt-2" />
            </div>

            <!-- Asal Sekolah -->
            <div>
                <x-input-label for="asal_sekolah" :value="'Asal Sekolah'" />
                <x-text-input id="asal_sekolah" class="block mt-1 w-full" type="text" name="asal_sekolah"
                    :value="old('asal_sekolah')" required />
                <x-input-error :messages="$errors->get('asal_sekolah')" class="mt-2" />
            </div>
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="'Alamat'" />
            <textarea id="alamat" name="alamat" required
                class="block mt-1 py-4 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="'Password'" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <x-input-label for="password_confirmation" :value="'Konfirmasi Password'" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            

        </div>

        <div class="flex items-center justify-end mt-10">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Sudah Punya Akun? Login') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
