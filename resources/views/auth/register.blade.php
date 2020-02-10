@extends('layouts.app')

@section('content')





                <h1 class="text-center">Treapへようこそ</h1>
<div class="main">

<p class="sign text-center">Register</p>


                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- <div class="form-group row"> -->
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->
                            <div class="form-group row">
                            <!-- <div class="col-md-6"> -->
                                <input id="name" type="text" placeholder="Name" class="un form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div>
                        </div> -->

                        <!-- 追記 -->
                          <input id="identification_id" type="hidden" class="" name="identification_id" value="{{ uniqid() }}" required>
                          <!-- end -->

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                                <input id="email" type="email" class="un form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->


                                <input id="password" type="password" class="un form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->


                                <input id="password-confirm" type="password" class="un form-control" name="password_confirmation" placeholder="ConfirmPassword" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">

                                <button type="submit" class="submit text-center btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                        </div>
                    </form>


</div>
@endsection
