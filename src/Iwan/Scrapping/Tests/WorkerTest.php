<?php
namespace Iwan\Scrapping\Tests;

use PHPUnit_Framework_TestCase;
use Mockery as m;
use Iwan\Scrapping\Worker;
use \HttpMessage;
use \HttpRequest;

/**
 * Page scrapper test
 *
 * @author Maciej Iwanowski <kasztelix@gmail.com>
 */
class WorkerTest extends PHPUnit_Framework_TestCase
{

    /**
     * Mock of http\Client
     * @var m\Mock
     */
    private $request;

    /**
     * Mock of Symfony\Component\DomCrawler\Crawler
     * @var m\Mock
     */
    private $crawler;
    
    /**
     * Subject to tests
     * @var Worker
     */
    private $worker;

    protected function setUp()
    {
        parent::setUp();
        $this->request = m::mock('HttpRequest');
        $this->crawler = m::mock('Symfony\Component\DomCrawler\Crawler');
        $this->worker = new Worker($this->request, $this->crawler);
    }

    protected function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    public function testExample()
    {
        $body = <<<'BODY'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:rnews="http://iptc.org/std/rNews/2011-10-07#"  xml:lang="en" >
        
    
    
    
	
    
    
    
    
    
    
    
	
    
	
    
	
	
	
	
    
	

        
    
<!-- THIS FILE CONFIGURES SHARED HIGHWEB STATIC ASSETS -->





<!-- mapping_news.inc -->
<!-- THIS FILE CONFIGURES NEWS STATIC ASSETS  -->




<!-- THIS FILE CONFIGURES VOTE 2012 STATIC ASSETS  -->





    <!-- hi/shared/head_initial.inc -->


	<!-- IGOR News -->
		
		
		
		






	
	        
	


	        <head profile="http://dublincore.org/documents/dcq-html/" resource="http://www.bbc.co.uk/news/world-asia-27056653" typeof="rnews:NewsItem">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>BBC News - Desperate search for S Korea ferry passengers continues</title>
        <meta name="Description" content="Emergency services continue to search overnight for almost 300 people unaccounted for after a ferry carrying 459 people sank off South Korea."/>
        <meta property="rnews:description" content="Emergency services continue to search overnight for almost 300 people unaccounted for after a ferry carrying 459 people sank off South Korea."/>
                <meta name="OriginalPublicationDate" content="2014/04/16 18:29:47"/>
        <meta property="rnews:datePublished" content="2014/04/16 18:29:47"/>
        <meta name="UKFS_URL" content="/news/world-asia-27056653"/>
                <meta name="THUMBNAIL_URL" content="http://news.bbcimg.co.uk/media/images/74282000/jpg/_74282625_021929020.jpg"/>
        <meta property="rnews:thumbnailUrl" content="http://news.bbcimg.co.uk/media/images/74282000/jpg/_74282625_021929020.jpg"/>
                <meta name="Headline" content="Search for S Korea ferry passengers"/>
        <meta property="rnews:headline" content="Search for S Korea ferry passengers"/>
        <meta name="IFS_URL" content="/news/world-asia-27056653"/>
        <meta name="Section" content="Asia"/>
        <meta name="contentFlavor" content="STORY"/>
		                        <meta name="CPS_ID" content="27056653" />
        <meta name="CPS_SITE_NAME" content="BBC News" />
        <meta name="CPS_SECTION_PATH" content="World/Asia" />
        <meta name="CPS_ASSET_TYPE" content="STY" />
        <meta name="CPS_PLATFORM" content="HighWeb" />
        <meta name="CPS_AUDIENCE" content="International" />
        <meta property="rnews:creator" content="http://www.bbc.co.uk#org"/>

            		<meta property="og:title" content="Search for S Korea ferry passengers"/>
    		<meta property="og:type" content="article"/>
    		<meta property="og:url" content="http://www.bbc.com/news/world-asia-27056653"/>
    		<meta property="og:site_name" content="BBC News"/>
            			<meta property="og:image" content="http://news.bbcimg.co.uk/media/images/74282000/jpg/_74282627_021929020.jpg"/>
											
				<meta name="bbcsearch_noindex" content="atom"/>
		
        
            <link rel="canonical" href="http://www.bbc.com/news/world-asia-27056653" />
<link rel="alternate" hreflang="en" href="http://www.bbc.com/news/world-asia-27056653" />
<link rel="alternate" hreflang="en-gb" href="http://www.bbc.co.uk/news/world-asia-27056653" />
        

        
        

        <!-- hi/news/head_first.inc -->

<!-- Chartbeat Web Analytics code - start -->
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<!-- Chartbeat Web Analytics code - end -->

<meta name="application-name" content="BBC News" />
<meta name="msapplication-TileImage" content="/img/1_0_3/cream/hi/news/bbc-news-pin.png" />
<meta name="msapplication-TileColor" content="#CC0101" />


<meta name="twitter:card" value="summary" />

        <!-- Project IGOR - Barlesque redirection logic - START -->


    <script>
        /*<![CDATA[*/
        window.bbcredirection = {
            
                device: true,
                geo: true
            
        }
        /*]]>*/
    </script>

<!-- Project IGOR - Barlesque redirection logic - END -->


<!-- PULSE_ENABLED:yes -->

<!-- vars inc blq_cachebust_journalism 1.21.19 -->


























	
	
	
		
		
	








	
			
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
	
		






	
		

    
   <meta http-equiv="X-UA-Compatible" content="IE=8" />  
  <link rel="schema.dcterms" href="http://purl.org/dc/terms/" />  <link rel="index" href="http://www.bbc.co.uk/a-z/" title="A to Z" /> <link rel="copyright" href="http://www.bbc.co.uk/terms/" title="Terms of Use" /> <link rel="icon" href="http://www.bbc.co.uk/favicon.ico" type="image/x-icon" />  <meta name="viewport" content="width = 996" /> 

<script type="text/javascript">/*<![CDATA[*/
window.orb = window.orb || {};
(function() {
    'use strict';
    window.fig = window.fig || {};
    window.fig.manager = {
                include: function(w) {
            w = w || window;
            var d = w.document,
                c = d.cookie,
                f = c.match(/ckns_orb_fig=([^;]+)/);

            if ( !f && c.indexOf('ckns_orb_nofig=1') > -1 ) {
                this.setFig(w, {no:1});
            }
            else {
                if (f) {
                    eval('f = ' + decodeURIComponent(RegExp.$1) + ';')
                    this.setFig(w, f);                  
                }
                d.write('<script src="https://ssl.live.bbc.co.uk/frameworks/fig/1/fig.js"><'+'/script>');
            }         
  
        },
                confirm: function(w) {
            w = w || window;
            if (w.orb && w.orb.fig && w.orb.fig('no')) {
               this.setFigCookie(w);
            }
            
            if (w.orb === undefined || w.orb.fig === undefined) {
                this.setFig(w, {no:1});
                this.setFigCookie(w);
            }
        },
                setFigCookie: function(w) {
            w.document.cookie = 'ckns_orb_nofig=1; expires=' + new Date(new Date().getTime() + 1000 * 60 * 10).toGMTString() + ';';
        },
                setFig: function(w, f){
            (function(){var o=f;w.orb=w.orb||{};w.orb.fig=function(k){return (arguments.length)? o[k]:o};})();
        }
    }
})();
fig.manager.include();
/*]]>*/</script>
<script type="text/javascript"> fig.manager.confirm(); </script>

 <link rel="stylesheet" type="text/css" href="http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5/style/main.css"  />  <script type="text/javascript">/*<![CDATA[*/ (function(undefined){if(!window.bbc){window.bbc={}}var ROLLING_PERIOD_DAYS=30;window.bbc.Mandolin=function(id,segments,opts){var now=new Date().getTime(),storedItem,DEFAULT_START=now,DEFAULT_RATE=1,COOKIE_NAME="ckpf_mandolin";opts=opts||{};this._id=id;this._segmentSet=segments;this._store=new window.window.bbc.Mandolin.Storage(COOKIE_NAME);this._opts=opts;this._rate=(opts.rate!==undefined)?+opts.rate:DEFAULT_RATE;this._startTs=(opts.start!==undefined)?new Date(opts.start).getTime():new Date(DEFAULT_START).getTime();this._endTs=(opts.end!==undefined)?new Date(opts.end).getTime():daysFromNow(ROLLING_PERIOD_DAYS);this._signupEndTs=(opts.signupEnd!==undefined)?new Date(opts.signupEnd).getTime():this._endTs;this._segment=null;if(typeof id!=="string"){throw new Error("Invalid Argument: id must be defined and be a string")}if(Object.prototype.toString.call(segments)!=="[object Array]"){throw new Error("Invalid Argument: Segments are required.")}if(opts.rate!==undefined&&(opts.rate<0||opts.rate>1)){throw new Error("Invalid Argument: Rate must be between 0 and 1.")}if(this._startTs>this._endTs){throw new Error("Invalid Argument: end date must occur after start date.")}if(!(this._startTs<this._signupEndTs&&this._signupEndTs<=this._endTs)){throw new Error("Invalid Argument: SignupEnd must be between start and end date")}removeExpired.call(this,now);if((storedItem=this._store.getItem(this._id))){this._segment=storedItem.segment}else{if(this._startTs<=now&&now<this._signupEndTs&&now<=this._endTs&&this._store.isEnabled()===true){this._segment=pick(segments,this._rate);if(opts.end===undefined){this._store.setItem(this._id,{segment:this._segment})}else{this._store.setItem(this._id,{segment:this._segment,end:this._endTs})}log.call(this,"mandolin_segment")}}log.call(this,"mandolin_view")};window.bbc.Mandolin.prototype.getSegment=function(){return this._segment};function log(actionType,params){var that=this;require(["istats-1"],function(istats){istats.log(actionType,that._id+":"+that._segment,params?params:{})})}function removeExpired(expires){var items=this._store.getItems(),expiresInt=+expires;for(var key in items){if(items[key].end!==undefined&&+items[key].end<expiresInt){this._store.removeItem(key)}}}function getLastExpirationDate(data){var winner=0,rollingExpire=daysFromNow(ROLLING_PERIOD_DAYS);for(var key in data){if(data[key].end===undefined&&rollingExpire>winner){winner=rollingExpire}else{if(+data[key].end>winner){winner=+data[key].end}}}return(winner)?new Date(winner):new Date(rollingExpire)}window.bbc.Mandolin.prototype.log=function(params){log.call(this,"mandolin_log",params)};window.bbc.Mandolin.prototype.convert=function(params){log.call(this,"mandolin_convert",params);this.convert=function(){}};function daysFromNow(n){var endDate;endDate=new Date().getTime()+(n*60*60*24)*1000;return endDate}function pick(segments,rate){var picked,min=0,max=segments.length-1;if(typeof rate==="number"&&Math.random()>rate){return null}do{picked=Math.floor(Math.random()*(max-min+1))+min}while(picked>max);return segments[picked]}window.bbc.Mandolin.Storage=function(name){this._cookieName=name;this._isEnabled=(bbccookies.isAllowed(this._cookieName)===true&&bbccookies.cookiesEnabled()===true)};window.bbc.Mandolin.Storage.prototype.setItem=function(key,value){var storeData=this.getItems();storeData[key]=value;this.save(storeData);return value};window.bbc.Mandolin.Storage.prototype.isEnabled=function(){return this._isEnabled};window.bbc.Mandolin.Storage.prototype.getItem=function(key){var storeData=this.getItems();return storeData[key]};window.bbc.Mandolin.Storage.prototype.removeItem=function(key){var storeData=this.getItems();delete storeData[key];this.save(storeData)};window.bbc.Mandolin.Storage.prototype.getItems=function(){return deserialise(this.readCookie(this._cookieName)||"")};window.bbc.Mandolin.Storage.prototype.save=function(data){window.bbccookies.set(this._cookieName+"="+encodeURIComponent(serialise(data))+"; expires="+getLastExpirationDate(data).toUTCString()+";")};window.bbc.Mandolin.Storage.prototype.readCookie=function(name){var nameEQ=name+"=",ca=window.bbccookies.get().split(";"),i,c;for(i=0;i<ca.length;i++){c=ca[i];while(c.charAt(0)===" "){c=c.substring(1,c.length)}if(c.indexOf(nameEQ)===0){return decodeURIComponent(c.substring(nameEQ.length,c.length))}}return null};function serialise(o){var str="";for(var p in o){if(o.hasOwnProperty(p)){str+='"'+p+'"'+":"+(typeof o[p]==="object"?(o[p]===null?"null":"{"+serialise(o[p])+"}"):'"'+o[p].toString().replace(/"/g,'\\"')+'"')+","}}return str.replace(/,\}/g,"}").replace(/,$/g,"")}function deserialise(str){var o;eval("o = {"+str+"}");return o}})(); /*]]>*/</script>  <script type="text/javascript">/*<![CDATA[*/ if (typeof bbccookies_flag === 'undefined') { bbccookies_flag = 'ON'; } showCTA_flag = true; cta_enabled = (showCTA_flag && (bbccookies_flag === 'ON') ); (function(){var e="ckns_policy",m="Thu, 01 Jan 1970 00:00:00 GMT",k={ads:true,personalisation:true,performance:true,necessary:true};function f(p){if(f.cache[p]){return f.cache[p]}var o=p.split("/"),q=[""];do{q.unshift((o.join("/")||"/"));o.pop()}while(q[0]!=="/");f.cache[p]=q;return q}f.cache={};function a(p){if(a.cache[p]){return a.cache[p]}var q=p.split("."),o=[];while(q.length&&"|co.uk|com|".indexOf("|"+q.join(".")+"|")===-1){if(q.length){o.push(q.join("."))}q.shift()}f.cache[p]=o;return o}a.cache={};function i(o,t,p){var z=[""].concat(a(window.location.hostname)),w=f(window.location.pathname),y="",r,x;for(var s=0,v=z.length;s<v;s++){r=z[s];for(var q=0,u=w.length;q<u;q++){x=w[q];y=o+"="+t+";"+(r?"domain="+r+";":"")+(x?"path="+x+";":"")+(p?"expires="+p+";":"");bbccookies.set(y,true)}}}window.bbccookies={_setEverywhere:i,cookiesEnabled:function(){var o="ckns_testcookie"+Math.floor(Math.random()*100000);this.set(o+"=1");if(this.get().indexOf(o)>-1){g(o);return true}return false},set:function(o){return document.cookie=o},get:function(){return document.cookie},_setPolicy:function(o){return h.apply(this,arguments)},readPolicy:function(o){return b.apply(this,arguments)},_deletePolicy:function(){i(e,"",m)},isAllowed:function(){return true},_isConfirmed:function(){return c()!==null},_acceptsAll:function(){var o=b();return o&&!(j(o).indexOf("0")>-1)},_getCookieName:function(){return d.apply(this,arguments)},_showPrompt:function(){var o=(!this._isConfirmed()&&window.cta_enabled&&this.cookiesEnabled()&&!window.bbccookies_disable);return(window.orb&&window.orb.fig)?o&&(window.orb.fig("no")||window.orb.fig("ck")):o}};bbccookies._getPolicy=bbccookies.readPolicy;function d(p){var o=(""+p).match(/^([^=]+)(?==)/);return(o&&o.length?o[0]:"")}function j(o){return""+(o.ads?1:0)+(o.personalisation?1:0)+(o.performance?1:0)}function h(r){if(typeof r==="undefined"){r=k}if(typeof arguments[0]==="string"){var o=arguments[0],q=arguments[1];if(o==="necessary"){q=true}r=b();r[o]=q}else{if(typeof arguments[0]==="object"){r.necessary=true}}var p=new Date();p.setYear(p.getFullYear()+1);p=p.toUTCString();bbccookies.set(e+"="+j(r)+";domain=bbc.co.uk;path=/;expires="+p+";");bbccookies.set(e+"="+j(r)+";domain=bbc.com;path=/;expires="+p+";");return r}function l(o){if(o===null){return null}var p=o.split("");return{ads:!!+p[0],personalisation:!!+p[1],performance:!!+p[2],necessary:true}}function c(){var o=new RegExp("(?:^|; ?)"+e+"=(\\d\\d\\d)($|;)"),p=document.cookie.match(o);if(!p){return null}return p[1]}function b(o){var p=l(c());if(!p){p=k}if(o){return p[o]}else{return p}}function g(o){return document.cookie=o+"=;expires="+m+";"}function n(){var o='<script type="text/javascript" src="http://static.bbci.co.uk/frameworks/bbccookies/0.6.3/script/bbccookies.js"><\/script>';if(window.bbccookies_flag==="ON"&&!bbccookies._acceptsAll()&&!window.bbccookies_disable){document.write(o)}}n()})(); /*]]>*/</script>      <script type="text/javascript"> if (! window.gloader) { window.gloader = [ "glow", {map: "http://node1.bbcimg.co.uk/glow/glow/map.1.7.7.js"}]; } </script>  <script type="text/javascript" src="http://node1.bbcimg.co.uk/glow/gloader.0.1.6.js"></script>   <script type="text/javascript" src="http://static.bbci.co.uk/frameworks/requirejs/0.13.1/sharedmodules/require.js"></script> <script type="text/javascript">  bbcRequireMap = {"jquery-1":"http://static.bbci.co.uk/frameworks/jquery/0.3.0/sharedmodules/jquery-1.7.2", "jquery-1.4":"http://static.bbci.co.uk/frameworks/jquery/0.3.0/sharedmodules/jquery-1.4", "jquery-1.9":"http://static.bbci.co.uk/frameworks/jquery/0.3.0/sharedmodules/jquery-1.9.1", "swfobject-2":"http://static.bbci.co.uk/frameworks/swfobject/0.1.10/sharedmodules/swfobject-2", "demi-1":"http://static.bbci.co.uk/frameworks/demi/0.10.0/sharedmodules/demi-1", "gelui-1":"http://static.bbci.co.uk/frameworks/gelui/0.9.13/sharedmodules/gelui-1", "cssp!gelui-1/overlay":"http://static.bbci.co.uk/frameworks/gelui/0.9.13/sharedmodules/gelui-1/overlay.css", "istats-1":"http://static.bbci.co.uk/frameworks/istats/0.17.3/modules/istats-1", "relay-1":"http://static.bbci.co.uk/frameworks/relay/0.2.4/sharedmodules/relay-1", "clock-1":"http://static.bbci.co.uk/frameworks/clock/0.1.9/sharedmodules/clock-1", "canvas-clock-1":"http://static.bbci.co.uk/frameworks/clock/0.1.9/sharedmodules/canvas-clock-1", "cssp!clock-1":"http://static.bbci.co.uk/frameworks/clock/0.1.9/sharedmodules/clock-1.css", "jssignals-1":"http://static.bbci.co.uk/frameworks/jssignals/0.3.6/modules/jssignals-1", "jcarousel-1":"http://static.bbci.co.uk/frameworks/jcarousel/0.1.10/modules/jcarousel-1"}; require({ baseUrl: 'http://static.bbci.co.uk/', paths: bbcRequireMap, waitSeconds: 30 }); </script>      <script type="text/javascript" src="http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5/script/barlesque.js"></script>
  
<!--[if IE 6]>
        <script type="text/javascript">
        try {
            document.execCommand("BackgroundImageCache",false,true);
        } catch(e) {}
    </script>
        <style type="text/css">
        /* Use filters for IE6 */
        #blq-blocks a {
            background-image: none;
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5//img/blq-blocks_white_alpha.png', sizingMethod='image');
        }
        .blq-masthead-focus #blq-blocks a,
        .blq-mast-text-dark #blq-blocks a {
            background-image: none;
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5//img/blq-blocks_grey_alpha.png', sizingMethod='image');
        }
        #blq-nav-search button span {
            background-image: none;
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5//img/blq-search_grey_alpha.png', sizingMethod='image');
        }
        #blq-nav-search button img {
            position: absolute;
            left: -999em;    
        }
    </style>
<![endif]-->

<!--[if (IE 7])|(IE 8)>
    <style type="text/css">
        .blq-clearfix {
            display: inline-block;
        }
    </style>
<![endif]-->

<script type="text/javascript">
     blq.setEnvironment('live');  if (blq.setLabel) blq.setLabel('searchSuggestion', "Search");  if (! /bbc\.co\.uk$/i.test(window.location.hostname) ) { document.documentElement.className += ' blq-not-bbc-co-uk'; } </script>

  <script type="text/javascript"> /*<![CDATA[*/ function oqsSurveyManager(w, flag) {  var defaultThreshold = 0.7, usePulseThreshold = (flag === 'OFF')? 1 : defaultThreshold, activeThreshold; w.oqs = w.oqs || {}; if ( w.document.cookie.match(/(?:^|; *)ckns_oqs_usePulseThreshold=([\d.]+)/) ) { activeThreshold = RegExp.$1; } else if (typeof w.oqs_usePulseThreshold !== 'undefined') { activeThreshold = w.oqs_usePulseThreshold; } else { activeThreshold = usePulseThreshold; } w.oqs.usePulse = (w.Math.random() < activeThreshold); if (!w.oqs.usePulse) {  w.document.write('<script type="text/javascript" src="http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5/script/vendor/edr.js"><'+'/script>'); } } oqsSurveyManager(window, 'ON'); /*]]>*/ </script> 
        <!-- BBCDOTCOM template: desktop journalismVariant: true ipIsAdvertiseCombined: true adsEnabled: false  showDotcom: true flagpole: ON -->
                           
	




		<!-- shared/head -->
<meta http-equiv="imagetoolbar" content="no" />
<!--[if !(lt IE 6)]>
   	<link rel="stylesheet" type="text/css" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/type.css" />


		<link rel="stylesheet" type="text/css" media="screen" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/global.css" />


	<link rel="stylesheet" type="text/css" media="print" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/print.css" />

	<link rel="stylesheet" type="text/css" media="screen and (max-device-width: 976px)" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/mobile.css" />
	



<link rel="stylesheet" type="text/css" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/components/components.css" />

<![endif]-->
<!--[if !IE]>-->
   	<link rel="stylesheet" type="text/css" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/type.css" />


		<link rel="stylesheet" type="text/css" media="screen" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/global.css" />


	<link rel="stylesheet" type="text/css" media="print" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/print.css" />

	<link rel="stylesheet" type="text/css" media="screen and (max-device-width: 976px)" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/mobile.css" />
	



<link rel="stylesheet" type="text/css" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/components/components.css" />

<!--<![endif]-->
<script type="text/javascript">
/*<![CDATA[*/
gloader.load(["glow","1","glow.dom"],{onLoad:function(glow){glow.dom.get("html").addClass("blq-js")}});
gloader.load(["glow","1","glow.dom"],{onLoad:function(glow){glow.ready(function(){if (glow.env.gecko){var gv = glow.env.version.split(".");for (var i=gv.length;i<4;i++){gv[i]=0;}if((gv[0]==1 && gv[1]==9 && gv[2]==0)||(gv[0]==1 && gv[1]<9)||(gv[0]<1)){glow.dom.get("body").addClass("firefox-older-than-3-5");}}});}});

window.disableFacebookSDK=true;
if (window.location.pathname.indexOf('+')>=0){window.disableFacebookSDK=true;}

/*]]>*/
</script>
<script type="text/javascript" src="http://news.bbcimg.co.uk/js/locationservices/locator/v4_0/locator.js"></script>

<script type="text/javascript" src="http://news.bbcimg.co.uk/js/core/3_3_1/bbc_fmtj.js"></script>

<script type="text/javascript">
<!--
	bbc.fmtj.page = {
		serverTime: 1397680451000,
		editionToServe: 'international',
		queryString: null,
		section: 'asia',
		sectionPath: '/World/Asia',
		siteName: 'BBC News',
		siteToServe: 'news',
		siteVersion: 'cream',
		storyId: '27056653',
		assetType: 'story',
		uri: '/news/world-asia-27056653',
		country: 'pl',
		masthead: false,
		adKeyword: null,
		templateVersion: 'v1_0'
	}
-->
</script>
<script type="text/javascript" src="http://news.bbcimg.co.uk/js/common/3_2_1/bbc_fmtj_common.js"></script>


<script type="text/javascript">$useMap({map:"http://news.bbcimg.co.uk/js/map/map_0_0_33.js"});</script>
<script type="text/javascript">$loadView("0.0",["bbc.fmtj.view"]);</script>
<script type="text/javascript">$render("livestats-heatmap");</script>


<script type="text/javascript" src="http://news.bbcimg.co.uk/js/config/apps/4_7_2/bbc_fmtj_config.js"></script>




<script type="text/javascript">
    //<![CDATA[
        require(['jquery-1'], function($){
            
            // set up EMP once it's loaded
            var setUp = function(){
                // use our own pop out page
        	    embeddedMedia.setPopoutUrl('/player/emp/2_0_55/popout/pop.stm');

        	    // store EMP's notifyParent function
        	    var oldNotifyParent = embeddedMedia.console.notifyParent;
        	    // use our own to add livestats to popout
        	    embeddedMedia.console.notifyParent = function(childWin){
        	        oldNotifyParent(childWin);
        	        // create new live stats url
                    var liveStatsUrl = bbc.fmtj.av.emp.liveStatsForPopout($('#livestats').attr('src'));
                    var webBug = $('<img />', {
                                     id:  'livestats',
                                     src: liveStatsUrl
                                 });
                    // append it to popout
                    $(childWin.document).find('body').append(webBug);
                }
            }
                
            // check if console is available to manipulate
            if(window.embeddedMedia && window.embeddedMedia.console){
                setUp();
            }
            // otherwise emp is still loading, so add event listener
            else{
                $(document).bind('empReady', function(){
                    setUp();
                });
            }
        });
    //]]>
</script>


		
	<!-- get BUMP from cdn -->
    <script type="text/javascript" src="http://emp.bbci.co.uk/emp/bump?emp=worldwide&amp;enableClear=1"></script>

<!-- load glow and required modules -->
<script type="text/javascript">
    //<![CDATA[
        gloader.load(['glow', '1', 'glow.dom']);
    //]]>
</script>



	<!-- pull in our emp code -->
	<script type="text/javascript" src="http://news.bbcimg.co.uk/js/app/av/emp/2_0_55/emp.js"></script>
	<!-- pull in compatibility.js -->
	<script type="text/javascript" src="http://news.bbcimg.co.uk/js/app/av/emp/2_0_55/compatibility.js"></script>


<script type="text/javascript">
	//<![CDATA[
	    
	
	    
	        
	    
	
	    
	        
	    
	
	    // set site specific config
	    
	        bbc.fmtj.av.emp.configs.push('news');
	    
	    
	    // when page loaded, write all created emps
	    glow.ready(function(){
			if(typeof bbcdotcom !== 'undefined' && bbcdotcom.av && bbcdotcom.av.emp){
				bbcdotcom.av.emp.configureAll();
			}
			embeddedMedia.each(function(emp){
				emp.set('enable3G', true);
				emp.setMediator('href', '{protocol}://{host}/mediaselector/5/select/version/2.0/mediaset/{mediaset}/vpid/{id}');						
			});
			embeddedMedia.writeAll();
	        // mark the emps as loaded
	        bbc.fmtj.av.emp.loaded = true;
			
			
	    });
	//]]>
</script>
<!-- Check for advertising testing -->

<meta name="viewport" content="width = 996" />



        <!-- shared/head_story -->
<!-- THESE STYLESHEETS VARY ACCORDING TO PAGE CONTENT -->															  

<link rel="stylesheet" type="text/css" media="screen" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/layout/story.css" />
<link rel="stylesheet" type="text/css" media="screen" href="http://news.bbcimg.co.uk/view/3_0_19/cream/hi/shared/story.css" />


<!-- js story view -->
<script type="text/javascript">$loadView("0.0",["bbc.fmtj.view.news.story"]);</script>

<!-- EMP -->
<script type="text/javascript" src="http://news.bbc.co.uk/js/app/av/emp/compatibility.js"></script>
<!-- /EMP -->

        
        <!-- #CREAM hi news international include head.inc -->
                			
<!-- BBCCOM No Advertise -->
<script type="text/javascript" src="http://news.bbcimg.co.uk/js/app/bbccom/0.3.239/includes/object.js"></script>
<script type="text/javascript" src="http://tps.bbc.com/wwscripts/data"></script>
<script type="text/javascript">/*<![CDATA[*/
if (bbcdotcom.data.b == 1) {
    document.write('<script type="text/javascript" src="http://news.bbcimg.co.uk/js/app/bbccom/0.3.239/bbccom.js">\x3C/script>');
}
/*]]>*/</script>
<script type="text/javascript">/*<![CDATA[*/
bbcdotcom.config.setAdsEnabled(0);
if (bbcdotcom.data.b == 1) {
    BBC.adverts.setData(bbcdotcom.data);
} else {
    bbcdotcom.config.setAnalyticsEnabled(0);
}
bbcdotcom.objects('page', 'create', bbcdotcom);
bbcdotcom.page.edition = '(none)';
bbcdotcom.page.url = '/news/world-asia-27056653';
bbcdotcom.page.zoneFile = '3pt_zone_file';
bbcdotcom.page.http_host = 'www.bbc.com';

bbcdotcom.config.setJsPrefix('http://news.bbcimg.co.uk/js/app/bbccom/0.3.239');
bbcdotcom.config.setSwfPrefix('http://www.bbc.co.uk/shared/swf/bbccom/0.3.239');
bbcdotcom.config.setCssPrefix('http://news.bbcimg.co.uk/css/screen/shared/0.3.239');


/*]]>*/</script>
<script type="text/javascript">
bbcdotcom.objects('bbcdotcom.av.emp', 'create');
bbcdotcom.av.emp = {
    configureAll:function() {
        // STUBBING OUT TO MAKE WAY FOR NEW WAY TO SET UP
        // When this has been released raise a ticket with emp to remove this call in emp_load_sjson.inc file
    }
};
</script>
<script type="text/javascript">
        require({
            paths:{
                "bbcdotcom": "http://news.bbcimg.co.uk/js/app/bbccom/0.3.239"
            }
        });
</script>
<script type="text/javascript">
    require(["bbcdotcom/av/emp/adverts", 'bbcdotcom/av/emp/analytics', 'bbcdotcom/av/emp/events'], function(adverts, analytics, events) {
        if('undefined' !== typeof embeddedMedia && 'undefined' !== typeof embeddedMedia.eachWrite) {
            embeddedMedia.eachWrite(events.playerBeforeEachWrite);
        }
    });
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        document.write(unescape('%3Cscript id="gnlAnalyticsEnabled" class="bbccom_display_none"%3E%3C/script%3E'));
    }
    /*]]>*/
</script>
        		<!-- hi/news/head_last.inc -->

<script type="text/javascript">

function BetaSite() {
  function setMobileCookie() {
    var d = new Date ();
    d.setDate(d.getDate() + 1);
    d = d.toUTCString();

    window.bbccookies.set('ckps_d=m;domain=.bbc.co.uk;path=/;expires=' + d );
    window.bbccookies.set('ckps_d=m;domain=.bbc.com;path=/;expires=' + d );
  }

  function isValidQueryString() {
    return (window.location.search.indexOf('view=beta') !== -1);
  }

  function isClientCapable() {
    return ('querySelector' in document && 'localStorage' in window && 'addEventListener' in window);
  }

  if (isClientCapable() && isValidQueryString()) {
    setMobileCookie();

    window.location.host = 'm.bbc.co.uk';
  }
}

BetaSite();

</script>


<link rel="stylesheet" type="text/css" media="screen" href="http://news.bbcimg.co.uk/view/1_4_38/cream/hi/news/skin.css" />




<link rel="apple-touch-icon" href="http://news.bbcimg.co.uk/img/1_0_3/cream/hi/news/iphone.png"/>
<script type="text/javascript">
    bbcRequireMap['module/weather'] = '/inc/specials/cream/hi/news/personalisation/weather';
    bbcRequireMap['module/local'] = '/inc/specials/cream/hi/news/personalisation';
    bbcRequireMap['module/localnewsandweather'] = '/inc/specials/cream/hi/news/personalisation/localnewsandweather';
    bbcRequireMap['translation'] = 'module/translations/en-GB';
    require({ baseUrl: 'http://static.bbci.co.uk/', paths: bbcRequireMap, waitSeconds: 30 });
</script>
<script type="text/javascript">



require(['jquery-1'], function(jQuery) {
    jQuery.ajaxSetup({cache: true})
});

require(["jquery-1", "istats-1"], function ($, istats) {
    $(function() {
        istats.track('external', {region: $('.story-body'), linkLocation : 'story-body'});
        istats.track('external', {region: $('.story-related .related-links'), linkLocation : 'related-links'});
        istats.track('external', {region: $('.story-related .newstracker-list'), linkLocation : 'newstracker'});
    });
});

</script>





	
    		
      		
    		
		
	
    	
   

<!-- CPS COMMENT STATUS: false -->






	   <!--Rendered by NOLAPPS202-6003 -->
	   <link rel="schema.dcterms" href="http://purl.org/dc/terms/" />
	   <meta name="DCTERMS.created" content="2014-04-16T18:29:47+00:00" />
	   <meta name="DCTERMS.modified" content="2014-04-16T18:29:47+00:00" />
    </head>

        	    <!--[if lte IE 6]><body class="news ie disable-wide-advert"><![endif]-->
    <!--[if IE 7]><body class="news ie7 disable-wide-advert"><![endif]-->
    <!--[if IE 8]><body class="news ie8 disable-wide-advert"><![endif]-->
    <!--[if !IE]>--><body class="news disable-wide-advert"><!--<![endif]-->
	


<div class="livestats-web-bug" id="livestats-web-bug-tag"></div>

<script type="text/JavaScript">
	var referrer = document.referrer;

	var livestatsBug = "<img alt='' id='livestats' src='http://stats.bbc.co.uk/o.gif?~RS~s~RS~News~RS~t~RS~HighWeb_Story~RS~i~RS~27056653~RS~p~RS~101360~RS~a~RS~International~RS~u~RS~/news/world-asia-27056653~RS~r~RS~"+referrer+"~RS~q~RS~~RS~z~RS~11~RS~'>";


	document.getElementById('livestats-web-bug-tag').innerHTML = livestatsBug;
</script>


<noscript>
<div class="livestats-web-bug"><img alt="" id="livestats" src="http://stats.bbc.co.uk/o.gif?~RS~s~RS~News~RS~t~RS~HighWeb_Story~RS~i~RS~27056653~RS~p~RS~101360~RS~a~RS~International~RS~u~RS~/news/world-asia-27056653~RS~q~RS~~RS~z~RS~11~RS~"/></div>
</noscript>
        
	
	
	

       <!-- BBCDOTCOM body first -->
     <!-- ISTATS -->



    






 <script type="text/javascript">/*<![CDATA[*/ bbcFlagpoles_istats = 'ON'; istatsTrackingUrl = '//sa.bbc.co.uk/bbc/bbc/s?name=news.world.asia.story.27056653.page&cps_asset_id=27056653&page_type=story&section=asia&app_version=6.2.182-RC1&first_pub=2014-04-16T18:29:47+00:00&last_editorial_update=2014-04-16T18:29:47+00:00&title=Search+for+S+Korea+ferry+passengers&comments_box=false&cps_media_type=&cps_media_state=&by_nation=&app_type=web&ml_name=SSI&ml_version=0.17.3&language=en-GB'; if (window.istats_countername) { istatsTrackingUrl = istatsTrackingUrl.replace(/([?&]name=)[^&]+/ig, '$1' + istats_countername); } (function() { if ( /\bIDENTITY=/.test(document.cookie) ) { istatsTrackingUrl += '&bbc_identity=1'; } var c = (document.cookie.match(/\bckns_policy=(\d\d\d)/)||[]).pop() || ''; istatsTrackingUrl += '&bbc_mc=' + (c? 'ad'+c.charAt(0)+'ps'+c.charAt(1)+'pf'+c.charAt(2) : 'not_set'); if ( /\bckns_policy=\d\d0/.test(document.cookie) ) { istatsTrackingUrl += '&ns_nc=1'; } var screenWidthAndHeight = 'unavailable'; if (window.screen && screen.width && screen.height) { screenWidthAndHeight = screen.width + 'x' + screen.height; } istatsTrackingUrl += ('&screen_resolution=' + screenWidthAndHeight); istatsTrackingUrl += '&blq_s=3.5&blq_r=3.5&blq_v=journalism-worldwide'; })(); /*]]>*/</script>  <!-- Begin iStats 20100118 (UX-CMC 1.1009.3) --> <script type="text/javascript">/*<![CDATA[*/ (function() { window.istats || (istats = {}); var cookieDisabled = (document.cookie.indexOf('NO-SA=') != -1), hasCookieLabels = (document.cookie.indexOf('sa_labels=') != -1), hasClickThrough = /^#sa-(.*?)(?:-sa(.*))?$/.test(document.location.hash), runSitestat = !cookieDisabled && !hasCookieLabels && !hasClickThrough && !istats._linkTracked; if (runSitestat && bbcFlagpoles_istats === 'ON') { sitestat(istatsTrackingUrl); } else { window.ns_pixelUrl = istatsTrackingUrl; /* used by Flash library to track */ } function sitestat(n){var j=document,f=j.location,b="";if(j.cookie.indexOf("st_ux=")!=-1){var k=j.cookie.split(";");var e="st_ux",h=document.domain,a="/";if(typeof ns_!="undefined"&&typeof ns_.ux!="undefined"){e=ns_.ux.cName||e;h=ns_.ux.cDomain||h;a=ns_.ux.cPath||a}for(var g=0,f=k.length;g<f;g++){var m=k[g].indexOf("st_ux=");if(m!=-1){b="&"+unescape(k[g].substring(m+6))}}document.cookie=e+"=; expires="+new Date(new Date().getTime()-60).toGMTString()+"; path="+a+"; domain="+h}ns_pixelUrl=n;n=ns_pixelUrl+"&ns__t="+(new Date().getTime())+"&ns_c="+((j.characterSet)?j.characterSet:j.defaultCharset)+"&ns_ti="+escape(j.title)+b+"&ns_jspageurl="+escape(f&&f.href?f.href:j.URL)+"&ns_referrer="+escape(j.referrer);if(n.length>2000&&n.lastIndexOf("&")){n=n.substring(0,n.lastIndexOf("&")+1)+"ns_cut="+n.substring(n.lastIndexOf("&")+1,n.lastIndexOf("=")).substring(0,40)}(j.images)?new Image().src=n:j.write('<p><i'+'mg src="'+n+'" height="1" width="1" alt="" /></p>')}; })(); /*]]>*/</script> <noscript><p style="position: absolute; top: -999em;"><img src="//sa.bbc.co.uk/bbc/bbc/s?name=news.world.asia.story.27056653.page&amp;cps_asset_id=27056653&amp;page_type=story&amp;section=asia&amp;app_version=6.2.182-RC1&amp;first_pub=2014-04-16T18:29:47+00:00&amp;last_editorial_update=2014-04-16T18:29:47+00:00&amp;title=Search+for+S+Korea+ferry+passengers&amp;comments_box=false&amp;cps_media_type=&amp;cps_media_state=&amp;by_nation=&amp;app_type=web&amp;ml_name=SSI&amp;ml_version=0.17.3&amp;language=en-GB&amp;blq_s=3.5&amp;blq_r=3.5&amp;blq_v=journalism-worldwide" height="1" width="1" alt="" /></p></noscript> <!-- End iStats (UX-CMC) -->   <div id="blq-global"> <noscript> <div id="blq-no-js-banner"> <p>For a better experience on your device, try our <a href="http://m.bbc.co.uk">mobile site</a>.</p> </div> </noscript> <div id="blq-pre-mast" xml:lang="en-GB"> <!-- Pre mast --> 
<!-- BBCDOTCOM leaderboard template:client-side journalismVariant: true ipIsAdvertiseCombined: true adsEnabled: false showDotcom: true flagpole: ON showAdAboveBlq: true blqLeaderboardAd: true -->
 </div> </div>  <script type="text/html" id="blq-bbccookies-tmpl"><![CDATA[ <div id="bbccookies-prompt" class="bbccookies-w"> <h2> Cookies on the BBC website </h2> <p> We use cookies to ensure that we give you the best experience on our website.<span class="bbccookies-international-message"> We also use cookies to ensure we show you advertising that is relevant to you.</span> If you continue without changing your settings, we'll assume that you are happy to receive all cookies on the BBC website. However, if you would like to, you can <a href="/privacy/cookies/managing/cookie-settings.html">change your cookie settings</a> at any time. </p> <ul> <li id="bbccookies-continue"> <button type="button" id="bbccookies-continue-button">Continue</button> </li> <li id="bbccookies-more"><a href="/privacy/cookies/bbc">Find out more</a></li></ul> </div> ]]></script> <script type="text/javascript">/*<![CDATA[*/ (function(){if(bbccookies._showPrompt()){var i=document,b=i.getElementById("blq-pre-mast"),f=i.getElementById("blq-global"),h=i.getElementById("blq-container"),c=i.getElementById("blq-bbccookies-tmpl"),a,g,e;if(b&&i.createElement){a=i.createElement("div");a.id="bbccookies";e=c.innerHTML;e=e.replace("<"+"![CDATA[","").replace("]]"+">","");a.innerHTML=e;if(f){f.insertBefore(a,b)}else{h.insertBefore(a,b)}g=i.getElementById("bbccookies-continue-button");g.onclick=function(){a.parentNode.removeChild(a);return false};bbccookies._setPolicy()}}})(); /*]]>*/</script>  <div id="blq-masthead" class="blq-clearfix blq-mast-bg-transparent-light blq-lang-en-GB blq-ltr"> <span id="blq-mast-background"><span></span></span>  <div id="blq-mast" class="blq-rst">  <div id="blq-mast-bar" class="blq-masthead-container blq-journalism-worldwide"> <div id="blq-blocks"> <a href="http://www.bbc.co.uk/" hreflang="en-GB"> <abbr title="British Broadcasting Corporation" class="blq-home"> <img src="http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5/img/blq-blocks_grey_alpha.png" alt="BBC" width="84" height="24" /> </abbr> </a> </div> <div id="blq-acc-links"> <h2 id="page-top">Accessibility links</h2> <ul>  <li><a href="#main-content">Skip to content</a></li>  <li><a href="#blq-local-nav">Skip to local navigation</a></li>  <li><a href="http://www.bbc.co.uk/accessibility/">Accessibility Help</a></li> </ul> </div> <div id="blq-sign-in" class="blq-gel">  </div> <div id="blq-nav"> <h2>BBC navigation</h2>     <ul id="blq-nav-main">   <li id="blq-nav-news"> <a href="http://www.bbc.com/news/">News</a> </li>    <li id="blq-nav-sport"> <a href="http://www.bbc.co.uk/sport/">Sport</a> </li>    <li id="blq-nav-weather"> <a href="http://www.bbc.co.uk/weather/">Weather</a> </li>    <li id="blq-nav-capital"> <a href="http://www.bbc.com/capital/">Capital</a> </li>    <li id="blq-nav-future"> <a href="http://www.bbc.com/future/">Future</a> </li>    <li id="blq-nav-shop"> <a href="http://shop.bbc.com/">Shop</a> </li>    <li id="blq-nav-tv"> <a href="http://www.bbc.co.uk/tv/">TV</a> </li>    <li id="blq-nav-radio"> <a href="http://www.bbc.co.uk/radio/">Radio</a> </li>    <li id="blq-nav-more"> <a href="http://www.bbc.co.uk/a-z/">More&hellip;</a> </li>   </ul>   <div id="blq-nav-search"> <form method="get" action="http://search.bbc.co.uk/search" accept-charset="utf-8" id="blq-search-form"> <div>  <input type="hidden" name="go" value="toolbar" />  <input type="hidden" value="http://www.bbc.com/news/world-asia-27056653" name="uri" />    <input type="hidden" name="scope" value="news" />  <label for="blq-search-q" class="blq-hide">Search term:</label> <input id="blq-search-q" type="text" name="q" value="" maxlength="128" /> <button id="blq-search-btn" type="submit"><span><img src="http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5/img/blq-search_grey_alpha.png" width="13" height="13" alt="Search"/></span></button> </div> </form> </div>  </div> </div> </div> </div> <div id="blq-container-outer" class="blq-journalism-worldwide blq-ltr" >  <div id="blq-container" class="blq-lang-en-GB blq-dotcom"> <div id="blq-container-inner" xml:lang="en-GB">   <div id="blq-main" class="blq-clearfix">   
	

                        		    	
		<div class="asia  has-no-ticker  main-content-container">
			<div id="header-wrapper">

			  
    		      			      				  <h2 id="header">
    			      	            <a rel="index" href="http://www.bbc.co.uk/news/"><img alt="BBC News" src="http://news.bbcimg.co.uk/img/1_0_3/cream/hi/news/news-blocks.gif" /></a>
    	                	            	    	            		<span class="section-title">Asia</span>
    	            	    	            		   		      				  </h2>
    			  			  
			  
		        

			  	            <div id="blq-local-nav">
 	            <ul id="nav" class="nav">
                	
        	        		                	
        	            	<li class="first-child "><a href="/news/">Home</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/uk/">UK</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/world/africa/">Africa</a></li>
                            	
        	        	        	
        	        		<li class="selected"><a href="/news/world/asia/">Asia</a></li>
        		        		                            	
        	        	        	
        	            	<li><a href="/news/world/europe/">Europe</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/world/latin_america/">Latin America</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/world/middle_east/">Mid-East</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/world/us_and_canada/">US &amp; Canada</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/business/">Business</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/health/">Health</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/science_and_environment/">Sci/Environment</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/technology/">Tech</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/entertainment_and_arts/">Entertainment</a></li>
                            	
        	        	        	
        	            	<li><a href="/news/10462520">Video</a></li>
                            </ul> 
        
	    	      <ul id="sub-nav" class="nav"> 
	        	        			        	        	
	        		            	<li class="first-child "><a href="/news/world/asia/china/">China</a></li>
	            	        	        		        	
	        		            	<li><a href="/news/world/asia/india/">India</a></li>
	            	        	      </ul> 
	    	</div>

			  
	        </div>
	        <!-- START CPS_SITE CLASS: international -->
	        <div id="content-wrapper" class="international">

					<div class="advert">
											</div>
                    
	            <!-- START CPS_SITE CLASS: story -->
	            <div id="main-content" class="story blq-clearfix">
			<!-- No EWA -->






<div class="layout-block-a">
    <div class="story-body">
    		  <span class="story-date">
    <span class="date">16 April 2014</span>
<span class="time-text">Last updated at </span><span class="time">18:29 GMT</span>
	  
</span>

	<div id="page-bookmark-links-head" class="share-help">
  <h3>Share this page</h3>
  <ul>  	
    <li class="delicious">
      <a title="Post this story to Delicious" href="http://del.icio.us/post?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">Delicious</a>
    </li>
    <li class="digg">
      <a title="Post this story to Digg" href="http://digg.com/submit?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">Digg</a>
    </li>
    <li class="facebook">
      <a title="Post this story to Facebook" href="http://www.facebook.com/sharer.php?u=http://www.bbc.com/news/world-asia-27056653&amp;t=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">Facebook</a>
    </li>
    <li class="reddit">
      <a title="Post this story to reddit" href="http://reddit.com/submit?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">reddit</a>
    </li>
    <li class="stumbleupon">
      <a title="Post this story to StumbleUpon" href="http://www.stumbleupon.com/submit?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">StumbleUpon</a>
    </li>
    <li class="twitter">
      <a title="Post this story to Twitter" href="http://twitter.com/home?status=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues+http://www.bbc.com/news/world-asia-27056653">Twitter</a>
    </li>
    <li class="email">
      <a title="Email this story" href="http://newsvote.bbc.co.uk/mpapps/pagetools/email/www.bbc.com/news/world-asia-27056653">Email</a>
    </li>
    <li class="print">
      <a title="Print this story" href="?print=true">Print</a>
    </li>
  </ul>
<!--  Social media icons by Paul Annet | http://nicepaul.com/icons  -->
</div>
<script type="text/javascript"> 
<!--
$render("page-bookmark-links","page-bookmark-links-head",{
    useForgeShareTools:"true",
    position:"top",
    site:'News', 
    headline:'BBC News - Desperate search for S Korea ferry passengers continues', 
    storyId:'27056653', 
    sectionId:'101360', 
    url:'http://www.bbc.com/news/world-asia-27056653', 
    edition:'International'
}); 
-->
</script>





	<h1 class="story-header">Desperate search for S Korea ferry passengers continues</h1>

     
         
 <!-- Adding hypertab -->

<div id="hypertab" class="hypertabs">
	<ul>
        
    	    
		<li class="selected">
			<a href="/news/world-asia-27056653">Latest</a>
		</li>
	    
		<li>
			<a href="/news/world-asia-27046455">Live</a>
		</li>
	    
		<li>
			<a href="/news/world-asia-27057229">Rescue drama</a>
		</li>
	    
		<li>
			<a href="/news/world-asia-27045924">Survivors&#039; stories</a>
		</li>
	    
		<li>
			<a href="/news/world-asia-27032144">In pictures</a>
		</li>
	    
		<li class="last-child">
			<a href="/news/world-asia-27045492">Footage of rescue</a>
		</li>
	    </ul>
</div>
<script type="text/javascript">$render("hypertabs","hypertab");</script>


<!-- end of hypertab -->

    
    
		
        <!--  Embedding the video player -->
<!--  This is the embedded player component -->

 



<!-- wwrights check -->
<!-- Empty country is used on test environment -->



<div class="videoInStoryB">
    <div id="emp-27046246-107750" class="emp">
                    
		
        <noscript>
            <div class="warning">
                                <img class="holding" src="http://news.bbcimg.co.uk/media/images/74283000/jpg/_74283551_74283549.jpg" alt="Still from amateur footage apparently shows passengers inside the ship wearing life jackets, waiting to be rescued" />
                                <p><strong>Please turn on JavaScript.</strong> Media requires JavaScript to play.</p>
            </div>
        </noscript>
        <object width="0" height="0">
            <param name="id" value="embeddedPlayer_27046246" />
                    <param name="width" value="448" />
            <param name="height" value="252" />    
                    <param name="size" value="Large" />
					<param name="holdingImage" value="http://news.bbcimg.co.uk/media/images/74283000/jpg/_74283551_74283549.jpg" />
							<param name="externalIdentifier" value="p01xjgcb" />
		            <param name="playlist" value="http://playlists.bbc.co.uk/news/world-asia-27046246A/playlist.sxml" />
            <param name="config_settings_autoPlay" value="false" />
            <param name="config_settings_showPopoutButton" value="false" />
            <param name="config_plugin_fmtjLiveStats_pageType" value="eav2" />
            <param name="config_plugin_fmtjLiveStats_edition" value="International" />
			
		            <param name="fmtjDocURI" value="/news/world-asia-27056653"/>
                    <param name="config_settings_suppressItemKind" value="advert, ident"/>
                    <param name="config_settings_showShareButton" value="true" />
            <param name="config_settings_showUpdatedInFooter" value="true" />
        </object>
        <!-- embedding script -->
        
        <script type="text/javascript">
    //<![CDATA[
        (function(){
            // create a new player, but don't write it yet
            var emp = new bbc.fmtj.av.emp.Player('emp-27046246-107750');
            // if the emps have already been loaded, we need to call the write method manually
            if(bbc.fmtj.av.emp.loaded){
                emp.setMediator('href', '{protocol}://{host}/mediaselector/5/select/version/2.0/mediaset/{mediaset}/vpid/{id}');
                emp.write();
            }
        })();
    //]]>
</script>
            </div>
    	
        		<!-- caption -->
		<p class="caption">Distressing footage has emerged, apparently showing passengers waiting to be rescued, as Lucy Williamson reports</p>
		<!-- END - caption -->
    
		

</div>
<!-- end of the embedded player component -->

<!-- Player embedded -->	<div class="story-feature related narrow">
		<a class="hidden" href="#story_continues_1">Continue reading the main story</a>		<h2>Related Stories</h2>
		<ul class="related-links-list">
						




		


	




<li class="has-icon-boxedlive ">
	<a class="story is-live" rel="published-1397635929084" href="/news/world-asia-27046455">S Korea ferry disaster<span class="gvl3-icon gvl3-icon-boxedlive"> Live</span></a>

		</li>


											




	


	




<li>
	<a class="story" rel="published-1397630963201" href="/news/world-asia-27045924">Survivors&#039; terror on tilting wreck</a>

		</li>


											




	


	




<li>
	<a class="story" rel="published-1397623272886" href="/news/world-asia-27032144">In pictures: South Korea ferry sinks</a>

		</li>


											</ul>
	</div>
                      <p class="introduction" id="story_continues_1">Emergency services are continuing to search overnight for almost 300 people missing after a ferry carrying 462 people sank off South Korea.</p>
        <p>Officials say 174 people were rescued from the ship, which was travelling from Incheon Port, in the north-west, to the southern resort island of Jeju.</p>
        <p>Emergency teams have been using floodlights and flares to search the vessel for passengers into the night. </p>
        <p>At least six people are thought to have died, with dozens more injured.</p>
  <div class="story-feature wide ">
	<a class="hidden" href="#story_continues_2">Continue reading the main story</a>		<h2>Analysis</h2>
		<!-- pullout-items-->
	<div class="byline">
		<span class="byline-picture"><img src="http://news.bbcimg.co.uk/media/images/58533000/jpg/_58533986_patience.jpg" alt="image of Martin Patience" /></span>
		<span class="byline-name">Martin Patience</span>
	<span class="byline-title">BBC News, Seoul</span>
	<hr />
</div>
	<!-- pullout-body-->
	      <p>South Korean TV networks are constantly replaying dramatic footage of the rescue efforts. It shows an armada of small boats motoring right up beside the ferry, which listed heavily on its side before sinking.</p>
        <p>What makes this accident even more distressing is the fact that among those on board were high school students on a trip to a holiday island.</p>
        <p>Relatives and friends of those on board are posting on social media sites asking for any news or information about loved ones.</p>
  
	<!-- pullout-links-->
		<ul class="links-list">
			<li><a href="/news/world-asia-27057229" >Dramatic rescue</a></li>
		</ul>
	</div>      <p id="story_continues_2">It is not yet clear what caused the ship to list at a severe angle and flip over, leaving only a small part of its hull visible above water.</p>
        <p>Rescue efforts are concentrated on the ship&#039;s wreckage, which sank in 30 metres of water.  Many passengers are thought to be trapped inside.</p>
  <span class="cross-head">Strong currents</span>
	      <p>The country&#039;s prime minister, Chung Hong-won, has warned there is not &quot;a minute or a second to waste&quot; in the search for survivors, urging those involved to do their utmost to save more lives.</p>
        <p>But officials say the rescue operation involving coast guard, military and commercial vessels has been hampered by poor visibility and strong currents. </p>
        <p>&quot;There is so much mud in the sea water and the visibility is very low,&quot; said Lee Gyeong-og, vice-minister of security and public administration. </p>
        <p>The US Navy has sent an amphibious assault ship, the USS Bonhomme Richard, to assist with the search. </p>
        <p>Navy divers have managed to enter three compartments of the ship but have not yet found any bodies. </p>
  <a class="hidden" href="#story_continues_3">Continue reading the main story</a><link rel="stylesheet" href="http://news.bbcimg.co.uk/news/special/2014/newsspec_7624/css/style.css" media="screen" type="text/css" />

<div id="newsspec_7624" class="storybody-halfwide-include newsspec_infographic_holder">
    <div class="ns_outer_wrapper">
        <div class="ns_inner_wrapper">
            <h1 class="ns_title"> MV Sewol</h1>
 
             <div class="ns_header">
                <div class="ns_header_left">
                    <p class="ns_super_impact"></p>
                    <p></p>
                </div>
                <div class="ns_header_right">
                    <p class="ns_super_impact"></p>
                    <p></p>
                </div>
            </div>
            
            <ul class="ns_separator">
                <li>
             
                    <p> Passengers on board: <span class="ns_impact">459</span> </p>
                </li>
                <li>
                    <p> Maximum capacity: <span class="ns_impact">900</span> </p>
                <li>
                    <p> Length: <span class="ns_impact">146 metres</span> </p>
                <li>
                         <p> Built: <span class="ns_impact">1994</span> </p>
                <li>
                </li>
                <li>
                </li>
                <li>
                </li>
                
            </ul>
            
            <div class="ns_footer">Source: Reuters</div>
        
        </div>
    
        <div class="ns_outer_wrapper_img_src">REUTERS</div>
    </div>
</div><div class="caption full-width">
  <img src="http://news.bbcimg.co.uk/media/images/74270000/jpg/_74270902_korea_ferry_624.jpg" width="624" height="430" alt="Map: Location of the sinking" />

  </div>
<div class="caption full-width">
  <img src="http://news.bbcimg.co.uk/media/images/74274000/jpg/_74274322_reuters.jpg" width="624" height="351" alt="South Korean ferry &quot;Sewol&quot; (L) is seen sinking at the sea off Jindo, as lighting flares are released for a night search, 16 April 2014." />

    <span style="width:624px;">Flares light up the sky as the search for missing passengers continues through the night</span>
  </div>
<div class="caption full-width">
  <img src="http://news.bbcimg.co.uk/media/images/74282000/jpg/_74282638_ap.jpg" width="624" height="351" alt="Relatives wait for missing people at a port in Jindo, South Korea, on 16 April 2014." />

    <span style="width:624px;">Relatives wait anxiously for news of their loved ones at a port in Jindo</span>
  </div>
<div class="caption full-width">
  <img src="http://news.bbcimg.co.uk/media/images/74282000/jpg/_74282636_ap.jpg" width="624" height="351" alt="Parents attend a candle light vigil at Danwon high school in Ansan, South Korea, on 16 April 2014. " />

    <span style="width:624px;">Parents at Danwon high school hold a candle light vigil in Ansan. More than 300 students from the school were on board the ship</span>
  </div>
      <p id="story_continues_3">A coast guard official told Reuters that divers were later prevented from entering the submerged ship for several hours due to strong tides.</p>
        <p>Rain, strong winds and fog are forecast for Thursday, and may hamper further rescue efforts, the news agency adds.</p>
  <span class="cross-head">'Shaking and tilting'</span>
	      <p>Relatives of the missing have gathered in the town of Jindo, near to where ferry capsized, awaiting news of their loved ones.</p>
        <p>Many of the passengers on board the ship were school students and teachers from the same school near the capital, Seoul, heading on a field trip to Jeju island. </p>
        <p>The ferry sent a distress call at around 09:00 local time (00:00 GMT) on Wednesday after it began to shake and take on water, about 20km (12 miles) off the island of Byungpoong.</p>
  <!--  Embedding the video player -->
<!--  This is the embedded player component -->

 



<!-- wwrights check -->
<!-- Empty country is used on test environment -->



<div class="videoInStoryB">
    <div id="emp-27056521-107751" class="emp">
                    
		
        <noscript>
            <div class="warning">
                                <img class="holding" src="http://news.bbcimg.co.uk/media/images/74285000/jpg/_74285243_74285242.jpg" alt="Aerials" />
                                <p><strong>Please turn on JavaScript.</strong> Media requires JavaScript to play.</p>
            </div>
        </noscript>
        <object width="0" height="0">
            <param name="id" value="embeddedPlayer_27056521" />
                    <param name="width" value="448" />
            <param name="height" value="252" />    
                    <param name="size" value="Large" />
					<param name="holdingImage" value="http://news.bbcimg.co.uk/media/images/74285000/jpg/_74285243_74285242.jpg" />
							<param name="externalIdentifier" value="p01xjgvz" />
		            <param name="playlist" value="http://playlists.bbc.co.uk/news/world-asia-27056521A/playlist.sxml" />
            <param name="config_settings_autoPlay" value="false" />
            <param name="config_settings_showPopoutButton" value="false" />
            <param name="config_plugin_fmtjLiveStats_pageType" value="eav2" />
            <param name="config_plugin_fmtjLiveStats_edition" value="International" />
			
		            <param name="fmtjDocURI" value="/news/world-asia-27056653"/>
                    <param name="config_settings_suppressItemKind" value="advert, ident"/>
                    <param name="config_settings_showShareButton" value="true" />
            <param name="config_settings_showUpdatedInFooter" value="true" />
        </object>
        <!-- embedding script -->
        
        <script type="text/javascript">
    //<![CDATA[
        (function(){
            // create a new player, but don't write it yet
            var emp = new bbc.fmtj.av.emp.Player('emp-27056521-107751');
            // if the emps have already been loaded, we need to call the write method manually
            if(bbc.fmtj.av.emp.loaded){
                emp.setMediator('href', '{protocol}://{host}/mediaselector/5/select/version/2.0/mediaset/{mediaset}/vpid/{id}');
                emp.write();
            }
        })();
    //]]>
</script>
            </div>
    	
        		<!-- caption -->
		<p class="caption">Aerial footage shows frantic efforts to rescue passengers as the ship sank</p>
		<!-- END - caption -->
    
		

</div>
<!-- end of the embedded player component -->

<!-- Player embedded --><div class="caption full-width">
  <img src="http://news.bbcimg.co.uk/media/images/74284000/jpg/_74284009_getty.jpg" width="624" height="351" alt="Korea Coast Guard work at the site of ferry sinking accident off the coast of Jindo Island on 16 April 2014 in Jindo-gun, South Korea" />

    <span style="width:624px;">Military and civilian ships and helicopters have been searching for survivors</span>
  </div>
<div class="caption full-width">
  <img src="http://news.bbcimg.co.uk/media/images/74274000/jpg/_74274420_021929976afp.jpg" width="624" height="351" alt="Rescued passengers are brought to land in Jindo after a South Korean ferry carrying 476 passengers and crew sank on its way to Jeju island on 16 April 2014" />

    <span style="width:624px;">Rescued passengers were taken to the nearby island of Jindo</span>
  </div>
      <p>Survivors say they heard a loud thud, before the boat began to shake and tilt. </p>
        <p>Some of the passengers managed to jump into the ocean, wearing life jackets and swim to nearby rescue boats and commercial vessels. </p>
        <p>One student told local media they were instructed not to move as it was dangerous. </p>
        <p>&quot;I am told that my friends and other friends could not escape as the passage was blocked. It seems that there are many students who could not get out as the passage was blocked by water,&quot; the unnamed student said.   </p>
        <p>Another passenger said the ship was &quot;shaking and tilting&quot;, with people tripping and bumping into each other.  </p>
  <div class="story-feature wide ">
	<a class="hidden" href="#story_continues_4">Continue reading the main story</a>		<h2>Major maritime accidents in South Korea</h2>
		<!-- pullout-items-->
	
	<!-- pullout-body-->
	<ul>
    <li> 1970: Sinking of passenger vessel Namyoung leaves 323 dead</li>
    <li> 1993: Sinking of passenger vessel Seohae Ferry leaves 292 dead</li>
    <li> 2007: Sinking of freighter Eastern Bright leaving 14 sailors missing</li>
    <li> 2009: Sinking of cargo ship Orchid Pia after a collision leaves 16 sailors missing</li>
  </ul>      <p><em>Source: Yonhap</em></p>
  
	<!-- pullout-links-->
	</div>      <p id="story_continues_4">Among the confirmed dead was a female member of crew and a male high school student, who died after being rescued.</p>
        <p>Local TV stations broadcast footage of the ferry listing and later sinking, within two hours of sending a distress signal.</p>
        <p>Images showed rescue teams pulling teenagers from cabin windows, as some of their classmates jumped into the sea. </p>
        <p>South Korean President Park Geun-hye has expressed sadness over the incident, saying it was &quot;truly tragic&quot; that students on a field trip were involved in &quot;such an unfortunate accident&quot;.</p>
        <p>Kim Young-boong, an official from the company which owns the ferry, has apologised. </p>
        <p>&quot;I would like to say sorry to the passengers, which include a number of students and their parents, and promise that our company will do its best to minimise loss of life. We are sorry,&quot; he said, according to the AP news agency.</p>
        <p>&quot;We will try to determine the cause of the accident after rescue operations are over,&quot; Lee Gyeong-og said. </p>
  <!--  Embedding the video player -->
<!--  This is the embedded player component -->

 



<!-- wwrights check -->
<!-- Empty country is used on test environment -->



<div class="videoInStoryC">
    <div id="emp-27047808-107752" class="emp">
                    
		
        <noscript>
            <div class="warning">
                                <img class="holding" src="http://news.bbcimg.co.uk/media/images/74266000/jpg/_74266493_74266492.jpg" alt="Survivor" />
                                <p><strong>Please turn on JavaScript.</strong> Media requires JavaScript to play.</p>
            </div>
        </noscript>
        <object width="0" height="0">
            <param name="id" value="embeddedPlayer_27047808" />
                    <param name="width" value="320" />
            <param name="height" value="180" />    
                    <param name="size" value="Small" />
					<param name="holdingImage" value="http://news.bbcimg.co.uk/media/images/74266000/jpg/_74266493_74266492.jpg" />
							<param name="externalIdentifier" value="p01xj1mb" />
		            <param name="playlist" value="http://playlists.bbc.co.uk/news/world-asia-27047808A/playlist.sxml" />
            <param name="config_settings_autoPlay" value="false" />
            <param name="config_settings_showPopoutButton" value="false" />
            <param name="config_plugin_fmtjLiveStats_pageType" value="eav2" />
            <param name="config_plugin_fmtjLiveStats_edition" value="International" />
			
		            <param name="fmtjDocURI" value="/news/world-asia-27056653"/>
                    <param name="config_settings_suppressItemKind" value="advert, ident"/>
                    <param name="config_settings_showShareButton" value="true" />
            <param name="config_settings_showUpdatedInFooter" value="true" />
        </object>
        <!-- embedding script -->
        
        <script type="text/javascript">
    //<![CDATA[
        (function(){
            // create a new player, but don't write it yet
            var emp = new bbc.fmtj.av.emp.Player('emp-27047808-107752');
            // if the emps have already been loaded, we need to call the write method manually
            if(bbc.fmtj.av.emp.loaded){
                emp.setMediator('href', '{protocol}://{host}/mediaselector/5/select/version/2.0/mediaset/{mediaset}/vpid/{id}');
                emp.write();
            }
        })();
    //]]>
</script>
            </div>
    	
        		<!-- caption -->
		<p class="caption">Survivor: &quot;There was an announcement telling us to sit still, but the ferry was already sinking&quot;</p>
		<!-- END - caption -->
    
		

</div>
<!-- end of the embedded player component -->

<!-- Player embedded -->      <p>As the disaster unfolded on Wednesday, there were conflicting accounts of the number of people rescued. Early reports suggested over 300 people had been plucked to safety but South Korean officials later revised this down to 174.</p>
        <p>The vessel - named Sewol - is reported to have a capacity of up to 900 people and is 146 metres long.</p>
        <p>Mr Lee was quoted by the AP news agency as saying that 30 crew members, 325 high school students, 15 school teachers and 89 non-student passengers were aboard the ship.</p>
        <p>Correspondents say this could turn out to be South Korea&#039;s biggest maritime disaster for more than 20 years.</p>
        <p><strong>Are you in the area? Do you have any information you would like to share? Please send us your comments. You can email us at haveyoursay@bbc.co.uk using the subject line &#039;South Korea ferry&#039;.</strong></p>
  <div class="comment-introduction">
                        <p class="introduction">Or get in touch using the form below.</p>
  
</div>
	
	
    
      <form id="comment-form" action="http://www.bbc.co.uk/cgi-bin/cgiemail/email/newsv6/form.txt">
    
    <div><input type="hidden" value="South Korea ferry - 27045512" name="email_subject"/></div>
    <div><input type="hidden" value="talkingpoint" name="mailto"/></div>
    <div><input type="hidden" value="http://www.bbc.co.uk/news/10631033" name="success"/></div>
    <fieldset class="contact_details">
      <label class="required" for="email_name">
        <span class="required">(Required) </span><span class="email_name-prompt"> Name</span>
        <span class="email_name-msgContainer error"></span>
        <input type="text" size="30" id="email_name" name="email_name" />
      </label>
      <label class="required" for="email_from">
        <span class="required">(Required) </span><span class="email_from-prompt"> Your E-mail address</span>
        <span class="email_from-msgContainer error"></span>
        <input type="text" size="30" id="email_from" name="email_from" />
      </label>
      <label class="required" for="email_country">
        <span class="required">(Required) </span><span class="email_country-prompt"> Town &amp; Country</span>
        <span class="email_country-msgContainer error"></span>
        <input type="text" size="30" id="email_country" name="email_country" />
      </label>
      <label class="required" for="email_telephone">
        <span class="required">(Required) </span><span class="email_telephone-prompt"> Your telephone number</span>
        <span class="email_telephone-msgContainer error"></span>
        <input type="text" size="30" id="email_telephone" name="email_telephone" />
      </label>
    </fieldset>
    <fieldset class="message">
      <label class="required" for="email_comments">
        <span class="required">(Required) </span> <span class="email_comments-prompt">Comments</span>
        <span class="email_comments-msgContainer error"></span>
        <textarea rows="8" cols="30" id="email_comments" name="email_comments"></textarea>
      </label>
    </fieldset>
	    <fieldset class="submit">
      <p class="disclaimer">If you are happy to be contacted by a BBC journalist please leave a telephone number that we can contact you on. In some cases a selection of your comments will be published, displaying your name as you provide it and location, unless you state otherwise. Your contact details will never be published. When sending us pictures, video or eyewitness accounts at no time should you endanger yourself or others, take any unnecessary risks or infringe any laws. Please ensure you have read the terms and conditions.</p>
      <p class="terms"><a href="http://www.bbc.co.uk/terms/#4">Terms and conditions</a></p>
      <button type="submit"><span>Send</span></button>
      <button type="reset" class="not-submit"><span>Clear</span></button>
    </fieldset>
  </form>


	</div><!-- / story-body -->
  
  <div>
 	<!--Related hypers and stories -->
	<div class="story-related">
	<h2>More on This Story</h2>
	  
	
<style>
.related-links-list li {
position: relative;
}
.related-links-list .gvl3-icon {
position: absolute;
top: 0;
left: 0;
}
</style>

<div class="see-also">
    <h3>Related Stories</h3>
    <ul class="related-links-list">
				
        			        		<li class=" first">
                        




		


	




<div class="has-icon-boxedlive ">
	<a class="story is-live" rel="published-1397635929084" href="/news/world-asia-27046455">S Korea ferry disaster<span class="gvl3-icon gvl3-icon-boxedlive"> Live</span></a>

		</div>

                        
                                                <span class="timestamp">16 APRIL 2014</span>,                                                
                                                <span class="section">ASIA</span>
                                        </li>
							        			        		<li class="">
                        




	


	




<div>
	<a class="story" rel="published-1397630963201" href="/news/world-asia-27045924">Survivors&#039; terror on tilting wreck</a>

		</div>

                        
                                                <span class="timestamp">16 APRIL 2014</span>,                                                
                                                <span class="section">ASIA</span>
                                        </li>
							        			        		<li class="">
                        




	


	




<div>
	<a class="story" rel="published-1397623272886" href="/news/world-asia-27032144">In pictures: South Korea ferry sinks</a>

		</div>

                        
                                                <span class="timestamp">16 APRIL 2014</span>,                                                
                                                <span class="section">ASIA</span>
                                        </li>
							        			        		<li class="">
                        




		


	




<div class="has-icon-boxedwatch ">
	<a class="story" rel="published-1397642880184" href="/news/world-asia-27047808">Survivor tells of moment ferry sank<span class="gvl3-icon gvl3-icon-boxedwatch"> Watch</span></a>

		</div>

                        
                                                <span class="timestamp">16 APRIL 2014</span>,                                                
                                                <span class="section">ASIA</span>
                                        </li>
							            </ul>
</div>
<script type="text/javascript">$render("page-see-also","ID");</script> 

	<!-- Newstracker -->
<div class="puffbox">
	








<!-- newstracker puffbox news 27056653 -->








<div class="newstracker-list">
<h3>From other news sites</h3>
<ul>


  
  
  
  	<li>
  
  
    <h4><strong>Guardian.co.uk </strong><a href="http://c.moreover.com/click/here.pl?z11646120579&amp;z=1650249688"> 270 missing as ferry sinks </a><span>1 hr ago</span></h4>
  
  </li>

  
  
  
  	<li class="even">
  
  
    <h4><strong>Telegraph </strong><a href="http://c.moreover.com/click/here.pl?z11645886329&amp;z=1650249688"> Up to 300 feared dead in Korea ferry disaster </a><span>1 hr ago</span></h4>
  
  </li>

  
  
  
  	<li>
  
  
    <h4><strong>ITV.com </strong><a href="http://c.moreover.com/click/here.pl?z11644560144&amp;z=1650249688"> Four dead and hundreds missing as Korean ferry sinks </a><span>4 hrs ago</span></h4>
  
  </li>

  
  
  
  	<li class="even">
  
  
    <h4><strong>Yahoo! UK and Ireland </strong><a href="http://c.moreover.com/click/here.pl?z11644373974&amp;z=1650249688"> Four dead, 284 missing in S. Korea ferry sinking </a><span>4 hrs ago</span></h4>
  
  </li>

  
  
  
  	<li>
  
  
    <h4><strong>Japan Times </strong><a href="http://c.moreover.com/click/here.pl?z11644045285&amp;z=1650249688"> Four dead, 291 missing in South Korea ferry sinking </a><span>4 hrs ago</span></h4>
  
  </li>

<li class="about">
<a href="http://www.bbc.co.uk/news/10621663">About these results</a>
</li>
</ul>

</div>






</div>
<!-- Newstracker - End -->
<script type="text/javascript">$render("page-newstracker","ID");</script> 

	</div>
<script type="text/javascript">$render("page-related-items","ID");</script>

  </div>

  
  <div class="share-body-bottom">
	<div id="page-bookmark-links-foot" class="share-help">
  <h3>Share this page</h3>
  <ul>  	
    <li class="delicious">
      <a title="Post this story to Delicious" href="http://del.icio.us/post?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">Delicious</a>
    </li>
    <li class="digg">
      <a title="Post this story to Digg" href="http://digg.com/submit?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">Digg</a>
    </li>
    <li class="facebook">
      <a title="Post this story to Facebook" href="http://www.facebook.com/sharer.php?u=http://www.bbc.com/news/world-asia-27056653&amp;t=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">Facebook</a>
    </li>
    <li class="reddit">
      <a title="Post this story to reddit" href="http://reddit.com/submit?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">reddit</a>
    </li>
    <li class="stumbleupon">
      <a title="Post this story to StumbleUpon" href="http://www.stumbleupon.com/submit?url=http://www.bbc.com/news/world-asia-27056653&amp;title=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues">StumbleUpon</a>
    </li>
    <li class="twitter">
      <a title="Post this story to Twitter" href="http://twitter.com/home?status=BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues+http://www.bbc.com/news/world-asia-27056653">Twitter</a>
    </li>
    <li class="email">
      <a title="Email this story" href="http://newsvote.bbc.co.uk/mpapps/pagetools/email/www.bbc.com/news/world-asia-27056653">Email</a>
    </li>
    <li class="print">
      <a title="Print this story" href="?print=true">Print</a>
    </li>
  </ul>
<!--  Social media icons by Paul Annet | http://nicepaul.com/icons  -->
  
</div>
<script type="text/javascript"> 
<!--
$render("page-bookmark-links","page-bookmark-links-foot",{
    useForgeShareTools:"true",
    position:"bottom",
    site:'News', 
    headline:'BBC News - Desperate search for S Korea ferry passengers continues', 
    storyId:'27056653', 
    sectionId:'101360', 
    url:'http://www.bbc.com/news/world-asia-27056653', 
    edition:'International'
}); 
-->
</script>

 </div>



        <!-- other stories from this section include -->
        

<div class="top-index-stories">
	<h2 class="top-index-stories-header"><a href="/news/world/asia/">More Asia stories</a></h2>
        <a href="http://feeds.bbci.co.uk/news/world/asia/rss.xml" class="rss">RSS</a>	
		

	
						
				
		<!-- Specific version for 27056653 -->
		
	<ul>
		
						
												
		<li class="first-child medium-image">
			




	


		




<h3>
	<a class="story" rel="published-1397664164632" href="/news/world-asia-27053267"><img src="http://news.bbcimg.co.uk/media/images/74280000/jpg/_74280095_74277620.jpg" alt="File photo: Pakistani Taliban fighters patrol in their stronghold of Shawal in Pakistani tribal region of South Waziristan, 5 August 2012" />Pakistan Taliban end ceasefire</a>

		</h3>

															
							<p>The Pakistani Taliban say they will not extend a ceasefire with the government announced last month, but will remain committed to peace talks.</p>
					</li>
		
		
						
						
		<li class="column-1">
			




	


	




<h3>
	<a class="story" rel="published-1397609303791" href="/news/world-asia-27045449">Mini-sub continues search for plane</a>

		</h3>

															
					</li>
		
		
						
						
		<li class="column-2">
			




	


	




<h3>
	<a class="story" rel="published-1397625420370" href="/news/world-asia-27045603">Australian NSW leader resigns</a>

		</h3>

															
					</li>
		
		</ul>

						 

</div>


</div><!-- / layout-block-a -->

<div class="layout-block-b">
			




		     <div class="hyperpuff">
	       	         
	       	         



<div id="range-top-stories" class="top-stories-range-module">

			<h2 class="top-stories-range-module-header">Top Stories</h2>
		
		
									
						
			<!-- Specific version for 27056653 -->
			
	<ul>
					  				  								
				




	


		




<li class=" first-child medium-image">
	<a class="story" rel="published-1397663117306" href="/news/world-europe-27053500"><img src="http://news.bbcimg.co.uk/media/images/74279000/jpg/_74279580_74271814.jpg" alt="Women stand near soldiers wearing pro-Russian ribbons in Sloviansk, Ukraine, 16 April" />Ukraine military column &#039;disarmed&#039; </a>

		</li>

									 			




	


	




<li>
	<a class="story" rel="published-1397679725974" href="/news/technology-27058143">First Heartbleed hacker arrested</a>

		</li>

  									 			




	


	




<li>
	<a class="story" rel="published-1397636890782" href="/news/world-africa-27047001">Reeva Steenkamp shot in &#039;rapid fire&#039;</a>

		</li>

  									 			




	


	




<li>
	<a class="story" rel="published-1397664164632" href="/news/world-asia-27053267">Pakistan Taliban end ceasefire</a>

		</li>

  									 			




	


	




<li>
	<a class="story" rel="published-1397646240841" href="/news/world-africa-27049803">Search after Nigeria school kidnap</a>

		</li>

  						</ul>

									 
	
</div>
<script type="text/javascript">$render("range-top-stories","range-top-stories");</script>
      	

	       	         
	       	         

	<div id="features" class="feature-generic">

			<h2 class="features-header">Features &amp; Analysis</h2>
		
	<ul class="feature-main">

		
	
						
			<!-- Non specific version -->
			
			
							
		<li class="medium-image">

			




		


		




<h3 class=" feature-header">
	<a class="story" rel="published-1397604575047" href="/news/magazine-27034535"><img src="http://news.bbcimg.co.uk/media/images/74266000/jpg/_74266646_74247451.jpg" alt="Man next to crumbling buildings in A Barca" />A free village<span class="gvl3-icon-wrapper"><span class="gvl3-icon gvl3-icon-invert-watch"> Watch</span></span></a>

		</h3>

			
							<p>The abandoned hamlet its mayor wants to give away 	
				  <span id="dna-comment-count___CPS__27034535" class="gvl3-icon gvl3-icon-comment comment-count"></span></p>
			
							<hr />
					</li>
			
							
		<li class="medium-image">

			




	


		




<h3 class=" feature-header">
	<a class="story" rel="published-1397607037973" href="/news/magazine-26954088"><img src="http://news.bbcimg.co.uk/media/images/74248000/jpg/_74248092_624_fadumo.jpg" alt="A letter from a Somali refugee to a Syrian child" />&#039;Be a star&#039;</a>

		</h3>

			
							<p>Children&#039;s uplifting letters of hope to homeless Syrians 	
				  <span id="dna-comment-count___CPS__26954088" class="gvl3-icon gvl3-icon-comment comment-count"></span></p>
			
							<hr />
					</li>
			
							
		<li class="medium-image">

			




	


		




<h3 class=" feature-header">
	<a class="story" rel="published-1397607875917" href="/news/magazine-26980611"><img src="http://news.bbcimg.co.uk/media/images/74281000/jpg/_74281190_face_dozier.jpg" alt="Facial composite photo" />Unearthing the truth</a>

		</h3>

			
							<p>Who was buried behind a boys&#039; school in Florida? 	
				  <span id="dna-comment-count___CPS__26980611" class="gvl3-icon gvl3-icon-comment comment-count"></span></p>
			
							<hr />
					</li>
			
							
		<li class="medium-image">

			




	


		




<h3 class=" feature-header">
	<a class="story" rel="published-1397638674419" href="/news/world-europe-27025830"><img src="http://news.bbcimg.co.uk/media/images/74237000/jpg/_74237252_adriatic.jpg" alt="A swimmer jumps into the sea in the Adriatic town of Izola in September 2013." />Pining for the sea </a>

		</h3>

			
							<p>Landlocked Czechs build boat from bottles 	
				  <span id="dna-comment-count___CPS__27025830" class="gvl3-icon gvl3-icon-comment comment-count"></span></p>
			
							<hr />
					</li>
	
	 
	
	
	</ul>
	</div>
	<script type="text/javascript">$render("feature-generic","features");</script> 


	       	         
<div id="most-popular" class="livestats livestats-tabbed tabbed range-most-popular">
	
			<h2 class="livestats-header">Most Popular</h2>
	
					
					<h3 class="tab "><a href="#">Shared</a></h3>
		
		<div class="panel ">
      		<ol>
	      		<li
  class="first-child ol1">
  <a
    href="http://www.bbc.co.uk/news/magazine-26969150"
    class="story">
    <span
      class="livestats-icon livestats-1">1: </span>A 13-year-old eagle huntress in Mongolia</a>
</li>
<li
  class="ol2">
  <a
    href="http://www.bbc.co.uk/news/science-environment-27023992"
    class="story">
    <span
      class="livestats-icon livestats-2">2: </span>Beard trend 'guided by evolution'</a>
</li>
<li
  class="ol3">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27045512"
    class="story">
    <span
      class="livestats-icon livestats-3">3: </span>Many missing as S Korea ferry sinks</a>
</li>
<li
  class="ol4">
  <a
    href="http://www.bbc.co.uk/news/science-environment-27056698"
    class="story">
    <span
      class="livestats-icon livestats-4">4: </span>Birth of 'new Saturn moon' witnessed</a>
</li>
<li
  class="ol5">
  <a
    href="http://www.bbc.co.uk/news/uk-england-kent-27049165"
    class="story">
    <span
      class="livestats-icon livestats-5">5: </span>M26 closed as lorries and car crash</a>
</li>
      		</ol>
      	</div>
							
					<h3 class="tab open"><a href="#">Read</a></h3>
		
		<div class="panel open">
      		<ol>
	      		<li
  class="first-child ol1">
  <a
    href="http://www.bbc.co.uk/news/world-europe-27053500"
    class="story">
    <span
      class="livestats-icon livestats-1">1: </span>Ukraine military column 'disarmed' </a>
</li>
<li
  class="ol2">
  <a
    href="http://www.bbc.co.uk/news/world-africa-27047001"
    class="story">
    <span
      class="livestats-icon livestats-2">2: </span>Forensics examined in Pistorius case</a>
</li>
<li
  class="ol3">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27056653"
    class="story">
    <span
      class="livestats-icon livestats-3">3: </span>Search for S Korea ferry passengers</a>
</li>
<li
  class="ol4">
  <a
    href="http://www.bbc.co.uk/news/science-environment-27023992"
    class="story">
    <span
      class="livestats-icon livestats-4">4: </span>Beard trend 'guided by evolution'</a>
</li>
<li
  class="ol5">
  <a
    href="http://www.bbc.co.uk/news/blogs-trending-27051346"
    class="story">
    <span
      class="livestats-icon livestats-5">5: </span>Iran execution stopped at last minute</a>
</li>
<li
  class="ol6">
  <a
    href="http://www.bbc.co.uk/news/science-environment-27056698"
    class="story">
    <span
      class="livestats-icon livestats-6">6: </span>Birth of 'new Saturn moon' witnessed</a>
</li>
<li
  class="ol7">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27046455"
    class="story">
    <span
      class="livestats-icon livestats-7">7: </span>South Korea ferry disaster</a>
</li>
<li
  class="ol8">
  <a
    href="http://www.bbc.co.uk/news/magazine-26980611"
    class="story">
    <span
      class="livestats-icon livestats-8">8: </span>Exhuming remains at Florida school</a>
</li>
<li
  class="ol9">
  <a
    href="http://www.bbc.co.uk/news/magazine-26969150"
    class="story">
    <span
      class="livestats-icon livestats-9">9: </span>A 13-year-old eagle huntress in Mongolia</a>
</li>
<li
  class="ol10">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27032144"
    class="story">
    <span
      class="livestats-icon livestats-10">10: </span>In pictures: South Korea ferry sinks</a>
</li>
      		</ol>
      	</div>
					
					<h3 class="tab "><a href="#">Video/Audio</a></h3>
		
		<div class="panel ">
      		<ol>
	      		<li
  class="first-child has-icon-watch ol1">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27046246"
    class="story">
    <span
      class="livestats-icon livestats-1">1: </span>Rescue operation after ferry sinks<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol2">
  <a
    href="http://www.bbc.co.uk/news/uk-27058362"
    class="story">
    <span
      class="livestats-icon livestats-2">2: </span>CCTV reveals dog as hunted car vandal<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol3">
  <a
    href="http://www.bbc.co.uk/news/world-europe-27051985"
    class="story">
    <span
      class="livestats-icon livestats-3">3: </span>Ukrainian troops blocked in town<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol4">
  <a
    href="http://www.bbc.co.uk/news/magazine-27034535"
    class="story">
    <span
      class="livestats-icon livestats-4">4: </span>The Spanish hamlet being given away for free<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol5">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27045492"
    class="story">
    <span
      class="livestats-icon livestats-5">5: </span>South Korea ferry rescue footage<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol6">
  <a
    href="http://www.bbc.co.uk/news/technology-27033060"
    class="story">
    <span
      class="livestats-icon livestats-6">6: </span>Will Jelly repeat Twitter's success?<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol7">
  <a
    href="http://www.bbc.co.uk/news/world-europe-27052028"
    class="story">
    <span
      class="livestats-icon livestats-7">7: </span>Armoured vehicle 'rebranded' Russian<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol8">
  <a
    href="http://www.bbc.co.uk/news/uk-27051977"
    class="story">
    <span
      class="livestats-icon livestats-8">8: </span>Aerial footage of motorway pile up<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol9">
  <a
    href="http://www.bbc.co.uk/news/science-environment-27048100"
    class="story">
    <span
      class="livestats-icon livestats-9">9: </span>The end of the beard is nigh<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
<li
  class="has-icon-watch ol10">
  <a
    href="http://www.bbc.co.uk/news/world-asia-27056521"
    class="story">
    <span
      class="livestats-icon livestats-10">10: </span>Aerials show frantic ferry rescues<span
      class="gvl3-icon gvl3-icon-watch"> Watch</span></a>
</li>
      		</ol>
      	</div>
		
</div>

<script type="text/javascript">$render("most-popular","most-popular");</script>

	       	     </div>
	
	

			




		     <div class="hyperpuff">
	       	         <div id="promotional-content" class="hyper-promotional-content">
	
			<h2>Elsewhere on the BBC </h2>
	
	<ul>
							
						
															
										<li class="large-image first-child">
				




	


		




<h3>
	<a class="story" rel="published-1397666402163" href="http://www.bbc.com/culture/story/20140416-great-movies-about-children"><img src="http://news.bbcimg.co.uk/media/images/74282000/jpg/_74282221_74282220.jpg" alt="Child" />Movie magic</a>

		</h3>

									<p>What do the similarities in children&#039;s movies reveal about cinema - and us? </p>
							</li>
			</ul>
	 
</div>
<script type="text/javascript">$render("hyper-promotional-content","promotional-content");</script>


	       	     </div>
	
	
			




		     <div class="hyperpuff">
	       	             		  		    	
    		    		  

<div id="container-programme-promotion" class="container-programme-promotion">
			<h2 class="programmes-header">Programmes</h2>
		
	

						
<ul class="programme-breakout">
	
	
			
	<li class="first-child large-image">		
		




		


		




<h3 class=" programme-header">
	<a class="story" rel="published-1397633213155" href="/news/technology-27033060"><img src="http://news.bbcimg.co.uk/media/images/74244000/jpg/_74244215_jelly1024.jpg" alt="Jelly" />Click<span class="gvl3-icon-wrapper"><span class="gvl3-icon gvl3-icon-invert-watch"> Watch</span></span></a>

		</h3>

		<p>Can Twitter’s co-founder Biz Stone break the mould with his social Q&amp;A Jelly app?</p>
		
		 
	</li>
</ul>		
	</div>
<script type="text/javascript">$render("container-programmes-promotion","container-programme-promotion");</script>
	
	       	     </div>
	
	
	
</div>

	<!-- END #MAIN-CONTENT & CPS_ASSET_TYPE CLASS: story -->
	</div>
<!-- END CPS_AUDIENCE CLASS: international -->
	
</div> 
<div id="related-services" class="footer">
   <div id="news-services">
      <h2>Services</h2>
      <ul>
         <li id="service-mobile" class="first-child"><a href="/news/10628994"><span class="gvl3-mobile-icon-large services-icon">&nbsp;</span>Mobile</a></li>
         <li id="service-feeds"><a href="/news/help-17655000"><span class="gvl3-connected-tv-icon-large services-icon">&nbsp;</span>Connected TV</a></li>
         <li id="service-podcast"><a href="/news/10628494"><span class="gvl3-feeds-icon-large services-icon">&nbsp;</span>News feeds</a></li>
         <li id="service-alerts"><a href="/news/10628323"><span class="gvl3-alerts-icon-large services-icon">&nbsp;</span>Alerts</a></li>
         <li id="service-email-news"><a href="/news/help/16617948"><span class="gvl3-email-icon-large services-icon">&nbsp;</span>E-mail news</a></li>
      </ul>	 
   </div>
   <div id="news-related-sites">
      <h2><a href="/news/19888761">About BBC News</a></h2>
      <ul>
         <li class="column-1"><a href="/news/blogs/the_editors/">Editors' blog</a></li>
         <li class="column-1"><a href="/journalism/">BBC College of Journalism</a></li>
         <li class="column-1"><a href="/news/10621655">News sources</a></li>
         <li class="column-1"><a href="/mediaaction/">Media Action</a></li>
         <li class="column-1"><a href="/editorialguidelines/">Editorial Guidelines</a></li>
      </ul>
   </div>
</div>
</div><!-- close asia -->



	
	

   </div>   <!--[if IE 6]> <div id="blq-ie6-upgrade"> <p> <span>You're using the Internet Explorer 6 browser to view the BBC website. Our site will work much better if you change to a more modern browser. It's free, quick and easy.</span> <a href="http://www.browserchoice.eu/">Find out more <span>about upgrading your browser</span> here&hellip;</a> </p> </div> <![endif]-->  <div id="blq-foot" xml:lang="en-GB" class="blq-rst blq-clearfix blq-foot-transparent blq-foot-text-dark"> <div id="blq-footlinks"> <h2 class="blq-hide">BBC links</h2>       <ul>                    <li class="blq-footlinks-row"> <ul class="blq-footlinks-row-list"> <li><a href="/news/mobile/" id="blq-footer-mobile">Mobile site</a></li><li><a href="http://www.bbc.co.uk/terms/">Terms of Use</a></li><li><a href="http://www.bbc.co.uk/aboutthebbc/">About the BBC</a></li> </ul> </li>                     <li class="blq-footlinks-row"> <ul class="blq-footlinks-row-list"> <li><a href="http://advertising.bbcworldwide.com">Advertise With Us</a></li><li><a href="http://www.bbc.co.uk/privacy/">Privacy</a></li><li><a href="http://www.bbc.co.uk/accessibility/">Accessibility Help</a></li> </ul> </li>                     <li class="blq-footlinks-row"> <ul class="blq-footlinks-row-list"> <li><a href="http://www.bbc.co.uk/bbc.com/ad-choices/">Ad Choices</a></li><li><a href="http://www.bbc.co.uk/privacy/bbc-cookies-policy.shtml">Cookies</a></li><li><a href="/news/21323537">Contact the BBC</a></li> </ul> </li>           <li class="blq-footlinks-row"> <ul class="blq-footlinks-row-list"> <li><a href="http://www.bbc.co.uk/guidance/">Parental Guidance</a></li> </ul> </li>             </ul> <script type="text/javascript">/*<![CDATA[*/ (function() { var mLink = document.getElementById('blq-footer-mobile'), stick = function() { var d = new Date (); d.setYear(d.getFullYear() + 1); d = d.toUTCString(); window.bbccookies.set('ckps_d=m;domain=.bbc.co.uk;path=/;expires=' + d ); window.bbccookies.set('ckps_d=m;domain=.bbc.com;path=/;expires=' + d ); }; if (mLink) {  if (mLink.addEventListener) { mLink.addEventListener('click', stick, false); } else if (mLink.attachEvent) { mLink.attachEvent('onclick', stick); } } })(); /*]]>*/</script>  </div>  <div id="blq-foot-blocks" class="blq-footer-image-dark"><img src="http://static.bbci.co.uk/frameworks/barlesque/2.60.6/desktop/3.5/img/blocks/dark.png" width="84" height="24" alt="BBC" /></div>  <p id="blq-disclaim"><span id="blq-copy">BBC &copy; 2014</span> <a href="http://www.bbc.co.uk/help/web/links/">The BBC is not responsible for the content of external sites. Read more.</a></p> <div id="blq-obit"><p><strong>This page is best viewed in an up-to-date web browser with style sheets (CSS) enabled. While you will be able to view the content of this page in your current browser, you will not be able to get the full visual experience. Please consider upgrading your browser software or enabling style sheets (CSS) if you are able to do so.</strong></p></div> </div> </div> 
<!-- BBCDOTCOM analytics template:client-side journalismVariant: true ipIsAdvertiseCombined: true adsEnabled: false  showDotcom: true flagpole: ON -->
            <!-- BBCCOM analytics client-side -->
<div id="bbccomWebBug" class="bbccomWebBug"></div>

<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        if(typeof(bbcdotcom) != 'undefined' && typeof(bbcdotcom.stats) != 'undefined') {
            bbcdotcom.stats.contentType = "HTML";
        }
        document.write(unescape('%3Cscript type="text/javascript" src="http://js.revsci.net/gateway/gw.js?csid=J08781"%3E%3C/script%3E'));
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        DM_tag();
    }
    /*]]>*/
</script>

<!-- Start SiteCatalyst -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        
            var s_account = "bbcwglobalprod";
        

        
            document.write(unescape('%3Cscript type="text/javascript" src="http://news.bbcimg.co.uk/js/app/bbccom/0.3.239/s_code.js"%3E%3C/script%3E'));
        
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        var s_code=scw.t();if(s_code)document.write(s_code)
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
    }
    /*]]>*/
</script>
<!-- End SiteCatalyst -->


<!-- Start comScore Tag -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        document.write(unescape("%3Cscript src='" + (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js' %3E%3C/script%3E"));
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        COMSCORE.beacon({
            c1:2,
            c2:"6035051",
            c3:"",
            c4:"www.bbc.com/news/world-asia-27056653",
            c5:"",
            c6:"",
            c15:""
        });
    }
    /*]]>*/
</script>
<!-- End comScore Tag -->

<!-- Begin Sitestat4 code -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('sitestat')) {
        function sitestat(ns_l){ns_l+='&amp;ns__t='+(new Date()).getTime();
        ns_0=document.referrer;
        ns_0=(ns_0.lastIndexOf('/')==ns_0.length-1)?ns_0.substring(ns_0.lastIndexOf('/'),0):ns_0;
        if(ns_0.length>0)ns_l+='&amp;ns_referrer='+escape(ns_0);
        if(document.images){ns_1=new Image();ns_1.src=ns_l;}else
        document.write('<img src="'+ns_l+'" width="1" height="1" alt="">');}
        sitestat("http://nl.sitestat.com/adfab/bbc/s?teller");
    }
    /*]]>*/
</script>
<!-- End Sitestat4 code -->


<!-- Start Nielsen Online SiteCensus V6.0 -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('nielsen-au')) {
        <!-- COPYRIGHT 2009 Nielsen Online -->
        document.write(unescape('%3Cscript type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https:' : 'http:') + '//secure-au.imrworldwide.com/v60.js"%3E%3C/script%3E'));
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('nielsen-au')) {
        <!-- Start Nielsen Online SiteCensus V6.0 Part 2 -->
        nol_t({cid:"au-bbc",content:"0",server:"secure-au"}).record().post();
        <!-- End Nielsen Online SiteCensus V6.0 Part 2 -->
    }
    /*]]>*/
</script>
<!-- End Nielsen Online SiteCensus V6.0 -->


<!-- Start Nielsen Online SiteCensus V6.0 -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('nielsen-nz')) {
        <!-- COPYRIGHT 2009 Nielsen Online -->
        document.write(unescape('%3Cscript type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https:' : 'http:') + '//secure-nz.imrworldwide.com/v60.js"%3E%3C/script%3E'));
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('nielsen-nz')) {
        nol_t({cid:"nz-bbc",content:"0",server:"secure-nz"}).record().post();
    }
    /*]]>*/
</script>
<!-- End Nielsen Online SiteCensus V6.0 -->


<!-- Start Nielsen Online SiteCensus V6.0 -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('nielsen-us')) {
        <!-- COPYRIGHT 2010 Nielsen Online -->
       (function () {
           var d = new Image(1, 1);
           d.onerror = d.onload = function () {
               d.onerror = d.onload = null;
           };
           d.src = [('https:' == document.location.protocol ? 'https:' : 'http:') + "//secure-us.imrworldwide.com/cgi-bin/m?ci=us-804789h&amp;cg=0&amp;cc=1&amp;si=", escape(window.location.href), "&amp;rp=",
           escape(document.referrer), "&amp;ts=compact&amp;rnd=", (new Date()).getTime()].join('');
        })();
    }
    /*]]>*/
</script>
<!-- End Nielsen Online SiteCensus V6.0 -->


<!-- Effective Measure BBCCOM-1195 -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        (function() {
            var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
            em.src = ('https:' == document.location.protocol ? 'https://me-ssl' : 'http://me-cdn') + '.effectivemeasure.net/em.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
        })();
    }
    /*]]>*/
