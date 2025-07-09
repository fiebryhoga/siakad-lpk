<x-filament-panels::page>
    {{-- Form Entri di Atas --}}
    <form wire:submit="tambah">
        <div class="p-4 bg-white rounded-xl shadow dark:bg-gray-800">
            {{-- Grid untuk menata form dan tombol --}}
            <div class="grid grid-cols-1 gap-4 items-end md:grid-cols-3">
                <div class="md:col-span-2">
                    {{-- Form dirender di sini --}}
                    {{ $this->form }}
                </div>
                <div>
                    {{-- Tombol dirender di sini --}}
                    <x-filament::button type="submit" class="w-full">
                        Tambah Mata Pelajaran
                    </x-filament::button>
                </div>
            </div>
        </div>
    </form>

    {{-- Tabel Widget di Bawah
    <div class="mt-6">
        <x-filament-widgets::widgets
            :widgets="$this->getFooterWidgets()"
            :columns="$this->getFooterWidgetsColumns()"
        />
    </div> --}}
</x-filament-panels::page>