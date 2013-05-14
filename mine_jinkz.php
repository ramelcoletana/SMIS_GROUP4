<!DOCTYPE html>
<html lang="en-US">
<head>

<title>AJAX Tutorial</title>
 
<meta charset="windows-1252">
<meta name="Keywords" content="HTML,CSS,XML,JavaScript,DOM,jQuery,ASP.NET,PHP,SQL,colors,tutorial,programming,development,training,learning,quiz,primer,lessons,reference,examples,source code,demos,tips,color table,w3c,cascading style sheets,active server pages,Web building,Webmaster" />
<meta name="Description" content="Free HTML CSS JavaScript DOM jQuery XML AJAX RSS ASP .NET PHP SQL tutorials, references, examples for web building." />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<script>
<!--
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' %3E%3C/script%3E"));
//-->
</script>
<script>
<!--
function searchfield_focus(obj)
{
obj.style.color=""
obj.style.fontStyle=""
if (obj.value=="Search w3schools.com")
	{obj.value=""}
}
var pageTracker = _gat._getTracker("UA-3855518-1");
pageTracker._initData();
pageTracker._trackPageview();
var addr=document.location.href;
function displayError()
{
document.getElementById("err_url").value=addr;
document.getElementById("err_form").style.display="block";
document.getElementById("err_desc").focus();
hideSent();
}
function hideError()
{
document.getElementById("err_form").style.display="none";
}
function hideSent()
{
document.getElementById("err_sent").style.display="none";
}
function sendErr()
{
var xmlhttp;
var err_url=document.getElementById("err_url").value;
var err_email=document.getElementById("err_email").value;
var err_desc=document.getElementById("err_desc").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("POST","/err_sup.asp",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("err_url=" + err_url + "&err_email=" + err_email + "&err_desc=" + escape(err_desc));
hideError();
document.getElementById("err_sent").style.display="block";
}
function click_expandingMenuHeader(obj,sectionName)
{
var x=document.getElementById("cssprop_" + sectionName).parentNode.className;
if (x.indexOf("expandingMenuNotSelected")>-1)
	{
	x=x.replace("expandingMenuNotSelected","expandingMenuSelected");
	document.getElementById("cssprop_" + sectionName).parentNode.className=x;
	document.getElementById("cssprop_" + sectionName).style.display="block";
	}
else
	{
	x=x.replace("expandingMenuSelected","expandingMenuNotSelected");
	document.getElementById("cssprop_" + sectionName).parentNode.className=x;
	document.getElementById("cssprop_" + sectionName).style.display="none";
	}
}
//-->
</script>
<!--[if lt IE 7]>
<style>
#leftcolumn{margin-left:0}
</style>
<![endif]-->
<!--[if lt IE 10]>
<style>
#div-gpt-ad-1362643908844-0_ad_container{
	display:none;
}
</style>
<![endif]-->
<script>
(function() {
var useSSL = 'https:' == document.location.protocol;
var src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
})();
</script>

