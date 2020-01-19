@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    h4{
      font-size: 16px;
    }
    .padding_left{
      padding-left: 0;
    }
  }

  /* Small devices (portrait tablets and large phones, 600px and up)  */
  @media only screen and (min-width: 600px) {
    h4{
      font-size: 16px;
    }
    .padding_left{
      padding-left: 0;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    h4{
      font-size: 16px;
    }
    .padding_left{
      padding-left: 8%;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    h4{
      font-size: 16px;
    }
    .padding_left{
      padding-left: 8%;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    h4{
      font-size: 16px;
    }
    .padding_left{
      padding-left: 8%;
    }
  }
  .amount_div{
    position: relative;
  }
  .alert-info{
    color: #73777a;
    background-color: #f8fafb;
    border-color: #f5f7f9;
  }
  .btn-secondary, .btn-secondary.disabled{
    background: #727b84;
    border: 1px solid #727b84;
    color: white;
  }
  input{
    font-weight: 500 !important;
  }
  .custom-control{
    padding-left: 0.5rem;
  }
  .padding_top th{
    padding-top: 30px;
  }
</style>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 16px;margin-bottom: 15px">
            <div class="col-md-7" style="padding-top: 12px">
              <h5>Dit is de informatie die je nodig hebt om je BTW-aangifte in te vullen.</h5>
            </div>
            <div class="col-md-5">
              <input type="hidden" name="firstQuarterM" id="firstQuarterM" value="{{$data['firstQuarterM']}}">
              <input type="hidden" name="firstQuarterY" id="firstQuarterY" value="{{$data['firstQuarterY']}}">

              <select class="form-control col-md-9" id="select_month" name="select_month" style="float: right;">
                <option value="{{$data['firstQuarterM'].$data['firstQuarterY']}}">
                  {{__('translate.Quarter')}} <?= $data['firstQuarterNum']; ?>
                </option>
                <option value="{{$data['secondQuarterM'].$data['secondQuarterY']}}">
                  {{__('translate.Quarter')}} <?= $data['secondQuarterNum']; ?>
                </option>
                <option value="{{$data['thirdQuarterM'].$data['thirdQuarterY']}}">
                  {{__('translate.Quarter')}} <?= $data['thirdQuarterNum']; ?>
                </option>
                <option value="{{$data['fourthQuarterM'].$data['fourthQuarterY']}}">
                  {{__('translate.Quarter')}} <?= $data['fourthQuarterNum']; ?>
                </option>
              </select>
            </div>
          </div>

        @if(\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show">
          {!! \Session::get('message') !!}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(\Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
          {!! \Session::get('error') !!}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
          @foreach ($errors->all() as $error)
          {{ $error }}
          @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <br/>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Rubriek 1</th>
                <th class="padding_left">Bedrag Waarover wordt berekend</th>
                <th style="text-align: right;">Omzetbelasting</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1a. Leveringen/diensten met hoog tarief</td>
                <td class="padding_left">€ <span id="turnover"></span></td>
                <td style="text-align: right;">€ <span id="turnover_percent"></span></td>
              </tr>
              <tr class="padding_top">
                <th>Rubriek 5</th>
                <th class="padding_left">Bedrag Waarover wordt berekend</th>
                <th style="text-align: right;"></th>
              </tr>
              <tr>
                <td>5b. Voorbelasting</td>
                <td class="padding_left">€ <span id="all_costs_tax"></span></td>
                <td style="text-align: right;"></td>
              </tr>
              <tr class="padding_top">
                <th>Samenvatting</th>
                <th class="padding_left">Bedrag Waarover wordt berekend</th>
                <th style="text-align: right;"></th>
              </tr>
              <tr>
                <td>Bedrag dat je aan de Belastingdienst moet betalen</td>
                <td class="padding_left">€ <span id="amount_to_pay"></span></td>
                <td style="text-align: right;"></td>
              </tr>
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

    var firstQuarterM = $('#firstQuarterM').val();
    var firstQuarterY = $('#firstQuarterY').val();
    $('#turnover').html('0.00');
    $('#turnover_percent').html('0.00');
    $('#all_costs_tax').html('0.00');
    $('#amount_to_pay').html('0.00');
    ajaxCall(firstQuarterM,firstQuarterY);

    $("#select_month").change(function(){
      var select_month_year = $(this).val();
      var month = select_month_year.substr(0,2);
      var year = select_month_year.substr(-4);
      var monthName = GetMonthName(month);

      $('#monthName').html(monthName);
      $('#year').html(year);
      ajaxCall(month,year);
    });
    function GetMonthName(monthNumber) {
      var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      return months[monthNumber - 1];
    }

    function ajaxCall(month,year)
    {
      var custom_cost = custom_cost_name = custom_cost_val = '';
      var first_revenue = second_revenue = third_revenue = totalTurnover = turnoverPercent = first_commission = first_compensation_lost_goods = first_compensation = first_correction_correction = first_logistical_charge = first_nck_stock = first_outbound = first_pick_pack = first_plaza_return_shipping_label = first_shipment_label = first_shipment_label_post = first_stock = second_commission = second_compensation_lost_goods = second_compensation = second_correction_correction = second_logistical_charge = second_nck_stock = second_outbound = second_pick_pack = second_plaza_return_shipping_label = second_shipment_label = second_shipment_label_post = second_stock = third_commission = third_compensation_lost_goods = third_compensation = third_correction_correction = third_logistical_charge = third_nck_stock = third_outbound = third_pick_pack = third_plaza_return_shipping_label = third_shipment_label = third_shipment_label_post = third_stock = set_correction_pick_pack = set_pick_pack = set_correction_outbound = set_outbound = set_commission = set_correction_commission = total_commission = total_shipment_label = total_plaza_return_shipping_label = total_pick_pack = total_outbound = total_stock = total_nck_stock = total_logistical_charge = total_correction_correction = total_custom_cost_tax = set_turnover = set_correction_turnover = turnover_line_ext_val = turnover_tax_amnt_val = correction_turnover_line_ext_val = correction_turnover_tax_amnt_val = commission_line_ext_val = commission_tax_amnt_val = correction_commission_line_ext_val = correction_commission_tax_amnt_val = compensation_lost_goods_line_ext_val = compensation_lost_goods_tax_amnt_val = compensation_line_ext_val = compensation_tax_amnt_val = correction_correction_line_ext_val = correction_correction_tax_amnt_val = correction_outbound_line_ext_val = correction_outbound_tax_amnt_val = outbound_line_ext_val = outbound_tax_amnt_val = correction_pick_pack_line_ext_val = correction_pick_pack_tax_amnt_val = pick_pack_line_ext_val = pick_pack_tax_amnt_val = logistical_charge_line_ext_val = logistical_charge_tax_amnt_val = nck_stock_line_ext_val = nck_stock_tax_amnt_val = plaza_return_shipping_label_line_ext_val = plaza_return_shipping_label_tax_amnt_val = shipment_label_line_ext_val = shipment_label_tax_amnt_val = shipment_label_post_line_ext_val = shipment_label_post_tax_amnt_val = stock_line_ext_val = stock_tax_amnt_val = turnover = first_mile_line_ext_val = first_mile_tax_amnt_val = first_first_mile = second_mile_line_ext_val = second_mile_tax_amnt_val = second_first_mile = third_mile_line_ext_val = third_mile_tax_amnt_val = third_first_mile = total_first_mile = 0;
      var month = month;
      var year = year;
      $.ajax({
        method: 'POST',
        url: '{{route("calculate_tax_report_quarterly")}}',
        data: {"_token": "{{ csrf_token() }}",month:month,year:year},
        async: false,
        success: function(response)
        {
          if(response.length != 0)
          {
            for(var i = 0; i < response['firstMonthCosts'].length; i++)
            {
              if(response['firstMonthCosts'][i]['cost_name'] == "TURNOVER")
              {
                turnover_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                turnover_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_turnover = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_TURNOVER")
              {
                correction_turnover_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                correction_turnover_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_correction_turnover = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "COMMISSION")
              {
                commission_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                commission_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_commission = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_COMMISSION")
              {
                correction_commission_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                correction_commission_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_correction_commission = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "COMPENSATION_LOST_GOODS")
              {
                compensation_lost_goods_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                compensation_lost_goods_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "COMPENSATION")
              {
                compensation_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                compensation_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_compensation = compensation_line_ext_val + compensation_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_CORRECTION")
              {
                correction_correction_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                correction_correction_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_OUTBOUND")
              {
                correction_outbound_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                correction_outbound_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_correction_outbound = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "OUTBOUND")
              {
                outbound_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                outbound_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_outbound = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_PICK_PACK")
              {
                correction_pick_pack_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                correction_pick_pack_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_correction_pick_pack = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "PICK_PACK")
              {
                pick_pack_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                pick_pack_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                set_pick_pack = 1;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "LOGISTICAL_CHARGE")
              {
                logistical_charge_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                logistical_charge_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "NCK_STOCK")
              {
                nck_stock_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                nck_stock_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "PLAZA_RETURN_SHIPPING_LABEL")
              {
                plaza_return_shipping_label_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                plaza_return_shipping_label_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL")
              {
                shipment_label_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                shipment_label_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL_POST")
              {
                shipment_label_post_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                shipment_label_post_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "STOCK")
              {
                stock_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                stock_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_stock = stock_line_ext_val + stock_tax_amnt_val;
              }
              if(response['firstMonthCosts'][i]['cost_name'] == "FIRST_MILE")
              {
                first_mile_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
                first_mile_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
                first_first_mile = first_mile_line_ext_val + first_mile_tax_amnt_val;
              }
            }
            if(set_correction_turnover == 1 && set_turnover == 1)
            {
              first_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
              set_correction_turnover = set_turnover = 0;
            }
            if(set_correction_commission == 1 && set_commission == 1)
            {
              first_commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
              set_correction_commission = set_commission = 0;
            }
            if(set_correction_pick_pack == 1 && set_pick_pack == 1)
            {
              first_pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
              set_correction_pick_pack = set_pick_pack = 0;
            }
            if(set_correction_outbound == 1 && set_outbound == 1)
            {
              first_outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
              set_correction_outbound = set_outbound = 0;
            }

            for(var i = 0; i < response['secondMonthCosts'].length; i++)
            {
              if(response['secondMonthCosts'][i]['cost_name'] == "TURNOVER")
              {
                turnover_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                turnover_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_turnover = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_TURNOVER")
              {
                correction_turnover_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                correction_turnover_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_correction_turnover = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "COMMISSION")
              {
                commission_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                commission_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_commission = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_COMMISSION")
              {
                correction_commission_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                correction_commission_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_correction_commission = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "COMPENSATION_LOST_GOODS")
              {
                compensation_lost_goods_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                compensation_lost_goods_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "COMPENSATION")
              {
                compensation_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                compensation_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_compensation = compensation_line_ext_val + compensation_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_CORRECTION")
              {
                correction_correction_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                correction_correction_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_OUTBOUND")
              {
                correction_outbound_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                correction_outbound_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_correction_outbound = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "OUTBOUND")
              {
                outbound_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                outbound_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_outbound = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_PICK_PACK")
              {
                correction_pick_pack_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                correction_pick_pack_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_correction_pick_pack = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "PICK_PACK")
              {
                pick_pack_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                pick_pack_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                set_pick_pack = 1;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "LOGISTICAL_CHARGE")
              {
                logistical_charge_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                logistical_charge_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "NCK_STOCK")
              {
                nck_stock_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                nck_stock_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "PLAZA_RETURN_SHIPPING_LABEL")
              {
                plaza_return_shipping_label_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                plaza_return_shipping_label_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL")
              {
                shipment_label_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                shipment_label_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL_POST")
              {
                shipment_label_post_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                shipment_label_post_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "STOCK")
              {
                stock_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                stock_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_stock = stock_line_ext_val + stock_tax_amnt_val;
              }
              if(response['secondMonthCosts'][i]['cost_name'] == "FIRST_MILE")
              {
                second_mile_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
                second_mile_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
                second_first_mile = second_mile_line_ext_val + second_mile_tax_amnt_val;
              }

            }
            if(set_correction_turnover == 1 && set_turnover == 1)
            {
              second_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
              set_correction_turnover = set_turnover = 0;
            }
            if(set_correction_commission == 1 && set_commission == 1)
            {
              second_commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
              set_correction_commission = set_commission = 0;
            }
            if(set_correction_pick_pack == 1 && set_pick_pack == 1)
            {
              second_pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
              set_correction_pick_pack = set_pick_pack = 0;
            }
            if(set_correction_outbound == 1 && set_outbound == 1)
            {
              second_outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
              set_correction_outbound = set_outbound = 0;
            }

            for(var i = 0; i < response['thirdMonthCosts'].length; i++)
            {
              if(response['thirdMonthCosts'][i]['cost_name'] == "TURNOVER")
              {
                turnover_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                turnover_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_turnover = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_TURNOVER")
              {
                correction_turnover_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                correction_turnover_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_correction_turnover = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "COMMISSION")
              {
                commission_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                commission_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_commission = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_COMMISSION")
              {
                correction_commission_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                correction_commission_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_correction_commission = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "COMPENSATION_LOST_GOODS")
              {
                compensation_lost_goods_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                compensation_lost_goods_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "COMPENSATION")
              {
                compensation_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                compensation_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_compensation = compensation_line_ext_val + compensation_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_CORRECTION")
              {
                correction_correction_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                correction_correction_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_OUTBOUND")
              {
                correction_outbound_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                correction_outbound_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_correction_outbound = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "OUTBOUND")
              {
                outbound_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                outbound_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_outbound = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_PICK_PACK")
              {
                correction_pick_pack_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                correction_pick_pack_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_correction_pick_pack = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "PICK_PACK")
              {
                pick_pack_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                pick_pack_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                set_pick_pack = 1;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "LOGISTICAL_CHARGE")
              {
                logistical_charge_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                logistical_charge_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "NCK_STOCK")
              {
                nck_stock_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                nck_stock_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "PLAZA_RETURN_SHIPPING_LABEL")
              {
                plaza_return_shipping_label_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                plaza_return_shipping_label_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL")
              {
                shipment_label_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                shipment_label_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL_POST")
              {
                shipment_label_post_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                shipment_label_post_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "STOCK")
              {
                stock_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                stock_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_stock = stock_line_ext_val + stock_tax_amnt_val;
              }
              if(response['thirdMonthCosts'][i]['cost_name'] == "FIRST_MILE")
              {
                third_mile_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
                third_mile_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
                third_first_mile = third_mile_line_ext_val + third_mile_tax_amnt_val;
              }

            }
            if(set_correction_turnover == 1 && set_turnover == 1)
            {
              third_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
              set_correction_turnover = set_turnover = 0;
            }
            if(set_correction_commission == 1 && set_commission == 1)
            {
              third_commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
              set_correction_commission = set_commission = 0;
            }
            if(set_correction_pick_pack == 1 && set_pick_pack == 1)
            {
              third_pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
              set_correction_pick_pack = set_pick_pack = 0;
            }
            if(set_correction_outbound == 1 && set_outbound == 1)
            {
              third_outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
              set_correction_outbound = set_outbound = 0;
            }

            for(var i = 0; i < response['firstMonthCustomCosts'].length; i++)
            {
              total_custom_cost_tax += response['firstMonthCustomCosts'][i]['tax_amount_val'];
            }
            for(var i = 0; i < response['secondMonthCustomCosts'].length; i++)
            {
              total_custom_cost_tax += response['secondMonthCustomCosts'][i]['tax_amount_val'];
            }
            for(var i = 0; i < response['thirdMonthCustomCosts'].length; i++)
            {
              total_custom_cost_tax += response['thirdMonthCustomCosts'][i]['tax_amount_val'];
            }

            if(!first_revenue)
              first_revenue = 0;
            if(!second_revenue)
              second_revenue = 0;
            if(!third_revenue)
              third_revenue = 0;
            totalTurnover = first_revenue + second_revenue + third_revenue;
            var turnover = Math.floor(totalTurnover);
            $('#turnover').html(number_format(turnover,0,",","."));

            turnoverPercent = (totalTurnover/121)*21;
            turnoverPercent = Math.floor(turnoverPercent);
            $('#turnover_percent').html(number_format(turnoverPercent,0,",","."));

            total_commission = first_commission + second_commission + third_commission;
            total_commission = (total_commission/121)*21;

            total_shipment_label = first_shipment_label + second_shipment_label + third_shipment_label;
            total_shipment_label = (total_shipment_label/121)*21;

            total_plaza_return_shipping_label = first_plaza_return_shipping_label + second_plaza_return_shipping_label + third_plaza_return_shipping_label;
            total_plaza_return_shipping_label = (total_plaza_return_shipping_label/121)*21;

            total_pick_pack = first_pick_pack + second_pick_pack + third_pick_pack;
            total_pick_pack = (total_pick_pack/121)*21;

            total_outbound = first_outbound + second_outbound + third_outbound;
            total_outbound = (total_outbound/121)*21;

            total_stock = first_stock + second_stock + third_stock;
            total_stock = (total_stock/121)*21;

            total_nck_stock = first_nck_stock + second_nck_stock + third_nck_stock;
            total_nck_stock = (total_nck_stock/121)*21;

            total_logistical_charge = first_logistical_charge + second_logistical_charge + third_logistical_charge;
            total_logistical_charge = (total_logistical_charge/121)*21;

            total_correction_correction = first_correction_correction + second_correction_correction + third_correction_correction;
            total_correction_correction = (total_correction_correction/121)*21;

            total_first_mile = first_first_mile + second_first_mile + third_first_mile;

            if(!total_commission)
              total_commission = 0;
            if(!total_shipment_label)
              total_shipment_label = 0;
            if(!total_plaza_return_shipping_label)
              total_plaza_return_shipping_label = 0;
            if(!total_pick_pack)
              total_pick_pack = 0;
            if(!total_outbound)
              total_outbound = 0;
            if(!total_stock)
              total_stock = 0;
            if(!total_nck_stock)
              total_nck_stock = 0;
            if(!total_logistical_charge)
              total_logistical_charge = 0;
            if(!total_correction_correction)
              total_correction_correction = 0;
            if(!total_first_mile)
              total_first_mile = 0;

            total_costs_tax = total_commission + total_shipment_label + total_plaza_return_shipping_label + total_pick_pack + total_outbound +total_stock + total_nck_stock + total_logistical_charge + total_correction_correction + total_first_mile;

            var all_costs_tax = Math.floor(total_custom_cost_tax+total_costs_tax);
            var amount_to_pay = Math.floor(turnoverPercent-(total_custom_cost_tax+total_costs_tax));

            $('#all_costs_tax').html(number_format(all_costs_tax,0,",","."));

            $('#amount_to_pay').html(number_format(amount_to_pay,0,",","."));
          }

          console.log(response);
        }

      });
}
});
</script>

@endsection

