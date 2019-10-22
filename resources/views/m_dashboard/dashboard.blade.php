@extends('layouts.m_app')

@section('head_section')
<link href="{{asset('ui/assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
<script src="{{asset('ui/assets/plugins/Chart.js/chartjs.init.js')}}"></script>
<script src="{{asset('ui/assets/plugins/Chart.js/Chart.min.js')}}"></script>
@endsection

@section('page_title','Dashboard')

@section('scripts')
<script src="{{asset('ui/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('ui/assets/plugins/morrisjs/morris.js')}}"></script>
<script src="{{asset('ui/js/morris-data.js')}}"></script>

 
@endsection


@section('main_content')
<style>
* {
  box-sizing: border-box;
}

@media only screen and (max-width: 600px) {
  
  .card_pading
  {
    padding-left: 0px;
  }
  
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  
  .card_pading
  {
    padding-left: 0px;
  }
  
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  .card_pading
  {
    padding-left:45px !important;
  }
  
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  .modal-dialog{
    max-width: 675px;
  }
  .card_pading
  {
    padding-left:45px !important;
  }
  
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  .modal-dialog{
    max-width: 675px;
  }
  .card_pading
  {
    padding-left:45px !important;
  }
  
}

#regForm {
  padding: 3% 5%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #175ade54;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #175ade;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
iframe{
  width: 100%;
  height: 100%;
}
.mollie_payment{
  margin-top: 20px;
  background-color: #175ade;
  color: white;
  border: 2px solid white;
  border-radius: 25px;
  padding: 10px 20px;
  font-size: 17px;
  cursor: pointer;
}
/*.mollie_div{
  border-top: 4px solid white;
  border-bottom: 4px solid white;
  color: white;
  background-color: #175ade;
  width: 100%;
  text-align: center;
  padding: 35px 0px;
}*/
.iframe_div{
  width: 90%;
  margin-left: 4%;
  height: 310px;
  margin-bottom: 30px;
}
.text-muted {
  color: #6d6d6d !important;
}
.step{
  display: none;
}
form input{
  padding: .375rem .75rem !important;
}
.model_head{
  text-align: center;
  display: block;
  padding: 2px 5px 10px 5px !important;
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
          <br/>
          <span>Wij zorgen ervoor dat jouw boekhouding simpel & overzichtelijk wordt.</span>

          <!-- if user does not go to Mollie -->
          @if($payment['exists'] == 0)

          <a href="{{route('molli_payment')}}">
            <button class="mollie_payment">Nu Starten</button>
          </a>
          

          @else
          <!-- if payment status is not 'paid' -->
            @if($payment['paid'] == 0)
            <p style="margin: 11px 0px -1px 0px;">De betaling is mislukt, probeer het nog eens.</p>
            <a href="{{route('molli_payment')}}">
              <button class="mollie_payment">Nu Starten</button>
            </a>
            
            @else
            <button class="mollie_payment" type="button" id="mollie_tab_btn">Starten!</button>
            @endif
          @endif
          <p style="margin-top: 20px;">Voor slechts €1 kun je onze app een week uitproberen!</p>
        </div>
        <br/>
        <span style="color: #175ade;font-size: 14px;font-weight: 400;">
          <i>Na betaling wordt jouw omgeving binnen enkele seconde geladen.</i>
        </span>
      </div>
      
      <div class="tab">
        <div class="modal-header model_head">
          <h4 class="modal-title" id="ModalLabel26">
            We gaan aan de slag voor je!
          </h4>
        </div>
        <form id="regForm" class=" form-material">
          <p style="text-align: center;">We hebben jouw API-keys nodig om jouw gegevens te laden.<br/> Bekijk in de video waar je ze vindt.</p>
          <div class="iframe_div">
            <!-- <iframe src="https://player.vimeo.com/video/184862361?autoplay=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> -->
            <iframe src="//www.youtube.com/embed/3tRw8eRHwgA?autoplay=1" frameborder="0" allowfullscreen></iframe>
          </div>
          <div style="margin-left: 20px">
            <span style="color: red;display: none;" id="error">
              De API gegevens kloppen niet.
            </span>
            <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
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
        <p style="padding: 18px 20px;">We laden jouw gegevens, dat duurt ongeveer 2 minuten,<br/>bekijk in de tussentijd hieronder hoe de webapp werkt.</p>
        <div class="iframe_div">
          <iframe src="//www.youtube.com/embed/3tRw8eRHwgA?autoplay=1" frameborder="0" allowfullscreen></iframe>
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
  @endif

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
    var recurring = $("#recurring").val();
    if(recurring < 0)
    {
      $.ajax({
        method: 'POST',
        url: '{{route("recuring_payment")}}',
        data: {"_token":"{{csrf_token()}}",recurring:recurring},
        success: function(response)
        {
          console.log(response);
        }
      });
    }
    <?php if(Auth::user()->client_id == ''){ ?>
    fixStepIndicator(0);
    <?php } ?>

     $('#MymodalPreventScript').modal({
       backdrop: 'static',
       keyboard: false
   });
    $('#MymodalPreventScript').modal('show');
    $('#mollie_tab_btn').click(function(){
      var x = document.getElementsByClassName("tab");
      x[0].style.display = "none";
      x[1].style.display = "block";
      fixStepIndicator(1);
    });

    $('#form_submit').click(function(){
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
        if(response != ''){
          var x = document.getElementsByClassName("tab");
          x[1].style.display = "none";
          x[2].style.display = "block";
          fixStepIndicator(2);
        }else{
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