</script>
<!-- End Effective Measure -->


<!-- AGOF BBCCOM-1271 -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('agof')) {
        var ivwcode="default";
        if(typeof BBC != 'undefined' && typeof BBC.adverts != 'undefined'){
            ivwcode = BBC.adverts.getSectionPath();
        }
        var IVW="http://bbc.ivwbox.de/cgi-bin/ivw/CP/"+ivwcode+";";
        document.write("<img src=\""+IVW+"?r="+escape(document.referrer)+"&d="+(Math.random()*100000)+"\" width=\"1\" height=\"1\" alt=\"szmtag\" />");
    }
    /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('agof')) {
        var szmvars="bbc//CP/"+ivwcode;
        document.write(unescape('%3Cscript src="http://bbc.ivwbox.de/2004/01/survey.js" type="text/javascript"%3E%3C/script%3E'));
    }
    /*]]>*/
</script>
<!-- End AGOF -->

<!-- (C)2000-2014 Gemius SA - gemiusAudience / Bbc.com / BBCCOM-4795 -->
<script type="text/javascript">
    /*<![CDATA[*/
    if (BBC.adverts.isActive('analytics')) {
        var pp_gemius_identifier;
        if (document.location.href.match(/(?:\.com|\.co\.uk)$/)) {
            pp_gemius_identifier = new String('olWVhnuxiY1QRfycRpHDeOVyHZFpFq8ZzHNLzSAeCrH.M7');
        } else {
            pp_gemius_identifier = new String('.FE7YrQv1LlVkCW3mZWXere_P1I8b4bS5yJegCpKj23.E7');
        }
        document.write('<script src="http://news.bbcimg.co.uk/js/app/bbccom/0.3.239/vendor/gemius/xgemius.js" type="text/javascript">\x3C/script>');
    }
    /*]]>*/
