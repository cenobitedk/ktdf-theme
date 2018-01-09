<?php /* Template name: Poster 2018 */ ?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">

        <meta name="robots" content="index, follow, noarchive" />
      	<meta http-equiv="pragma" content="no-cache" />
      	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE" />
      	<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Killtown Death Fest 2018</title>
        <meta name="keywords" content="killtown, kill, town, kill-town, death, fest, deathfest, underground, undergrund, ungdomshuset, dortheavej, metal, deathmetal, københavn, copenhagen, kopenhagen, diy, d.i.y., festival, music, beer, party, extreme, xtreem music, me saco un ojo, soulseller, serpent pulse, zero tolerance, extremely rotten, nuclear winter, blood harvest, doomentia, no posers please, ibex moon, posh isolation, terrorizer, magazine, undergrundsmusikkens fremme, vegan, veganer, vegetar" />
        <meta name="description" content="Danish D.I.Y. underground Death Metal festival. The 2018 edition will be held September 6th-9th in Ungdomshuset, Copenhagen, Denmark.
        The festival will present more than 20 international acts, metal DJs, good cheap quality beer, vegan food stalls, horror movie screenings, distro-area and outdoor hang-out space." />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="/teaser/apple-touch-icon.png">

        <link rel="stylesheet" href="/teaser/css/normalize.min.css">
        <link rel="stylesheet" href="/teaser/css/main.css">
        <link rel="stylesheet" href="/teaser/css/ktdf.css">

        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="poster">
          <a href="<?php if( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) );
        	else echo bloginfo('url');?>" title="Kill-Town Death Fest 2018">
            <img src="/teaser/img/KTDF-2018-poster-w240.jpg"
              data-src="/teaser/img/KTDF-2018-poster-w1200.jpg"
              data-srcset="/teaser/img/KTDF-2018-poster-w600.jpg 600w, /teaser/img/KTDF-2018-poster-w900.jpg 900w, /teaser/img/KTDF-2018-poster-w1200.jpg 1200w"
              sizes="(min-width: 770px) 90vh, 100vw">
          </a>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.6.0/lazyload.min.js"></script>
        <script src="/teaser/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
