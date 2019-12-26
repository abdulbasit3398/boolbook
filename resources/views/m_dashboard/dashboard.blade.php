@extends('layouts.m_app')

@section('head_section')
<link href="{{asset('ui/assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

<!-- <script src="{{asset('ui/assets/plugins/Chart.js/chartjs.init.js')}}"></script> -->
<!-- <script src="{{asset('ui/assets/plugins/Chart.js/Chart.min.js')}}"></script> -->
@endsection

@section('page_title','Dashboard')

@section('scripts')
<script src="{{asset('ui/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('ui/assets/plugins/morrisjs/morris.js')}}"></script>
<script src="{{asset('ui/js/morris-data.js')}}"></script>
<!-- <script src="{{asset('js/progressbar.js')}}"></script> -->


@endsection


@section('main_content')
<style type="text/css">
  .mollie_payment{
    font-size: 14px;
    padding: 8px 16px;
  }
</style>
@if(Auth::user()->client_id == '')
  <div class="modal fade" id="MymodalPreventScript">
   <div class="modal-dialog">
   <div class="modal-content" style="margin-top: 20%;">
    
    <div class="modal-body" style="text-align: center;">
      
      <!-- One "tab" for each step in the form: -->
      <div class="tab">
        <div class="modal-header model_head">
          <h4 class="modal-title" id="ModalLabel26">
            Welkom bij Bolbooks
          </h4>
        </div>
        <div class="mollie_div">
          @if($payment['exists'] == 0)
            <br/>
          @else
            @if($payment['paid'] == 0)
            <div class="alert alert-danger alert-dismissible fade show" style="margin: 10px 0px 13px 0px;padding: .50rem 0.50rem;">
              De betaling is mislukt, probeer het nog eens.
            </div>
            @else
            <div class="alert alert-success alert-dismissible fade show" style="margin: 10px 0px 13px 0px;padding: .50rem 0.50rem;">
              Je betaling is gelukt
            </div>
            @endif
          @endif
          
          <h6>Wij zorgen ervoor dat jouw boekhouding simpel & overzichtelijk wordt.</h6>
          <h6>Voor slechts €1 kun je onze app een week uitproberen!</h6>

          <!-- if user does not go to Mollie -->
          @if($payment['exists'] == 0)

          <a href="{{route('molli_payment')}}">
            <button class="mollie_payment">Nu Starten</button>
          </a>
          <br/>
          <br/>
          <span style="color: #175ade;font-size: 14px;font-weight: 400;">
            <i>Na betaling wordt jouw omgeving binnen enkele seconde geladen.</i>
          </span>

          @else
          <!-- if payment status is not 'paid' -->
            @if($payment['paid'] == 0)
            <a href="{{route('molli_payment')}}">
              <button class="mollie_payment">Opnieuw proberen</button>
            </a>
            <br/>
            <br/>
            <span style="color: #175ade;font-size: 14px;font-weight: 400;">
              <i>Na betaling wordt jouw omgeving binnen enkele seconde geladen.</i>
            </span>
            @else
            <button class="mollie_payment" type="button" id="mollie_tab_btn">Volgende stap</button>
            <br/>
            <br/>
            <span style="color: #175ade;font-size: 14px;font-weight: 400;">
              <i>We gaan direct jouw omgeving laden.</i>
            </span>
            @endif
          @endif
          
        </div>
        
      </div>
      
      <div class="tab">
        <div class="modal-header model_head">
          <h4 class="modal-title" id="ModalLabel26">
            We gaan aan de slag voor je!
          </h4>
        </div>
        <form id="regForm" class=" form-material">
          <h6>We hebben jouw API-keys nodig om jouw gegevens te laden.</h6>
          <h6> Bekijk in de video waar je ze vindt.</h6>
          <div class="iframe_div">
            <!-- <iframe src="https://player.vimeo.com/video/184862361?autoplay=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> -->
            
            <iframe id="firstIframe" src="https://player.vimeo.com/video/368792771" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
          </div>
          <div style="margin-left: 20px">
            <span style="color: red;display: none;" id="error">
              
            </span>
            
            <p><input id="client_id" class="form-control" placeholder="Typ hier je Client ID" ></p>
            <p><input id="client_secret" class="form-control" placeholder="Typ hier je Secret ID"></p>
          </div>
          <br/>
          <button class="btn waves-effect waves-light btn-rounded btn-secondary" type="button" id="form_submit">Volgende!</button>
        </form>
      </div>

      <div class="tab">
        <div class="modal-header model_head" >
          <h4 class="modal-title" id="ModalLabel26">
            We zijn bijna klaar!
          </h4>
        </div>
        <h6>We laden jouw gegevens, dat duurt ongeveer 2 minuten,<h6/>
        <h6>bekijk in de tussentijd hieronder hoe de webapp werkt.</h6>
        <div class="iframe_div">

          <iframe id="secondIframe" src="https://player.vimeo.com/video/368973766" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <button class="btn waves-effect waves-light btn-rounded btn-secondary" type="button" style="display: none;"  id="refresh_page" data-dismiss="modal">Starten</button>
        <br/> <br/>
        <span style="color: #175ade;font-size: 14px;font-weight: 400;">
          Hierboven verschijnt binnen 2 minuten een knop.
        </span>
      </div>

      <div style="overflow:auto;">
        <div>
          <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
          
          <!-- <button class="btn_next" type="button" id="nextBtn" onclick="nextPrev(1)">Starten!</button> -->
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin: 15px 0px;">
        

        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </div>   
   <!-- <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
   </div> -->
   </div>                                                                       
   </div>                                          
  </div>
  @elseif(Auth::user()->client_id != '' && Auth::user()->new_user == 0 && $payment['paid'] != 0 && $payment['user_invoice'] == 0)

  <div class="modal fade" id="CallAgainApi">
   <div class="modal-dialog" style="max-width: 516px;">
   <div class="modal-content" style="margin-top: 36%;">
    
    <div class="modal-body" style="text-align: center;">
      
      <!-- One "tab" for each step in the form: -->
      
        <div class="modal-header model_head">
          <h4 class="modal-title">
            Geen gegevens, klopt dat?
          </h4>
        </div>
        <div class="mollie_div">
          <br/>
          <h6>Als je nog geen uitbetaling van bol.com hebt gehad, klik dan op sluiten. Heb je dat al wel? Klik dan op data ophalen.</h6>
          <!-- <h6>If you want to fetch data then click!</h6> -->

          <!-- if user does not go to Mollie -->
          

          <a href="#" id="fetch_data_again" data-dismiss="modal">
            <button class="mollie_payment" >Data ophalen</button>
          </a>
          <a href="#" id="new_user">
            <button class="btn waves-effect waves-light btn-rounded btn-secondary_white">Sluiten</button>
          </a>
          <br/>
          <br/>
          
        </div>
      </div>
    </div>
  </div>
  </div>
  @endif

