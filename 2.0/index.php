
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dare Gorillaz</title>
    <meta name="author" content="Alvaro Trigo Lopez" />
    <meta name="description" content="Dare Gorillaz" />
    <meta name="keywords"  content="fullpage,jquery,alvaro,trigo,plugin,fullscren,screen,full,iphone5,snap,snapping,apple,scroll,sections" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="Resource-type" content="Document" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style>
        #examplesList,caption,th{text-align:left}blockquote,body,dd,div,dl,dt,fieldset,form,h1,h2,h3,h4,h5,h6,input,li,ol,p,pre,td,textarea,th,ul{margin:0;padding:0}#download a,#fullPage-nav li a,#menu li a,a{text-decoration:none}#download,#download:hover{text-shadow:0 -1px 0 rgba(0,0,0,.25)}.section,.wrap{position:relative}table{border-spacing:0}abbr,acronym,fieldset,img{border:0}address,caption,cite,code,dfn,em,strong,th,var{font-weight:400;font-style:normal}strong{font-weight:700}ol,ul{list-style:none}h1,h2,h3,h4,h5,h6{font-weight:400;font-size:100%;color:#444}body,h2{color:#333}q:after,q:before{content:''}body{font-family:arial,helvetica;color:rgba(0,0,0,.5);background-color:#1BBC9B}body,html{overflow:hidden}#fullpage,.section,body,html{height:100%}.wrap{margin-left:auto;margin-right:auto;width:960px}h1{font-size:6em}h2,p{font-size:2em}h2{color:rgba(0,0,0,.5)}.section{text-align:center}#github-stars-button,.twitter-share-button{position:fixed!important;z-index:99;right:149px}#menu li{display:inline-block;margin:10px;color:#000;background:#fff;background:rgba(255,255,255,.5);-webkit-border-radius:10px;border-radius:10px}#menu li.active{background:#666;background:rgba(0,0,0,.5);color:#fff}#menu li a,#menu li.active a:hover{color:#000}#donations a:hover,#download,#menu li.active a{color:#fff}#menu li:hover{background:rgba(255,255,255,.8)}#menu li a,#menu li.active a{padding:9px 18px;display:block}#examplesList ul,#menu{padding:0}#examplesList ul li a:hover,#infoMenu{color:#f2f2f2}#menu{position:fixed;top:0;left:0;height:40px;z-index:70;width:100%;margin:0}#usedBy{background-image:url(imgs/used-by-fullpage.png?v=2);margin:50px auto 0;display:block;height:127px;width:402px}#section0 img,#section1 img{margin:20px 0 0}#section2 img{margin:20px 0 0 52px}#section3 img{bottom:0;position:absolute;margin-left:-420px}.intro p{width:50%;margin:0 auto;font-size:1.5em}.twitter-share-button{top:9px}#github-stars-button{top:35px;width:60px;height:20px}#fullPage-nav{position:absolute;z-index:100;margin-top:-32px;top:50%;opacity:1}#fullPage-nav li{display:block;width:14px;height:13px;margin:7px}#fullPage-nav li a{display:block;position:relative;z-index:1;width:100%;height:100%;cursor:pointer}#fullPage-nav li .active span{background:#333}#fullPage-nav span{top:2px;left:2px;width:8px;height:8px;border:1px solid #000;background:rgba(0,0,0,0);-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;position:absolute;z-index:1}#download{margin:10px 0 0;padding:15px 10px;background-color:#49afcd;background-image:-moz-linear-gradient(top,#5bc0de,#2f96b4);background-image:-ms-linear-gradient(top,#5bc0de,#2f96b4);background-image:-webkit-gradient(linear,0 0,0 100%,from(#5bc0de),to(#2f96b4));background-image:-webkit-linear-gradient(top,#5bc0de,#2f96b4);background-image:-o-linear-gradient(top,#5bc0de,#2f96b4);background-image:linear-gradient(top,#5bc0de,#2f96b4);background-repeat:repeat-x;border-color:#2f96b4 #2f96b4 #1f6377;border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;vertical-align:middle;cursor:pointer;display:inline-block;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05)}#download a{color:#fff}#download:hover{background-color:#2F96B4;background-position:0 -15px;-webkit-transition:background-position .1s linear;-moz-transition:background-position .1s linear;-ms-transition:background-position .1s linear;-o-transition:background-position .1s linear;transition:background-position .1s linear}#infoMenu{height:20px;position:fixed;z-index:70;bottom:0;width:100%;text-align:right;font-size:.9em;padding:8px 0}#infoMenu li a{display:block;margin:0 22px 0 0;color:#333}#infoMenu li a:hover{text-decoration:underline}#infoMenu li{display:inline-block;position:relative}#examplesList{display:none;background:#282828;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;padding:20px;float:left;position:absolute;bottom:29px;right:0;width:822px}#examplesList ul li{display:block;margin:5px 0}#examplesList ul li a{color:#BDBDBD;margin:0}#examplesList .column{float:left;margin:0 20px 0 0}#examplesList h3{color:#f2f2f2;font-size:1.2em;margin:0 0 15px;border-bottom:1px solid rgba(0,0,0,.4);-webkit-box-shadow:0 1px 0 rgba(255,255,255,.1);-moz-box-shadow:0 1px 0 rgba(255,255,255,.1);box-shadow:0 1px 0 rgba(255,255,255,.1);padding:0 0 5px}#donations a{color:#333;color:rgba(0,0,0,.5);font-size:80%}#supportedBy{position:absolute;left:30px;bottom:30px;z-index:101}#supportedBy a img{display:block;margin:0;border:0}#supportedBy div{margin:0 0 4px;display:block;font-size:13px;text-align:left}#section0 #logo{max-width:282px}@media screen and (max-height:770px){#section0 #logo{max-width:250px!important;height:auto!important}#section0 #usedBy{padding:10px 0 0;height:60px;width:398px;margin-top:40px;background-size:cover}#section3 img{bottom:-67px}}@media screen and (max-height:680px){#section0 #usedBy{margin-top:15px;height:41px;width:308px;background-size:cover}#section0 #logo{max-width:200px!important;height:auto!important}#section3 img{bottom:-100px}}@media screen and (max-height:580px){#section0 #logo{max-width:150px!important;height:auto!important}h1{font-size:4.5em}h2{font-size:1.3em}#donations a{font-size:57%}#section3 img{bottom:-180px}.intro p{font-size:1.1em}}@media screen and (max-height:480px){#usedBy{display:none}}@media all and (max-width:900px){#usedBy{padding:0}}@media all and (max-width:890px){#twitter-widget-0{left:20px;top:63px}#github-stars-button{left:20px;top:98px}#section3 img{margin:0 auto;left:0;max-width:600px;height:auto!important;right:0}#section1 #slidersImg{max-width:462px;height:auto!important}#menu li{margin:5px}#menu li a,#menu li.active a{padding:9px 12px}}@media all and (max-width:650px){#menu{z-index:9999}#menu li{margin:3px}#menu li a,#menu li.active a{padding:9px 12px}#section3 img{margin:0 auto;left:0;max-width:450px;height:auto!important;right:0}#section2 img{margin:20px 0 0}.intro p{font-size:1.1em}#usedBy{width:310px!important;height:46px!important;background-size:cover!important;background-repeat:no-repeat}}@media all and (max-width:580px){#menu li a,#menu li.active a{padding:8px 11px;font-size:13px}#supportedBy{display:none}#section1 #slidersImg,#section2 #easyToUse{max-width:350px;height:auto!important}.intro p{width:75%}h1{font-size:2.7em}h2{font-size:1.1em}#infoMenu{text-align:center}#infoMenu ul{display:inline-block;padding:0}#infoMenu li a{margin:0 10px 0 0}}@media all and (max-width:480px){#section3 img{margin:0 auto;left:0;max-width:300px;height:auto!important;right:0}#github-stars-button,#twitter-widget-0{display:none}}@media all and (max-width:450px){#menu{display:none}.intro p{font-size:1em}#infoMenu{bottom:21px}}@media screen and (max-width:890px) and (max-height:680px){#section3 img{bottom:-50px}}@media screen and (max-width:650px) and (max-height:680px){#section3 img{bottom:0}}@media screen and (max-width:580px) and (max-height:580px){#section3 img{bottom:-50px}}@media screen and (max-width:500px) and (max-height:500px){#section3 img{bottom:0}}
    </style>


    <!--[if IE]>
        <script type="text/javascript">
             var console = { log: function() {} };
        </script>
    <![endif]-->
