@extends('layouts.app')


@section('main_content')
<style>
* {
  box-sizing: border-box;
}

@media only screen and (max-width: 600px) {
  .pencil{
    width: 14px;
    margin-left: 5px;
  }
  .modal-content{
    padding:35px 0px 0px 0px;
    text-align: center;
  }
  .card_pading
  {
    padding-left: 0px;
  }
  .outer_row{
    font-size: small;
  }
  .form_value{
    font-size: small;
    font-weight: 500;
    float: right;
  }
  .form_total1{
    font-size: small;
    font-weight: 600;
  }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  .pencil{
    width: 14px;
    margin-left: 5px;
  }
  .modal-content{
    padding:35px 0px 0px 0px;
    text-align: center;
  }
  .card_pading
  {
    padding-left: 0px;
  }
  .outer_row
  {
    font-size: small;
  }
  .form_value{
    font-size: small;
    font-weight: 500;
    float: right;
  }
  .form_total1{
    font-size: small;
    font-weight: 600;
  }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  .pencil{
    width: 18px;
    margin-left: 10px;
  }
  .modal-content{
    padding:35px 0px 0px 0px;
    text-align: center;
  }
  .card_pading
  {
    padding-left:45px !important;
  }
  .outer_row{
    font-size: large;
  }
  .form_total1{
    margin-bottom: 10px;
    font-size: 17px;
    font-weight: 600;
  }
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  .pencil{
    width: 18px;
    margin-left: 10px;
  }
  .modal-content{
    padding:35px 0px 0px 0px;
    text-align: center;
    width: 660px;
  }
  .card_pading
  {
    padding-left:45px !important;
  }
  .outer_row{
    font-size: large;
  }
  .form_total1{
    margin-bottom: 10px;
    font-size: 17px;
    font-weight: 600;
  }
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  .pencil{
    width: 18px;
    margin-left: 10px;
  }
  .modal-content{
    padding:35px 0px 0px 0px;
    text-align: center;
    width: 660px;
  }
  .card_pading
  {
    padding-left:45px !important;
  }
  .outer_row{
    font-size: large;
  }
  .form_total1{
    margin-bottom: 10px;
    font-size: 17px;
    font-weight: 600;
  }
}
.blue_div{
  background-color: blue;
  width: 208px;
  height: 40px;
  color: white;
  padding-left: 25px;
  padding-top: 6px;
  font-size: unset;
  margin-bottom: 20px;
}
.edit_field{
  border-radius: 10px;
  background-color: blue;
  border: 1px solid blue;
  color: white;
  font-size: 16px;
  font-weight: 500;
}
.btn-save{
  border: 3px solid blue;
  border-radius: 25px;
  color: blue;
  font-size: 16px;
  font-weight: 500;
  padding: 10px 26px;
}
.edit_field::placeholder{
  color: white;
}
.form-control:focus
{
  color: white;
  background-color: blue;
}
.btn-save:hover{
  color: white;
  background-color: blue;
}

