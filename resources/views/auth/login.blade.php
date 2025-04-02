<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')" 
                autofocus 
                autocomplete="username" 
                placeholder="Enter your email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                id="password" 
                class="block mt-1 w-full" 
                type="password" 
                name="password" 
                autocomplete="current-password" 
                placeholder="Enter your password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-4">
            <label for="remember_me" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                    name="remember"
                />
                <span class="ms-2">{{ __('Remember me') }}</span>
            </label>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <a 
                    href="{{ route('password.request') }}" 
                    class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <!-- Registration Link -->
            @if (Route::has('register'))
                <a 
                    href="{{ route('register') }}" 
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    {{ __('Don\'t have an account? Register') }}
                </a>
            @endif

            <!-- Login Button -->
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