</script>

     </div> </div>  <script type="text/javascript"> if (typeof require !== 'undefined') { require(['istats-1'], function(istats){ istats.track('external', { region: document.getElementById('blq-main') }); istats.track('download', { region: document.getElementById('blq-main') }); }); } </script>  <script type="text/html" id="blq-panel-template-promo"><![CDATA[ <div id="blq-panel-promo" class="blq-masthead-container"></div> ]]></script> <script type="text/html" id="blq-panel-template-more"><![CDATA[ <div id="blq-panel-more" class="blq-masthead-container  blq-clearfix" xml:lang="en-GB" dir="ltr"> <div class="blq-panel-container panel-paneltype-more"> <div class="panel-header"> <h2> <a href="http://www.bbc.co.uk/a-z/">  More&hellip;  </a> </h2>  <a href="http://www.bbc.co.uk/a-z/" class="panel-header-links panel-header-link">Full A-Z<span class="blq-hide"> of BBC sites</span></a>  </div> <div class="panel-component panel-links">       <ul>   <li> <a href="http://www.bbc.co.uk/cbbc/"  >CBBC</a> </li>    <li> <a href="http://www.bbc.co.uk/cbeebies/"  >CBeebies</a> </li>    <li> <a href="http://www.bbc.co.uk/comedy/"  >Comedy</a> </li>   </ul>  <ul>   <li> <a href="http://www.bbc.co.uk/food/"  >Food</a> </li>    <li> <a href="http://www.bbc.co.uk/history/"  >History</a> </li>    <li> <a href="http://www.bbc.co.uk/learning/"  >Learning</a> </li>   </ul>  <ul>   <li> <a href="http://www.bbc.co.uk/music/"  >Music</a> </li>    <li> <a href="http://www.bbc.co.uk/science/"  >Science</a> </li>    <li> <a href="http://www.bbc.co.uk/nature/"  >Nature</a> </li>   </ul>  <ul>   <li> <a href="http://www.bbc.co.uk/local/"  >Local</a> </li>    <li> <a href="http://www.bbc.co.uk/travelnews/"  >Travel News</a> </li>   </ul>   </div> </div> ]]></script>            
	