<input type="hidden" id="user_id" value="{{Auth::user()->id}}">
<div class="row">
  <!-- Column -->
  <div class="col-lg-4 col-md-6">
      <div class="card">
          <div class="d-flex flex-row">
              <div class="p-10" style="background-color: #175ade">
                  <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
              <div class="align-self-center m-l-20">
                  <h4 class="m-b-0">€<?= number_format($dashboard['profit_before_tax'][0],2,",",".");  ?></h4>
                  <h5 class="text-muted m-b-0">Winst voor belasting</h5></div>
          </div>
      </div>
  </div>

  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-4 col-md-6">
      <div class="card">
          <div class="d-flex flex-row">
              <div class="p-10" style="background-color: #175ade">
                  <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
              <div class="align-self-center m-l-20">
                  <h4 class="m-b-0">€<?= number_format($dashboard['profit_after_tax'][0],2,",","."); ?></h4>
                  <h5 class="text-muted m-b-0">Winst na belasting</h5></div>
          </div>
      </div>
  </div>
  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-4 col-md-6">
      <div class="card">
          <div class="d-flex flex-row">
              <div class="p-10" style="background-color: #175ade">
                  <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
              <div class="align-self-center m-l-20">
                  <h4 class="m-b-0">€<?= number_format($dashboard['second_graph'][0],2,",","."); ?></h4>
                  <h5 class="text-muted m-b-0">Bol.com uitbetaling</h5></div>
          </div>
      </div>
  </div>
  <!-- Column -->
