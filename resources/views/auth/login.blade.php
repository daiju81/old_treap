@extends('layouts.app')

@section('content')

<h1 class="text-center">Treapへようこそ</h1>

<div class="main">
<p class="sign text-center">Sign in</p>

                    <form class="form1" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                                <input id="email"placeholder="email" type="email" class="un form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                                <input id="password" type="password" class="aa un form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>










                        <div class="form-group row mb-0">
                                <button type="submit" class="submit text-center btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                        </div>
                    </form>










<p class="forgot text-center"><a href="#">Forgot Password?</a></p>
</form>

</div>



@endsection
