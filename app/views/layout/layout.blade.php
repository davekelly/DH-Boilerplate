<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo (isset($pageTitle) ? $pageTitle : 'NUI Galway Project' );?></title>

    <meta name="author" content="NUI Galway" />
    <meta name="copyright" content="Copyright NUI Galway" />
    <meta name="description" content="" />

    <link rel="schema.DC" href="http://purl.org/DC/elements/1.1/" title="Dublin Core Metadata Element Set, Version 1.1" />
    
    <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" title="DCMI Elements and DCMI Qualifiers" />
    <meta name="DC.title" lang="en" content="<?php echo (isset($pageTitle) ? $pageTitle : 'Digital Humanitites &amp; Social Sciences Research Directory | NUI Galway' );?>"/>
    <meta name="DC.creator" content="" />
    <meta name="DC.publisher" content="" />
    <meta name="DC.type" content="Text" />
    <meta name="DC.format" content="text/html" />
    <meta name="DC.rights" content ="NUI Galway. All rights reserved, <?php echo date('Y'); ?> "/>
    <meta name="DC.copyright" content="NUI Galway, <?php echo date('Y'); ?> " />
    <meta name="DC.coverage" content="Global" />
    <meta name="DC.source" content="NUI Galway" />
    <meta name="DC.language" content="en_IE" />
    
    <link rel="alternate" href="{{ URL::to('rss') }}" title="NUIG Digital Humanitites &amp; Social Sciences Research" type="application/rss+xml" />

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        

    <script src="/js/bower_components/modernizr.js"></script>

    <script>
      var aa = {} || aa;
    </script>
    
</head>
<body class="hfeed">         
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  

<!--Start NUI Galway affiliate header-->
<div id="nuigalway-header">
  <div id="nuigalway-logo"> <a title="Go back to NUI Galway home" href="http://www.nuigalway.ie"><img src="http://www.nuigalway.ie/images/logo.png" width="176" height="50" alt="NUI Galway logo" /></a> </div>
  <div id="search-bar">
    <form method="get" id="search" action="http://search.nuigalway.ie/search">
      <div id="search-form">
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
</div>



<body>
    
<div class="hfeed page">         
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">    
    

    <div class="container" id="page-container">
        
        <div id="main" class="row">
            @if(Session::has('flash_notice'))
                <div class="span12">                    
                    <div class="alert alert-warning">>
                        <a class="close" data-dismiss="alert">×</a> 
                        {{ Session::get('flash_notice') }}
                    </div>
                </div>
            @endif

            @yield('content')

        </div> <!-- #main -->
    </div>

  <footer id="page-footer" role="contentinfo">
    <div id="footer-base" class="container">
        <nav id="footer-base-bottom" >
            <ul class="nav nav-pills pull-right">
              
              <li><a href="/">Home</a></li>
              <li><a href="/docs">Documentation</a></li>
              <li><a href="/docs/api">API</a></li>
            </ul>
        </nav>
    </div>
  </footer>
</div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

                