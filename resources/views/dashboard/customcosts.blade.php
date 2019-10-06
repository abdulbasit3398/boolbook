@extends('layouts.app')


@section('main_content')

<style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    h4{
      font-size: 1.00rem;
    }
    .amount_div input[type=number]{
      border-radius: 25px;
      height: 50px;
      padding-left: 60px;
      font-size: 14px;
      font-weight: 600;
      padding-bottom: 2px;
    }
    .add_cat_input{
      border-radius: 25px;
      background-color: blue;
      border: 1px solid blue;
      color: white;
      font-size: 16px;
      font-weight: 500;
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
      float: right;
    }
    .val_name span{
      font-size: small;
      margin: 0px;
    }
  }

  /* Small devices (portrait tablets and large phones, 600px and up)  */
  @media only screen and (min-width: 600px) {
    h4{
      font-size: 1.00rem;
    }
    .amount_div input[type=number]{
      border-radius: 25px;
      height: 50px;
      padding-left: 60px;
      font-size: 18px;
      font-weight: 600;
      padding-top: 2px;
    }
    .add_cat_input{
      width: 300px;
      border-radius: 25px;
      background-color: blue;
      border: 1px solid blue;
      color: white;
      font-size: 16px;
      font-weight: 500;
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
      float: right;
    }
    .val_name span{
      font-size: small;
      margin: 0px;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    h4{
      font-size:1.25rem;
    }
    .amount_div input[type=number]{
      border-radius: 25px;
      height: 50px;
      padding-left: 60px;
      font-size: 18px;
      font-weight: 600;
      padding-top: 2px;
    }
    .add_cat_input{
      width: 300px;
      border-radius: 25px;
      background-color: blue;
      border: 1px solid blue;
      color: white;
      font-size: 16px;
      font-weight: 500;
    }
    .card_pading
    {
      padding-left:45px !important;
    }
    .outer_row{
      font-size: large;
    }
    .form_value{
      font-size: 17px;
      font-weight: 500;
      margin: 0px;
      float: right;
    }
    .form_total1{
      font-size: 17px;
      font-weight: 600;
    }
    .val_name span{
      font-size: 17px;
      margin: 0px;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    h4{
      font-size:1.25rem;
    }
    .amount_div input[type=number]{
      border-radius: 25px;
      height: 50px;
      padding-left: 60px;
      font-size: 18px;
      font-weight: 600;
      padding-top: 2px;
    }
    .add_cat_input{
      width: 300px;
      border-radius: 25px;
      background-color: blue;
      border: 1px solid blue;
      color: white;
      font-size: 16px;
      font-weight: 500;
    }
    .card_pading
    {
      padding-left:45px !important;
    }
    .outer_row{
      font-size: large;
    }
    .form_value{
      font-size: 17px;
      font-weight: 500;
      margin: 0px;
      float: right;
    }
    .form_total1{
      font-size: 17px;
      font-weight: 600;
    }
    .val_name span{
      font-size: 17px;
      margin: 0px;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    h4{
      font-size:1.25rem;
    }
    .amount_div input[type=number]{
      border-radius: 25px;
      height: 50px;
      padding-left: 60px;
      font-size: 18px;
      font-weight: 600;
      padding-top: 2px;
    }
    .add_cat_input{
      width: 300px;
      border-radius: 25px;
      background-color: blue;
      border: 1px solid blue;
      color: white;
      font-size: 16px;
      font-weight: 500;
    }
    .card_pading
    {
      padding-left:45px !important;
    }
    .outer_row{
      font-size: large;
    }
    .form_value{
      font-size: 17px;
      font-weight: 500;
      margin: 0px;
      float: right;
    }
    .form_total1{
      font-size: 17px;
      font-weight: 600;
    }
    .val_name span{
      font-size: 17px;
      margin: 0px;
    }
  }
  .blue_div{
    background-color: blue;
    width: 208px;
    height: 40px;
    color: white;
    padding-left: 25px;
    padding-top: 3px;
    font-size: x-large;
    margin-bottom: 20px;
  }
  .category_div{
    margin: 0px 20px 5px 0px;
    background-color: #EBEBEB;
    width: auto;
    height: auto;
    color: black;
    /* padding-left: 25px; */
    padding: 7px 15px 5px 15px;
    font-size: unset;
    /* margin-bottom: 20px; */
    border-radius: 25px;
  }
  .custom_hr{
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid blue;
  }
  .add_cat_div{
    background: blue;
    padding: 5px 5px 5px 15px;
    border-radius: 25px;
  }
  .add_cat_input::placeholder{
    color: white;
  }
  .add_cat_input:focus{
    background-color: blue;
    color: white;
    border: 1px solid blue;
  }
  .add_cat_btn{
    border-radius: 25px;
    color: blue;
    font-size: 17px;
    padding: 8px 20px 8px 20px;
  }
  .label_text{
    font-size: 19px !important;
    font-weight: 500;
  }
  .custom-select{
    border-radius: 25px;
    padding: 10px 20px 10px 20px !important;
    height: 50px;
    font-weight: 600;
    font-size: smaller;
  }
  .amount_div{
    position: relative;
  }
  .cost_amount_i{
    position: absolute;
    top: 44px;
    left: 50px;
  }
  .tax_amount_i{
    position: absolute;
    top: 44px;
    left: 150px;
  }
  .summary_sec_heading{
    color: white;
    font-size: 20px;
    margin: 0px;
  }
  .summary_sec_text{
    color: white;
    font-size: 18px;
    margin: 0px;
  }
  .add_cost_btn{
    background-color: blue;
    height: 42px;
    font-size: 20px;
    font-weight: 700;
  }

</style>
<div class="row outer_row">
<!-- Modal -->
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

?>
@foreach($data['custom_category'] as $category)

<div class="modal fade" id="Modal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel{{$category->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel{{$category->id}}">View Costs by Month</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="padding: 0px 25px">
          <h4 style="color: blue">Category: {{$category->category_name}}</h4>
          @foreach($data['custom_costs'] as $custom_cost)
            @if($custom_cost->custom_cost == $category->id)
              <div class="alert alert-secondary col-md-12">
                
                
                <h4>For Month: {{$custom_cost->for_month.' '.$custom_cost->for_year}}</h4>
                <label>Cost Amount: €<span>{{$custom_cost->line_ext_val}}</span> 
                </label>
                <br/>
                <label>Tax Amount: €<span>{{$custom_cost->tax_amount_val}}</span> 
                </label>
                <form id="delete-form-{{$custom_cost->id}}" method="post" style="display: none;" action="{{route('customcost.destroy',$custom_cost->id)}}">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                </form>

                <a href="#" onclick="
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
                  <button style="float: right;" type="button" class="btn btn-inverse-danger btn-fw btn-rounded btn-block">Delete</button>
                </a>
              </div>
            @endif
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
  <div class="grid-margin col-md-12">
    <div class="card" >
      <div class="card_pading card-body col-md-11 ">
        <div class="row" style="display: block;">
          <h2 style="color: blue"><b>ADD COST</b></h2>
          <span>Add your extra cost you made for your business. First add a category , then add the costs for this category.
          </span>
        </div>
        <br/><br/>
        <div class=" row">
          <div class="blue_div">
            Categories
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

        <div class=" row">
          @foreach($data['custom_category'] as $category)
          <div class="category_div">
            <input type="hidden" name="custom_cat_{{$category->id}}" id="custom_cat_{{$category->id}}" value="{{$category->category_name}}">
            <b>{{$category->category_name}}</b>
            <span style="margin-left: 30px">
              <i class="fas fa-list" data-toggle="modal" data-target="#Modal{{$category->id}}"></i>
              <a href="{{route('customcategory.edit',$category->id)}}" style="color: black">
                <i class="fas fa-pencil-alt"></i>
              </a>
              
              <form id="delete-form-{{$category->id}}" method="post" style="display: none;" action="{{route('customcategory.destroy',$category->id)}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
              </form>
              <a href="#" onclick="
                if(confirm('Are you sure you want to delete this?'))
                {
                  event.preventDefault();
                  document.getElementById('delete-form-{{$category->id}}').submit();
                }
                else
                {
                  event.preventDefault();
                }

              ">
                <i class="fas fa-trash-alt" style="color: black"></i>
              </a>
            </span>
          </div>
          @endforeach
        </div>
        <br/>
        <br/>
        <div class="row">
          <div class="add_cat_div">
            <form method="post" style="display: flex" action="{{route('customcategory.store')}}">
              {{ csrf_field() }}
              <input type="text" class="form-control add_cat_input" name="category_name" placeholder="Type a new categories here..." required>
              <input type="submit" class="btn btn-light add_cat_btn" value="ADD">
            </form>
          </div>
        </div>
        <br/><br/>
        <div class="row">
          <div class="blue_div">
            Costs
          </div>
        </div>
        <br/>

        <div class="row">
          <div class="col-md-9" style="background-color: #EBEBEB;padding: 20px 30px 10px 35px;">
            <div class="row">
              <label style="font-size: 22px"><b>ADD COST</b></label>
            </div>
            <br/>
            <form method="post" action="{{route('customcost.store')}}">
              {{ csrf_field() }}
            <div class="row">
              <div class="form-group col-md-6">
                <label class="label_text">Select Month</label>
                <select class="form-control custom-select" id="for_month" name="for_month" required>
                  <option value="">Select Month</option>
                  <option value="<?= $invoice_for_month.$invoice_for_year ?>">
                    <?= $invoice_for_month_name.' '.$invoice_for_year ?>
                  </option>
                  <?php for($i=0; $i< count($previous_month_num); $i++): ?>
              
                    <option value="<?= $previous_month_num[$i].$previous_year[$i] ?>">
                      <?= $previous_month_name[$i].' '.$previous_year[$i] ?>
                    </option>

                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="label_text">Select Category</label>
                <select class="form-control custom-select" id="custom_category" name="custom_category" required>
                  <option value="">Select Category</option>
                @foreach($data['custom_category'] as $category)
                  <option value="{{$category->id}}">
                    {{$category->category_name}}
                  </option>
                @endforeach
                </select>
              </div>
            </div>
            <br/>
            <div class="row">
              <div class="form-group col-md-6 amount_div">
                <label class="label_text">Cost Amount</label>
                <input type="number" class="form-control" min="0" id="cost_amount" name="cost_amount" required>
                <i class="fas fa-euro-sign cost_amount_i"></i>
              </div>

<input type="hidden" name="result_cost" id="result_cost">
<input type="hidden" name="result_tax" id="result_tax">

<input type="hidden" name="tax_amount" id="tax_amount">

              <div id="tax_amount_per_div" class="form-group col-md-6 amount_div">
                <label class="label_text">Tax Amount</label>
                <select class="form-control custom-select" id="tax_amount_per" name="tax_amount_per">
                  <option value="21">21 %</option>
                  <option value="9">9 %</option>
                  <option value="0">0 %</option>
                </select>
                <!-- <input type="number" value="21" onInput="checkLength(5,this)" class="form-control" min="0" maxlength="4" id="tax_amount" name="tax_amount" >
                <i class="fas fa-percent tax_amount_i"></i> -->
              </div>
              <div id="tax_amount_amt_div" class="form-group col-md-6 amount_div" style="display: none;">
                <label class="label_text">Tax Amount</label>
                <input type="number" class="form-control" min="0" id="tax_amount_amt" name="tax_amount_amt">
                <i class="fas fa-euro-sign cost_amount_i"></i>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="amount_inc_tax" name="cost_amount_opt" value="1" checked>
                  <label class="custom-control-label" for="amount_inc_tax">Amount includes tax</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="amount_exl_tax" name="cost_amount_opt" value="0">
                  <label class="custom-control-label" for="amount_exl_tax">Amount excludes tax</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="percentage" name="tax_amount_opt" value="1" checked>
                  <label class="custom-control-label" for="percentage">Percentage</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="amount" name="tax_amount_opt" value="0">
                  <label class="custom-control-label" for="amount">Amount</label>
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block add_cost_btn">Add cost</button>
              </div>
            </div>
          </form>
          </div>
          <div class="col-md-3" style="background-color: blue;padding: 35px 0px 40px 55px;">
            <div class="row">
              <label style="color: white;font-size: 22px"><b>SUMMARY</b></label>
            </div>
            <br/>
            <div class="row" style="display: grid;">
              <label class="summary_sec_heading">
                <b>Add cost</b>
              </label>
              <label class="summary_sec_text">
                € <span id="summary_add_cost"></span>
              </label>
            </div>
            <div class="row" style="display: grid;">
              <label class="summary_sec_heading">
                <b>Tax amount</b>
              </label>
              <label class="summary_sec_text">
                € <span id="summary_tax_amnt"></span>
              </label>
            </div>
            <div class="row" style="display: grid;">
              <label class="summary_sec_heading">
                <b>Category</b>
              </label>
              <label class="summary_sec_text" id="summary_category">
                &nbsp;
              </label>
            </div>
            <div class="row" style="display: grid;">
              <label class="summary_sec_heading">
                <b>Month</b>
              </label>
              <label class="summary_sec_text" id="summary_month">
                
              </label>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>

</div>
<script>
  $(document).ready(function(){

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
    $('#summary_add_cost').html(cost.toFixed(2));
    $('#summary_tax_amnt').html(tax.toFixed(2));

    $('#result_cost').val(cost.toFixed(2));
    $('#result_tax').val(tax.toFixed(2));
  }
  function GetMonthName(monthNumber) {
      var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
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
<style type="text/css">
  .th1
  {
    color: blue !important;
  }
</style>


@endsection