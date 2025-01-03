<x-master>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5" style="margin: 10vh;">
                    <div class="card-header text-center" style="font-size: large; background-color: var(--sec-bg-color); color: white;">
                        {{ __('Login') }}
                    </div>
                    <div class="card-body" style="background-color: var(--add-color);">
                        <form method="POST" action="{{ route('login.user') }}">
                            @csrf
                            @method('POST')

                            <div class="form-group" style="margin: 2rem;">
                                <label for="email" style="font-size: large; color: white;">{{ __('E-Mail Address') }}</label>
                                <input style="font-size: medium" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback" style="color:red; font-size: small;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group" style="margin: 2rem;">
                                <label for="password" style="font-size: large; color: white;">{{ __('Password') }}</label>
                                <input style="font-size: medium" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required/>
                                @error('password')
                                    <div class="invalid-feedback" style="color:red; font-size: small;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group" style="margin: 2rem;">
                                <button type="submit" class="btn btn-primary btn-block" style="font-size: large;">
                                    Login
                                </button>
                            </div>
                            <a href="{{ route('register') }}" style="font-size: larger; color: rgb(189, 64, 189);">
                                Don't Have An Account?
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>