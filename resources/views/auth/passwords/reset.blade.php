@include('include.m_head')

<style type="text/css">
  body {
    background-color: #fbfcfc !important;
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
  .form-control{
    font-size: 14px !important;
  }
  .form_container{
    display: table;
    height: 90%;
    text-align: -webkit-center;
  }
  .form_div{
    display: table-cell;
    vertical-align: middle;
  }
</style>

<div class="container" style="height: 10%">
  <div class="row justify-content-center">
    <div class="col-md-3 align_center">
      <img src="{{asset('images/logo.png')}}" style="width: 150px;margin-top: 40px">
    </div>
  </div>
</div>

<div class="container form_container">
  
  <br/>
  <div class="row justify-content-center form_div">
    <div class="col-md-7">
      <div class="card">

        <div class="card-body">
          <div class="row card_head align_center">
            <div class="col-md-12" style="padding-top: 8px">
              <h5 style="color: black">{{ __('Wachtwoord opnieuw instellen') }}</h5>
            </div>

          </div>
          <div class="col-12" style="margin-top: 50px;">
            <form class="form-material" method="POST" action="{{ route('password.update') }}">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Emailadres" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Wachtwoord">
                
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Herhaal wachtwoord" required autocomplete="new-password">
                
              </div>
              <div class="form-group align_center">
                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-secondary">
                  {{ __('Bevestigen') }}
                </button>


              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('include.m_scripts')