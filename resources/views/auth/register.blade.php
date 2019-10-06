@extends('layouts.app1')
<link href="{{asset('assets/fontawesome/css/all.css')}}" rel="stylesheet">
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
<style type="text/css">

  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    .span_euro{
      text-transform: none;
      padding: 7px 30px 7px 30px;
      border: 1px solid;
      font-size: 37px;
      background-color: white;
      color: #175ADF;
      border-radius: 22px;
    }
  }

  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 600px) {
    .span_euro{
      text-transform: none;
      padding: 7px 30px 7px 30px;
      border: 1px solid;
      font-size: 37px;
      background-color: white;
      color: #175ADF;
      border-radius: 22px;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    .span_euro{
      text-transform: none;
      padding: 7px 30px 7px 30px;
      border: 1px solid;
      font-size: 37px;
      background-color: white;
      color: #175ADF;
      border-radius: 22px;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    .span_euro{
      text-transform: none;
      padding: 7px 48px 7px 58px;
      border: 1px solid;
      font-size: 37px;
      background-color: white;
      color: #175ADF;
      border-radius: 22px;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    .span_euro{
      text-transform: none;
      padding: 7px 48px 7px 58px;
      border: 1px solid;
      font-size: 37px;
      background-color: white;
      color: #175ADF;
      border-radius: 22px;
    }
  }
  body {
    background-color: white !important;
    letter-spacing: 1px;
  }
  .heading{
    color: white;
    font-weight: 600
  }
  .form-group {
    margin-bottom: -1.5px !important;
  }
  input{
    box-shadow: 3px 3px #2125295c !important;
    border-radius: 8px !important;
  }
  .btn{
    color: #175ADF !important;
    box-shadow: 3px 3px #2125295c !important;
    border-radius: 8px !important;
    font-weight: 800 !important;
    font-size: larger !important;
  }
  .vr {
    width:1px;
    background-color:#000;
    position:absolute;
    top:0;
    bottom:0;
    left:150px;
  }
  .form-radio.form-radio-flat label input:checked + .input-helper:before
  {
    background: white;
    border-color: white;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
  }
  .form-radio.form-radio-flat label input:checked + .input-helper:after
  {
    width: 20px;
    height: 20px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    left: -2px;
    color: #175ADF;
    background: none;
    content: '\F12C';
    font-family: Material Design Icons;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
  }
  .invalid-feedback{
    display: block !important;
    color: #ffaf00 !important;
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
  <div class="row justify-content-center" style="box-shadow: 3px 2px #2125295c !important;border-radius: 8px;background-color: rgb(26, 83, 255);padding: 30px 0px 30px 0px;">
    <div class="col-md-6" style="border-radius: 10px 0px 0px 10px;padding: 35px 30px 20px 60px;border-right: 1px solid white;">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
              <div class="col-md-12">
                <h3 class="heading">Maak je account aan</h3>
                <span style="color: white;text-transform: none;padding: 0px">
                Begin vandaag nog met tijd besparen via Bolbooks
                </span>
              </div>
            </div>
            <br/>
            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="margin-right: 7px;" placeholder="Voornaam">

                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Achternaam">

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Emailadres">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="margin-right: 7px;" placeholder="Wachtwoord">

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Herhaal wachtwoord">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <br/>
            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name" value="{{ old('street_name') }}" required autocomplete="street_name" autofocus style="margin-right: 7px;" placeholder="Straatnaam">
                @error('street_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="house_no" type="text" class="form-control @error('house_no') is-invalid @enderror" name="house_no" value="{{ old('house_no') }}" required autocomplete="house_no" autofocus placeholder="Huisnummer">

                @error('house_no')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" required autocomplete="post_code" autofocus style="margin-right: 7px;" placeholder="Postcode">
                @error('post_code')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus placeholder="Woonplaats">

                @error('residence')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <br/>
            <div class="form-group row">
              <div class="col-md-12">
                <div class="form-radio form-radio-flat" style="color: white">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="agrement" id="agrement" value="true">
                    Ik ga akkoord met de algemene voorwaarden & de privacyverklaring.
                    <i class="input-helper"></i></label>
                </div>
                @error('agrement')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          <br/>
            <div class="form-group row mb-0">
              <div class="col-md-12">
                <button type="submit" class="btn btn-light btn-block">
                  {{ __('Account maken') }}
                </button>
              </div>
            </div>
          </form>

    </div>
    <div class="col-md-6" style="padding: 0px;color: white;padding: 35px 30px 20px 60px;">
    
          <!-- <div class="vr">&nbsp;</div> -->
          <form method="POST" action="{{ route('register') }}" style="margin-top: 3px;">
            @csrf
            <div class="form-group row">
              <div class="col-md-12">
                <h3 class="heading">Wat is ingebegrepen?</h3>
                <span style="text-transform: none;padding: 0px">
                Deze voordelen ga jij vanaf vandaag ervaren!
                </span>
              </div>
            </div>
            <br/>
            <div class="form-group row">
              <div class="col-md-12">
                <div class="form-radio form-radio-flat">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="flatRadios1" id="flatRadios1" value="option2" checked>
                    Alle gegevens direct uit je Bol account ophalen.
                    <i class="input-helper"></i></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <div class="form-radio form-radio-flat">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="flatRadios2" id="flatRadios2" value="option2" checked>
                    Duidelijk maandelijks overzicht van winst of verlies.
                    <i class="input-helper"></i></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <div class="form-radio form-radio-flat">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="flatRadios3" id="flatRadios3" value="option2" checked>
                    Per kwartaal de BTW-aangifte direct klaar.
                    <i class="input-helper"></i></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <div class="form-radio form-radio-flat">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="flatRadios4" id="flatRadios4" value="option2" checked>
                    Persoonlijke boekhoudsupport voor al je vragen.
                    <i class="input-helper"></i></label>
                </div>
              </div>
            </div>
            <br/>
            <div class="form-group row">
              <div class="col-md-12">
                <h3 class="heading">Wat ga ik betalen?</h3>
                <span style="text-transform: none;padding: 0px">
                De eerste week kun je ons uittesten voor slechts:
                </span>
              </div>
            </div>
            <br/>
            <div class="form-group row">
              <div class="col-md-12" style="padding-left: 15%;">
                <span class="span_euro">
                  € 1,-
                  <span style="text-transform: none; padding: 0px">incl. btw</span>
                </span>
              </div>
            </div>
            <br/>
            <div class="form-group row">
              <div class="col-md-12">
                <span style="text-transform: none; padding: 0px">Hierna betaal je een bedrag gebaseerd op jouw omzet.</span>
              </div>
            </div>
          </form>
    </div>
  </div>
</div>
@endsection