<!-- shared/foot -->
<script type="text/javascript">
	bbc.fmtj.common.removeNoScript({});
	bbc.fmtj.common.tabs.createTabs({});
</script>
<!-- hi/news/foot.inc -->

<!-- Chartbeat Web Analytics code - start -->
<script type="text/javascript">
var _sf_async_config={};
/** CONFIGURATION START **/
_sf_async_config.uid = 50924; /** Chartbeat BBC id **/
_sf_async_config.domain = "bbc.co.uk";/** BBC domain being tracked **/
_sf_async_config.sections = "asia";
_sf_async_config.region = "international";

  <!-- all multi-edition pages that are not indexes eg. story pages need the title -->
  var storyTitle = "BBC+News+-+Desperate+search+for+S+Korea+ferry+passengers+continues".replace(new RegExp('\\+', 'gi'),' ');//remove the plus signs
  storyTitle = decodeURIComponent(storyTitle.replace("BBC News - ",""));//remove the sub-string 'BBC News' and convert utf-8 chars to html
  _sf_async_config.title = storyTitle;

/** CONFIGURATION END **/
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement("script");
    e.setAttribute("language", "javascript");
    e.setAttribute("type", "text/javascript");
    e.setAttribute('src', '/inc/specials/cream/hi/news/chartbeat/chartbeat.js');
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != "function") ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();
</script>
<!-- Chartbeat Web Analytics code - end -->
<!-- shared/foot_story -->
<!-- #CREAM hi news international foot.inc -->

 

