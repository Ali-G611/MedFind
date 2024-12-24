<x-master>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div style="margin: 10vh" class="card mt-5">
                    <div style="font-size: large;color: white;display:flex;justify-content: center" class="card-header text-center">{{ __('Login') }}</div>
    
                    <div class="card-body" style="display: flex;justify-content: center;flex">
                        <form method="POST" action="{{ route('login.user') }}">
                            @csrf
    
                            <div style="margin:2rem;" class="form-group" >
                                <label style="font-size: large;color: white;display:block" for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback" style="color:red;font-size: small;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group" style="margin:2rem;">
                                <label style="font-size: large;color: white;display:block" for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback" style="color:red;font-size: small;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group form-check" style="margin:2rem;">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label style="font-size: large;color: white;display:block" class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
    
                            <div class="form-group" style="margin:2rem;">
                                <button style="font-size: large" type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
    
                            <div class="form-group text-center" style="margin:2rem;font-size: large">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <a href="{{route('register')}}" style="font-size: medium;color: rgb(189, 64, 189)">
                                Dont Have An Account?
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>