</head>
<body>
<a class="fork-me-band" href="https://github.com/alvarotrigo/fullPage.js"><img style="position: fixed;z-index:99; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" alt="Fork me on GitHub"></a>


<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://alvarotrigo.com/fullPage/" data-text="Great plugin to create fullscreen scrolling websites: http://alvarotrigo.com/fullPage/">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<ul id="menu">
    <li data-menuanchor="firstPage" class="active"><a href="#firstPage">First section</a></li>
    <li data-menuanchor="secondPage"><a href="#secondPage">Second section</a></li>
    <li data-menuanchor="3rdPage"><a href="#3rdPage">Third section</a></li>
    <li data-menuanchor="4thpage"><a href="#4thpage">Fourth section</a></li>
</ul>

<div id="fullpage">
    <div class="section active" id="section0">
	</div>
    <div class="section" id="section1">
        <div class="slide active">
            <div class="intro">
                <img data-src="imgs/slider.png" alt="slider" height="132" width="662" id="slidersImg" />
                <h1>Slider 1</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
			</div>

        </div>
        <div class="slide">
            <div class="intro">
                <img data-src="imgs/1.png" alt="simple" height="176" width="176" />
                <h1>Slider 2</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
        </div>
        <div class="slide">
            <div class="intro">
                <img data-src="imgs/2.png" alt="Cool" height="176" width="176" />
                <h1>Slider 3</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
        </div>
        <div class="slide">
            <div class="intro">
                <img data-src="imgs/3.png" alt="Compatible" height="176" width="176" />
                <h1>Slier 4</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="intro">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            <img data-src="imgs/example2.png" alt="example" height="154" width="494" id="easyToUse" />
        </div>
    </div>
    <div class="section" id="section3">
        <div class="intro">
            <form id="contact-form">
			  <p>Dear Erlen,</p>
			  <p>My
			    <label for="your-name">name</label> is
			    <input type="text" name="your-name" id="your-name" minlength="3" placeholder="(your name here)" required> and</p>

			  <p>my
			    <label for="email">email address</label> is
			    <input type="email" name="your-email" id="email" placeholder="(your email address)" required>
			  </p>

			  <p> I have a
			    <label for="your-message">message</label> for you,</p>

			  <p>
			    <textarea name="your-message" id="your-message" placeholder="(your msg here)" class="expanding" required></textarea>
			  </p>
			  <p>
			    <button type="submit">
			      <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
			        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
				l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
			      </svg>
			      <small>send</small>
			    </button>
			  </p>
			</form>
        </div>
    </div>
