<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
    <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-800 px-4 py-3 text-sm" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="px-80">
        <div class="text-center mb-6 mt-16"> 
            <h1 class="text-3xl font-bold text-gray-900 dark:text-black">LPK ASA METRO</h1>
        </div>
    
        <div class="text-center mb-6"> 
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-black">Login</h2>
        </div>
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-white border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <x-primary-button class="w-full justify-center bg-black text-white hover:bg-gray-800 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ __('login') }}
            </x-primary-button>
    
            <div class="flex flex-row gap-8 items-center justify-center mt-6">
                
            
                @if (Route::has('password.request'))
                    
                    
                    <x-primary-button type="button" class="mt-2 w-full justify-center bg-black text-white hover:bg-gray-800 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        onclick="window.location='{{ route('password.request') }}'">
                        {{ __('Lupa Password') }}
                    </x-primary-button>
                @endif
            
                @if (Route::has('register'))
                    
                    
                    <x-primary-button type="button" class="mt-2 w-full justify-center bg-black text-white hover:bg-gray-800 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        onclick="window.location='{{ route('register') }}'">
                        {{ __('Register') }}
                    </x-primary-button>
                @endif
            </div>
        </form>
    </div>

    
</x-guest-layout>