</div>
<div class="row">
  <div class="col-md-12 grid-margin">
    <!-- <div class="card" >
      <div class="card-body">
        <canvas id="line-chart" width="800" height="350"></canvas>
      </div>
    </div> -->
    <div class="card">
      <div class="card-body">
          <div class="d-flex no-block align-items-center">
              <h4 class="card-title" style="color: #34373c">Resultaatanalyse</h4>
              <div class="ml-auto">
                  <ul class="list-inline text-right">
                      <li>
                          <h6 class="m-b-0"><i style="color: #34373c" class="fa fa-circle m-r-5"></i>Winst voor belasting</h6>
                      </li>
                      <li>
                          <h6 class="m-b-0"><i style="color: #175ade" class="fa fa-circle m-r-5"></i>Winst na belasting</h6>
                      </li>
                      <li>
                          <h6 class="m-b-0"><i style="color: #adadad" class="fa fa-circle m-r-5"></i>Bol.com uitbetaling</h6>
                      </li>
                  </ul>
              </div>
          </div>
          <div id="first_graph"></div>
      </div>
    </div>
  </div>
</div>
<!-- <input type="hidden" name="recurring" id="recurring" value="{{$payment['recurring']}}"> -->
<!-- <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card" >
      <div class="card-body"  >
        <canvas id="line-chart1" width="800" height="350"></canvas>
      </div>
    </div>
  </div>
</div> -->