</body>
</html>




BODY;
        $msg = <<<MSG
HTTP/1.1 200 OK
Server: Apache
Expires: Wed, 16 Apr 2014 20:34:11 GMT
Content-Language: en
Content-Type: text/html
Content-Length: 105470
Date: Wed, 16 Apr 2014 20:34:29 GMT
Connection: keep-alive
X-Cache-Action: HIT
X-Cache-Hits: 1
X-Cache-Age: 18
Cache-Control: private, max-age=0, must-revalidate
X-LB-NoCache: true
Vary: X-CDN

$body
MSG;
        $message = new HttpMessage($msg);
        $this->request->shouldReceive('setMethod')->with(HTTP_METH_GET)->once();
        $this->request
            ->shouldReceive('setUrl')
            ->with('http://example.com/1.html')
            ->once();
        $this->request->shouldReceive('send')->once()->andReturn($message);
        
        $meta = m::mock('DOMElement');
        $meta
            ->shouldReceive('getAttribute')
            ->with('content')
            ->andReturn('Search for S Korea ferry passengers')
            ->once();
        $subCrawler = m::mock('Symfony\Component\DomCrawler\Crawler');
        $subCrawler
            ->shouldReceive('getNode')
            ->with(0)
            ->andReturn($meta);
        $this->crawler
            ->shouldReceive('addHtmlContent')
            ->once()
            ->with($message->getBody());
        $this->crawler
            ->shouldReceive('filterXPath')
            ->with('//head/meta[@property="og:title"]')
            ->andReturn($subCrawler)
            ->once();
        
        $value = $this->worker->scrap('http://example.com/1.html');
        $this->assertSame($value, 'Search for S Korea ferry passengers');
    }
}