#regForm {
  padding: 3% 5%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 7px 18px;
  border-radius: 10px;
  background-color: #175ade;
  border: 1px solid #175ade;
  width: 97%;
  color: white;
  font-size: 16px;
  font-weight: 500;
}
input::placeholder{
  color: white;
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
.modal-body{
  padding: 0px !important;
}
/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
iframe{
  width: 100%;
  height: 100%;
}
.btn_next{
  margin-top: 30px;
  background-color: white;
  color: #175ade;
  border: 2px solid #175ade;
  border-radius: 25px;
  padding: 10px 20px;
  font-size: 17px;
  cursor: pointer;
}
.btn_next:hover{
  background-color: #175ade;
  color: white;
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
.mollie_div{
  border-top: 4px solid white;
  border-bottom: 4px solid white;
  color: white;
  background-color: #175ade;
  width: 100%;
  text-align: center;
  padding: 35px 0px;
}
.iframe_div{
  width: 90%;
  margin-left: 4%;
  height: 310px;
  border: 2px solid blue;
  margin-bottom: 30px;
}
</style>
<div class="row">
 <!-- <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!

    <ul class="list-group mt-3">
        <li class="list-group-item">Username: {{ Auth::user()->username }}</li>
        <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
        <li class="list-group-item">Referral link: {{ Auth::user()->referral_link }}</li>
        <li class="list-group-item">Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</li>
        <li class="list-group-item">Refferal count: {{ count(Auth::user()->referrals)  ?? '0' }}</li>
    </ul>
</div> -->
  @if(Auth::user()->client_id == '')
  <div class="modal fade" id="MymodalPreventScript">
   <div class="modal-dialog">
   <div class="modal-content">

   <div class="modal-body">
     
      <!-- One "tab" for each step in the form: -->
      <div class="tab">
        <h3 style="color: blue"><b>WELKOM BIJ BOLBOOKS</b></h3>
        <p><b>Het boekhoudprogramma dat de boekhouding voor bol.com-verkopers <br/>extreem simpel maakt!</b></p>
        <div style="width: 100%;height: 13px;background-color: #175ade"></div>
        <div class="mollie_div">
          <h4>TEST ONS EEN WEEK UIT VOOR SLECHTS €1!</h4>
          
          <!-- if user does not go to Mollie -->
          @if($payment['exists'] == 0)
          <p style="color: white">Ervaar het gemak van Bolbooks en kies zelf.</p>
          <a href="{{route('molli_payment')}}">
            <button class="mollie_payment">Nu beginnen</button>
          </a>
          @else
          <!-- if payment status is not 'paid' -->
            @if($payment['paid'] == 0)
            <p style="color: white">Payment unsuccessful. Try again.</p>
            <a href="{{route('molli_payment')}}">
              <button class="mollie_payment">Nu beginnen</button>
            </a>
            @else
            <button class="mollie_payment" type="button" id="mollie_tab_btn">Starten!</button>
            @endif
          @endif
        </div>
        <div style="width: 100%;height: 13px;background-color: #175ade"></div>
        <br/>
        <p style="color: #175ade"><b>Na betaling wordt jouw omgeving binnen enkele seconde geladen.</b></p>
      </div>
      
      <div class="tab">
        <form id="regForm">
          <h3 style="color: blue"><b>WE GAAN VOOR JOU AAN DE SLAG!</b></h3>
          <p><b>We hebben jouw API-keys nodig om jouw gegevens te laden. Bekijk in de video waar je ze vindt en vul ze hieronder in.</b></p>
          <div class="iframe_div">
            <iframe src="https://player.vimeo.com/video/184862361?autoplay=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            <!-- <iframe src="//www.youtube.com/embed/3tRw8eRHwgA?autoplay=1" frameborder="0" allowfullscreen></iframe> -->
          </div>
          <span style="color: red;display: none;" id="error">
            Credentials are not valid.
          </span>
          <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
          <p><input id="client_id" placeholder="Vul hier je Client ID in" oninput="this.className = ''" ></p>
          <p><input id="client_secret" placeholder="Vul hier je Secret ID in" oninput="this.className = ''"></p>
          <button class="btn_next" type="button" id="form_submit">Volgende!</button>
        </form>
      </div>
      <div class="tab">
        <h3 style="color: blue"><b>JE BENT KLAAR OM TE BEGINNEN!</b></h3>
        <p style="padding: 0px 20px;"><b>Bekijk terwiji jouw gegevens worden ingeladen hoe onze webapp werkt in de video hieronder om m zo goed mogelijk te gebruiken.</b></p>
        <div class="iframe_div">
          <iframe src="//www.youtube.com/embed/3tRw8eRHwgA?autoplay=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <button class="btn_next" type="button" style="display: none;" id="refresh_page" data-dismiss="modal">Starten!</button>
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
  <!-- <div class="col-md-4 grid-margin">
    <div class="card" >
      <div class="card-body">
        <div>
          <h2 style="color: blue"><b>TODAY</b></h2>
          <span class="text-muted"><small>24 april</small></span>
        </div>
        <br/>
        <div>
          <h4 style="color: blue"><b>SALES</b></h4>
          <span><b>121 sales so far</b></span>
        </div>
        <br/>
        <div>
          <h4 style="color: blue"><b>REVENUE</b></h4>
          <span><b>56.21 so far</b></span>
        </div>
        <br/>
        <div>
          <h4 style="color: blue"><b>RELATIVE</b></h4>
          <span><b>56.21 so far</b></span>
        </div>
        <br/>
        <br/>
      </div>
    </div>
  </div> -->
  <div class="col-md-12 grid-margin">
    <div class="card" >
      <div class="card-body"  >
        <canvas id="line-chart" width="800" height="350"></canvas>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card" >
      <div class="card-body"  >
        <canvas id="line-chart1" width="800" height="350"></canvas>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="recurring" value="{{$payment['recurring']}}">
<style type="text/css">
    .th1
    {
        color: blue !important;
    }
</style>
<!-- <div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card" >
      <div class="card-body" style="height: 300px;overflow: auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="th1">EAN</th>
                    <th class="th1">PRODUCT NAME</th>
                    <th class="th1">AMOUNT</th>
                    <th class="th1">REVENUE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
                <tr>
                    <td>7440830185127</td>
                    <td>Bluetooth In-ear Draadloze Oordopjes Z-71/ Headset</td>
                    <td>20</td>
                    <td>$600</td>
                </tr>
            </tbody>
        </table>
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
  new Chart(document.getElementById("line-chart"), {
      type: 'line',
      data: {
        labels: [
              <?php for($i = count($dashboard['month_name'])-1; $i >-1; $i--) { ?>
              <?= '"'.$dashboard['month_name'][$i].'",';} ?>
                  
        ],
        datasets: [{ 
            data: [
              <?php for($i = count($dashboard['profit_before_tax'])-1; $i >-1; $i--) { ?>
              <?= $dashboard['profit_before_tax'][$i].',';} ?>
            ],
            label: "Profit Before Tax",
            borderColor: "#3e95cd",
            fill: false
          }, { 
            data: [
              <?php for($i = count($dashboard['profit_after_tax'])-1; $i >-1; $i--) { ?>
              <?= $dashboard['profit_after_tax'][$i].',';} ?>
            ],
            label: "Profit After Tax",
            borderColor: "#dcdcdc",
            fill: false
          }, 
          // { 
          //   data: [168,170,178,190,203,276,408,547,675,734],
          //   label: "Europe",
          //   borderColor: "#3cba9f",
          //   fill: false
          // },
        ]
      },
      options: {
        title: {
          display: true,
          text: 'World population per region (in millions)'
        }
      }
    });
    new Chart(document.getElementById("line-chart1"), {
      type: 'line',
      data: {
        labels: [
              <?php for($i = count($dashboard['month_name'])-1; $i >-1; $i--) { ?>
              <?= '"'.$dashboard['month_name'][$i].'",';} ?>
            ],
        datasets: [{ 
            data: [
              <?php for($i = count($dashboard['second_graph'])-1; $i >-1; $i--) { ?>
                <?= $dashboard['second_graph'][$i].',';} ?>
            ],
            label: "Revenue minus Costs",
            borderColor: "#3e95cd",
            fill: false
          },
          // { 
          //   data: [168,170,178,190,203,276,408,547,675,734],
          //   label: "Europe",
          //   borderColor: "#3cba9f",
          //   fill: false
          // },
        ]
      },
      options: {
        title: {
          display: true,
          text: 'World population per region (in millions)'
        }
      }
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

      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
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