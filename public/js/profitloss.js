var invoice_for_month = $('#invoice_for_month').val();
    var invoice_for_year = $('#invoice_for_year').val();
    ajaxCall(invoice_for_month,invoice_for_year);

    $("#select_month").change(function(){
      var select_month_year = $(this).val();
      var month = select_month_year.substr(0,2);
      var year = select_month_year.substr(-4);
      var monthName = GetMonthName(month);

      $('#monthName').html(monthName);
      $('#year').html(year);
      ajaxCall(month,year);
    });
    
  
    function ajaxCall(month,year)
    {
      var custom_cost = custom_cost_name = custom_cost_val = '';
      var token = $('meta[name="csrf_token"]').attr('content');
      var base_url = $('#base_url').val();

      $('#custom_costs_div').hide();
      $('#custom_costs_div').empty();

      $('#compensation_div').hide();
      $('#commission_div').hide();
      $('#shipment_label_div').hide();
      $('#shipment_label_post_div').hide();
      $('#plaza_return_shipping_label_div').hide();
      $('#pick_pack_div').hide();
      $('#outbound_div').hide();
      $('#stock_div').hide();
      $('#nck_stock_div').hide();
      $('#compensation_div').hide();
      $('#logistical_charge_div').hide();
      $('#first_mile_div').hide();
      $('#correction_correction_div').hide();
      $('#compensation_lost_goods_div').hide();
      $('#total_revenue').html('0.00');
      $('#total_revenue1').html('0.00');
      $('#taxes_to_pay_div').html('0.00');
      $('#total_profit_and_tax_div').html('0.00');

      var month = month;
      $.ajax({
        method: 'POST',
        url: base_url+'/retrive_costs_by_month',
        headers: {
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
        },
        data: {"_token": token ,month:month,year:year},
        async: false,
        success: function(response)
        {
          response_custom_cost = response['custom_costs'];
          response = response['all_costs'];
          
          var set_correction_pick_pack = set_pick_pack = set_correction_outbound = set_outbound = set_turnover = set_correction_turnover = set_correction_commission = set_commission = total_costs = custom_cost_tax_amount_val = correction_correction_tax = shipment_label_tax = stock_tax = nck_stock_tax = plaza_return_shipping_label_tax = logistical_charge_tax = commission_tax = pick_pack_tax = outbound_tax = total_revenue = 0;
          if (response.length == 0)
          {

          }
          for(var i = 0; i < response_custom_cost.length; i++)
          {
            custom_cost = response_custom_cost[i]['custom_cost'];
            if(custom_cost != 0)
            {
              custom_cost_name = response_custom_cost[i]["cost_name"];
              custom_cost_val = response_custom_cost[i]["line_ext_val"] + response_custom_cost[i]["tax_amount_val"];
              custom_cost_tax_amount_val += response_custom_cost[i]["tax_amount_val"];

              $('#custom_costs_div').show();
              $('#custom_costs_div').append('<div id="" class="val_name_row row"><div class="val_name col-md-7"><span>'+custom_cost_name+'</span><p class="form_value">€ <span id="">'+currencyFormatDE(custom_cost_val)+'</span></p></div></div>');
              total_costs += custom_cost_val;
            }
          }
          for(var i = 0; i < response.length; i++)
          {

            if(response[i]['cost_name'] == 'CORRECTION_CORRECTION')
            {
              var correction_correction_line_ext_val = response[i]['line_ext_val'];
              var correction_correction_tax_amnt_val = response[i]['tax_amount_val'];
              var correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
              total_costs = total_costs + correction_correction;
              correction_correction_tax = (correction_correction/121)*21;

              $('#correction_correction_div').show();
              $('#correction_correction').html(currencyFormatDE(correction_correction));

            }
            else if(response[i]['cost_name'] == 'SHIPMENT_LABEL_POST')
            {
              var shipment_label_post_line_ext_val = response[i]['line_ext_val'];
              var shipment_label_post_tax_amnt_val = response[i]['tax_amount_val'];
              var shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
              total_costs += shipment_label_post;

              $('#shipment_label_post_div').show();
              $('#shipment_label_post').html(currencyFormatDE(shipment_label_post));
            }
            else if(response[i]['cost_name'] == 'SHIPMENT_LABEL')
            {
              var shipment_label_line_ext_val = response[i]['line_ext_val'];
              var shipment_label_tax_amnt_val = response[i]['tax_amount_val'];
              var shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
              shipment_label_tax = (shipment_label/121)*21;
              total_costs += shipment_label;

              $('#shipment_label_div').show();
              $('#shipment_label').html(currencyFormatDE(shipment_label));
            }
            else if(response[i]['cost_name'] == 'CORRECTION_PICK_PACK')
            {
              var correction_pick_pack_line_ext_val = response[i]['line_ext_val'];
              var correction_pick_pack_tax_amnt_val = response[i]['tax_amount_val'];
              set_correction_pick_pack = 1;
            }
            else if(response[i]['cost_name'] == 'PICK_PACK')
            {
              var pick_pack_line_ext_val = response[i]['line_ext_val'];
              var pick_pack_tax_amnt_val = response[i]['tax_amount_val'];
              set_pick_pack = 1;
            }
            else if(response[i]['cost_name'] == 'CORRECTION_OUTBOUND')
            {
              var correction_outbound_line_ext_val = response[i]['line_ext_val'];
              var correction_outbound_tax_amnt_val = response[i]['tax_amount_val'];
              set_correction_outbound = 1;
            }
            else if(response[i]['cost_name'] == 'OUTBOUND')
            {
              var outbound_line_ext_val = response[i]['line_ext_val'];
              var outbound_tax_amnt_val = response[i]['tax_amount_val'];
              set_outbound = 1;
            }
            else if(response[i]['cost_name'] == 'STOCK')
            {
              var stock_line_ext_val = response[i]['line_ext_val'];
              var stock_tax_amnt_val = response[i]['tax_amount_val'];
              var stock = stock_line_ext_val + stock_tax_amnt_val;
              stock_tax = (stock/121)*21;
              total_costs += stock;

              $('#stock_div').show();
              $('#stock').html(currencyFormatDE(stock));
            }
            else if(response[i]['cost_name'] == 'NCK_STOCK')
            {
              var nck_stock_line_ext_val = response[i]['line_ext_val'];
              var nck_stock_tax_amnt_val = response[i]['tax_amount_val'];
              var nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
              nck_stock_tax = (nck_stock/121)*21;
              total_costs += nck_stock;

              $('#nck_stock_div').show();
              $('#nck_stock').html(currencyFormatDE(nck_stock));
            }
            else if(response[i]['cost_name'] == 'COMPENSATION_LOST_GOODS')
            {
              var compensation_lost_goods_line_ext_val = response[i]['line_ext_val'];
              var compensation_lost_goods_tax_amnt_val = response[i]['tax_amount_val'];
              var compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
              total_costs += compensation_lost_goods;

              $('#compensation_lost_goods_div').show();
              $('#compensation_lost_goods').html(currencyFormatDE(compensation_lost_goods));
            }
            else if(response[i]['cost_name'] == 'COMPENSATION')
            {
              var compensation_line_ext_val = response[i]['line_ext_val'];
              var compensation_tax_amnt_val = response[i]['tax_amount_val'];
              var compensation = compensation_line_ext_val + compensation_tax_amnt_val;
              total_costs += compensation;

              $('#compensation_div').show();
              $('#compensation').html(currencyFormatDE(compensation));
            }
            else if(response[i]['cost_name'] == 'CORRECTION_TURNOVER')
            {
              var correction_turnover_line_ext_val = response[i]['line_ext_val'];
              var correction_turnover_tax_amnt_val = response[i]['tax_amount_val'];
              set_correction_turnover = 1;
            }
            else if(response[i]['cost_name'] == 'TURNOVER')
            {
              var turnover_line_ext_val = response[i]['line_ext_val'];
              var turnover_tax_amnt_val = response[i]['tax_amount_val'];
              set_turnover = 1;
            }
            else if(response[i]['cost_name'] == 'CORRECTION_COMMISSION')
            {
              var correction_commission_line_ext_val = response[i]['line_ext_val'];
              var correction_commission_tax_amnt_val = response[i]['tax_amount_val'];
              set_correction_commission = 1;
            }
            else if(response[i]['cost_name'] == 'COMMISSION')
            {
              var commission_line_ext_val = response[i]['line_ext_val'];
              var commission_tax_amnt_val = response[i]['tax_amount_val'];
              set_commission = 1;
            }
            else if(response[i]['cost_name'] == 'PLAZA_RETURN_SHIPPING_LABEL')
            {
              var plaza_return_shipping_label_line_ext_val = response[i]['line_ext_val'];
              var plaza_return_shipping_label_tax_amnt_val = response[i]['tax_amount_val'];
              var plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
              plaza_return_shipping_label_tax = (plaza_return_shipping_label/121)*21;
              total_costs += plaza_return_shipping_label;

              $('#plaza_return_shipping_label_div').show();
              $('#plaza_return_shipping_label').html(currencyFormatDE(plaza_return_shipping_label));
            }
            else if(response[i]['cost_name'] == 'LOGISTICAL_CHARGE')
            {
              var logistical_charge_line_ext_val = response[i]['line_ext_val'];
              var logistical_charge_tax_amnt_val = response[i]['tax_amount_val'];
              var logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
              logistical_charge_tax = (logistical_charge/121)*21;
              total_costs += logistical_charge;

              $('#logistical_charge_div').show();
              $('#logistical_charge').html(currencyFormatDE(logistical_charge));
            }
            else if(response[i]['cost_name'] == 'FIRST_MILE')
            {
              var first_mile_line_ext_val = response[i]['line_ext_val'];
              var first_mile_tax_amnt_val = response[i]['tax_amount_val'];
              var first_mile = first_mile_line_ext_val + first_mile_tax_amnt_val;
              first_mile_tax = (first_mile/121)*21;
              total_costs += first_mile;

              $('#first_mile_div').show();
              $('#first_mile').html(currencyFormatDE(first_mile));
              console.log(first_mile);
            }
          }
          if(set_correction_turnover == 1 && set_turnover == 1)
          {
            total_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
            $('#total_revenue').html(currencyFormatDE(total_revenue));
            $('#total_revenue1').html(currencyFormatDE(total_revenue));
          }

          if(set_correction_commission == 1 && set_commission == 1)
          {
            var commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
            commission_tax = (commission/121)*21;
            total_costs += commission;

            $('#commission_div').show();
            $('#commission').html(currencyFormatDE(commission));
          }


          if(set_correction_pick_pack == 1 && set_pick_pack == 1)
          {
            pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
            pick_pack_tax = (pick_pack/121)*21;
            total_costs += pick_pack;

            $('#pick_pack_div').show();
            $('#pick_pack').html(currencyFormatDE(pick_pack));
          }

          if(set_correction_outbound == 1 && set_outbound == 1)
          {
            outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
            outbound_tax = (outbound/121)*21;
            total_costs += outbound;

            $('#outbound_div').show();
            $('#outbound').html(currencyFormatDE(outbound));
          }
          
          profit_before_tax = total_revenue - total_costs;
          console.log(total_revenue);
          console.log(total_costs);
          console.log(profit_before_tax);
          $('#profit_before_tax').html(currencyFormatDE(profit_before_tax));
          $('#total_costs').html(currencyFormatDE(total_costs));

          var total_costs_tax = custom_cost_tax_amount_val + correction_correction_tax + shipment_label_tax + stock_tax + nck_stock_tax + plaza_return_shipping_label_tax + logistical_charge_tax + commission_tax + pick_pack_tax + outbound_tax;

          var total_revenue_tax = (total_revenue/121)*21;

          var taxes_to_pay = total_revenue_tax - total_costs_tax;
          $('#taxes_to_pay_div').html(currencyFormatDE(taxes_to_pay));

          var total_profit_and_tax = profit_before_tax-taxes_to_pay;
          $('#total_profit_and_tax_div').html(currencyFormatDE(total_profit_and_tax));

          console.log(response);
          console.log(response_custom_cost);
          
        }

      });
}