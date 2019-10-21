<script type="text/javascript">
  // $( ".feedback_option" ).on( "click", function() {
  //   alert('sfvsd');
  //   // $( "input:checked" ).val();
  // });
  
  $('input:radio[name="feedback_option"]').change(function(){
    var val = $( "input:checked" ).val();
    $('#feedback_form_div').show();
    $('#feedback_empty_div').hide();
    
    if(val == 'ontevreden' || val == 'wel_oke')
    {
      $('#first_lable').show();
      $('#second_lable').hide();
    }else{
      $('#first_lable').hide();
      $('#second_lable').show();
    }
  });

  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='{{asset("home/js/twak.js")}}';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
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
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
    }
</script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('ui/assets/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('ui/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('ui/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('ui/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>

@section('scripts')
    @show
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('ui/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>