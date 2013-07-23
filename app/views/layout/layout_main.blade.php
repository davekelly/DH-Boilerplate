<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ Config::get('author.project_title', 'NUI Galway Project') }}</title>

    <meta name="author" content="NUI Galway" />
    <meta name="copyright" content="Copyright NUI Galway" />
    <meta name="description" content="" />

    <link rel="schema.DC" href="http://purl.org/DC/elements/1.1/" title="Dublin Core Metadata Element Set, Version 1.1" />
    
    <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" title="DCMI Elements and DCMI Qualifiers" />
    <meta name="DC.title" lang="en" content="{{ Config::get('author.project_title', 'NUI Galway Project') }} "/>
    <meta name="DC.creator" content="{{ Config::get('author.primary_author_name', 'NUI Galway') }}" />
    <meta name="DC.publisher" content="NUI Galway" />
    <meta name="DC.type" content="Text" />
    <meta name="DC.format" content="text/html" />
    <meta name="DC.rights" content ="NUI Galway. All rights reserved, <?php echo date('Y'); ?> "/>
    <meta name="DC.copyright" content="NUI Galway, <?php echo date('Y'); ?> " />
    <meta name="DC.coverage" content="Global" />
    <meta name="DC.source" content="NUI Galway" />
    <meta name="DC.language" content="en_IE" />

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        

    <script src="{{ url('js/bower_components/modernizr/modernizr.js') }}"></script>

    <script>
      var aa = {} || aa;
    </script>
    
</head>
<body class="hfeed">         
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  

<!--Start NUI Galway affiliate header-->
<div id="nuigalway-header" class="row">
  <header id="page-header" class="container">
    <div id="nuigalway-logo" class="span3"> 
      <a title="Go back to NUI Galway home" href="http://www.nuigalway.ie">
        <img src="http://www.nuigalway.ie/images/logo.png" width="176" height="50" alt="NUI Galway logo" />
      </a>
    </div>
    <div id="search-bar" class="span3 offset6">
      <form method="get" id="search" action="http://search.nuigalway.ie/search">
        <div id="search-form" class="search-form">
          <label for="keywords" class="hide-text search-label">Search Keywords</label>
          <input name="q" id="keywords" type="text" size="15" value="Search NUI Galway" />
          <input name="site" value="nuig_all" type="hidden" />
          <input name="client" value="nuig_frontend" type="hidden" />
          <input name="output" value="xml_no_dtd" type="hidden" />
          <input name="proxystylesheet" value="nuig_frontend" type="hidden" />
          <input type="image" value="submit" id="search-button" alt="Search this site" src="http://www.nuigalway.ie/images/search-button.png" />
        </div>
      </form>
    </div>
  </header>
</div>

    
<div class="page row">         
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
    

    <div class="container" id="page-container">
        
        <div id="main">
            @if(Session::has('flash_notice'))
                <div class="span12">                    
                    <div class="alert alert-warning">>
                        <?php // <a class="close" data-dismiss="alert">×</a>  ?>
                        {{ Session::get('flash_notice') }}
                    </div>
                </div>
            @elseif(  count( $errors->all()) > 0 ) 
              <div class="span12">
                <div class="alert alert-error">>
                    Your form has errors...
                </div>
              </div>
            @endif
            
            @yield('content')

        </div> <!-- #main -->
    </div>

</div>

<footer id="page-footer" class="row" role="contentinfo">
  <div class="container">
    
      <nav id="footer-base-bottom" class="span12">
          <ul class="nav nav-pills">
            <li><a href="/">Home</a></li>
            <li><a href="/about/">About</a></li>
            <li><a href="/about/team">Team</a></li>
            <li><a href="/about/development">Development</a></li>
            <li><a href="/about/contact">Contact</a></li>
            <li><a href="/docs">Documentation</a></li>
            <li><a href="/docs/api">API</a></li>
          </ul>
      </nav>
    

      <ul id="sponsors" class="span12">
          <li>
              <a href="http://nuigalway.ie" rel='external'>
                  <img src="/img/logo-nuig.png" alt="NUI Galway" />
              </a>
          </li>
          <li>
              <a href="http://nuigalway.ie/mooreinstitute" rel='external'>
                  <img src="/img/logo-moore.jpg" alt="Moore Institute" />
              </a>
          </li>
          <li>
              <a href="http://dho.ie" rel='external'>
                  <img src="/img/logo-dho.png" alt="Digital Humanities Observatory" />
              </a>
          </li>
          <li>
              <a href="http://hea.ie" rel='external'>
                  <img src="/img/logo-hea.png" alt="Higher Education Authority" />
              </a>
          </li>
      </ul>

  </div>
</footer>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>window.jQuery && document.write(unescape('<script src="/js/bower_components/jquery.min.js"><\/script>'))</script>

  
  <?php // <script src="/js/bower_components/d3.min.js"></script> ?>
  <?php // <script src="/js/bower_components/leaflet/dist/leaflet.js"></script> ?>

  <script src="/js/plugins.js?v=1"></script>
  <script src="/js/main.js?v=1"></script>  
  
  <?php // can use this in production:
  // <script src="/js/main.min.js?v=1"></script>
  ?>

  

  

  <script>
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

        try {
        // var pageTracker = _gat._getTracker("UA-859162-1");
        pageTracker._setDomainName(".nuigalway.ie");
        if(document.referrer.match(/search\.nuigalway\.ie/)) {
                ref = document.referrer; 
                re = /(\?|&)q=([^&]*)/; 
                searchq = re.exec(ref); 
                if(searchq) { 
                        pageTracker._addIgnoredOrganic(searchq[2]); 
               } 
        } 
        pageTracker._trackPageview();
        } catch(err) {}
</script>
</body>
</html>

                