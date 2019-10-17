@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    .padding_left{
      padding-left: 0;
    }
  }

  /* Small devices (portrait tablets and large phones, 600px and up)  */
  @media only screen and (min-width: 600px) {
    .padding_left{
      padding-left: 0;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    .padding_left{
      padding-left: 14%;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    .padding_left{
      padding-left: 14%;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    .padding_left{
      padding-left: 14%;
    }
  }


  .custom-select{
    border-radius: 25px;
    padding: 10px 20px 10px 0px !important;
    height: 50px;
    font-weight: 300;
    font-size: smaller;
  }
  .amount_div{
    position: relative;
  }
  .alert-info{
    color: #73777a;
    background-color: #f8fafb;
    border-color: #f5f7f9;
  }
  input{
    font-weight: 500 !important;
  }
  .custom-control{
    padding-left: 0.5rem;
  }
  .mdi:hover{
    color: #175ade !important;
  }
  .form-control{
    color: #6d6d6d !important;
    font-size: 13px !important;
  }
  input {
    font-weight: 300 !important;
  }
  .custom-control-label{
    font-weight: 300 !important;
  }
  .padding_left{
    padding-left: 13px !important;
  }
  .custom-radio{
    left: -12px !important;
  }
  
</style>
<?php 

$current_month_year = $data['invoice_for_year'].$data['invoice_for_month'];
$previous_month_num = $previous_month_name = $previous_year = [];
  // var_dump($data['invoice_for_month']);
  // die();
$date = DateTime::createFromFormat("Ym", $current_month_year);

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
  
    // echo $previous_month_num[$i]."<br>";
    // echo $previous_month_name[$i]."<br>";
    // echo $previous_year[$i]."<br>";
    // $interval = new DateInterval("P".$i."M");
    // var_dump($interval);
    // $MonthsEarlier = $date->sub($interval);
    // var_dump($MonthsEarlier);
    // $date=date_create("2013-03-31");
    // date_add($date,date_interval_create_from_date_string("30 days"));
    // echo date_format($date,"Y-m-d");
    // $date = new DateTime('now');
    // $date->modify('-15 DAYS'); 
    // $date = $date->format('Y-m-d h:i:s');
    // echo $date;
    // echo date("Y-m-01", strtotime($date));
    // echo date('d',strtotime(date("Y-m-01", strtotime($date))));
  
    // $previous_year[$i] = $MonthsEarlier->format("Y");
    // $previous_month_num[$i] = $MonthsEarlier->format("m");

    // $dateObj = DateTime::createFromFormat('!m', $previous_month_num[$i]);
    // $previous_month_name[$i] = $dateObj->format('F');
  
}

$for_month = 0;
$total_val_tax_arr = $total_tax_arr = [];
//to calculate total of amount_val and tax_val in model
  //fetch all custom category of user
  foreach($data['custom_category'] as $category){
    //fetch all custom cost of the user
    foreach($data['custom_costs'] as $custom_cost){
      //check the category id with all cost custom_cost
      if($custom_cost->custom_cost == $category->id){
        //sum of month wise custom cost 
        if($for_month != $custom_cost->for_month){
          $total_val_tax = $total_tax = 0;

          $total_tax += $custom_cost->tax_amount_val;
          $total_val_tax += $custom_cost->line_ext_val+$custom_cost->tax_amount_val;

          $for_month = $custom_cost->for_month;
        }
        else
        {
          $total_tax += $custom_cost->tax_amount_val;
          $total_val_tax += $custom_cost->line_ext_val+$custom_cost->tax_amount_val;
        }
        $total_tax_arr[$category->id][$custom_cost->for_month] = $total_tax;
        $total_val_tax_arr[$category->id][$custom_cost->for_month] = $total_val_tax;
      }

      
    }
  }
 
?>
@foreach($data['custom_category'] as $category)
<?php $for_month = 0; ?>
<div class="modal fade" id="Modal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$category->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel{{$category->id}}">
          De kosten in de kostenpost {{$category->category_name}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="padding: 0px 25px">
          

              <div class="table-responsive">
                <table class="table">
              @foreach($data['custom_costs'] as $custom_cost)
                @if($custom_cost->custom_cost == $category->id)

                    <?php 
                        // $total_val_tax += 2;
                        
                        // $total_tax += $custom_cost->tax_amount_val;
                      // $for_month = 0;
                      if($for_month != $custom_cost->for_month){
                        // if($repeat_id == 0){
                    ?>
                    <tr>
                      <th>{{__('translate.Month')}}</th>
                      <th>Bedrag</th>
                      <th>Waarvan BTW</th>
                      <th>Acties</th>
                    </tr>

                    <tr>
                      <td>
                        <?= __('translate.'.date("F", mktime(0, 0, 0,$custom_cost->for_month, 10))); ?>
                      </td>
                      <td>
                        €<?= number_format($total_val_tax_arr[$category->id][$custom_cost->for_month],2,",",".");?>
                      </td>
                      <td>
                        €<?= number_format($total_tax_arr[$category->id][$custom_cost->for_month],2,",",".");?>
                      </td>
                      <td>
                        <i data-toggle="collapse" data-target="#collapse<?= $custom_cost->for_month.'_'.$custom_cost->custom_cost; ?>" class="mdi mdi-eye"></i>

                        <form id="delete-form-{{$custom_cost->for_month}}" method="post" style="display: none;" action="{{route('delete_all_cost_in_month')}}">
                          {{csrf_field()}}
                          <input type="hidden" name="cost_id" value="{{$custom_cost->id}}">
                        </form>
                        <a href="#" style="color: #6d6d6d" onclick="
                          if(confirm('Weet je zeker dat je deze kostenpost wil verwijderen?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$custom_cost->for_month}}').submit();
                          }
                          else
                          {
                            event.preventDefault();
                          }

                        ">
                          <i class="mdi mdi-close-circle"></i>
                        </a>
                      </td>
                    </tr>
                    <tr id="collapse<?= $custom_cost->for_month.'_'.$custom_cost->custom_cost; ?>" class="collapse">
                      <th>Toegevoegd op</th>
                      <th>Bedrag</th>
                      <th>Waarvan BTW</th>
                      <th>Acties</th>
                    </tr>
                    <tr id="collapse<?= $custom_cost->for_month.'_'.$custom_cost->custom_cost; ?>" class="collapse">
                      <td>
                        <?= date('d-m-Y',strtotime($custom_cost->created_at)) ?>
                      </td>
                      <td>
                        €<?= number_format($custom_cost->line_ext_val+$custom_cost->tax_amount_val,2,",",".");?>
                      </td>
                      <td>
                        €<?= number_format($custom_cost->tax_amount_val,2,",",".");?>
                          
                      </td>
                      <td>
                        <i class="mdi mdi-information" data-toggle="tooltip" data-original-title="{{$custom_cost->description}}"></i>
                        <form id="delete-form-{{$custom_cost->id}}" method="post" style="display: none;" action="{{route('customcost.destroy',$custom_cost->id)}}">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                        </form>
                        <a href="#" style="color: #6d6d6d" onclick="
                          if(confirm('Weet je zeker dat je deze kostenpost wil verwijderen?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$custom_cost->id}}').submit();
                          }
                          else
                          {
                            event.preventDefault();
                          }

                        ">
                          <i class="mdi mdi-close-circle"></i>
                        </a>
                        
                      </td>
                    </tr>
                  <?php 
                        $for_month = $custom_cost->for_month;
                        // $repeat_id = 1;
                      // }
                    }else{
                      
                      // $repeat_id = 0;
                  ?>
                  <tr id="collapse<?= $custom_cost->for_month.'_'.$custom_cost->custom_cost; ?>" class="collapse">
                      <td>
                        <?= date('d-m-Y',strtotime($custom_cost->created_at)) ?>
                      </td>
                      <td>
                        €<?= number_format($custom_cost->line_ext_val+$custom_cost->tax_amount_val,2,",",".");?>
                      </td>
                      <td>
                        €<?= number_format($custom_cost->tax_amount_val,2,",",".");?>
                          
                      </td>
                      <td>
                        <i class="mdi mdi-information" data-toggle="tooltip" data-original-title="{{$custom_cost->description}}"></i>
                        <form id="delete-form-{{$custom_cost->id}}" method="post" style="display: none;" action="{{route('customcost.destroy',$custom_cost->id)}}">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                        </form>
                        <a href="#" style="color: #6d6d6d" onclick="
                          if(confirm('Are you sure you want to delete this?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$custom_cost->id}}').submit();
                          }
                          else
                          {
                            event.preventDefault();
                          }

                        ">
                          <i class="mdi mdi-close-circle"></i>
                        </a>
                        
                      </td>
                    </tr>
                    <?php } ?>

                    @endif
                  @endforeach
                </table>
                
              </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Edit Category name by passing value in it -->
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="vcenter">Naam kostenpost bewerken</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('customcategory.update',1)}}" style="margin: 40px 0px 25px 0px;">
          {{ csrf_field() }}
          {{method_field('PUT')}}

          <div class="form-group">
            <input class="form-control" type="text" class="edit_field form-control" id="category_name" name="category_name" value="" placeholder="Fill out your first name">
            <input class="form-control" type="hidden" class="edit_field form-control" id="category_id" name="category_id" value="">
            <label style="font-size: 13px"><i>Typ de nieuwe naam van de kostenpost hierboven en druk vervolgens op enter.</i></label> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
          <div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 8px;margin-bottom: 15px">
            <div class="col-md-12">
              <h5>Voeg eerste kostenposten toe en vervolgens de kosten.</h5>
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
                            <th>Kostenpost</th>
                            <th class="padding_left">Totaal bedrag</th>
                            <th style="text-align: right;">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($data['custom_category'] as $category)
                    <input type="hidden" name="custom_cat_{{$category->id}}" id="custom_cat_{{$category->id}}" value="{{$category->category_name}}">
                        <?php $total_cost = 0; ?>
                        @foreach($data['custom_costs'] as $custom_cost)
                        <?php 

                          if($custom_cost->custom_cost == $category->id){ 
                            $total_cost += $custom_cost->line_ext_val+$custom_cost->tax_amount_val;}

                        ?>
                        @endforeach

                        <tr>

                          <td>{{$category->category_name}}</td>
                          <td class="padding_left">
                            €<?= number_format($total_cost,2,",","."); ?>
                          </td>
                          <td style="text-align: right;">
                            <a href="#" data-toggle="tooltip" data-original-title="Kosten bekijken">
                              <i data-target="#Modal{{$category->id}}" data-toggle="modal" class="mdi mdi-menu text-inverse" style="font-size: 19px" ></i>
                            </a>
                            

                            <a href="#my_modal" data-toggle="modal" data-category-name="{{$category->category_name}}" data-category-id="{{$category->id}}"  >
                             <i class="mdi mdi-pencil-circle text-inverse" data-toggle="tooltip" data-original-title="Naam bewerken"></i> 
                            </a>
                            <form id="delete-form-{{$category->id}}" method="post" style="display: none;" action="{{route('customcategory.destroy',$category->id)}}">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                            </form>
                            <a href="#" data-toggle="tooltip" data-original-title="Post verwijderen" style="color: black" onclick="
                              if(confirm('Weet je zeker dat je deze kostenpost wil verwijderen?'))
                              {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$category->id}}').submit();
                              }
                              else
                              {
                                event.preventDefault();
                              }

                            ">
                              <i class="mdi mdi-close-circle"></i>
                            </a>
                          </td>

                        </tr>
                          <?php  ?>
                        
                      @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row" style="margin-top: 30px;">
              <div class="col-md-12" style="padding-left: 25px;">
                <form class="form-material" method="post"  action="{{route('customcategory.store')}}">
                  <h4>Voeg een kostenpost toe</h4>
                  <div class="form-group">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="category_name" required>
                    <label style="font-size: 13px"><i>Typ de nieuwe kostenpost hierboven en druk vervolgens op enter</i></label> 
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 8px;margin-bottom: 15px">
          <div class="col-md-12">
            <h4>Voeg kosten aan een kostenpost toe.</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9" >
        <form class="form-material" method="post"  action="{{route('customcost.store')}}">
          {{ csrf_field() }}
          <div class="row" style="padding-left: 14px">
            <div class="form-group col-md-6">

              <select class="form-control custom-select" id="for_month" name="for_month" required oninvalid="this.setCustomValidity('Selecteer een maand')" oninput="setCustomValidity('')">
                <option value="">Selecteer een maand</option>
                <option value="<?= $invoice_for_month.$invoice_for_year ?>">
                  <?= __('translate.'.$invoice_for_month_name).' '.$invoice_for_year ?>
                </option>
                <?php for($i=0; $i< count($previous_month_num); $i++): ?>
            
                  <option value="<?= $previous_month_num[$i].$previous_year[$i] ?>">
                    <?= __('translate.'.$previous_month_name[$i]).' '.$previous_year[$i] ?>
                  </option>

                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group col-md-6">

              <select class="form-control custom-select" id="custom_category" name="custom_category" required oninvalid="this.setCustomValidity('Selecteer een kostenpost')" oninput="setCustomValidity('')">
                <option value="">Selecteer een kostenpost</option>
              @foreach($data['custom_category'] as $category)
                <option value="{{$category->id}}">
                  {{$category->category_name}}
                </option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="row" style="padding-left: 14px">
            <div class="col-md-6">
              <div class="form-group amount_div" style="margin-top: 11px;">

                <input type="text" class="form-control custom-input" min="0" id="cost_amount" name="cost_amount" required placeholder="Voer het bedrag in"   oninvalid="this.setCustomValidity('Je bent deze vergeten')" oninput="setCustomValidity('')" onkeypress='onlynumbers(event)'>
                
              </div>
              <div class="form-group">
                <div class=" ">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="with-gap radio-col-blue-grey" id="amount_inc_tax" name="cost_amount_opt" value="1" checked>
                    <label class="custom-control-label" for="amount_inc_tax">Bedrag is inclusief BTW</label>
                  </div>
                  <div class="custom-control custom-radio" style="margin-top: 14px;">
                    <input type="radio" class="with-gap radio-col-blue-grey" id="amount_exl_tax" name="cost_amount_opt" value="0">
                    <label class="custom-control-label" for="amount_exl_tax">Bedrag is exclusief BTW</label>
                  </div>
                </div>
              </div>
            </div>
