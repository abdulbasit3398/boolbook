@extends('layouts.m_app')

@section('head_section')
 
<link href="{{asset('ui/assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/profitloss.css')}}" rel="stylesheet" />
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/profitloss.js')}}?version=<?= time() ?>"></script>
@endsection

@section('page_title','Profit & Loss')


@section('main_content')
<?php 
$current_month_year = $data['invoice_for_year'].$data['invoice_for_month'];
$previous_month_num = $previous_month_name = $previous_year = [];
  // var_dump($data['invoice_for_month']);
  // die();

//go to previous month and get it's first date, then subtract 1 day from it

$date = DateTime::createFromFormat("Ym", $current_month_year);

$day = date('d');
if($day == 31)
{
  $date = $date->format('Y-m-d h:i:s');
  $date = date("Y-m-01", strtotime($date));
  $date = DateTime::createFromFormat("Y-m-d", $date);
  $date->modify('-1 DAYS');
}

$invoice_for_month = $data['invoice_for_month'];
$invoice_for_year = $data['invoice_for_year'];
$dateObj = DateTime::createFromFormat('!m', $invoice_for_month);
$invoice_for_month_name = $dateObj->format('F');

for($i=0; $i<=11; $i++)
{
  $date = $date->format('Y-m-d h:i:s');
  $date = date("Y-m-01", strtotime($date));
  $date = DateTime::createFromFormat("Y-m-d", $date);
  $date->modify('-1 DAYS');
  $previous_month_num[$i] = $date->format("m");
  $previous_year[$i] = $date->format("Y");
  $dateObj = DateTime::createFromFormat('!m', $previous_month_num[$i]);
  $previous_month_name[$i] = $dateObj->format('F');
}

foreach($data['costs_months'] as $month)
{
  $dateObj = DateTime::createFromFormat('!m', $month->for_month);
  $month_num[] = $month->for_month;
  $month_name[] = $dateObj->format('F');
}

?>
<style type="text/css">
  @media only screen and (min-width: 768px) {
    .modal-content{
      width: 110%;
    }
  }
  @media only screen and (max-width: 768px) {
    .modal-content{
      width: 90%;
    }
  }

