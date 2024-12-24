<x-master>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div style="margin: 10vh" class="card mt-5">
                    <div style="font-size: large;color: white;display:flex;justify-content: center" class="card-header text-center">Register</div>
    
                    <div class="card-body" style="display: flex;justify-content: center;flex">
                        <form method="POST" action="{{ route('register.user') }}">
                            @csrf
    
                            <div style="margin:2rem;" class="form-group" >
                                <label style="font-size: large;color: white;display:block" for="name">Name</label>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback" style="color:red;font-size: small;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div style="margin:2rem;" class="form-group" >
                                <label style="font-size: large;color: white;display:block" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  autofocus>
                                @error('email')
                                    <div class="invalid-feedback" style="color:red;font-size: small;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group" style="margin:2rem;">
                                <label style="font-size: large;color: white;display:block" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback" style="color:red;font-size: small;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group" style="margin:2rem;">
                                <button  type="submit" class="btn btn-primary btn-block">
                                    Sign in
                                </button>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>