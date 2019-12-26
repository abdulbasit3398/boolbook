@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    #secondIframe{
      width: 100%;
      height: 300px;
    }
    h4{
      font-size: 16px;
    }
  }

  /* Small devices (portrait tablets and large phones, 600px and up)  */
  @media only screen and (min-width: 600px) {
    #secondIframe{
      width: 100%;
      height: 300px;
    }
    h4{
      font-size: 16px;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    #secondIframe{
      width: 100%;
      height: 500px;
    }
    h4{
      font-size: 16px;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    #secondIframe{
      width: 100%;
      height: 500px;
    }
    h4{
      font-size: 16px;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    #secondIframe{
      width: 100%;
      height: 500px;
    }
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
  <div class="col-md-12">
    <a href="https://help.bolbooks.nl/" target="blank">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            Naar de hulp-artikelen
          </div>
          Less onze hulp-artikelen om over elk onderwerp de informatie te vinden die jij zoekt!
        </div>
      </div>
    </a>
  </div>
</div>



<div class="row" style="color: black;">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          Bekijk de uitleg-video
        </div>
        Om nog eens goed te bekijken hoe Bolbooks precies werkt.
        <br/>
        <br/>
        <div class="iframe_div">

          <iframe id="secondIframe" src="https://player.vimeo.com/video/368973766" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
            
          </iframe>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

