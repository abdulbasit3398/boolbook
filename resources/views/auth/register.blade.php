@include('include.m_head')

<style type="text/css">

  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
  .footer_text{
    color: #175ade;
    font-size: 13px;
    font-weight: 500;
  }

  }

  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 600px) {
  .footer_text{
    color: #175ade;
    font-size: 13px;
    font-weight: 500;
  }

  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
  .footer_text{
    color: #175ade;
    font-size: 13px;
    font-weight: 500;
  }

  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
  .footer_text{
    color: #175ade;
    font-size: 10px;
    font-weight: 500;
  }

  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
  .footer_text{
    color: #175ade;
    font-size: 12px;
    font-weight: 500;
  }

  }
  body {
    background-color: #fbfcfc !important;
    letter-spacing: 1px;
  }
  .btn-secondary, .btn-secondary.disabled{
    background: #175ade !important;
    border: 1px solid #175ade !important;
    color: white;
  }
  .btn-secondary_white{
    background: white !important;
    border: 1px solid #175ade !important;
    color: #175ade;
  }
  .btn-secondary_white:hover{
    background: #175ade !important;
    border: 1px solid #175ade !important;
    color: white;
  }
  .card_head{
    border-bottom: 1px solid gainsboro;
    padding-left: 13px;
    padding-bottom: 8px;
    margin-bottom: 15px;
  }
  .custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: grey;
    background-color: grey;
  }
  .custom-checkbox .custom-control-label::before {
    border-radius: 1.25rem;
  }
  .form-control{
    font-size: 14px !important;
  }
  .checkbox_label{
    font-size: 14px !important;
    padding-left: 35px !important;
  }
  .form_container{
    display: table;
    height: 85%;
    text-align: -webkit-center;
  }
  .form_div{
    display: table-cell;
    vertical-align: middle;
  }
  .invalid-feedback1{
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
  }
  .blue_link{
    color: #175ade;
  }
  .blue_link:hover{
    color: #175ade;
  }
</style>

<div class="container" style="height: 15%">
  <div class="row justify-content-center">
    <div class="col-md-3 align_center">
      <img src="{{asset('images/logo.png')}}" style="width: 150px;margin-top: 40px">
    </div>
  </div>
</div>

<div class="container form_container">
  
  <div class="row justify-content-center form_div">
    <div class="col-md-10">
     <div class="card">
       <div class="card-body">
        <div class="row card_head align_center">
          <div class="col-md-12" style="padding-top: 8px">
            <h5 style="color: black;">Maak je account aan.</h5>
          </div>

        </div>
         <div class="col-12">
           <form method="POST" class="form-material" action="{{ route('register') }}">
            @csrf
            <br/>
            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="margin-right: 10%;" placeholder="Voornaam">

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="
                @if(isset($subscribed_user_mail))
                  {{$subscribed_user_mail}}
                @else
                  {{ old('email') }}
                @endif
                " required autocomplete="email" placeholder="Emailadres">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="margin-right: 10%;" placeholder="Wachtwoord">

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Herhaal wachtwoord">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-12" style="display: flex;">
                <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name" value="{{ old('street_name') }}" required autocomplete="street_name" autofocus style="margin-right: 10%;" placeholder="Straatnaam">
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
                <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" required autocomplete="post_code" autofocus style="margin-right: 10%;" placeholder="Postcode">
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
            <div class="form-group" style="overflow: inherit">
              <div class="align_center" style="height: 42px;">
                <!-- <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-label">Check this custom checkbox</span>
                </label> -->
                
                <input type="checkbox" id="md_checkbox_18" class="chk-col-blue-grey" value="true" name="agrement">
                <label class="checkbox_label" for="md_checkbox_18">
                Ik ga akkoord met de <a class="blue_link" href="https://bolbooks.nl/algemene-voorwaarden">algemene voorwaarden</a> & de  
                <a class="blue_link" href="https://bolbooks.nl/privacy-disclaimer">privacyverklaring</a>.
                </label>
                <!-- <div class="form-radio form-radio-flat">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="agrement" id="agrement" value="true">
                    
                    <i class="input-helper"></i></label>
                  </div> -->
                  <br/>
                  @error('agrement')
                  <span class="invalid-feedback1" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-0 align_center">
                <div class="col-md-12">
                  <button type="submit" class="btn waves-effect waves-light btn-rounded btn-secondary">
                    {{ __('Account maken') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
          <br/>
          <div class="row" style="border-top: 1px solid gainsboro;padding: 26px 0px 7px 0px">
            <br/>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <span class="footer_text"><i class="mdi mdi-trophy-variant"></i>&nbsp;1 WEEK VOOR €1 UITPROBEREN.</span>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <span class="footer_text"><i class="mdi mdi-trophy-variant"></i>&nbsp;DIRECT TOEGANG TOT JE ACCOUNT.</span>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <span class="footer_text"><i class="mdi mdi-trophy-variant"></i>&nbsp;GELD EN TIJD BESPAREN.</span>
            </div>
          </div>
        </div><!-- card-body -->

      </div><!-- card -->
    </div>

  </div>
</div>

@include('include.m_scripts')