<script>
googletag.defineSlot('/16833175/BottomMediumRectangle', [300, 250], 'div-gpt-ad-1362650798669-0').addService(googletag.pubads());
googletag.defineSlot('/16833175/LargePS', [600, 350], 'div-gpt-ad-1343810007679-1').addService(googletag.pubads());
googletag.defineSlot('/16833175/MainLeaderboard', [728, 90], 'div-gpt-ad-1343810007679-2').addService(googletag.pubads());
googletag.defineSlot('/16833175/SmallPS', [600, 100], 'div-gpt-ad-1343810007679-4').addService(googletag.pubads());
googletag.defineSlot('/16833175/WideSkyScraper', [160, 600], 'div-gpt-ad-1357306838470-0').addService(googletag.pubads());
googletag.defineSlot('/16833175/TopLeftRectangle', [170, 90], 'div-gpt-ad-1357907445241-0').addService(googletag.pubads());
googletag.pubads().setTargeting("content","ajax");
googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.enableServices();
</script>
<script>
  (function() {
    var cx = '012971019331610648934:m2tou3_miwy';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>
<link rel="stylesheet" type="text/css" href="/stdtheme.css" />
<script>
function loadXMLDoc()
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_info.txt",true);
xmlhttp.send();
}
</script>
</head>
<body>

<div id="top">
	<div style="height:78px;">
		<div id="topLogo">
			<a id="top"></a>
			<a href="http://www.w3schools.com"><img width="336" height="69" src="/images/w3schoolslogoNEW310113.gif" alt="W3Schools.com" style="border:0;margin-top:5px;" /></a>
		</div>
		<div id="searchTranslate">
			<div id="searchText">Search w3schools.com:</div>
			<div id="googleSearch">
				<gcse:search></gcse:search>
			</div>
			<div id="google_translate_element"></div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div id="topnav">
		<div id="topnavTut">
			<a class="topnav" href="/default.asp" target="_top">HOME </a>
			<a class="topnav" href="/html/default.asp" target="_top">HTML </a>
			<a class="topnav" href="/css/default.asp" target="_top">CSS </a>
			<a class="topnav" href="/js/default.asp" target="_top">JAVASCRIPT </a>
			<a class="topnav" href="/jquery/default.asp" target="_top">JQUERY </a>	
			<a class="topnav" href="/xml/default.asp" target="_top">XML </a>
			<a class="topnav" href="/aspnet/default.asp" target="_top">ASP.NET </a>
			<a class="topnav" href="/php/default.asp" target="_top">PHP </a>
			<a class="topnav" href="/sql/default.asp" target="_top">SQL </a>	
			<a class="topnav" href="/sitemap/default.asp" target="_top">MORE...</a>
		</div>
		<div id="topnavAbout">
			<a class="topnav" href="/sitemap/default.asp#references" target="_top">REFERENCES</a> |
			<a class="topnav" href="/sitemap/default.asp#examples" target="_top">EXAMPLES</a> |
			<a class="topnav" href="/forum/default.asp" target="_blank">FORUM</a> |
			<a class="topnav" href="/about/default.asp" target="_top">ABOUT</a>	
		</div>
	</div>
	<div id="page">
		<!-- TopLeftRectangle -->
		<div class="topLeftRectangle" id='div-gpt-ad-1357907445241-0'>
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1357907445241-0'); });
			</script>
		</div>
		<!-- MainLeaderboard -->
		<div id="mainLeaderboard">
			<div id='div-gpt-ad-1343810007679-2' style='width:728px; height:90px;'>
				<script>
				googletag.display('div-gpt-ad-1343810007679-2');
				</script>
			</div>
		</div>
		<!-- TopRight -->		
		<div id="topRight">
			<div id="rightshare" style="height:78px;margin-bottom:0px;">
				<h2>SHARE THIS PAGE</h2>
				<div style="margin-top:10px;">
					<script>
					<!--
					txt='<a href="http://www.facebook.com/sharer.php?u=http://www.w3schools.com'+location.pathname+'" target="_blank" title="Facebook">'
					txt=txt+'<img src="/images/share_facebook.gif" width="16px" height="16px" style="margin-right:4px" /></a>';
					txt=txt+'<a href="http://twitter.com/home?status=Currently reading http://www.w3schools.com'+location.pathname+'" target="_blank" title="Twitter">';
					txt=txt+'<img src="/images/share_twitter.gif" width="16px" height="16px" style="margin-right:4px" /></a>';
					txt=txt+'<a href="mailto:?&amp;subject='+document.title+'&amp;body=Take%20a%20look%20at%20this%20page%20at%20W3Schools.com:%20http://www.w3schools.com'+location.pathname+'" target="_blank" title="E-mail">';
					txt=txt+'<img src="/images/share_email.gif" width="16px" height="16px" style="margin-right:4px" /></a>';
					txt=txt+'<a href="http://delicious.com/save?v=5&noui&jump=close&url=http://www.w3schools.com'+location.pathname+'&title='+document.title+'" target="_blank" title="Delicious">';
					txt=txt+'<img src="/images/share_delicious.gif" width="16px" height="16px" style="margin-right:4px" /></a>';
					txt=txt+'<a href="http://www.reddit.com/submit?url=http://www.w3schools.com'+location.pathname+'" target="_blank" title="Reddit">';
					txt=txt+'<img src="/images/share_reddit.gif" width="16px" height="16px" style="margin-right:4px" /></a>';
					txt=txt+'<a href="http://digg.com/submit?url=http://www.w3schools.com'+location.pathname+'&amp;title='+document.title+'" target="_blank" title="Digg">';
					txt=txt+'<img src="/images/share_digg.gif" width="16px" height="16px" style="margin-right:4px" /></a>';
					txt=txt+'<a href="http://www.stumbleupon.com/submit?url=http://www.w3schools.com'+location.pathname+'%26title%3D'+document.title+'" target="_blank" title="Stumbleupon">';
					txt=txt+'<img src="/images/share_stumbleupon.gif" width="16px" height="16px" /></a>';
					document.write(txt);
					//--></script>
				</div>
				<div style="padding-left:18px;padding-top:10px;">
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fw3schoolscom&amp;send=false&amp;layout=button_count&amp;width=125&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:125px; height:21px; " allowTransparency="true"></iframe>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div id="leftcolumn">
<h2 class="left"><span class="left_h2">AJAX</span> Basic</h2>
<a target="_top" href="default.asp" style='font-weight:bold;'>AJAX HOME</a>
<a target="_top" href="ajax_intro.asp" >AJAX Intro</a>
<a target="_top" href="ajax_example.asp" >AJAX Example</a>
<br>
<h2 class="left"><span class="left_h2">AJAX</span> XMLHttpRequest</h2>
<a target="_top" href="ajax_xmlhttprequest_create.asp" >XHR Create Object</a>
<a target="_top" href="ajax_xmlhttprequest_send.asp" >XHR Request</a>
<a target="_top" href="ajax_xmlhttprequest_response.asp" >XHR Response</a>
<a target="_top" href="ajax_xmlhttprequest_onreadystatechange.asp" >XHR readyState</a>
<br>
<h2 class="left"><span class="left_h2">AJAX</span> Advanced</h2>
<a target="_top" href="ajax_aspphp.asp" >AJAX ASP/PHP</a>
<a target="_top" href="ajax_database.asp" >AJAX Database</a>
<a target="_top" href="ajax_xmlfile.asp" >AJAX XML File</a>
<br>
<h2 class="left"><span class="left_h2">AJAX</span> Examples</h2>
<a target="_top" href="ajax_examples.asp" >AJAX Examples</a>		</div>
		<div id="main">
			
<h1>AJAX <span class="color_h1">Tutorial</span></h1>
<div class="chapter">
<div class="prev"><a class="chapter" href="/default.asp">&laquo; W3Schools Home</a></div>
<div class="next"><a class="chapter" href="ajax_intro.asp">Next Chapter &raquo;</a></div>
</div>
<br>
<div class="tutintro">
<img src="/images/w3ajax.gif" alt="AJAX" />
<p>AJAX = Asynchronous JavaScript and XML.</p>
<p>AJAX is not a new programming language, but a new way to use existing standards.</p>
<p>AJAX is the art of exchanging data with a server, and updating 
parts of a web page - without reloading the whole page.</p>
</div>
<br>

<div class="example">
<h2 class="example">AJAX Example</h2>
<div class="example_result notranslate">
<div id="myDiv"><h2>Let AJAX change this text</h2></div>
<button type="button" onclick="loadXMLDoc()">Change Content</button>
</div>
<br>
<a target="_blank" href="tryit.asp?filename=tryajax_first" class="tryitbtn">Try it yourself &raquo;</a>
</div>
<br><br>
<p class="tutintro"><a href="ajax_intro.asp"><b>Start learning AJAX now!</b></a></p>
<div class="chapter">
<div class="prev"><a class="chapter" href="/default.asp">&laquo; W3Schools Home</a></div>
<div class="next"><a class="chapter" href="ajax_intro.asp">Next Chapter &raquo;</a></div>
</div>

			<hr />
			
			<!-- SmallPS -->
			<div id='div-gpt-ad-1343810007679-4' style='width:720px;margin-left:auto;margin-right:auto;'>
				<script>
				googletag.display('div-gpt-ad-1343810007679-4');
				</script>
			</div>
			<!-- LargePS -->
			<div id='div-gpt-ad-1343810007679-1' style='width:720px;margin-left:auto;margin-right:auto;'>
				<script>
				googletag.display('div-gpt-ad-1343810007679-1');
				</script>
			</div>
			<!-- BottomMediumRectangle -->
			<div id='div-gpt-ad-1362650798669-0' style='width:300px; height:250px;margin-left:auto;margin-right:auto;'>
				<script type='text/javascript'>
				googletag.display('div-gpt-ad-1362650798669-0');
				</script>
			</div>
			
			<div id="err_form">
				<h2>Your suggestion:</h2>
				<p><label for="err_email">Your E-mail (optional):</label> <input type="text" id="err_email" name="err_email" /></p>
				<p><label for="err_url">Page address:</label> <input type="text" disabled="disabled" id="err_url" name="err_url" /></p>
				<p><label for="err_desc">Description:</label> <textarea name="err_desc" id="err_desc" cols="92" rows="20"></textarea></p>
				<p class="submit"><input type="button" value="Submit" onclick="sendErr()" /></p>
				<div class="err_close" onclick="hideError()">Close [X]</div>
			</div>
			<div id="err_sent">
				<h2>Thank You For Helping Us!</h2>
				<p>Your message has been sent to W3Schools.</p>
				<div class="err_close" onclick="hideSent()">Close [X]</div>
			</div>
		</div>
		
		<div id="rightcolumn">
			<div class="rightad">
				<h2>WEB HOSTING</h2>
				<a target="_blank" rel="nofollow" href="http://www.lunarpages.com/id/w3schools/goto/w3schools">Best Web Hosting</a>
				<a target="_blank" rel="nofollow" href="http://www.eukhost.com">eUK Web Hosting</a>
				<a target="_blank" rel="nofollow" href="http://www.heartinternet.co.uk">UK Reseller Hosting</a>
				<a target="_blank" rel="nofollow" href="http://www.webhosting.uk.com/cloud-hosting.php">Cloud Hosting</a>
			</div>
			<div class="rightad">
				<h2>WEB BUILDING</h2>
				
				<a target="_blank" rel="nofollow" href="http://www.altova.com/ref/?s=w3s_text2&amp;q=xmlspy">XML Editor - Free Trial!</a>
				
				<a target="_blank" rel="nofollow" href="http://www.wix.com/eteamhtml/400?utm_campaign=ma_w3schools.com&amp;experiment_id=ma_w3schools.comlink1_400Html&amp;embed_tags=camp&amp;utm_camp=hOUdCO-AmAMQm__j8AM">FREE Website BUILDER</a>
				<a target="_blank" rel="nofollow" href="http://www.wix.com/eteamhtml/complete-solution?utm_campaign=ma_w3schools.com&experiment_id=ma_w3schools.comlink2_CS">FREE Website Creator</a>
				<a target="_blank" rel="nofollow" href="http://www.dreamtemplate.com/?ref=w3txtfree">Free Website Templates</a>				
			</div>
			<div class="rightad">
				<h2>STATISTICS</h2>
				<a target="_top" href="/browsers/browsers_stats.asp">Browser Statistics</a>
				<a target="_top" href="/browsers/browsers_os.asp">OS Statistics</a>
				<a target="_top" href="/browsers/browsers_display.asp">Display Statistics</a>
			</div>
			<div style="padding-left:1px;">
				<!-- WideSkyScraper -->
				<div id='div-gpt-ad-1357306838470-0' class="wideSkyscraper">
					<script type='text/javascript'>
					googletag.display('div-gpt-ad-1357306838470-0');
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div id="footer">
			<br>
			<hr style="height:2px;">
			<table id="bottomlinks"><tr>
			<td valign="top">
			<h3>Top 10 Tutorials</h3>
			<a href="/html/default.asp"><span class="bottomlinksraquo">&raquo;</span> HTML Tutorial</a><br>
			<a href="/html/html5_intro.asp"><span class="bottomlinksraquo">&raquo;</span> HTML5 Tutorial</a><br>
			<a href="/css/default.asp"><span class="bottomlinksraquo">&raquo;</span> CSS Tutorial</a><br>
			<a href="/css3/default.asp"><span class="bottomlinksraquo">&raquo;</span> CSS3 Tutorial</a><br>
			<a href="/js/default.asp"><span class="bottomlinksraquo">&raquo;</span> JavaScript Tutorial</a><br>
			<a href="/jquery/default.asp"><span class="bottomlinksraquo">&raquo;</span> jQuery Tutorial</a><br>
			<a href="/sql/default.asp"><span class="bottomlinksraquo">&raquo;</span> SQL Tutorial</a><br>
			<a href="/php/default.asp"><span class="bottomlinksraquo">&raquo;</span> PHP Tutorial</a><br>
			<a href="/aspnet/default.asp"><span class="bottomlinksraquo">&raquo;</span> ASP.NET Tutorial</a><br>
			<a href="/xml/default.asp"><span class="bottomlinksraquo">&raquo;</span> XML Tutorial</a><br>
			</td>
			<td valign="top">
			<h3>Top 10 References</h3>
			<a href="/tags/default.asp"><span class="bottomlinksraquo">&raquo;</span> HTML/HTML5 Reference</a><br>
			<a href="/cssref/default.asp"><span class="bottomlinksraquo">&raquo;</span> CSS 1,2,3 Reference</a><br>
			<a href="/cssref/css3_browsersupport.asp"><span class="bottomlinksraquo">&raquo;</span> CSS 3 Browser Support</a><br>
			<a href="/jsref/default.asp"><span class="bottomlinksraquo">&raquo;</span> JavaScript</a><br>
			<a href="/jsref/default.asp"><span class="bottomlinksraquo">&raquo;</span> HTML DOM</a><br>
			<a href="/dom/dom_nodetype.asp"><span class="bottomlinksraquo">&raquo;</span> XML DOM</a><br>
			<a href="/php/php_ref_array.asp"><span class="bottomlinksraquo">&raquo;</span> PHP Reference</a><br>
			<a href="/jquery/jquery_ref_selectors.asp"><span class="bottomlinksraquo">&raquo;</span> jQuery Reference</a><br>
			<a href="/aspnet/webpages_ref_classes.asp"><span class="bottomlinksraquo">&raquo;</span> ASP.NET Reference</a><br>
			<a href="/tags/ref_colornames.asp"><span class="bottomlinksraquo">&raquo;</span> HTML Colors</a><br>
			</td>
			<td valign="top">
			<h3>Examples</h3>
			<a href="/html/html_examples.asp"><span class="bottomlinksraquo">&raquo;</span> HTML Examples</a><br>
			<a href="/css/css_examples.asp"><span class="bottomlinksraquo">&raquo;</span> CSS Examples</a><br>
			<a href="/xml/xml_examples.asp"><span class="bottomlinksraquo">&raquo;</span> XML Examples</a><br>
			<a href="/js/js_examples.asp"><span class="bottomlinksraquo">&raquo;</span> JavaScript Examples</a><br>
			<a href="/htmldom/dom_examples.asp"><span class="bottomlinksraquo">&raquo;</span> HTML DOM Examples</a><br>
			<a href="/dom/dom_examples.asp"><span class="bottomlinksraquo">&raquo;</span> XML DOM Examples</a><br>
			<a href="/ajax/ajax_examples.asp"><span class="bottomlinksraquo">&raquo;</span> AJAX Examples</a><br>
			<a href="/aspnet/aspnet_examples.asp"><span class="bottomlinksraquo">&raquo;</span> ASP.NET Examples</a><br>
			<a href="/aspnet/webpages_examples.asp"><span class="bottomlinksraquo">&raquo;</span> Razor Examples</a><br>
			<a href="/asp/asp_examples.asp"><span class="bottomlinksraquo">&raquo;</span> ASP Examples</a><br>
			<a href="/svg/svg_examples.asp"><span class="bottomlinksraquo">&raquo;</span> SVG Examples</a>
			</td>
			<td valign="top">
			<h3>Quizzes</h3>
			<a href="/quiztest/quiztest.asp?qtest=HTML"><span class="bottomlinksraquo">&raquo;</span> HTML Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=HTML5"><span class="bottomlinksraquo">&raquo;</span> HTML5 Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=XHTML"><span class="bottomlinksraquo">&raquo;</span> XHTML Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=CSS"><span class="bottomlinksraquo">&raquo;</span> CSS Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=JavaScript"><span class="bottomlinksraquo">&raquo;</span> JavaScript Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=jQuery"><span class="bottomlinksraquo">&raquo;</span> jQuery Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=XML"><span class="bottomlinksraquo">&raquo;</span> XML Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=ASP"><span class="bottomlinksraquo">&raquo;</span> ASP Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=PHP"><span class="bottomlinksraquo">&raquo;</span> PHP Quiz</a><br>
			<a href="/quiztest/quiztest.asp?qtest=SQL"><span class="bottomlinksraquo">&raquo;</span> SQL Quiz</a><br>
			</td>
			<td valign="top">
			<h3>Color Picker</h3>
			<a href="/tags/ref_colorpicker.asp">
			<img src="/images/colormap_80.gif" alt="colorpicker" /></a>
			<h3 style="margin-top:20px">Statistics</h3>
			<a href="/browsers/browsers_stats.asp"><span class="bottomlinksraquo">&raquo;</span> Browser Statistics</a><br>	
			<a href="/browsers/browsers_os.asp"><span class="bottomlinksraquo">&raquo;</span> Browser OS</a><br>			
			<a href="/browsers/browsers_display.asp"><span class="bottomlinksraquo">&raquo;</span> Browser Display</a>			
			</td>
			</tr></table>
			<br>
			<hr style="height:2px;">
			<div id="footerImg"><a href="http://www.w3schools.com">
				<img style="border:0" src="/images/w3schoolscom_gray.gif" alt="W3Schools.com" /></a>
			</div>
			<div id="footerAbout">
				<a href="" onclick="displayError();return false" style="word-spacing:normal;">REPORT ERROR</a> |
				<a href="/default.asp" target="_top">HOME</a> |
				<a href="#top" target="_top">TOP</a> |
				<a href='/ajax/default.asp?output=print' target="_blank">PRINT</a> |
				<a href="/forum/default.asp" target="_blank">FORUM</a> |
				<a href="/about/default.asp" target="_top">ABOUT</a> |
				<a href="/about/about_advert.asp" target="_top" style="word-spacing:normal;">ADVERTISE WITH US</a>
			</div>
			<div id="footerText">
				W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding.<br>
				Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content.<br>
				While using this site, you agree to have read and accepted our
				<a href="/about/about_copyright.asp">terms of use</a> and
				<a href="/about/about_privacy.asp">privacy policy</a>.<br>
				<a href="/about/about_copyright.asp">Copyright 1999-2013</a> by Refsnes Data. All Rights Reserved.<br><br>
			</div>
		</div>
	</div>
</div>
<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    autoDisplay: false,    
    gaTrack: true,
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