<input type="hidden" name="result_cost" id="result_cost">
<input type="hidden" name="result_tax" id="result_tax">

<input type="hidden" name="tax_amount" id="tax_amount">
            <div class="col-md-6">
              <div id="tax_amount_per_div" class="form-group amount_div">

                <select class="form-control custom-select" id="tax_amount_per" name="tax_amount_per">
                  <option value="21">21 %</option>
                  <option value="9">9 %</option>
                  <option value="0">0 %</option>
                </select>
                <!-- <input type="number" value="21" onInput="checkLength(5,this)" class="form-control" min="0" maxlength="4" id="tax_amount" name="tax_amount" >
                <i class="fas fa-percent tax_amount_i"></i> -->
              </div>
              <div id="tax_amount_amt_div" class="form-group amount_div" style="display: none;margin-top: 11px;">

                <input type="text" class="form-control custom-input" min="0" id="tax_amount_amt" name="tax_amount_amt" placeholder="Voer het bedrag in" oninvalid="this.setCustomValidity('Je bent deze vergeten')" oninput="setCustomValidity('')" onkeypress='onlynumbers(event)'>
              </div>
              <div class="form-group">
                <div class="custom-control custom-radio">
                  <input type="radio" class="with-gap radio-col-blue-grey" id="percentage" name="tax_amount_opt" value="1" checked>
                  <label class="custom-control-label" for="percentage">Percentage</label>
                </div>
                <div class="custom-control custom-radio" style="margin-top: 14px;">
                  <input type="radio" class="with-gap radio-col-blue-grey" id="amount" name="tax_amount_opt" value="0">
                  <label class="custom-control-label" for="amount">Bedrag</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" style="padding-left: 29px !important;">
              <div class="form-group">
                <input type="text" class="form-control" name="category_description" required placeholder="Beschrijving kosten" oninvalid="this.setCustomValidity('Voeg een beschrijving toe')" oninput="setCustomValidity('')">
              </div>
            </div>
          </div>
          <div class="row" style="margin: 22px 0px 10px 8px;">
            <div class="col-md-9" style="padding: 0px;">
              <button type="submit" class="btn waves-effect waves-light btn-rounded btn-secondary">Kosten toevoegen</button>
            </div>
          </div>
          </div>
        </form>
        

        <div class="col-md-3" style="padding-top: 9px">
          <h5 style="margin-bottom: 15px;"><i>Extra informatie</i></h5>
          <p class="card-subtitle"><i>
          Je voegt nu
          <label class="summary_sec_text">
            €<span id="summary_add_cost"></span>
          </label> 
          aan
          <label class="summary_sec_text" id="summary_category">
            &nbsp;
          </label>
          toe in de maand
          <label class="summary_sec_text" id="summary_month">
                
          </label>, hiervan is
          <label class="summary_sec_text">
            €<span id="summary_tax_amnt"></span>
          </label> BTW.
          </i></p>
        </div>
        </div>
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
    $('#my_modal').on('show.bs.modal', function(e) {
      var category_name = $(e.relatedTarget).data('category-name');
      var category_id = $(e.relatedTarget).data('category-id');
      $(e.currentTarget).find('input[name="category_name"]').val(category_name);
      $(e.currentTarget).find('input[name="category_id"]').val(category_id);
    });

    var tax_amount = $('#tax_amount_per').val();
      $('#tax_amount').val(tax_amount);

    $('#percentage').click(function(){
      $('#tax_amount_per_div').show();
      $('#tax_amount_amt_div').hide();

      var tax_amount = $('#tax_amount_per').val();
      $('#tax_amount').val(tax_amount);
    });

    $('#amount').click(function(){
      $('#tax_amount_per_div').hide();
      $('#tax_amount_amt_div').show();

      var tax_amount = $('#tax_amount_amt').val();
      $('#tax_amount').val(tax_amount);
    });
    $('#cost_amount').keyup(function(){
      summary();
    });
    $('#tax_amount_amt').keyup(function(){
      var tax_amount = $('#tax_amount_amt').val();
      $('#tax_amount').val(tax_amount);
      summary();
    });
    $('#tax_amount_per').change(function(){
      var tax_amount = $('#tax_amount_per').val();
      $('#tax_amount').val(tax_amount);
      summary();
    });
    $('#for_month,#custom_category,#cost_amount').change(function(){
      summary();
    });
    $('input[type=radio][name=cost_amount_opt]').change(function() {
      summary();
    });
    $('input[type=radio][name=tax_amount_opt]').change(function(){
      summary();
    });
  });
  
  
  function summary()
  {
    var cost = tax = '';
    var cost_amount_opt = $('input[name="cost_amount_opt"]:checked').val();
    var tax_amount_opt = $('input[name="tax_amount_opt"]:checked').val();

    var cost_amount = parseFloat($('#cost_amount').val());
    var tax_amount = parseFloat($('#tax_amount').val());

    var select_month_year = $('#for_month').val();
    var custom_category_id = $('#custom_category').val();
    var div_id = '#custom_cat_'+custom_category_id;
    var custom_category_name = $(div_id).val();

    var month = select_month_year.substr(0,2);
    var year = select_month_year.substr(-4);
    var monthName = GetMonthName(month);

    if(cost_amount_opt == 1 && tax_amount_opt == 1)
    {
      var tax_amount_100 = tax_amount + 100;
      cost = (cost_amount/tax_amount_100) * 100;
      tax = (cost_amount/tax_amount_100) * tax_amount;
    }
    else if(cost_amount_opt == 0 && tax_amount_opt == 1)
    {
      cost = cost_amount;
      tax = (cost_amount/100) * tax_amount;
    }
    else if(cost_amount_opt == 1 && tax_amount_opt == 0)
    {
      cost = cost_amount - tax_amount;
      tax = tax_amount;
    }
    else if(cost_amount_opt == 0 && tax_amount_opt == 0)
    {
      cost = cost_amount;
      tax = tax_amount;
    }


    $('#summary_month').html(monthName);
    $('#summary_category').html(custom_category_name);
    var summary_add_cost = cost+tax;
    $('#summary_add_cost').html(number_format(summary_add_cost, 2, ',', '.'));
    $('#summary_tax_amnt').html(number_format(tax, 0, ',', '.'));

    $('#result_cost').val(cost.toFixed(2));
    $('#result_tax').val(tax.toFixed(2));
  }
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
  function checkLength(len,ele){
    var fieldLength = ele.value.length;
    if(fieldLength <= len){
        return true;
    }
    else
    {
        var str = ele.value;
        str = str.substring(0, str.length - 1);
        ele.value = str;
    }
    }
</script>


@endsection

