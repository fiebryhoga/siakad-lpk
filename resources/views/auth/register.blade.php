<x-guest-layout>
    <!-- Wrapper utama untuk form registrasi -->
    <div class="w-full max-w-6xl mx-auto px-4 sm:px-0 lg:px-0 py-6">
        
        <!-- Judul Halaman -->
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-black">Daftar Akun</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Grid untuk 3 kolom form -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-2">

                <!-- Kolom 1 -->
                <div class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama_lengkap" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">NAMA LENGKAP</label>
                        <x-text-input id="nama_lengkap" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                    </div>

                    <!-- Nama Panggilan -->
                    <div>
                        <label for="nama_panggilan" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">NAMA PANGGILAN</label>
                        <x-text-input id="nama_panggilan" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="nama_panggilan" :value="old('nama_panggilan')" required />
                        <x-input-error :messages="$errors->get('nama_panggilan')" class="mt-2" />
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-xs font-medium text-gray-500 tracking-wider mb-1">JENIS KELAMIN</label>
                        <div class="flex items-center space-x-4 mt-2">
                            <label>
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" class="sr-only peer" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                                <div class="w-10 h-10 flex items-center justify-center border-2 border-gray-400 cursor-pointer peer-checked:bg-black peer-checked:text-white peer-checked:border-black font-semibold">
                                    L
                                </div>
                            </label>
                            <!-- Opsi Perempuan -->
                            <label>
                                <input type="radio" name="jenis_kelamin" value="Perempuan" class="sr-only peer" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                <div class="w-10 h-10 flex items-center justify-center border-2 border-gray-400 cursor-pointer peer-checked:bg-black peer-checked:text-white peer-checked:border-black font-semibold">
                                    P
                                </div>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label for="tempat_lahir" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">TEMPAT, TANGGAL LAHIR</label>
                        <div class="flex space-x-2 mt-1 border-2 border-gray-400">
                            <!-- Input Tempat Lahir -->
                            <x-text-input id="tempat_lahir" class="block border-0 w-2/4 border-gray-400 shadow-sm" type="text" name="tempat_lahir" :value="old('tempat_lahir')" required />
                            <!-- Input Tanggal Lahir -->
                            <x-text-input id="tanggal_lahir" class="block border-0 w-2/4 border-gray-400 shadow-sm" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required />
                        </div>
                        <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
                        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="agama" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">AGAMA</label>
                        <x-text-input id="agama" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="agama" :value="old('agama')" required />
                        <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-xs font-medium text-gray-500 tracking-wider mb-1">STATUS</label>
                        <div class="flex items-center space-x-4 mt-2">
                            <!-- Opsi Belum Menikah -->
                            <label>
                                <input type="radio" name="status" value="Belum Menikah" class="sr-only peer" {{ old('status') == 'Belum Menikah' ? 'checked' : '' }}>
                                <div class="w-10 h-10 flex items-center justify-center border-2 border-gray-400 cursor-pointer peer-checked:bg-black peer-checked:text-white peer-checked:border-black font-semibold">
                                    B
                                </div>
                            </label>
                            <!-- Opsi Sudah Menikah -->
                            <label>
                                <input type="radio" name="status" value="Sudah Menikah" class="sr-only peer" {{ old('status') == 'Sudah Menikah' ? 'checked' : '' }}>
                                <div class="w-10 h-10 flex items-center justify-center border-2 border-gray-400 cursor-pointer peer-checked:bg-black peer-checked:text-white peer-checked:border-black font-semibold">
                                    S
                                </div>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">ALAMAT</label>
                        <x-text-input id="alamat" class="block mt-1 w-full border-gray-400 shadow-sm" name="alamat" required >{{ old('alamat') }}</x-text-input>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div class="space-y-6">
                    <!-- Tinggi Badan -->
                    <div>
                        <label for="tinggi_badan" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">TINGGI BADAN</label>
                        <x-text-input id="tinggi_badan" class="block mt-1 w-full border-gray-400 shadow-sm" type="number" name="tinggi_badan" :value="old('tinggi_badan')" />
                        <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
                    </div>

                    <!-- Berat Badan -->
                    <div>
                        <label for="berat_badan" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">BERAT BADAN</label>
                        <x-text-input id="berat_badan" class="block mt-1 w-full border-gray-400 shadow-sm" type="number" name="berat_badan" :value="old('berat_badan')" />
                        <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
                    </div>

                    <!-- Nomor Telp -->
                    <div>
                        <label for="nomor_telp" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">NOMOR TELP</label>
                        <x-text-input id="nomor_telp" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="nomor_telp" :value="old('nomor_telp')" required />
                        <x-input-error :messages="$errors->get('nomor_telp')" class="mt-2" />
                    </div>

                    <!-- Nomor Telp Orang Tua -->
                    <div>
                        <label for="nomor_telp_orang_tua" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">NOMOR TELP. ORANG TUA</label>
                        <x-text-input id="nomor_telp_orang_tua" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="nomor_telp_orang_tua" :value="old('nomor_telp_orang_tua')" required />
                        <x-input-error :messages="$errors->get('nomor_telp_orang_tua')" class="mt-2" />
                    </div>

                    <!-- Pendidikan Terakhir -->
                    <div>
                        <label for="pendidikan_terakhir" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">PEND. TERAKHIR</label>
                        <x-text-input id="pendidikan_terakhir" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="pendidikan_terakhir" :value="old('pendidikan_terakhir')" required />
                        <x-input-error :messages="$errors->get('pendidikan_terakhir')" class="mt-2" />
                    </div>

                    <!-- Asal Sekolah -->
                    <div>
                        <label for="asal_sekolah" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">ASAL SEKOLAH</label>
                        <x-text-input id="asal_sekolah" class="block mt-1 w-full border-gray-400 shadow-sm" type="text" name="asal_sekolah" :value="old('asal_sekolah')" required />
                        <x-input-error :messages="$errors->get('asal_sekolah')" class="mt-2" />
                    </div>
                </div>

                <!-- Kolom 3 -->
                <div class="space-y-6">
                    <!-- Username (Email) -->
                    <div>
                        <label for="email" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">USERNAME</label>
                        <x-text-input id="email" class="block mt-1 w-full border-gray-400 shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-xs font-medium text-gray-500 tracking-wider mb-1">PASSWORD</label>
                        <x-text-input id="password" class="block mt-1 w-full border-gray-400 shadow-sm" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    
                    <!-- Konfirmasi Password (disembunyikan dan diisi otomatis via JS) -->
                    <input type="hidden" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end mt-2">
                 <x-primary-button class="justify-center bg-black text-white py-3 px-12 text-base hover:bg-gray-800 focus:ring-0">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const passwordConfirmationInput = document.getElementById('password_confirmation');

            if (passwordInput && passwordConfirmationInput) {
                // Set initial value in case of old input being populated
                passwordConfirmationInput.value = passwordInput.value;
                
                passwordInput.addEventListener('input', function () {
                    passwordConfirmationInput.value = this.value;
                });
            }
        });
    </script>
</x-guest-layout>
