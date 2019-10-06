@extends('layouts.app')


@section('main_content')

<style type="text/css">
  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
    .add_cat_btn{
      border-radius: 25px;
      color: blue;
      font-size: 11px;
      padding: 8px 20px 8px 20px;
    }
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
      font-size: 10px;
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
    .add_cat_btn{
      border-radius: 25px;
      color: blue;
      font-size: 11px;
      padding: 8px 20px 8px 20px;
    }
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
      font-size: 10px;
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
    .add_cat_btn{
      border-radius: 25px;
      color: blue;
      font-size: 17px;
      padding: 8px 20px 8px 20px;
    }
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
    .add_cat_btn{
      border-radius: 25px;
      color: blue;
      font-size: 17px;
      padding: 8px 20px 8px 20px;
    }
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
    .add_cat_btn{
      border-radius: 25px;
      color: blue;
      font-size: 17px;
      padding: 8px 20px 8px 20px;
    }
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

  <div class="grid-margin col-md-12">
    <div class="card" >
      <div class="card_pading card-body col-md-11 ">
        <div class="row" style="display: block;">
          <h4 style="color: blue">Edit Category Name</h4>
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

        <div class="row">
          <div class="add_cat_div">
            <form method="post" style="display: flex" action="{{route('customcategory.update',$data['custom_category'][0]->id)}}">
              {{ csrf_field() }}
              {{method_field('PUT')}}
              <input type="text" class="form-control add_cat_input" name="category_name" value="{{$data['custom_category'][0]->category_name}}" required>
              <input type="submit" class="btn btn-light add_cat_btn" value="UPDATE">
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>

</div>
<style type="text/css">
  .th1
  {
    color: blue !important;
  }
</style>


@endsection