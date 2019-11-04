
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
    function summary()
  {
    var cost = tax = '';
    var cost_amount_opt = $('input[name="cost_amount_opt"]:checked').val();
    var tax_amount_opt = $('input[name="tax_amount_opt"]:checked').val();

    var cost_amount = $('#cost_amount').val();
    var tax_amount = $('#tax_amount').val();

    var newchar = '.';
    cost_amount = cost_amount.split(',').join(newchar);
    cost_amount = parseFloat(cost_amount);
    tax_amount = tax_amount.split(',').join(newchar);
    tax_amount = parseFloat(tax_amount);

    var select_month_year = $('#for_month').val();
    var custom_category_id = $('#custom_category').val();
    var div_id = '#custom_cat_'+custom_category_id;
    var custom_category_name = $(div_id).val();

    var month = select_month_year.substr(0,2);
    var year = select_month_year.substr(-4);
    var monthName = GetMonthName(month);
    // var monthName = month;

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
    $('#summary_add_cost').html(currencyFormatDE(summary_add_cost));
    $('#summary_tax_amnt').html(currencyFormatDE(tax));

    $('#result_cost').val(cost.toFixed(2));
    $('#result_tax').val(tax.toFixed(2));
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
