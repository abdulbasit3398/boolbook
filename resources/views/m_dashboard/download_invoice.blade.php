<!DOCTYPE html>
<html>
<head>
  <title>PDF Generator</title>
  <style>
    @font-face {
      font-family: 'poppins';
      src: url({{ storage_path('fonts/Poppins-Regular.ttf') }}) format('truetype');
font-weight: 400;
font-style: normal;
}
@font-face {
  font-family: 'poppins-italic';
  src: url({{ storage_path('fonts/Poppins-RegularItalic.ttf') }}) format('truetype');
font-weight: 400;
font-style: normal;
}
@font-face {
  font-family: 'poppins-semi-bold';
  src: url({{ storage_path('fonts/Poppins-SemiBold.ttf') }}) format('truetype');
font-weight: 900;
font-style: normal;
}
@font-face {
  font-family: 'poppins-bold';
  src: url({{ storage_path('fonts/Poppins-Bold.ttf') }}) format('truetype');
font-weight: 900;
font-style: normal;
}
@font-face {
  font-family: 'poppins-medium';
  src: url({{ storage_path('fonts/Poppins-Medium.ttf') }}) format('truetype');
font-weight: 400;
font-style: normal;
}
@font-face {
  font-family: 'monotype-corsive';
  src: url({{ storage_path('fonts/MonotypeCorsiva-Regular.ttf') }}) format('truetype');
font-weight: 400;
font-style: normal;
}
* {
  font-family: "poppins";
}
.lead {
  color: #175ade;
  font-size: 16;
}
.header {
  margin-top: -35;
  flex-direction: row;
}
.text-bold {
  font-family: "poppins-bold";
  font-weight: 400;
  font-size: 46;
}
.text-semi-bold {
  font-family: "poppins-semi-bold";
  font-weight: 400;
}
.text-bold-small {
  font-family: "poppins-bold";
  font-weight: 400;
  font-size: 12;
}
.text-small {
  margin: 0 3;
  font-size: 12;
}
.text-medium {
  font-family: "poppins-medium";
  font-weight: 500;
  font-size: 12;
}
.sub-header {
  margin-top: -10;
  flex-direction: row;
  margin-bottom: 20px;
}
.text-italic {
  font-family: "monotype-corsive";
  font-weight: 400;
  font-size: 14;
}
#rectangle{
  width: 30px;
  height: 30px;
  background: white;
  transform: rotate(-45deg);
  z-index: 1;
  float: left;
  padding-top: 0px;
  margin-left: 90px;
}
#content {
  z-index: -1;
  margin-top: 20px;
  background-color: #175ade;
  flex: 1;
  margin-left: -35;
  margin-right: -35;
  height: 300px;
  justify-content: center;
  padding: 40;
}
.table {
  color: white;
  border-collapse: collapse;
}
td {
  vertical-align: top;
}
tr.border_bottom td {
  border-spacing: 10;
  border-bottom: 1.1pt solid white;
}

.info {
  margin-top: 50px;
  position: relative;
}

.footer {
  background-color: #175ade;
  position: fixed;
  bottom: -60px;
  left: -50px;
  right: -50px;
  height: 60px;
  color: white;
  text-align: center;
}
</style>
</head>
<body>
  <span class="lead">HOI! DIT IS JOUW</span>
  <div class="header">
    <span class="text-bold">FACTUUR</span>
    <span class="text-bold-small" style="margin: 0 10">NR.</span>
    <span class="text-small">{{ $invoice_nr }}</span> | <span class="text-small">
      {{date('d-m-Y',strtotime($payment->createdAt))}}
    </span>
    <img src="{{ asset('images/invoice_logo.png') }}" width="45" height="45" style="margin-left: 25">
  </div>
  <div class="sub-header">
    <span class="text-italic">voor</span>
    <span class="text-small" style="font-family: 'poppins-bold">
      {{ (Auth::user()->company_name == '') ? Auth::user()->name.' '.Auth::user()->last_name : Auth::user()->company_name}}
    </span>
  </div>
  <div id="rectangle"></div>
  <div id="content">
    <table class="table">
      <tr class="border_bottom">
        <td width="385">DE SERVICE(S) DIE JE HEBT GEBRUIKT</td>
        <td width="100">KOSTEN</td>
        <td width="25">BTW</td>
      </tr>
      <tr>
        <td>
          <div>
            <span class="text-medium">Bolbooks online boekhouding</span>
          </div>
          <div style="margin-top: -4px">
            <span style="font-size: 16px;"><i>Omzetklasse {{ $turnover_category }}</i></span>
          </div>
        </td>
        <td class="text-medium">&euro;{{$kosten}}</td>
        <td class="text-medium">21%</td>
      </tr>
    </table>
    <table class="table" style="border-top: 1.1pt solid white; width: 515; margin-top: 150px">
      <tr>
        <td width="200"> </td>
        <td width="100">Totaal BTW</td>
        <td width="100">&euro;{{$total_btw}}</td>
      </tr>
      <tr>
        <td width="200"> </td>
        <td width="100">Totaal betaald</td>
        <td width="100">&euro;{{$payment->amount_val}}</td>
      </tr>
    </table>
  </div>
  <div class="info">
    <span class="text-medium" style="font-size: 16px; position: absolute; margin: 25px 0;">BETALING VOLDAAN OP {{date('d-m-Y',strtotime($payment->paidAt))}}</span>
    <hr style="margin-bottom: -35px; margin-top: 40px; width: 440; margin-left: 0">
    <span class="text-bold" style="margin-top: -40px;">BEDANKT</span>
    <span class="text-italic" style="margin: 0 10px">voor</span>
    <span class="text-semi-bold">HET GEBRUIKEN VAN BOLBOOKS!</span>
    <hr style="margin-top: -5px; width: 440; margin-left: 0"><br>
    <br>
    <table style="font-size: 11">
      <tr>
        <td class="text-medium" style="font-size: 12" width="200">GEGEVENS PROVIDER</td>
        <td class="text-medium" style="font-size: 12" width="200">GEGEVENS KLANT</td>
      </tr>
      <tr style="line-height: 9px;">
        <td>Bolbooks</td>
        <td>{{ Auth::user()->name.' '.Auth::user()->last_name }}</td>
      </tr>
      <tr style="line-height: 9px;">
        <td>Willem de Zwijgerlaan 76</td>
        <td>{{ Auth::user()->street_name.' '.Auth::user()->house_no }}</td>
      </tr>
      <tr style="line-height: 9px;">
        <td>3931 KS, Woudenberg</td>
        <td>{{ Auth::user()->post_code.', '.Auth::user()->residence }}</td>
      </tr>
      <tr style="line-height: 9px;">
        <td>KVK 72468270</td>
        <td>{{ Auth::user()->vat_number }}</td>
      </tr>

    </table>
  </div>

  <footer class="footer">
    <span class="text-medium" style="margin: 0 10; font-size: 14px">NOG VRAGEN? NEEM CONTACT OP!</span>
    <span style="margin: 0 10; font-size: 14px">INFO@BOLBOOKS.NL</span>
  </footer>

</body>
</html>