<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  /*.gray-section-slanted{
    background-color: white !important;
  }
  .white-section-slanted{
    background-color: #fafafa !important;
  }*/
  @media only screen and (max-width: 600px) {
    .footer-copyright-text{
      padding-left: 0;
    }
    .custom_btn{
      width: 43% !important;
      border-radius: 25px !important;
      margin-left: 24% !important;
    }
    .pricing_info{
      margin-top: 30px !important;
      display: flex;
      padding-left: 0;
    }
  }

  /*Small devices (portrait tablets and large phones, 600px and up)  */
  @media only screen and (min-width: 600px) {
    .footer-copyright-text{
      padding-left: 0;
    }
    .custom_btn{
      width: 43% !important;
      border-radius: 25px !important;
      margin-left: 24% !important;
    }
    .pricing_info{
      margin-top: 30px !important;
      display: flex;
      padding-left: 0;
    }
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
    .footer-copyright-text{
      padding-left: 40%;
    }
    .pricing_info{
      margin-top: 50px;
      display: flex;
      padding-left: 15%;
    }
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
    .footer-copyright-text{
      padding-left: 40%;
    }
    .pricing_info{
      margin-top: 50px;
      display: flex;
      padding-left: 27%;
    }
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    .footer-copyright-text{
      padding-left: 40%;
    }
    .pricing_info{
      margin-top: 50px;
      display: flex;
      padding-left: 27%;
    }
  }
  .nav-bar-all, .nav-bar-all.nav-bar-non-scrolling.nav-bar-gray{
    background-color: white !important;
  }
  .w-nav{
    background: white !important;
  }
  .footer {
    padding-top: 0px !important;
  }
  
  #nav-bar-button-login{
    color: #175ade !important;
  }
  #nav-bar-button-login:hover{
    background-color: #175ade;
    color: #ffffff !important;
  }
  .nav-bar-all{
    border-bottom: 1px solid #dadada;
  }
  .w-container{
    font-size: 12px;
  } 
  .rangeslider__fill{
    background: #175ade !important;
  }
</style>
   <head>
      <meta charset="utf-8"/>
      <title>Bolbooks</title>
      <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/gif" sizes="16x16">
      <meta content="width=device-width, initial-scale=1" name="viewport"/>

      <link href="{{asset('home/css/style.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('home/css/rangeslider.css')}}" rel="stylesheet" type="text/css"/>
      <script src="{{asset('home/js/libs/webfont/1.6.26/webfont.js')}}" type="text/javascript"></script>
      <script type="text/javascript">
        WebFont.load({
        google: {  
                families: ["Poppins:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","PT Serif:400,400italic,700,700italic"]
            }
        });
     </script>
     
        <script type="text/javascript">
                !function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
        </script>
      <script src="{{asset('home/js/libs/jquery/1.9.1/jquery.min.js')}}"></script>
      <script>  
         $(document).ready(function(){
           var navBarButtonProduct = "#nav-bar-button-product";
           var navBarButtonResources = "#nav-bar-button-resources";
           var navBarButtonHiring = "#nav-bar-button-hiring";
           var navBarButtonLogin = "#nav-bar-button-login";
           
           var url = window.location.href;
           if(url.search('promo=true') != -1){
             $(navBarButtonProduct).hide();
             $(navBarButtonResources).hide();
             $(navBarButtonHiring).hide();
             $(navBarButtonLogin).hide();
           }  
         });
      </script>
   </head>
   <body class="body">
      <div>
         <div data-collapse="medium" data-animation="default" data-duration="400" data-easing2="ease-in" class="nav-bar-all w-nav">
            <div id="nav-bar" class="w-container">
               <a href="index.html" class="brand-freelancer w-nav-brand w--current"><img style="max-width: 75%;" src="{{asset('home/images/logo.gif')}}" width="160" alt="Logo"/></a>
               <nav role="navigation" class="nav-menu-2 w-nav-menu">
                  <div data-delay="0" class="nav-dropdown-button w-dropdown">
                     <div id="nav-bar-button-product" class="nav-dropdown-toggle w-dropdown-toggle">
                        <div><a href="#features-section" style="color: #4c525a">FEATURES</a></div>
                        <!-- <div class="w-icon-dropdown-toggle"></div> -->
                     </div>
                     <!-- <nav class="dropdown-list w-dropdown-list"><a href="#" class="nav-dropdown-link w-dropdown-link">PROPOSALS</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">CONTRACTS</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">TIME TRACKING</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">PROJECTS</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">EXPENSES</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">INVOICES &amp; PAYMENTS</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">RECURRING PAYMENTS <span class="nav-dropdown-link-badge-new">NEW</span></a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">REPORTING</a>
                    </nav> -->
                  </div>
                  <div data-delay="0" class="nav-dropdown-button w-dropdown">
                     <div id="nav-bar-button-resources" class="nav-dropdown-toggle w-dropdown-toggle">
                      <div>
                        <a href="#pricing-section" style="color: #4c525a">TARIEVEN
                        </a>
                      </div>
                        <!-- <div class="w-icon-dropdown-toggle"></div> -->
                     </div>
                     <!-- <nav class="dropdown-list w-dropdown-list"><a href="#" class="nav-dropdown-link w-dropdown-link">FREELANCE BLOG</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">FREELANCE RATES</a><a href="#" class="nav-dropdown-link w-dropdown-link">FREELANCE RESOURCES</a>
                        <a href="#" class="nav-dropdown-link w-dropdown-link">TOOLS DIRECTORY</a>
                    </nav> -->
                  </div>
                  <a href="
                    @auth
                      {{route('dashboard')}}
                    @else
                      {{route('login')}}
                    @endauth" data-login-btn="true" id="nav-bar-button-login" class="navlink linkbtn w-nav-link" style="border-radius: 25px;padding: 10px 20px 10px 20px;">
                    @auth
                      Dashboard
                    @else
                      LOG IN
                    @endauth
                  </a>
                  @auth
                  @else
                  <a data-sign-up-btn="true" href="{{route('register')}}" id="nav-bar-button-signup" class="navlink linkbtn sign-up sign-up-menu w-nav-link" style="border-radius: 25px;color: white !important;">START FREE</a>
                  @endauth
               </nav>
               <div class="menu-button w-nav-button">
                  <div class="w-icon-nav-menu"></div>
               </div>
            </div>
         </div>
      </div>
      <div id="1" class="gray-section-header" style="background-color: white">
         <img src="{{asset('home/images/ipad-dashboard-2.png')}}" width="707" srcset="{{asset('home/images/ipad-dashboard-2.png')}} 500w, {{asset('home/images/ipad-dashboard-2.png')}} 1537w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 80vw, 750px" alt="" class="dashboard-image-right"/>
         <div class="w-container">
            <h1 class="section-headline-green">Simpel boekhouden <br/>voor bol-verkopers.</h1>
            <p class="section-description">Bespaar tijd & geld met de 