.tax_to_pay_description:hover{
  color: #175ade;
  cursor: pointer;
}
.close-btn{
  border-radius: 25px;
}
.black_hr{
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
  border: 0.5px solid black;
}
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top: 10%">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center;">
        <h5 class="modal-title" id="exampleModalLabel" style="width: 100%;">
          Wat is “Te betalen belasting”?
        </h5>

      </div>
      <div class="modal-body" style="padding: 0px 30px 0px 30px;">
        <br/>
        <p style="text-align: justify;">
          Bij het verkopen op Bol.com ontvang je btw van de klant. Deze btw dien
          je te betalen aan de belastingdienst, maar over de kosten die je maakt
          kun je de btw terugvragen. Bolbooks rekent uit hoeveel btw je ontvangt
          en hoeveel btw je kan terugvragen. Vervolgens halen we de btw die je
          nog kan terugvragen van je ontvangen btw af. Dit is wat jij te zien krijgt
          bij “te betalen belasting”. 

        </p>
        <hr class="black_hr">
        <h5 class="modal-title" id="exampleModalLabel" style="width: 100%;text-align: center;">
          Een handige tip van ons!
        </h5>
        <br/>
        <p style="text-align: justify;">
          Aan het eind van het kwartaal doe je btw-aangifte en betaal je de
          belasting. Jij kan elke maand zien wat je moet gaan betalen. Het is
          dus slim om dat bedrag alvast apart te houden. Zo zijn er geen
          verrassingen aan het eind van het kwartaal!
          <br/><br/>
          Wil je meer handige tips? Lees al onze hulp-artikelen <a href="https://help.bolbooks.nl/" target="blank">hier</a>.

        </p>
        <br/>
        <div style="width: 100%;text-align: center;">
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Ik snap het</button>
        </div>
        <br/>
      </div>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 16px;margin-bottom: 15px">
            <div class="col-md-6" style="padding: 8px 0px 0px 22px;">
              <h5>Dit is je resultaat in 
                <span id="monthName">{{ __('translate.'.$data["monthName"])}}</span> 
                <span id="year">{{$data['invoice_for_year']}}</span></h5>

            </div>
            <div class="col-md-3" style="padding-right: 4px;">
              <select class="form-control col-md-11" id="select_year" name="select_year" style="width: 65%;float: right;">
                  <option value="">Selecteer jaar</option>
                  @foreach($data['costs_years'] as $year)
                    <option value="{{$year->for_year}}">{{$year->for_year}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-3" style="padding-left: 0px;">
              <select class="form-control col-md-11" id="select_month" name="select_month" style="width: 75%;">
                  <option value="">{{ __('translate.Select Month')}}</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maart</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Augustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
              </select>
            </div>
          </div>

          <input type="hidden" name="invoice_for_month" id="invoice_for_month" value="{{$data['invoice_for_month']}}">
          <input type="hidden" name="invoice_for_year" id="invoice_for_year" value="{{$data['invoice_for_year']}}">
          <input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">
        
        <div class="row" id="message_div">
          <div class="blue_div" style="width: auto;" data-toggle="tooltip" data-original-title="Omdat de maand nog niet is afgelopen kunnen we je gegevens nog niet ophalen bij bol.com. Op de 1e of 2e van de volgende maand worden je gegevens ingeladen! ;)">
            <i class="mdi mdi-information" style="font-size: 19px;"></i>
            <span>Waarom zie ik geen omzet?</span>
          </div>
        </div>
        <br/>
        <div class=" row">
          <div class="blue_div">
            Opbrengsten
          </div>
        </div>
        <div class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.TURNOVER')}}</span>
            <p class="form_value">
              € <span id="total_revenue">
                0.00
              </span>
            </p>
          </div>
        </div>
        <!-- <div class="val_name_row row">
          <div class="val_name col-md-5">
            
          </div>
          <div class=" col-md-6">
            <hr class="custom_hr">
          </div>
        </div> -->
        <div class="val_name_row row" style="border: none;">
          <div class=" col-md-12">
            <span style="font-size: 14px;font-weight: 500">Totaal</span>
            <span class="form_total1">
              € <span id="total_revenue1">
                0.00
              </span>
            </span>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="blue_div">
            Kosten
          </div>
        </div>
        <div id="custom_costs_div">
          
        </div>
        <div id="commission_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.COMMISSION')}}</span>
            <p class="form_value">
              € <span id="commission"></span>
            </p>
          </div>
        </div>
        
        <div id="shipment_label_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.SHIPMENT_LABEL')}}</span>
            <p class="form_value">
              € <span id="shipment_label"></span>
            </p>
          </div>
        </div>

        <div id="shipment_label_post_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.SHIPMENT_LABEL_POST')}}</span>
            <p class="form_value">
              € <span id="shipment_label_post"></span>
            </p>
          </div>
        </div>

        <div id="plaza_return_shipping_label_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.PLAZA_RETURN_SHIPPING_LABEL')}}</span>
            <p class="form_value">
              € <span id="plaza_return_shipping_label">
                
              </span>
            </p>
          </div>
        </div>

        <div id="pick_pack_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.PICK_PACK')}}</span>
            <p class="form_value">
              € <span id="pick_pack"></span>
            </p>
          </div>
        </div>

        <div id="outbound_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.OUTBOUND')}}</span>
            <p class="form_value">
              € <span id="outbound"></span>
            </p>
          </div>
        </div>

        <div id="stock_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.STOCK')}}</span>
            <p class="form_value">
              € <span id="stock"></span>
            </p>
          </div>
        </div>

        <div id="nck_stock_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.NCK_STOCK')}}</span>
            <p class="form_value">
              € <span id="nck_stock"></span>
            </p>
          </div>
        </div>

        <div id="compensation_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.COMPENSATION')}}</span>
            <p class="form_value">
              € <span id="compensation"></span>
            </p>
          </div>
        </div>

        <div id="logistical_charge_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.LOGISTICAL_CHARGE')}}</span>
            <p class="form_value">
              € <span id="logistical_charge"></span>
            </p>
          </div>
        </div>
        
        <div id="first_mile_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.FIRST_MILE')}}</span>
            <p class="form_value">
              € <span id="first_mile"></span>
            </p>
          </div>
        </div>

        <div id="correction_correction_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.CORRECTION_CORRECTION')}}</span>
            <p class="form_value">€ 
              <span id="correction_correction"></span>
            </p>
          </div>
        </div>

        <div id="compensation_lost_goods_div" class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.COMPENSATION_LOST_GOODS')}}</span>
            <p class="form_value">€ 
              <span id="compensation_lost_goods"></span>
            </p>
          </div>
        </div>

         
        <div class="val_name_row row" style="border: none;">
          <div class=" col-md-12">
            <span style="font-size: 14px;font-weight: 500">{{ __('cost_name.TOTAL')}}</span>
            <span class="form_total1">
              € <span id="total_costs"></span>
            </span>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="blue_div">
            Resultaat
          </div>
        </div>
        
        <div class="val_name_row row">
          <div class="val_name col-md-7">
            <span>{{ __('cost_name.PROFIT_BEFORE_TAXES')}}</span>
            <p class="form_value">
              € <span id="profit_before_tax"></span>
            </p>
          </div>
        </div>
        <div class="val_name_row row">
          <div class="val_name col-md-7">
            <span class="tax_to_pay_description" data-toggle="modal" data-target="#exampleModal">
              {{ __('cost_name.TAXES_TO_PAY')}}&nbsp;&nbsp;<i class="mdi mdi-help-circle"></i> 
            </span>
            <p class="form_value">€ <span id="taxes_to_pay_div"></span></p>
          </div>
        </div>

        <div class="val_name_row row" style="border: none;">
          <div class=" col-md-12">
            <span style="font-size: 14px;font-weight: 500">Resultaat</span>
            <span class="form_total1">€ <span id="total_profit_and_tax_div"></span></span>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#select_month').change(function(){
      var value = $(this).val();
      month = value.slice(0, 2);
      month = month - 1;
      year = value.slice(2, 6);

      var current_date = new Date();
      var current_month = current_date.getMonth();
      var previous_month = current_month - 1;
      var current_year = current_date.getFullYear();
      var current_day = current_date.getDate();

      if(current_year == year)
      {
        if(current_month == month)
        {
          $('#message_div').show();
        }
        else if(previous_month == month)
        {
          if(current_day == 1 || current_day == 2)
            $('#message_div').show();
          else
            $('#message_div').hide();        
        }
        else
        {
          $('#message_div').hide();
        }
      }
      else{
        $('#message_div').hide();
      }
      

    });
  });
  function GetMonthName(monthNumber) {
      var months = [
                  "<?= __('translate.January') ?>",
                  "<?= __('translate.February') ?>",
                  "<?= __('translate.March') ?>",
                  "<?= __('translate.April') ?>",
                  "<?= __('translate.May') ?>",
                  "<?= __('translate.June') ?>",
                  "<?= __('translate.July') ?>",
                  "<?= __('translate.August') ?>",
                  "<?= __('translate.September') ?>",
                  "<?= __('translate.October') ?>",
                  "<?= __('translate.November') ?>",
                  "<?= __('translate.December') ?>",
                  ];
      return months[monthNumber - 1];
    }
</script>

@endsection

