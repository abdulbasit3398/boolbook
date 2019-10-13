@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    h4{
      font-size: 16px;
    }
  }

  /* Small devices (portrait tablets and large phones, 600px and up)  */
  @media only screen and (min-width: 600px) {
    h4{
      font-size: 16px;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    h4{
      font-size: 16px;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    h4{
      font-size: 16px;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    h4{
      font-size: 16px;
    }
  }
  .card-title{
    font-weight: 500;
  }
  .card{
    padding: 0px 25px;
  }
  .col-md-6{
    padding: 5px 35px;
  }
  a{
    color: black;
    text-decoration: none;
    background-color: transparent;
  }
  a:hover .card{
    border: 1px solid #175ade;
    color: #175ade;
    text-decoration: none;
    /*background-color: transparent;*/
  }
</style>

<div class="row">
  <div class="col-md-6">
    <a href="{{route('affiliate_program')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            Affiliate Programma
          </div>
          Verdien geld met het doorverwijzen van nieuwe gebruikers naar Bolbooks.
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-6">
    <a href="{{route('edit_profile')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            Bewerk Profiel
          </div>
          Bewerk de gegevens die we op jouw factuur weergeven.
        </div>
      </div>
    </a>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <a href="{{route('manage_subscription')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            Beheer Abonnement
          </div>
          Bekijk, wijzig en beëindig je abonnement via deze pagina.
        </div>
      </div>
    </a>
  </div>
  <div class="col-md-6">
    <a href="{{route('view_invoice')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            Bekijk Facturen
          </div>
          Bekijk en download de facturen van de afgelopen betalingen.
        </div>
      </div>
    </a>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <a href="{{route('bol_account_detail')}}">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            Bekijk Bol Details
          </div>
          Bekijk met welke API jouw account is verbonden.
        </div>
      </div>
    </a>
  </div>

</div>

@endsection

