@extends('layouts.app1')
<style type="text/css">
  body {
    background-color: white !important;
  }
</style>
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3" style="text-align: center;">
      <img src="{{asset('images/logo.gif')}}" style="width: 150px;">
    </div>
  </div>
  <br/>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card" style="background-color: rgb(26, 83, 255);border-radius: 10px;">
        <!-- <div class="card-header">{{ __('Login') }}</div> -->
        <div class="row" style="margin-top: 20px;">
          <div class="col-md-2"></div>
          <div class="col-md-8" style="text-align: center;">
            <h3 style="color: white;font-weight: 600">Inloggen</h3>
            <span style="text-transform: none;color: white">Welkom terug! Log hier in met je account.</span>
          </div>
          <div class="col-md-2"></div>
          
        </div>
        <div class="card-body">
          <div class="container col-md-8">
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group row">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" placeholder="Emailadres" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group row">
                <input id="password" type="password"class="form-control @error('password') is-invalid @enderror" placeholder="Wachtwoord" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <input type="submit" value="Inloggen" style="background-color: white; color: rgb(26, 83, 255);border-radius: 10px;padding: 9px 20px">
                </div>
                <div class="col-md-6" style="padding-top: 6px;"> 
                    @if (Route::has('password.request'))
                    <div style="border: 1px solid white;border-radius: 10px;text-align: center;padding: 9px 3px">
                    <a  href="{{ route('password.request') }}" style="border-radius: 10px;background-color: rgb(26, 83, 255);color: white">
                      <span style="padding: 0px;text-transform: none">{{ __('Password Forgotten?') }}</span>
                      
                      <!-- <button class="btn btn-primary" >
                        
                      </button> -->
                    </a>
                  </div>
                    @endif
                </div>
                

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
