@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email')
                                is-invalid @enderror" name="email" value="{{ old('email') ?? 'admin@admin.com'}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password')
                                is-invalid @enderror" name="password" required autocomplete="current-password" value="123">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @foreach(App\Http\Controllers\Providers::getProviders() as $item => $provider)

                            <div style="margin-bottom: 15px">
                                <a href="{{ route('social-providers.redirect', $provider['provider']) }}" style="text-decoration: none;">
                                    <img src={{ asset($provider['image']) }} width="50" alt={{ $provider['provider'] }}>
                                </a>
                                <span style="margin-left: 30px">Войти через {{ $provider['text'] }}.</span>
                            </div>

                        @endforeach

                        {{--<div style="margin-bottom: 15px">
                            <a href="{{ route('social-providers.redirect', 'vkontakte') }}" style="text-decoration: none;">
                                <img src="{{ asset('assets/images/vk.png') }}" width="50" alt="Vkontakte">
                            </a>
                            <span style="margin-left: 30px">Войти через "Вконтакте".</span>
                        </div>

                        <div style="margin-bottom: 15px">
                            <a href="{{ route('social-providers.redirect', 'github') }}" style="text-decoration: none;">
                                <img src="{{ asset('assets/images/github.png') }}" width="50" alt="Github">
                            </a>
                            <span style="margin-left: 30px">Войти через "Github".</span>
                        </div>--}}
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