<script>
  $(document).ready(function(){
    $('#fetch_data_again').click(function(){
      var user_id = $("#user_id").val();
      
      var bar = new ProgressBar.Line(container, {
        strokeWidth: 4,
        easing: 'easeInOut',
        duration: 90000,
        color: '#175ade',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '100%'},
        text: {
          style: {
            // Text color.
            // Default: same as stroke color (options.color)
            color: '#ffff',
            position: 'absolute',
            right: '40%',
            top: '30px',
            padding: 0,
            margin: '25px 0px',
            transform: null,
          },
          autoStyleContainer: false
        },
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: (state, bar) => {
          bar.setText(Math.round(bar.value() * 100) + ' %');
        }

      });

      bar.animate(1.0);
      // sleep(2000);
      
      // 
      $.ajax({
        method: 'POST',
        url: '{{route("fetch_data_again")}}',
        data: {"_token":"{{csrf_token()}}",user_id:user_id},
        beforeSend: function(){
          document.getElementById("overlay").style.display = "block";
        },
        success: function(response)
        {
          location.reload();
        },
        error: function(){
          // location.reload();
        }
      });
    });
    $('#new_user').click(function(){
      var user_id = $("#user_id").val();
      var new_user = 1;
      $.ajax({
        method: 'POST',
        url: '{{route("fetch_data_again")}}',
        data: {"_token":"{{csrf_token()}}",new_user:new_user,user_id:user_id},
        async: false,
        success: function(response)
        {
          $('#CallAgainApi').modal('toggle');
        }
      });
    });
    // var recurring = $("#recurring").val();
    // if(recurring < 0)
    // {
    //   $.ajax({
    //     method: 'POST',
    //     url: '{{route("recuring_payment")}}',
    //     data: {"_token":"{{csrf_token()}}",recurring:recurring},
    //     success: function(response)
    //     {
    //       console.log(response);
    //     }
    //   });
    // }
    <?php if(Auth::user()->client_id == ''){ ?>
    fixStepIndicator(0);
    <?php } ?>

     $('#MymodalPreventScript').modal({
       backdrop: 'static',
       keyboard: false
   });
    $('#MymodalPreventScript').modal('show');
    $('#CallAgainApi').modal('show');
    $('#mollie_tab_btn').click(function(){
      var x = document.getElementsByClassName("tab");
      x[0].style.display = "none";
      x[1].style.display = "block";
      $('#firstIframe').attr('src','https://player.vimeo.com/video/368792771?autoplay=1&autopause=0');
      fixStepIndicator(1);
    });

    $('#form_submit').click(function(){
      $("#error").html('');
      $("#error").hide();
      var x = y = not_valid = 0;
      x = document.getElementsByClassName("tab");
      y = x[1].getElementsByTagName("input");
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          not_valid = 1;
        }
      }

      if(not_valid == 0)
      {
        var client_id = $("#client_id").val();
        var client_secret = $("#client_secret").val();
        check_client_credentials(client_id,client_secret);
        setTimeout(function() { first_user_data(); }, 5000);
      }
    });

    $("#refresh_page").click(function(){
      location.reload();
    });
  });
  function check_client_credentials(client_id,client_secret)
  {
    $.ajax({
      method: 'POST',
      url: '{{route("check_client_credentials")}}',
      data: {"_token":"{{csrf_token()}}",client_id:client_id,client_secret,client_secret},
      async: false,
      success: function(response)
      {
        console.log(response[0]);
        if(response[0] == 2){
          $("#error").html("These credentials are already registered.");
          $("#error").show();
          
        }else if(response[0] == 1){
          var x = document.getElementsByClassName("tab");
          x[1].style.display = "none";
          x[2].style.display = "block";
          $('#secondIframe').attr('src','https://player.vimeo.com/video/368973766?autoplay=1&autopause=0');
          fixStepIndicator(2);
        }else if(response[0] == 0){
          $("#error").html("De API gegevens kloppen niet.");
          $("#error").show();
        }
      }
    });
  }
  function first_user_data()
  {
    var user_id = $("#user_id").val();
    $.ajax({
      method: 'POST',
      url: '{{route("first_user_data")}}',
      data: {"_token":"{{csrf_token()}}",user_id:user_id},
      async: false,
      success: function(response)
      {
        console.log(response);
        $("#refresh_page").show();
      }
    });
  }
    $(function () {
    "use strict";
    Morris.Area({
        element: 'first_graph',
        data: [
        <?php for($i = count($dashboard['month'])-1; $i >-1; $i--) { ?>

          {
              period: <?= '"'.$dashboard['month'][$i].'"'; ?>,
              profit_before_tax: <?= $dashboard['profit_before_tax'][$i]; ?>,
              profit_after_tax: <?= $dashboard['profit_after_tax'][$i]; ?>,
              payouts: <?= $dashboard['second_graph'][$i]; ?>,
          },

        <?php } ?>

        ],
        xkey: 'period',
        ykeys: ['profit_before_tax', 'profit_after_tax','payouts'],
        labels: ['Winst voor belasting', 'Winst na belasting','Bol.com uitbetaling'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#34373c', '#175ade','#adadad'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#34373c', '#175ade','#adadad'],
        resize: true
        
    });
  });
    <?php if(Auth::user()->client_id == ''){ ?>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    <?php } ?>

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:

      // if (n == (x.length - 1)) {
      //   document.getElementById("nextBtn").innerHTML = "Submit";
      // } else {
      //   document.getElementById("nextBtn").innerHTML = "Next";
      // }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
      if(n == 1)
      {
        x[0].className += " active";
      }
      if(n == 2)
      {
        x[0].className += " active";
        x[1].className += " active";
      }
    }
  </script>


@endsection

