@extends('layouts.app')

@section('page_script')

<script>
  
  $(function() {
  var $document = $(document);
  var selector = '[data-rangeslider]';
  var $element = $(selector);
  // For ie8 support
  var textContent = ('textContent' in document) ? 'textContent' : 'innerText';
  // Example functionality to demonstrate a value feedback
  function valueOutput(element) {
      var value = element.value;
      var output = element.parentNode.getElementsByTagName('output')[0] || element.parentNode.parentNode.getElementsByTagName('output')[0];
      output[textContent] = value;
  }
  $document.on('input', 'input[type="range"], ' + selector, function(e) {
      valueOutput(e.target);
      var output = $('#js-output').html();
      if(output >= 0 && output <= 699)
      {
        $('#price_range').html('4.95');
      }
      else if(output >= 700 && output <= 1999)
      {
        $('#price_range').html('9.95');
      }
      else if(output >= 2000 && output <= 4999)
      {
        $('#price_range').html('19.95');
      }
      else if(output >= 5000 && output <= 9999)
      {
        $('#price_range').html('29.95');
      }
      else if(output >= 10000 && output <= 30000)
      {
        $('#price_range').html('39.95');
      }
      else if(output > 30000)
      {
        $('#price_range').html('59.95');
      }
      
  });
  // Example functionality to demonstrate disabled functionality
  $document .on('click', '#js-example-disabled button[data-behaviour="toggle"]', function(e) {
      var $inputRange = $(selector, e.target.parentNode);
      if ($inputRange[0].disabled) {
          $inputRange.prop("disabled", false);
      }
      else {
          $inputRange.prop("disabled", true);
      }
      $inputRange.rangeslider('update');
  });
  // Example functionality to demonstrate programmatic value changes
  $document.on('click', '#js-example-change-value button', function(e) {
      var $inputRange = $(selector, e.target.parentNode);
      var value = $('input[type="number"]', e.target.parentNode)[0].value;
      $inputRange.val(value).change();
  });
  // Example functionality to demonstrate programmatic attribute changes
  $document.on('click', '#js-example-change-attributes button', function(e) {
      var $inputRange = $(selector, e.target.parentNode);
      var attributes = {
              min: $('input[name="min"]', e.target.parentNode)[0].value,
              max: $('input[name="max"]', e.target.parentNode)[0].value,
              step: $('input[name="step"]', e.target.parentNode)[0].value
          };
      $inputRange.attr(attributes);
      $inputRange.rangeslider('update', true);
  });
  // Example functionality to demonstrate destroy functionality
  $document
      .on('click', '#js-example-destroy button[data-behaviour="destroy"]', function(e) {
          $(selector, e.target.parentNode).rangeslider('destroy');
      })
      .on('click', '#js-example-destroy button[data-behaviour="initialize"]', function(e) {
          $(selector, e.target.parentNode).rangeslider({ polyfill: false });
      });
  // Example functionality to test initialisation on hidden elements
  $document
      .on('click', '#js-example-hidden button[data-behaviour="toggle"]', function(e) {
          var $container = $(e.target.previousElementSibling);
          $container.toggle();
      });
  // Basic rangeslider initialization
  $element.rangeslider({
      // Deactivate the feature detection
      polyfill: false,
      // Callback function
      onInit: function() {
          valueOutput(this.$element[0]);
      },
      // Callback function
      onSlide: function(position, value) {
          console.log('onSlide');
          console.log('position: ' + position, 'value: ' + value);
      },
      // Callback function
      onSlideEnd: function(position, value) {
          console.log('onSlideEnd');
          console.log('position: ' + position, 'value: ' + value);
      }
  });
});
</script>

@endsection