</div>

<div id="infoMenu">
    <ul>
        <li><a href="https://goo.gl/HuFudq">Wordpress theme</a></li>
        <li><a href="https://github.com/alvarotrigo/fullPage.js/archive/master.zip">Download</a></li>
        <li>
            <a href="#" id="showExamples">Examples</a>
            <div id="examplesList">
                <div class="column">
                    <h3>Navigation</h3>
                    <ul>
                    <li><a href="examples/scrollBar.html">Scroll Bar Enabled</a></li>
                    <li><a href="examples/normalScroll.html">Normal scrolling</a></li>
                    <li><a href="examples/continuous.html">Continuous vertical</a></li>
                    <li><a href="examples/noAnchor.html">Without anchor links (same URL)</a></li>
                    <li><a href="examples/navigationV.html">Vertical navigation dots</a></li>
                    <li><a href="examples/navigationH.html">Horizontal navigation dots</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3>Design</h3>
                    <ul>
                        <li><a href="examples/responsive.html">Responsive</a></li>
                        <li><a href="examples/backgrounds.html">Full backgrounds</a></li>
                        <li><a href="examples/videoBackground.html">Full background videos</a></li>
                        <li><a href="examples/autoHeight.html">Auto-height sections</a></li>
                        <li><a href="examples/gradientBackgrounds.html">Gradient backgrounds</a></li>
                        <li><a href="examples/scrolling.html">Scrolling inside sections and slides</a></li>
                        <li><a href="examples/fixedHeaders.html">Adding fixed header and footer</a></li>
                        <li><a href="examples/oneSection.html">One single section</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3>Extensions</h3>
                    <ul>
                        <li><a href="extensions/continuousHorizontal.html">Continuous horizontal</a></li>
                        <li><a href="extensions/interlockedSlides.html">Interlocked Slides</a></li>
                        <li><a href="extensions/resetSliders.html">Reset Sliders</a></li>
                        <li><a href="extensions/responsiveSlides.html">Responsive Slides</a></li>
                        <li><a href="extensions/scrollHorizontally.html">Horizontal mouse wheel</a></li>
                        <li><a href="extensions/fadingEffect.html">Fading Effect</a></li>
                        <li><a href="extensions/offsetSections.html">Offset Sections</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3>Other</h3>
                    <ul>
                        <li><a href="examples/apple.html">Animations on scrolling</a></li>
                        <li><a href="examples/callbacks.html">Callbacks</a></li>
                        <li><a href="examples/methods.html">Functions and methods</a></li>
                        <li><a href="extensions/#navigation">Extra navigations</a></li>
                    </ul>
                </div>
            </div>

        </li>
        <li><a href="https://github.com/alvarotrigo/fullPage.js#fullpagejs">Documentation</a></li>
        <li><a href="http://alvarotrigo.com/#contact-page">Contact</a></li>
    </ul>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/form.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#fullpage').fullpage({
            sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
            anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
            menu: '#menu',
            css3: true,
            scrollingSpeed: 1000
        });

        $('#showExamples').click(function(e){
            e.stopPropagation();
            e.preventDefault();
            $('#examplesList').toggle();
        });

        $('html').click(function(){
            $('#examplesList').hide();
        });
    });
</script>
<script async defer id="github-bjs" src="js/buttons.js"></script>
</body>
</html>