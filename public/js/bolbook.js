
  
$('input:radio[name="comment_option"]').change(function(){
    var val = $( "input:checked" ).val();
    $('#feedback_form_div').show();
    $('#feedback_empty_div').hide();
    
    if(val == 'ontevreden' || val == 'wel_oke')
    {
      $('#first_lable').show();
      $('#second_lable').hide();
    }else{
      $('#comment').val('');
      $('#first_lable').hide();
      $('#second_lable').show();
    }
  });

function on() 
{
  document.getElementById("overlay").style.display = "block";
}
    
  
	

    function onlynumbers(evt) {
      var theEvent = evt || window.event;

      // Handle paste
      if (theEvent.type === 'paste') {
          key = event.clipboardData.getData('text/plain');
      } else {
      // Handle key press
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode(key);
      }
      var regex = /[0-9]|\.|\,/;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
    }

    function sleep(milliseconds) {
	  var start = new Date().getTime();
	  for (var i = 0; i < 1e7; i++) {
	    if ((new Date().getTime() - start) > milliseconds){
	      break;
	    }
	  }
	}
  function currencyFormatDE(num) {
    return (
      num
        .toFixed(2) // always two decimal digits
        .replace('.', ',') // replace decimal point character with ,
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    ) // use . as a separator
  }
  function number_format(number, decimals, dec_point, thousands_point) {

      if (number == null || !isFinite(number)) {
          throw new TypeError("number is not valid");
      }

      if (!decimals) {
          var len = number.toString().split('.').length;
          decimals = len > 1 ? len : 0;
      }

      if (!dec_point) {
          dec_point = '.';
      }

      if (!thousands_point) {
          thousands_point = ',';
      }

      number = parseFloat(number).toFixed(decimals);

      number = number.replace(".", dec_point);

      var splitNum = number.split(dec_point);
      splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
      number = splitNum.join(dec_point);

      return number;
    }