@section('main_content')

      <div id="1" class="gray-section-header" style="background-color: white">
         <img src="{{asset('home/images/ipad-dashboard-2.png')}}" width="707" srcset="{{asset('home/images/ipad-dashboard-2.png')}} 500w, {{asset('home/images/ipad-dashboard-2.png')}} 1537w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, 750px" alt="" class="dashboard-image-right"/>
         <div class="w-container">
            <h1 class="section-headline-green">Simpel boekhouden <br/>voor bol-verkopers.</h1>
            <p class="section-description">Bespaar tijd & geld met de online <br/>boekhouding van bolbooks. </p>
            <a data-request-account-btn="true" href="#" class="button w-hidden-main w-hidden-medium w-hidden-small w-button custom_btn">Nu starten</a>
            <div class="w-form">
               <form method="post" action="{{route('SubscribedUser')}}" class="w-hidden-tiny">
                    {{csrf_field()}}
                  <div class="email-capture-product-left w-clearfix">
                      <input type="email" class="email-capture-field w-input" maxlength="256" name="email"  placeholder="Vul je emailadres in" id="" required=""/><input type="submit" value="Nu starten"  id="" class="button button-rounded w-button"/></div>
               </form>
               <div class="modal-form-success-product w-form-done">
                  <div>Securing your account...</div>
               </div>
               <div class="w-form-fail">
                  <div>Oops! Something went wrong while submitting the form.</div>
               </div>
            </div>
            <!-- <div class="logo-div"><img src="{{asset('home/images/press-logos-3.png')}}" width="420" srcset="{{asset('home/images/press-logos-3.png')}} 500w, {{asset('home/images/press-logos-3.png')}} 535w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 83vw, 420px" alt="" class="logo-image"/></div> -->
         </div>
      </div>
      <div class="gray-section-slanted">
         <div class="container-slanted container-slanted-center w-container">
            <h2 class="section-headline-green section-headline-green-center">We bieden je enkel het beste.</h2>
            <div class="value-pair w-row">
               <div class="w-col w-col-6">
                  <div class="value-block value-block-3">
                     <h3 class="value-title">Bespaar tijd</h3>
                     <p class="value-description">Altijd uren bezig met je boekhouding? Vooral bij de aangiftes? Dat is vanaf nu verleden tijd.</p>
                  </div>
               </div>
               <div class="w-col w-col-6">
                  <div class="value-block value-block-4">
                     <h3 class="value-title">Enorm eenvoudig</h3>
                     <p class="value-description">Boekhouden moeilijk? Het enige wat jij hoeft te doen is kosten toevoegen en we helpen je er graag bij.</p>
                  </div>
               </div>
            </div>
            <div class="value-pair value-pair-2 w-row">
               <div class="w-col w-col-6">
                  <div class="value-block value-block-2">
                     <h3 class="value-title">Altijd inzicht</h3>
                     <p class="value-description">We updaten jouw opbrengsten en kosten altijd direct, zo heb je op elk moment inzicht.</p>
                  </div>
               </div>
               <div class="w-col w-col-6">
                  <div class="value-block value-block-1">
                     <h3 class="value-title">100% Support</h3>
                     <p class="value-description">We snappen dat je vragen hebt. Onze handige artikelen en ons team staan voor je klaar!</p>
                  </div>
               </div>
            </div>
            <a data-request-account-btn="true" href="https://app.bolbooks.nl/register" class="button w-button" style="border-radius: 25px">Nu starten</a>
         </div>
      </div>
      <div class="white-section-slanted">
         <div class="container-slanted w-container">
            <div class="w-row">
               <div class="section-column-left w-col w-col-6">
                  <!-- <div class="product-features-row w-row">
                     <div class="w-col w-col-6 w-col-small-6">
                        <a href="#" class="product-link-block w-inline-block">
                           <div class="product-div">
                              <img src="{{asset('home/images/icon-proposal.png')}}" alt="" class="product-div-icon"/>
                              <h6 class="product-div-heading">Proposals</h6>
                           </div>
                        </a>
                     </div>
                     <div class="w-col w-col-6 w-col-small-6">
                        <a href="#" class="product-link-block w-inline-block">
                           <div class="product-div">
                              <img src="{{asset('home/images/icon-contract.png')}}" alt="" class="product-div-icon"/>
                              <h6 class="product-div-heading">Contracts</h6>
                           </div>
                        </a>
                     </div>
                  </div> -->
                  <div class="product-features-row w-row">
                     <div class="w-col w-col-6 w-col-small-6">
                        <a href="#" class="product-link-block w-inline-block">
                           <div class="product-div">
                              <img src="{{asset('home/images/icon-timetracking.png')}}" alt="" class="product-div-icon"/>
                              <h6 class="product-div-heading">Tijdsbesparing</h6>
                           </div>
                        </a>
                     </div>
                     <div class="w-col w-col-6 w-col-small-6">
                        <a href="#" class="product-link-block w-inline-block">
                           <div class="product-div">
                              <img src="{{asset('home/images/icon-payment.png')}}" alt="" class="product-div-icon"/>
                              <h6 class="product-div-heading">Resultaatoverzicht</h6>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="product-features-row w-row">
                     <div class="w-col w-col-6 w-col-small-6">
                        <a href="#" class="product-link-block w-inline-block">
                           <div class="product-div">
                              <img src="{{asset('home/images/icon-reporting.png')}}" alt="" class="product-div-icon"/>
                              <h6 class="product-div-heading">Kosteninzicht</h6>
                           </div>
                        </a>
                     </div>
                     <div class="w-col w-col-6 w-col-small-6">
                        <a href="#" class="product-link-block w-inline-block">
                           <div class="product-div">
                              <img src="{{asset('home/images/icon-sun.png')}}" alt="" class="product-div-icon"/>
                              <h6 class="product-div-heading">Aangifte klaar</h6>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="column-4 w-col w-col-6">
                  <h2 class="section-headline-green">Inzicht in resultaat, geen  
                    <br/>verassingen.</h2>
                  <p class="section-description"></p>

                  <p class="section-description">Met de slimme automatiseringen van Bolbooks heb je direct inzichten in je resultaten en hoef je enkel je kosten in te voeren.<br/><br/>Als jij focust op verkopen dan zorgen wij voor de rest.</p>
                  <a data-request-account-btn="true" href="https://app.bolbooks.nl/register" class="button button-rounded w-button">Nu starten</a>
               </div>
            </div>
         </div>
      </div>
      <div class="gray-section-slanted">
         <div class="container-slanted w-container">
            <h2 class="section-headline-green section-headline-green-center">Bol-verkopers vertrouwen Bolbooks.</h2>
            <div class="flex-div top-margin">
               <div class="testimonial-div">
                  <div class="testimonial-green-title">Mijn favoriet voor de boekhouding</div>
                  <div class="testimonial-text">&quot;De service van Bolbooks heeft mij het ondernemen op bol.com een stuk makkelijker gemaakt. Hoef me nooit zorgen te maken dat de boekhouding niet in orde is. Super gemakkelijk en overzichtelijk. Zeker een aanrader.&quot;</div>
                  <div class="_1px-div"></div>
                  <div class="w-row">
                     <div class="w-col w-col-3"><img src="{{asset('home/images/d-matti.jpg')}}" width="70" alt="" class="twitter-image"/></div>
                     <div class="w-col w-col-9">
                        <div class="testimonial-name">D. Matti</div>
                        <div class="testimonial-company">Bol-verkoper</div>
                     </div>
                  </div>
               </div>
               <div class="testimonial-div">
                  <div class="testimonial-green-title">Zoals het hoort te zijn</div>
                  <div class="testimonial-text">&quot;Duidelijke en voordelige boekhoud tool die ik en veel van mijn studenten gebruiken. Ook hele fijne communicatie met de medewerkers van bolbooks als het gaat om wat opheldering van de boekhouding!&quot;</div>
                  <div class="_1px-div"></div>
                  <div class="w-row">
                     <div class="w-col w-col-3"><img src="{{asset('home/images/e-makonga.jpg')}}" width="70" alt="" class="twitter-image"/></div>
                     <div class="w-col w-col-9">
                        <div class="testimonial-name">E. Makonga</div>
                        <div class="testimonial-company">Bol-verkoper & coach</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="flex-div">
               <div class="testimonial-div">
                  <div class="testimonial-green-title">Overzichtelijk vormgegeven</div>
                  <div class="testimonial-text">&quot;Ik vind het fijn dat ik zelf m’n kostenposten kan maken. Zo is voor mij overzichtelijk welke kostenposten (te) hoog zijn en kan ik op tijd actie ondernemen.&quot;</div>
                  <div class="_1px-div"></div>
                  <div class="w-row">
                     <div class="w-col w-col-3"><img src="{{asset('home/images/t-laseur.jpg')}}" width="70" alt="" class="twitter-image"/></div>
                     <div class="w-col w-col-9">
                        <div class="testimonial-name">T. Laseur</div>
                        <div class="testimonial-company">Bol-verkoper</div>
                     </div>
                  </div>
               </div>
               <div class="testimonial-div">
                  <div class="testimonial-green-title">Bespaard me tijd en fouten</div>
                  <div class="testimonial-text">&quot;Ik deed de boekhouding altijd zelf, maar sinds ik deze app gebruik ben ik een stuk sneller klaar aan het eind van de maand. Ik heb ook de afgelopen maanden ingevoerd en daaruit bleek dat ik zelf wel eens een foutje maakte.&quot;</div>
                  <div class="_1px-div"></div>
                  <div class="w-row">
                     <div class="w-col w-col-3"><img src="{{asset('home/images/w-blokhuis.jpg')}}" width="70" alt="" class="twitter-image"/></div>
                     <div class="w-col w-col-9">
                        <div class="testimonial-name">W. Blokhuis</div>
                        <div class="testimonial-company">Bol-verkoper</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="features" class="white-section-slanted">
         <div class="container-slanted container-slanted-center w-container">
            <h2 class="section-headline-gray">Ontdek Bolbooks.</h2>
            <div data-duration-in="300" data-duration-out="100" class="features-section-tabs w-tabs">
               <div class="features-section-row w-tab-menu">
                  <a data-w-tab="Tab 1" class="features-section-button w-inline-block w-tab-link w--current">
                     <div>Dashboard</div>
                  </a>
                  <a data-w-tab="Tab 2" class="features-section-button w-inline-block w-tab-link">
                     <div>Resultaat</div>
                  </a>
                  <a data-w-tab="Tab 3" class="features-section-button w-inline-block w-tab-link">
                     <div>Kosteninzicht</div>
                  </a>
                  <a data-w-tab="Tab 4" class="features-section-button w-inline-block w-tab-link">
                     <div>Btw-aangifte</div>
                  </a>
               </div>
               <div class="w-tab-content">
                  <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
                     <div class="feature-description-container w-row">
                        <div class="w-col w-col-6 w-col-small-small-stack w-col-stack">
                           <div class="screen-container"><img src="{{asset('home/images/dashboard-bolbooks.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
                           <div class="screen-description"></div>
                        </div>
                        <div class="features-section-description w-col w-col-6 w-col-small-small-stack w-col-stack">
                           <div data-ix="global-item-float" class="floating-item-div floating-item-div-left-align"><img src="{{asset('home/images/icon-proposal.png')}}" width="60" id="Features-Section-Icon" data-ix="view-proposals" alt="" class="floating-item-icon-features"/></div>
                           <h2 class="section-headline-green">Leer van de laatste maanden.</h2>
                           <p class="section-description">Bekijk hoe jouw resultaat groei of daalt in het Dashboard van de webapp. Maak op basis hiervan de juiste beslissingen voor de toekomst.</p>
                           
                        </div>
                     </div>
                  </div>
                  <div data-w-tab="Tab 2" class="w-tab-pane">
                     <div class="feature-description-container w-row">
                        <div class="w-col w-col-6">
                           <div class="screen-container"><img src="{{asset('home/images/resultaat-bolbooks.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
                           <div class="screen-description"></div>
                        </div>
                        <div class="features-section-description w-col w-col-6">
                           <div data-ix="global-item-float" class="floating-item-div floating-item-div-left-align"><img src="{{asset('home/images/icon-payment.png')}}" width="60" id="Features-Section-Icon" data-ix="view-proposals" alt="" class="floating-item-icon-features"/></div>
                           <h2 class="section-headline-green">Gedetailleerd inzicht in je resultaat.</h2>
                           <p class="section-description">Analyseer welke kostenposten voor jou de winst in de wegstaan en verbeter op vlakken waar dat nodig is.</p>
                           <!-- <div class="w-row">
                              <div class="w-col w-col-6 w-col-stack"><a href="#" class="green-link">Learn about contracts</a></div>
                              <div class="w-col w-col-6 w-col-stack"><a href="#" class="green-link">See a sample contract</a></div>
                           </div> -->
                        </div>
                     </div>
                  </div>
                  <div data-w-tab="Tab 3" class="w-tab-pane">
                     <div class="feature-description-container w-row">
                        <div class="w-col w-col-6">
                            <div class="screen-container"><img src="{{asset('home/images/kosteninzicht-bolbooks.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
                           <div class="screen-description"></div>
                        </div>
                        <div class="features-section-description w-col w-col-6">
                           <div data-ix="global-item-float" class="floating-item-div floating-item-div-left-align"><img src="{{asset('home/images/icon-reporting.png')}}" width="60" id="Features-Section-Icon" data-ix="view-proposals" alt="" class="floating-item-icon-features"/></div>
                           <h2 class="section-headline-green">Sorteer de kosten op je <br/>eigen manier.</h2>
                           <p class="section-description">Creëer kostenposten zoals jij dat handig vindt en voeg vervolgens de kosten die je maakt aan de kostenposten toe.</p>
                        </div>
                     </div>
                  </div>
                  <div data-w-tab="Tab 4" class="w-tab-pane">
                     <div class="feature-description-container w-row">
                        <div class="w-col w-col-6">
                            <div class="screen-container"><img src="{{asset('home/images/btw-aangifte-bolbooks.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
                           <div class="screen-description"></div>
                        </div>
                        <div class="features-section-description w-col w-col-6">
                           <div data-ix="global-item-float" class="floating-item-div floating-item-div-left-align"><img src="{{asset('home/images/icon-sun.png')}}" width="60" id="Features-Section-Icon" data-ix="view-proposals" alt="" class="floating-item-icon-features"/></div>
                           <h2 class="section-headline-green">Klaar voordat je het doorhebt.</h2>
                           <p class="section-description">Als je de kosten gedurende het kwartaal bijhoudt is je btw-aangifte direct klaar. Je hoeft dus alleen je kosten toe te voegen!</p>
                           
                        </div>
                     </div>
                  </div>
                  <div data-w-tab="Tab 5" class="w-tab-pane">
                     <div class="feature-description-container w-row">
                        <div class="w-col w-col-6">
                            <div class="screen-container"><img src="{{asset('home/images/screenshot-reporting-p-500.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
                           <div class="screen-description"></div>
                        </div>
                        <div class="features-section-description w-col w-col-6">
                           <div data-ix="global-item-float" class="floating-item-div floating-item-div-left-align"><img src="{{asset('home/images/icon-reporting.png')}}" width="60" id="Features-Section-Icon" data-ix="view-proposals" alt="" class="floating-item-icon-features"/></div>
                           <h2 class="section-headline-green">Analyze your earnings<br/>and stay clear on your goals.</h2>
                           <p class="section-description">Access your workload in a simple dashboard and monitor the status of your contracts and invoices in one comprehensive interface.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a data-request-account-btn="true" href="https://app.bolbooks.nl/register" class="button w-button" style="border-radius: 25px;">Nu starten</a>
         </div>
      </div>
      <!-- <div class="gray-section-slanted gray-section-slanted-global">
         <div class="container-slanted container-slanted-center w-container">
            <h2 class="section-headline-green section-headline-green-center">Go global with Bonsai.</h2>
            <div class="section-subtitle">We&#x27;re there for you anywhere and allow to work with clients everywhere.</div>
            <div class="global-items-row w-row">
               <div class="w-col w-col-4">
                  <div data-ix="global-item-float" class="floating-item-div"><img src="{{asset('home/images/icon-contract-global.png')}}" width="60" alt="" class="floating-item-icon"/></div>
                  <h6 class="globe-item-heading">International contracts</h6>
               </div>
               <div class="w-col w-col-4">
                  <div data-ix="global-item-float-2" class="floating-item-div"><img src="{{asset('home/images/icon-coins.png')}}" width="60" alt="" class="floating-item-icon"/></div>
                  <h6 class="globe-item-heading">180 currencies</h6>
               </div>
               <div class="w-col w-col-4">
                  <div data-ix="global-item-float-3" class="floating-item-div"><img src="{{asset('home/images/icon-card.png')}}" width="60" alt="" class="floating-item-icon"/></div>
                  <h6 class="globe-item-heading">Global payments</h6>
               </div>
            </div>
            <a data-request-account-btn="true" href="#" class="button w-button">START FREE</a>
         </div>
      </div> -->
     <!--  <div class="white-section-slanted">
         <div class="container-slanted w-container">
            <div class="w-row">
               <div class="w-col w-col-7">
                  <h2 class="section-headline-green">Empowering 100,000+ freelancers from all backgrounds.</h2>
                  <p class="section-description">Bonsai supports every type of freelance work. We&#x27;ve built Bonsai to fit every workflow so everyone feels protected.</p>
                  <p class="section-description">Bonsai helps every freelancer put their work on autopilot.</p>
                  <a data-request-account-btn="true" href="#" class="button w-button">START FREE</a>
               </div>
               <div class="w-col w-col-5">
                  <div class="freelancer-type-block">
                     <div class="w-row">
                        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"><img src="{{asset('home/images/designer-icon.png')}}" width="44" alt="" class="freelancer-type-icon"/></div>
                        <div class="w-col w-col-10 w-col-small-10 w-col-tiny-10">
                           <h3 class="freelancer-type-title">Designers</h3>
                        </div>
                     </div>
                     <div class="w-row">
                        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"><img src="{{asset('home/images/developers-icon.png')}}" width="44" alt="" class="freelancer-type-icon"/></div>
                        <div class="w-col w-col-10 w-col-small-10 w-col-tiny-10">
                           <h3 class="freelancer-type-title">Developers</h3>
                        </div>
                     </div>
                     <div class="w-row">
                        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"><img src="{{asset('home/images/writers-icon.png')}}" width="44" alt="" class="freelancer-type-icon"/></div>
                        <div class="w-col w-col-10 w-col-small-10 w-col-tiny-10">
                           <h3 class="freelancer-type-title">Writers</h3>
                        </div>
                     </div>
                     <div class="w-row">
                        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"><img src="{{asset('home/images/photo-icon.png')}}" width="44" alt="" class="freelancer-type-icon"/></div>
                        <div class="w-col w-col-10 w-col-small-10 w-col-tiny-10">
                           <h3 class="freelancer-type-title">Photographers</h3>
                        </div>
                     </div>
                     <div class="w-row">
                        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-2 w-col-medium-2"><img src="{{asset('home/images/video-icon.png')}}" width="44" alt="" class="freelancer-type-icon"/></div>
                        <div class="w-col w-col-10 w-col-small-10 w-col-tiny-10 w-col-medium-10">
                           <h3 class="freelancer-type-title">Videographers</h3>
                        </div>
                     </div>
                     <div class="w-row">
                        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"><img src="{{asset('home/images/consultans-icon.png')}}" width="44" alt="" class="freelancer-type-icon"/></div>
                        <div class="w-col w-col-10 w-col-small-10 w-col-tiny-10">
                           <h3 class="freelancer-type-title">Consultants</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <div class="gray-section-slanted" id="tarieven">
         <div class="container-slanted container-slanted-center w-container">
          <h2 class="section-headline-green section-headline-green-center">
            Onze transparante tarieven.
          </h2>
          <div class="testimonial-div" style="text-align: center;height: 300px;margin-top: 100px;">
            <br/>
            <div class="section-subtitle pricing_info section-description">
              <span>Eike maand berekenen we je tarief op basis van de bol.com omzet van je varige maand.</span>
              <br/>
              <span>Bekijk zelf welke tarief bij je past.</span>
            </div>
            <br/>

            <input type="range" min="0" step="100" max="50000" id="range_slider"  value="2000" data-rangeslider="" >
           <br/>
            <div class="section-subtitle pricing_info">
              <span class="section-description">
                Bij een omzet van <span style="color: #175ade">€<output id="js-output"></output></span> reken we <span style="color: #175ade">€<span id="price_range">19.95</span></span> per maand.
              </span>
              
            </div>

          </div>
          <a data-request-account-btn="true" href="https://app.bolbooks.nl/register" class="button w-button" style="border-radius: 25px;margin-top: 50px;" >Nu starten</a>
         </div>
       </div>
      <div class="white-section-slanted" id="tarieven">
         <div class="container-slanted container-slanted-center w-container">
          

            <h2 class="section-headline-green section-headline-green-center">Probeer Bolbooks vandaag nog.</h2>

            <div class="section-subtitle">1 week voor slechts €1.</div>
            <a data-request-account-btn="true" href="https://app.bolbooks.nl/register" class="button w-button" style="border-radius: 25px;">Nu starten</a>
         </div>
      </div>
      
@endsection