online <br/>boekhouding van bolbooks. </p>
            <a data-request-account-btn="true" href="#" class="button w-hidden-main w-hidden-medium w-hidden-small w-button custom_btn">Nu starten</a>
            <div class="w-form">
               <form id="" name="" data-name="" method="get" class="w-hidden-tiny">
                  <div class="email-capture-product-left w-clearfix">
                      <input type="email" class="email-capture-field w-input" maxlength="256" name="email-3"  placeholder="Vul je emailadres in" id="" required=""/><input type="submit" value="Nu starten"  id="" class="button button-rounded w-button"/></div>
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
            <a data-request-account-btn="true" href="#" class="button w-button" style="border-radius: 25px">Nu starten</a>
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
                  <a data-request-account-btn="true" href="#" class="button button-rounded w-button">Nu starten</a>
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
      <div id="features-section" class="white-section-slanted">
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
                           <div class="screen-container"><img src="{{asset('home/images/screenshot-proposal-p-500.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
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
                           <div class="screen-container"><img src="{{asset('home/images/features-contract-p-500.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
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
                            <div class="screen-container"><img src="{{asset('home/images/screenshot-timetracking-p-500.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
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
                            <div class="screen-container"><img src="{{asset('home/images/screenshot-invoicing-p-500.png')}}" sizes="(max-width: 479px) 63vw, (max-width: 767px) 73vw, (max-width: 991px) 75vw, 376px" alt="" class="features-screenshot"/></div>
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
            <a data-request-account-btn="true" href="#" class="button w-button" style="border-radius: 25px;">Nu starten</a>
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
      <div class="gray-section-slanted" id="pricing-section">
         <div class="container-slanted container-slanted-center w-container">
          <h2 class="section-headline-green section-headline-green-center">
            Onze transparante tarieven.
          </h2>
          <div class="testimonial-div" style="text-align: center;height: 300px;margin-top: 100px;">
            <div class="section-subtitle pricing_info section-description">
              Bekijk wat jouw tarief is door middel van je bol.com omzet.
            </div>
            <input type="range" min="0" step="100" max="50000" id="range_slider"  value="2000" data-rangeslider="" >
           
            <div class="section-subtitle pricing_info">
              <span class="section-description">
                Bij een omzet van &nbsp;€<output id="js-output"></output>&nbsp;reken we €<span id="price_range">4.95</span>&nbsp;per maand.
              </span>
              
            </div>

          </div>
          <a data-request-account-btn="true" href="#" class="button w-button" style="border-radius: 25px;margin-top: 50px;" >Nu starten</a>
         </div>
       </div>
      <div class="white-section-slanted" id="pricing-section">
         <div class="container-slanted container-slanted-center w-container">
          

            <h2 class="section-headline-green section-headline-green-center">Probeer Bolbooks vandaag nog.</h2>

            <div class="section-subtitle">With “1 week voor slechts €1.</div>
            <a data-request-account-btn="true" href="#" class="button w-button" style="border-radius: 25px;">Nu starten</a>
         </div>
      </div>
      <div id="footer" class="footer">
         <!-- <div class="footer-container w-container">
            <div class="w-row">
               <div class="footer-col w-col w-col-4">
                  <div class="footer-tilte">SOLUTION</div>
                  <div class="footer-subtitle">Product</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Proposals</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Contracts</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Time Tracking</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Expense Tracking</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Invoicing &amp; Payments</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Recurring Payments</a></li>
                  </ul>
                  <div class="footer-subtitle">Templates</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Freelance Contract</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Freelance Invoice</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">W9 Form</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Expenses Spreadsheet</a></li>
                  </ul>
                  <div class="footer-subtitle"><a href="#" class="footer-subtitle">Pricing</a></div>
               </div>
               <div class="footer-col w-col w-col-4">
                  <div class="footer-tilte">RESOURCES</div>
                  <div class="footer-subtitle">Research</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Freelance rates</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Best Freelance Tools</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Best Freelance Websites</a></li>
                  </ul>
                  <div class="footer-subtitle">Insights</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Freelance Blog by Bonsai</a></li>
                  </ul>
                  <div class="footer-subtitle">Ebooks</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Freelance Tax Guide</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Guide to Freelancing</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Creative Entrepreneurs Starter Pack</a></li>
                  </ul>
                  <div class="footer-subtitle">Others</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Freelance Tax Calculator</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">PayPal Invoice Fee Calculator</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Stripe Fee Calculator</a></li>
                  </ul>
               </div>
               <div class="footer-col w-col w-col-4">
                  <div class="footer-tilte">Bonsai</div>
                  <div class="footer-subtitle">Company</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">About Us</a></li>
                     <li class="footer-list-item"><a href="#" target="_blank" class="footer-sub-link">Careers</a></li>
                  </ul>
                  <div class="footer-subtitle">Support</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><a href="#" target="_blank" class="footer-sub-link">FAQ</a></li>
                     <li class="footer-list-item"><a href="#" class="footer-sub-link">Email</a></li>
                  </ul>
                  <div class="footer-subtitle">Social</div>
                  <ul class="footer-list w-list-unstyled">
                     <li class="footer-list-item"><img src="{{asset('home/images/linkedin-icon.png')}}" width="13" alt="Icon LinkedIn" class="footer-icon"/><a href="#" target="_blank" class="footer-sub-link">LinkedIn</a></li>
                     <li class="footer-list-item"><img src="{{asset('home/images/twitter-icon.png')}}" width="17" alt="Icon Twitter" class="footer-icon"/><a href="#" target="_blank" class="footer-sub-link">Twitter</a></li>
                  </ul>
                  <div class="footer-subtitle"><a href="#" class="footer-subtitle">Affiliate Program</a></div>
                  <div class="footer-subtitle"><a href="#" class="footer-subtitle">Write for us</a></div>
               </div>
            </div>
         </div> -->
         <!-- <div>
            <div class="footer-div sub">
               <div class="w-container">
                  <div class="footer-copyright-text"><a href="#" class="footer-text-link">Xero Vs. QuickBooks Vs. Bonsai</a> - <a href="#" class="footer-text-link">FreshBooks Vs. QuickBooks Vs. Bonsai</a> - <a href="#" class="footer-text-link">Wave Vs. QuickBooks Vs. Bonsai</a> - <a href="#" class="footer-text-link">QuickBooks Alternative</a> - <a href="#" class="footer-text-link">FreshBooks Alternative</a></div>
               </div>
            </div>
         </div> -->
         <div>
            <div class="footer-div">
               <div class="w-container">
                  <div class="footer-copyright-text">
                    ©2019 Bolbooks.
                    <br/>
                    <a href="terms.html" class="footer-text-link">Algemene voorwaarden – Disclaimer</a>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <!-- <script src="{{asset('home/js/libs/jquery/3.4.1/jquery-3.4.1.min.js')}}" type="text/javascript"></script> -->
      <script src="{{asset('home/js/libs/flow/webflow.js')}}" type="text/javascript"></script>
      <script src="{{asset('home/js/rangeslider.js')}}" type="text/javascript"></script>
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
            if(output >= 50 && output <= 1999)
            {
              $('#price_range').html('4.95');
            }
            if(output >= 2000 && output <= 4999)
            {
              $('#price_range').html('19.95');
            }
            if(output >= 5000 && output <= 9999)
            {
              $('#price_range').html('29.95');
            }
            if(output >= 10000 && output <= 30000)
            {
              $('#price_range').html('39.95');
            }
            if(output > 30000)
            {
              $('#price_range').html('69.95');
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


   </body>
</html>