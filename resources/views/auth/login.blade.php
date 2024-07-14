@section('title') Login Page @endsection
<x-guest-layout>
    <body class="login-body">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="display: block; margin: auto; width: 100px;">
            </a>
        </div>
        
        <div class="login-container">
            <header class="login-header" style="margin-top: 40px;">
                <h2 class="login-h2">Masuk</h2>
            </header>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <x-input-error-custom :messages="$errors->get('email')"/>
                <!-- Email Address -->
                <div class="login-form-input">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" 
                                    type="email" 
                                    name="email" 
                                    placeholder="Masukkan Email" 
                                    style="font-size: 14px"
                                    :value="old('email')" 
                                    required autofocus autocomplete="email" />
                </div>

                <!-- Password -->
                <div class="login-form-input">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Masukkan Password"
                                    style="font-size: 14px"
                                    required autocomplete="current-password" />
                </div>

                <div style="display:flex; justify-content:space-between;">
                    <div class="remember">
                        <input id="remember" type="checkbox" name="remember" value="true">
                        <label for="remember" class="checkbox-label">{{ __('Ingat Saya') }}</label>
                    </div>
                    <div>
                        @if (Route::has('password.request'))
                            <a style="margin-left: auto; color: #FF0000; text-decoration: none;" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                    <button type="submit" class="submit-button">{{ __('Masuk') }}</button>
            </form>

            <footer class="login-footer" style="margin-bottom: 40px;">
                <p class="login-p">Belum punya akun? <a href="{{ route('register') }}" style="color: #FF0000; text-decoration: none;">Daftar disini</a></p>
            </footer>
        </div>
    </body>
</x-guest-layout>
