<?php session_start();
$_SESSION["re_post"]=1;
include('lib/application_top.php');

$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
$userid= $_GET['userid'];
$ip= $_SERVER['REMOTE_ADDR'];
$pais = $CFG['user']['country']['name'];
$email= $_GET['name'];
$date= date("Y-m-d H:i:s");
$navegador= 'Desconocido'; 
 

if(isset($userid) && $userid!='' && isset($_REQUEST['ib']))
{   
    //generamos un número aleatorio
    $track = time(); 
	//limpiamos cookies existentes
    unset($_COOKIE['cookie']);
    // crear las cookies
	setcookie("cookie[ib]",$_REQUEST['ib']);
	setcookie("cookie[id]", $userid);
	setcookie("cookie[email]",$email);
	setcookie("cookie[track]",$track);
	
    $ib_num=$_REQUEST['ib'];
	$descripcion='Open live account click';
    $sql2 ="INSERT INTO `email_tracking1`(`userid`,`ib_num`,`ip`,`date`,`browser`, `country`, `name_email`,`descripcion`,`url`,`track_code`) VALUES ('$userid', '$ib_num','$ip','$date','$navegador','$pais','$email','$descripcion','$url','$track')";
	
	
	$execute = mysql_query($sql2);
     
	if(!mysql_affected_rows())
	{
		echo "Error in the register in Database";
	}
	
}
 
if(isset($_COOKIE['cookie']) ){
	
		// cargarlas  luego que la página es recargada
	     foreach ($_COOKIE['cookie'] as $name => $value) {
			$name = htmlspecialchars($name);
			$value = htmlspecialchars($value);
		}
	    $ib_num = $_COOKIE['cookie']['ib'];
		$email  = $_COOKIE['cookie']['email'];
		$userid = $_COOKIE['cookie']['id'];
		$track  = $_COOKIE['cookie']['track'];
		
		
		$descripcion='Open Demo Account Click Cookie';
 
       $sql2 ="INSERT INTO `email_tracking1`(`userid`,`ib_num`,`ip`,`date`,`browser`, `country`, `name_email`,`descripcion`,`url`,`track_code`) VALUES ('$userid', '$ib_num','$ip','$date','$navegador','$pais','$email','$descripcion','$url','$track')";
		$execute = mysql_query($sql2);
     
	    if(!mysql_affected_rows())
	    {
		echo "Error in the register in Database";
	    }

}
else{ 
	//echo 'validacion con ib normal si no hay cookie';
	//IB validation
	 if(isset($_REQUEST['ib']) && $_REQUEST['ib'] != '' && is_numeric($_REQUEST['ib'])) 
	 	$ib_num = $_REQUEST['ib'];
	 else
	 	$ib_num =0;
} 

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Open a Foreign Currency Trading Account at tradeviewforex.com</title>
<meta http-equiv="content-language" content="en-US">
<meta name="description" content="Open a forex trading account with Tradeview Forex and start forex trading today. We offer easy-to-use online trading account forms to guide you every step of the way."/>
<meta name="keywords" content=""/>
<link rel="shortlink" href="http://www.tradeviewforex.com/favicon.ico">


<script type="text/javascript">

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name)
{
var c_value = document.cookie;
var c_start = c_value.indexOf(" " + c_name + "=");
if (c_start == -1)
  {
  c_start = c_value.indexOf(c_name + "=");
  }
if (c_start == -1)
  {
  c_value = null;
  }
else
  {
  c_start = c_value.indexOf("=", c_start) + 1;
  var c_end = c_value.indexOf(";", c_start);
  if (c_end == -1)
  {
c_end = c_value.length;
}
c_value = unescape(c_value.substring(c_start,c_end));
}
return c_value;
}

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25578344-1']);
  _gaq.push(['_trackPageview']);
setTimeout('_gaq.push([\'_trackEvent\', \'NoBounce\', \'Over 30 seconds\'])',30000);


  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--browser detector-->
<script src="js/browser.js"></script>



<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/slideMenu.css" rel="stylesheet" type="text/css"/>

<!-- Menu requires jQuery and easing plugin if you want some fanciness -->
<script src="js/jquery.min.js"></script>
<script src="js/menuSlide/jquery.animation.easing.js"></script>
<script src="js/menuSlide/slideMenu.js"></script>

<!-- Llamado scripts Formulario Open Account -->
<link href="css/styleOpenAccountBlock.css" rel="stylesheet" type="text/css"/>


<!--fechador jquery-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css " />
<style>
img.ui-datepicker-trigger{
	vertical-align: bottom;
	cursor: pointer;
}
</style>


<!--google api translate-->
<meta name="google-translate-customization" content="17c58b52c700fce2-339b9aad4e82f4c4-g790fcec30bd8175e-16"></meta>


</head>

<body style="background-color:#F2F2F2;"><strong></strong>


<noscript><!-- Estilo adicional slider -->
	<link rel="stylesheet" type="text/css" href="css/noscript.css"/>
</noscript>



<script type="text/javascript">

$(document).ready(function(){
        
        /**
         * MENU OPTIONS (default values in parenthesis)
         * ------------
         * div:        Where the slide-menu will go. ("#menu-container")
         * controls:   Where are the controls for the menu. ("#menu-controls")
         * loader:     If you are using a loading graphic, the menu will hide it for you once loaded. If not,
         *               set it to 'false' or ''. (false)
         * x:          Total width of list item including margins and padding in px. (150)
         * y:          Total height of list item including margins and padding in px. (150)
         * start:      Index of <ul> to open first. (0)
         * speed:      Speed of all animations in ms . (300)
         * delay:      Delay between list item animations when transitioning in ms. (60)
         * easing:     Type of easing to use for list item animations, use '' for no easing effect. ('')
         *               FYI - "easeOutBackSmall" is a custom addition I made for this demo, it is not included in the
         *               standard set of easing animations.
         * easeIn:     Type of easing to use for initial drop-in animation, use '' for none. ('')
         *               This demo includes the jQuery easing plugin: http://gsgd.co.uk/sandbox/jquery/easing/
         *               Supported easing methods in the plugin are listed and demoed at the above url.
         * preloadAll: Wait for all menu images to load before animating in, or just the first set? (false)
         *               By default, with this set to false, the menu will wait until all images in the first menu set are
         *               loaded before the beginning animation is fired. If set to true, it will wait for all menu images to load.
         */

        var options = {
                div: "#menu-container",
                controls: "#menu-controls",
                loader: "#loading",
				start: 0,
                x: 140,
                y: 200,
                easing: "easeOutBackSmall",
                easeIn: "easeOutBack",
                preloadAll: true
        };
        
        
        var menu = new slideMenu(options);
        
        /*
                The menu will wait until images are loaded before initializing, see "preloadAll" above.
                If you want to wait until EVERYTHING on the page is loaded, simply do this:
                
                $(window).load(function(){
                        var menu = new slideMenu(options);
                });
        */

        
        /*----------------------------------------------------------------------------------
         * Demo stuff, not required for menu to work
         *---------------------------------------------------------------------------------*/
        var auto = false, x, inc;
        
        // Toggle x-ray
        $("#xray a").click(function(){
                toggle_xray();
                return false;
        });
        
        // Toggle auto
        $("#auto a").click(function(){
                toggle_auto();
                return false;
        });

        // If xray enabled on load, make it so!
        if (window.location.hash.substring(1) == 'xray') toggle_xray();

        function toggle_xray(){
                $(options.div).toggleClass("xray");
                $("#xray span").text($(options.div).hasClass("xray") ? 'ON' : 'OFF');
                window.location.hash = $(options.div).hasClass("xray") ? 'xray' : '';
        }
        
        function toggle_auto(){
                if (auto === false){
                        x = $("#menu-controls a.active").data("target");
                        auto_advance();
                        inc = setInterval(auto_advance, 3000);
                        auto = true;
                }
                else{
                        clearInterval(inc);
                        auto = false;
                }
                $("#auto span").text(auto === true ? 'ON' : 'OFF');
        }
        
        function auto_advance(){
                // Max index is 3, so don't go over
                x = x < 3 ? x + 1 : 0;
                // Using the switchTo method, we can advance the menu to a desired index
                menu.switchTo(x);
        }
		
		$('#country').change(function(){
			if($(this).val() != 'Nothing')			
			{
				$('#country2').val($(this).val());
				$('#nationalityselect').val($(this).val());
			}else
			{
				$('#country2').val('');
				$('#nationalityselect').val('');
			}
		})
		
		
		
		//fix translate google in the browser firefox
		var bw = new Browser();		
		if(bw.name == 'firefox')
		{			
			$('select').addClass('notranslate');
		}
		
});
</script>



<script type="text/javascript">

var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i

function age() {
	var dob =  document.getElementById('dob').value;
	var dob_date = dob.split("/");
	var now = new Date();
	var age =  now.getFullYear() - dob_date[2];
	if ((now.getMonth()+1) <dob_date[0]) {
		age=age-1;
	} else {
		if ((now.getMonth()+1) == dob_date[0]) {
			if (now.getDate() <dob_date[1]) { age=age-1; }
		}
	}
	if (document.getElementById('dob').value=="") {
		return -1;
	} else {
		return age;
	}
}

function filled_out() {
	var message="";
	
	
	
	//obligatorios
	if(document.getElementById('country').value=="Nothing")	{
		document.getElementById('country').style.backgroundColor="#f1d7d7";
		message+=" -> Select your country\n";
	}else{
		document.getElementById('country').style.backgroundColor="#FFFFFF";
	}

	if (document.getElementById('platformselect').value == '') {
		document.getElementById('platformselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your platform\n";
	} else {
		document.getElementById('platformselect').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('fname').value == "") {
		document.getElementById('fname').style.backgroundColor="#f1d7d7";
		message+=" -> Type your first name\n";
	} else {		
		if(document.getElementById('fname').value.length < 2)
		{
			document.getElementById('fname').style.backgroundColor="#f1d7d7";
			message+=" -> Minimum 2 characters in your first name\n";
		}else		
			document.getElementById('fname').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('lname').value == "") {
		document.getElementById('lname').style.backgroundColor="#f1d7d7";
		message+=" -> Type your last name\n";
	} else {
		if(document.getElementById('lname').value.length < 2)
		{
			document.getElementById('lname').style.backgroundColor="#f1d7d7";
			message+=" -> Minimum 2 characters in your last name\n";
		}else		
			document.getElementById('lname').style.backgroundColor="#FFFFFF";
		
	}
	if (document.getElementById('genderselect').value == 0) {
		document.getElementById('genderselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your gender\n";
	} else {
		document.getElementById('genderselect').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('dob').value == "") {
		document.getElementById('dob').style.backgroundColor="#f1d7d7";
		message+=" -> Select your date of birth\n";
	} else {
		if (age()<18) {
			document.getElementById('dob').style.backgroundColor="#f1d7d7";
			message+=" -> You can't apply for a trading account unless you're at least 18 years old\n";
		}else{
			document.getElementById('dob').style.backgroundColor="#FFFFFF";
		}
	}
	if (document.getElementById('nationalityselect').value == '') {
		document.getElementById('nationalityselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your nationality\n";
	} else {
		document.getElementById('nationalityselect').style.backgroundColor="#FFFFFF";
	}	
	
	if (document.getElementById('maritalselect').value == 0) {
		document.getElementById('maritalselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your marital status\n";
	} else {
		document.getElementById('maritalselect').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('email').value == "") {
		document.getElementById('email').style.backgroundColor="#f1d7d7";
		message+=" -> Type your email address\n";
	} else {
		document.getElementById('email').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('emailconf').value == "") {
		document.getElementById('emailconf').style.backgroundColor="#f1d7d7";
		message+=" -> Type your email confirmation\n";
	} else {
		document.getElementById('emailconf').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('homephone').value == "") {
		document.getElementById('homephone').style.backgroundColor="#f1d7d7";
		message+=" -> Type your home phone number\n";
	} else {
		if (isNaN(document.getElementById('homephone').value)) {
			document.getElementById('homephone').style.backgroundColor="#f1d7d7";
			message+=" -> Home phone number should only contain digits\n";
		} else {
			if(document.getElementById('homephone').value.length < 4)
			{
				document.getElementById('homephone').style.backgroundColor="#f1d7d7";
				message+=" -> Minimum 4 characters in your home phone\n";
			}else		
				document.getElementById('homephone').style.backgroundColor="#FFFFFF";
			
		}
	}
	
	//este campo no es obligatorio pero si tiene que ser numerico
	if(document.getElementById('mobile').value != "")
	{
		if (isNaN(document.getElementById('mobile').value)){
			document.getElementById('mobile').style.backgroundColor="#f1d7d7";
			message+=" -> Type your mobile number\n";
		}else{
			document.getElementById('mobile').style.backgroundColor="#FFFFFF";
		}
	}else{
		document.getElementById('mobile').style.backgroundColor="#FFFFFF";
	}
	
	
	if (document.getElementById('address').value == "") {
		document.getElementById('address').style.backgroundColor="#f1d7d7";
		message+=" -> Type your address\n";
	} else {
		if(document.getElementById('address').value.length < 3)
		{
			document.getElementById('address').style.backgroundColor="#f1d7d7";
			message+=" -> Minimum 3 characters in your Address\n";
		}else		
			document.getElementById('address').style.backgroundColor="#FFFFFF";
		
	}
	if (document.getElementById('city').value == "") {
		document.getElementById('city').style.backgroundColor="#f1d7d7";
		message+=" -> Type your city\n";
	} else {
		if(document.getElementById('city').value.length < 3)
		{
			document.getElementById('city').style.backgroundColor="#f1d7d7";
			message+=" -> Minimum 3 characters in your City\n";
		}else		
			document.getElementById('city').style.backgroundColor="#FFFFFF";		
	}
	if (document.getElementById('zip').value == "") {
		document.getElementById('zip').style.backgroundColor="#f1d7d7";
		message+=" -> Type your postal code\n";
	} else {
/*		if (isNaN(document.getElementById('zip').value)) {
			document.getElementById('zip').style.backgroundColor="#f1d7d7";
			message+=" -> Postal code should only contain digits\n";
		} else {*/
			document.getElementById('zip').style.backgroundColor="#FFFFFF";
	//	}
	}
	if (document.getElementById('employmentstatusselect').value == '') {
		document.getElementById('employmentstatusselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your employment status\n";
	} else {
		document.getElementById('employmentstatusselect').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('employer').value == "") {
		document.getElementById('employer').style.backgroundColor="#f1d7d7";
		message+=" -> Type your employer name\n";
	} else {
		if(document.getElementById('employer').value.length < 2)
		{
			document.getElementById('employer').style.backgroundColor="#f1d7d7";
			message+=" -> Minimum 2 characters in Employer\n";
		}else		
			document.getElementById('employer').style.backgroundColor="#FFFFFF";		
		
	}
	if (document.getElementById('occupation').value == "") {
		document.getElementById('occupation').style.backgroundColor="#f1d7d7";
		message+=" -> Type your occupation\n";
	} else {
		if(document.getElementById('occupation').value.length < 2)
		{
			document.getElementById('occupation').style.backgroundColor="#f1d7d7";
			message+=" -> Minimum 2 characters in your Occupation\n";
		}else		
			document.getElementById('occupation').style.backgroundColor="#FFFFFF";		
	}
	if (document.getElementById('annualsalaryselect').value == 0) {
		document.getElementById('annualsalaryselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your annual salary range\n";
	} else {
		document.getElementById('annualsalaryselect').style.backgroundColor="#FFFFFF";
	}
	if (document.getElementById('networthselect').value == 0) {
		document.getElementById('networthselect').style.backgroundColor="#f1d7d7";
		message+=" -> Select your approximate net worth range\n";
	} else {
		document.getElementById('networthselect').style.backgroundColor="#FFFFFF";
	}

	if ((!document.getElementById('securitiescb').checked)&&
		(!document.getElementById('commoditiescb').checked)&&
		(!document.getElementById('optionscb').checked)&&
		(!document.getElementById('cfdcb').checked)&&
		(!document.getElementById('futurescb').checked)&&
		(!document.getElementById('mutualcb').checked)&&
		(!document.getElementById('forexcb').checked)&&
		(!document.getElementById('noxp').checked)) {
		message+=" -> Select at least one in section 4\n";
	}

	if (document.getElementById('email').value!="") {
		if ( emailfilter.test(document.getElementById('email').value) ) {
			document.getElementById('email').style.backgroundColor="#FFFFFF";
			if (document.getElementById('email').value!=
				document.getElementById('emailconf').value) {
				document.getElementById('email').style.backgroundColor="#f1d7d7";
				document.getElementById('emailconf').style.backgroundColor="#f1d7d7";
				message+=" -> Email and email confirmation are not the same\n";
			} else {
				document.getElementById('email').style.backgroundColor="#FFFFFF";
				document.getElementById('emailconf').style.backgroundColor="#FFFFFF";
			}
		} else {
			document.getElementById('email').style.backgroundColor="#f1d7d7";
			message+=" -> Provided email is invalid\n";
		}
	}

	if (risk_check() && !document.getElementById('supp_risk_disc').checked) {
		message+=" -> Agree with the risk disclosure in the section 6\n";
	}
	
	if (!document.getElementById('riskagree').checked) {
		message+=" -> You have to acknowledge that you have read the legal information by checking off the checkbox below\n";
	}

	if (message!="") {		
		message="Please fix the following before submitting the form:\n"+message;
		alert(message);
		return false;
	} else {
		return true;
	}
}

function exp_click() {
	document.getElementById('noxp').checked=false;
}

function noexp_click() {
	document.getElementById('securitiescb').checked=false;
	document.getElementById('commoditiescb').checked=false;
	document.getElementById('optionscb').checked=false;
	document.getElementById('cfdcb').checked=false;
	document.getElementById('futurescb').checked=false;
	document.getElementById('mutualcb').checked=false;
	document.getElementById('forexcb').checked=false;
	
}

function risk_check() {
	if ((age()>=65)||
		(document.getElementById('employmentstatusselect').value=='Retired')||
		(document.getElementById('employmentstatusselect').value=='Unemployed')||
		(document.getElementById('annualsalaryselect').value=='Employed')||
		(document.getElementById('networthselect').value=='Employed')||
		(document.getElementById('noxp').checked===true)) {
		document.getElementById('riskdisc').style.display="block";
		return true;
	} else {
		document.getElementById('riskdisc').style.display="none";
		return false;
	}
}



function submit_click() {
	if($('#statusPromo').val() == 0 && ! $('#promocode').val() == ''){
		alert("Error promo code!");
		document.location.href = '#promocode';
		
		return false;
	}
	if (filled_out()) {
		document.forms["frm2"].submit();
	}
	return false;
}



function employment_check() {
	if ((document.getElementById('employmentstatusselect').value=='Employed')||
	 	(document.getElementById('employmentstatusselect').value=='')) {
	  document.getElementById('employer').value="";
	  document.getElementById('employer').readOnly = false;
	  document.getElementById('occupation').value="";
	  document.getElementById('occupation').readOnly=false;
	  document.getElementById('annualsalaryselect').selectedIndex = 0;
	  document.getElementById('annualsalaryselect').value = 0;
	  document.getElementById('networthselect').selectedIndex = 0;
	  document.getElementById('networthselect').value = 0;
	}
	if (document.getElementById('employmentstatusselect').value=='Self-Employed') {
	  document.getElementById('employer').value="N/A";
	  document.getElementById('employer').readOnly=true;
	  document.getElementById('occupation').value="";
	  document.getElementById('occupation').readOnly=false;
	  document.getElementById('annualsalaryselect').selectedIndex = 0;
	  document.getElementById('annualsalaryselect').value = 0;
	  document.getElementById('networthselect').selectedIndex = 0;
	  document.getElementById('networthselect').value = 0;
	}
	if ((document.getElementById('employmentstatusselect').value=='Retired')||

		(document.getElementById('employmentstatusselect').value=='Unemployed')) {
	  document.getElementById('employer').value="N/A";
	  document.getElementById('employer').readOnly=true;
	  document.getElementById('occupation').value="N/A";
	  document.getElementById('occupation').readOnly=true;
	  document.getElementById('annualsalaryselect').selectedIndex = 1;
	  document.getElementById('annualsalaryselect').value = 'Less than $25,000';
	  document.getElementById('networthselect').selectedIndex = 1;
	  document.getElementById('networthselect').value = 'Less than $25,000';
	}
}

</script>

<script type="text/javascript">

/***********************************************
* Show Hint script- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

var horizontal_offset="10px" //horizontal offset of hint box from anchor link

/////No further editting needed

var vertical_offset="-20" //horizontal offset of hint box from anchor link. No need to change.
var ie=document.all
var ns6=document.getElementById&&!document.all

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=(whichedge=="rightedge")? parseInt(horizontal_offset)*-1 : parseInt(vertical_offset)*-1
if (whichedge=="rightedge"){
var windowedge=ie && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-30 : window.pageXOffset+window.innerWidth-40
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x <dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure+obj.offsetWidth+parseInt(horizontal_offset)
}
else{
var windowedge=ie && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y <dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure-obj.offsetHeight
}
return edgeoffset
}

function showhint(menucontents, obj, e, tipwidth){
if ((ie||ns6) && document.getElementById("hintbox")){
dropmenuobj=document.getElementById("hintbox")
dropmenuobj.innerHTML=menucontents
dropmenuobj.style.left=dropmenuobj.style.top=-500
if (tipwidth!=""){
dropmenuobj.widthobj=dropmenuobj.style
dropmenuobj.widthobj.width=tipwidth
}
dropmenuobj.x=getposOffset(obj, "left")
dropmenuobj.y=getposOffset(obj, "top")
dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+obj.offsetWidth+"px"
dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+"px"
dropmenuobj.style.visibility="visible"
obj.onmouseout=hidetip
}
}

function hidetip(e){
dropmenuobj.style.visibility="hidden"
dropmenuobj.style.left="-500px"
}

function createhintbox(){
var divblock=document.createElement("div")
divblock.setAttribute("id", "hintbox")
document.body.appendChild(divblock)
}

if (window.addEventListener)
window.addEventListener("load", createhintbox, false)
else if (window.attachEvent)
window.attachEvent("onload", createhintbox)
else if (document.getElementById)
window.onload=createhintbox

</script>

<script type="text/javascript">
/*
 function ask() {
     document.getElementById("wholething").style.display="block";
	 document.getElementById("qst").style.display="block";
 }

 function transl_agr() {
	 if (document.getElementById("ch_agr").checked) {
		 document.getElementById("btn_agr").disabled=false;
	 } else {
		 document.getElementById("btn_agr").disabled=true;
	 }
 }

 function transl_cncl() {
	 document.getElementById("wholething").style.display="none";
	 document.getElementById("qst").style.display="none";
	 document.getElementById("ch_agr").checked = false;
	 document.getElementById("btn_agr").disabled=true;
 }

 function tr() {
	document.getElementById("wholething").style.display="none";
	document.getElementById("qst").style.display="none";
	document.getElementById("ch_agr").checked = false;
	document.getElementById("btn_agr").disabled=true;
 }

function addgtransl() {
	var th = document.getElementsByTagName('head')[0];
	var s = document.createElement('script');
	s.setAttribute('type','text/javascript');
	s.setAttribute('src','../../../translate.google.com/translate_a/elementa0d8.html?cb=googleTranslateElementInit');
	th.appendChild(s);
	document.getElementById('lang_btn').style.display="none";
}*/
</script>


<!-- Fin Llamado scripts Formulario Open Account -->
<?php include('header.php');?>
<!-- Start Slide Menu -->
<div id="menu-container">
         <div id="loading"></div>
			<ul>
				<li><a href="open-forex-trading-account.php"><img src="images/menuAccounts/openAccount.png" alt="Open Account"/></a><h4><a href="open-forex-trading-account.php" class="active">Open Account</a></h4></li>
				<li><a href="account-funding.php"><img src="images/menuAccounts/accountDeposit.png" alt="Account Deposit"/></a><h4><a href="account-funding.php">Account Deposit</a></h4></li>
				<li><a href="downloadable-forms.php"><img src="images/menuAccounts/accountForms.png" alt="Account Forms"/></a><h4><a href="downloadable-forms.php">Account Forms</a></h4></li>
				<li><a href="fees-and-margins.php"><img src="images/menuAccounts/feesMargins.png" alt="TVFX Fees & Margins"/></a><h4><a href="fees-and-margins.php">TVFX Fees & Margins</a></h4></li>
				<li><a href="Spreads_and_margins.php"><img src="images/menuAccounts/spreadsMargins.png" alt="Spreads & Margins"/></a><h4><a href="Spreads_and_margins.php">Spreads & Margins</a></h4></li>
			</ul>
        </div>
        <div id="menu-controls">
                <a href="#" data-target="0" class="active">Accounts</a>
        </div>
<!-- Finish Slide Menu -->
    
<div id="main" style="margin:10px 0 10px 0; background-color:#FFF; box-shadow: 0 0 4px rgba(0, 0, 0, 0.25), 0 2px 4px rgba(0, 0, 0, 0.3); -webkit-border-radius: 5px; -moz-border-radius: 5px; -o-border-radius: 5px; border-radius: 5px;">

<!--Inicio Formulario-->    
<div class="containerOpenAccount">
<!--<div id="wholething" style="text-align:center"></div>

<div style="margin:0 auto; margin-left:300px;" id="qst">

<table class="tableTranslate" style="width:70%;">
<tr>
<td style="width:30px; text-align:center;">
<input id="ch_agr" type="checkbox" onChange="transl_agr();">
</td>
<td>I understand and agree that means to translate this Agreement into languages other than English  are being supplied by TVF, however, this translation is provided for  convenience purposes only. Any &nbsp;relationship I establish or hold with tvf will be governed by the English language version of the Agreement and if there  is any contradiction between the English language version and a translated version, the English language version shall take precedence.<br/>
<br/>
After agreeing to the above terms look for this sign <img src="images/formOpenAccount/translate.png" width="87" height="20" alt="Translate"/> in a left top corner of the window. Then click on it, choose your language in a dropdown menu and click "Translate".
</td>
</tr>
<tr>
<td style="text-align:center;" colspan="2">
<input type="button" value="Cancel" onClick="transl_cncl();">
&nbsp;&nbsp;&nbsp;
<input id="btn_agr" type="button" value="Agree and Enable a Translate Tool" disabled onClick="tr(); addgtransl();">		
-
</td>
</tr>
</table>
</div>
-->
<form action="thankyou-open-live-account.php" method="post" id="frm2"  >

<!-- *********** sending hidden GET parameters *********** -->
<input type="hidden" name="ib_num" id="ib_num" value="<?php echo $ib_num ?>" >
<input type="hidden" name="valv" value="" >
<input type="hidden" name="wlem" value="" >
<input type="hidden" name="afem" value="" >
<input type="hidden" name="afate" value="" >

<table class="tableTitle" style="border:0; border-collapse:collapse; padding:0; margin:0 auto;">
<tr>
<td colspan="3" style="padding:5px;">
<img src="images/formOpenAccount/logo_TVF.png" width="250" alt="TVF OPen Live Account"/>
</td>
<td colspan="5" style="height:45px; vertical-align:middle; text-align:center;">

<h1>Online Trading Account Application<br/></h1>

<!--<div id="lang_btn" style="display:block">
<p style="text-align:right; cursor:pointer; cursor:hand;" >

<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</p>
</div>-->



<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</td>
</tr>

</table>


<!----------------STEP 1 COUNTRY ------------------>
<div id="one" style="margin:0 auto;">
<table style="border:none; width:810px; margin:0 auto; background-color:#F3F3F3">
<tr>
  <td>

<div style="padding:20px 20px 0 20px;">
<table style="width:100%;" class="tableContent">
<tr>
<td style="padding:20px;">

  <div style="text-align:center"><h1>Welcome!<br/></h1>
  <input type="hidden" id="lng" name="lng" value="0">
  </div>
<br/>
  <div style="text-align:left;">
    <p style="font-size:12pt;">Applying for a Tradeview live account is very simple, and only takes a few minutes. Just 2 easy steps to follow!</p>
    
    <noscript>
    <p><strong>NOTE:</strong> Your browser has JavaScript currently off. In order to complete the application it needs to be turned on. It's risk free and is a recommended setting for all browsers. Click <a href="http://jamesdunn.wpn.mlxchange.com/enablescript.htm" target="_blank">here</a> for a tip on how to enable it.</p>
   </noscript>
  </div>

<div >
 <h2>STEP 1 <br>Please choose your country of residence:</h2>
</div>
<br/>

<div id="prdformData">
<div style="text-align:center">
<select id="country" name="country" class="notranslate">
    <option value="Nothing" selected>Select...</option>    
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola" >Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antigua And Barbuda">Antigua And Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Austria">Austria</option>
    <option value="Australia">Australia</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas_The">Bahamas, The</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei">Brunei</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="China (HongKong S.A.R.)">China (HongKong S.A.R.)</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Croatia">Croatia</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="EastTimor">EastTimor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Islas Malvinas)">Falkland Islands (Islas Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji Islands">Fiji Islands</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia The">Gambia The</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
    <option value="Honduras">Honduras</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <OPTION value="Iraq">Iraq</OPTION>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea">Korea</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Laos">Laos</option>
    <option value="Latvia">Latvia</option>
    <OPTION value="Lebanon">Lebanon</OPTION>
    <option value="Lesotho">Lesotho</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Macedonia">Macedonia</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia</option>
    <option value="Moldova">Moldova</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montenegro">Montenegro</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <OPTION value="Myanmar">Myanmar</OPTION>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="Netherlands The">Netherlands The</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Ireland">Northern Ireland</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn Island">Pitcairn Island</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russia</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Helena">Saint Helena</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia">Saint Lucia</option>
    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia">Serbia</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia And The South Sandwich Islands">South Georgia And The South Sandwich Islands</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Taiwan">Taiwan</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad And Tobago">Trinidad And Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Vietnam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <!--<option value="Yugoslavia">Yugoslavia</option>-->
    <option value="Zambia">Zambia</option>
    <option value="Other">Other</option>
  </select>
  </div>
</div>

<br/>
</td>
</tr>

</table>
</div>

  </td>
 </tr>

</table>
</div>
<!---------------END STEP 1 ------------------>



<!--------------STEP 3 PERSONAL INFO-------------------->
<div id="three">
<table style="border:none; width:810px; margin:0 auto; background-color:#F3F3F3">
<tr><td>

<div style="padding:0 20px;">
<table style="width:100%;" class="tableContent"><tr>
<td style="padding:20px;">
<div><h2>Fill out the application form</h2></div>

<div class="headerForm"><p class="titItem"><span style="margin-top:3px;">1. Desirable Trading Platform</span></p></div>
<div class="itemsForm">
<table style="width:100%;">
<tr>
<td style="width:32%; height:40px; text-align:center; vertical-align:middle;">
<span style="color:#F00;">*</span> Please select your platform:
<select name="platformselect" id="platformselect" >
		  <option value="" selected="selected" >Choose One</option>
          <option value="Tradeview UniTrader" >Tradeview UniTrader</option>
		  <option value="Tradeview MetaTrader 4" >Tradeview MetaTrader 4</option>
		  <option value="Tradeview Currenex" >Tradeview Currenex</option>
</select>
</td>
</tr>
</table>
</div>
<br/>

<div class="headerForm"><p class="titItem"><span id="tr103"></span><span id="ar103">2. Personal Details</span></p></div>
<div class="itemsForm">
<table style="width:95%;">
<tr>
<td style="width:216px; height:40px;">
<span style="color:#F00;">*</span> <span id="tr27"></span><span id="ar27">First Name</span><br/><input class="txtField" name="fname" type="text" id="fname" style="width:200px;" value="" size="35" maxlength="60"/></td>
<td style="width:32px;">&nbsp;</td>
<td style="width:250px;"><span style="color:#F00;">*</span> <span id="tr30"></span><span id="ar30">Gender:</span>
  <select id="genderselect_src" style="width:200px; display:none;">
    <option value="">Choose One</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
  <select name="genderselect" id="genderselect"  style="width:200px;">
    <option value="" selected="selected">Choose One</option>
    <option value="Male" >Male</option>
    <option value="Female" >Female</option>
  </select></td>
  <td style="width:4px;">&nbsp;</td>
<td style="width:214px;"><span id="tr33"></span><span id="ar33">Passport #:</span> <input class="txtField" name="passport" type="text" id="passport"  value="" style="width:200px;" size="35" maxlength="40" /></td>
</tr>

<tr>
<td>
<span style="color:#F00;">*</span> <span id="tr28"></span><span id="ar28">Last Name</span> <input class="txtField" name="lname" type="text" id="lname"  value="" maxlength="60" style="width:200px;" size="35"/>
</td>
<td style="width:32px;">&nbsp;</td>
<td valign="top"><span style="color:#F00;">*</span> <span id="tr31"></span><span id="ar31">Date of Birth:</span>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#dob" ).datepicker({
			
			showOn: "button",
            buttonImage: "images/formOpenAccount/cal.gif",
            buttonImageOnly: true,
			changeMonth: true,
            changeYear: true,
			yearRange: "1912:2015"
		});
    });
    </script>
    <input class="txtField" type="text" id="dob" name="dob" value="" style="width:160px;" readonly/>
  
  <!--<img id="dob_btn" onMouseOver="showhint('Use single arrows on top of the calendar to change a month and double arrows to change a year. You can also click in the middle between them to type a year manually. Then select a month and a date.', this, event, '270px')" src="images/formOpenAccount/cal.gif" height="30" style="vertical-align:bottom; cursor:pointer;cursor:hand" alt="Calendar Open Live Account"/>-->
   
    </td>
  <td style="width:4px;">&nbsp;</td>
<td style="width:214px;"><span style="color:#F00;">*</span> <span id="tr34"></span><span id="ar34">Nationality:</span>
  <input class="txtField"  type="text" name="nationalityselect" id="nationalityselect" style="width:200px;" maxlength="60" /></td>
</tr>
<tr>
<td>
<span id="tr29"></span><span id="ar29">Middle Name</span> <input class="txtField" name="mname" type="text" id="mname"  value="" style="width:200px;" size="35" maxlength="40"/>
</td>
<td style="width:32px;">&nbsp;</td>
<td><span style="color:#F00;">*</span> <span id="tr32"></span><span id="ar32">Marital Status:</span>
  <select id="maritalselect_src" style="width:200px; display:none;">
    <option value="">Choose One</option>
    <option value="Single">Single</option>
    <option value="Married">Married</option>
  </select>
  <select name="maritalselect" id="maritalselect" style="width:200px;" >
    <option value="" selected="selected">Choose One</option>
    <option value="Single" >Single</option>
    <option value="Married" >Married</option>
  </select></td>
</tr>
</table>

<table style="width:95%;">
<tr>
<td style="width:49%; height:40px;">
<span style="color:#F00;">*</span> <span id="tr36"></span><span id="ar36">E-mail address:</span><br/>
<input class="txtField" name="email" type="text" id="email"  value="" style="width:325px;" size="35" maxlength="60"/></td>
<td style="width:4%;">&nbsp;</td>
<td style="width:47%px;"><span style="color:#F00;">*</span> <span id="tr38"></span><span id="ar38">Home Phone:</span> <br/>
  <input class="txtField" name="homephone" type="text" id="homephone"  value="" style="width:250px;" size="35" maxlength="12" /></td>
</tr>

<tr>
<td><span style="color:#F00;">*</span> <span id="tr37"></span><span id="ar37">Confirm E-mail:</span> <br/>
<input class="txtField" name="emailconf" type="text" id="emailconf"  value="" style="width:325px;" size="35" maxlength="60"/></td>
<td>&nbsp;</td>
<td><span id="tr39"></span><span id="ar39">Mobile Phone:</span> <br/>
  <input class="txtField" name="mobile" type="text" id="mobile"  value="" style="width:250px;" size="35" maxlength="12"/></td>
</tr>
</table>


<table style="width:95%;">
<tr>
<td style="width:332px; height:40px;" rowspan="2">
<span style="color:#F00;">*</span> <span id="tr41"></span><span id="ar41">Address:</span> <span style="color:#F00;"><span id="tr42"></span><span id="ar42">(no PO Boxes can be listed for address)</span></span><br/>
<textarea class="txtField" maxlength="124" name="address" id="address" style="height:70px; width:325px; max-height:70px; max-width:325px;" rows="4"></textarea></td>
<td style="width:40px;">&nbsp;</td>
<td style="width:349px;"><span style="color:#F00;">*</span> <span id="tr44"></span><span id="ar44">Country:</span><br/>
  <input class="txtFieldDesable" type="text" name="country2" id="country2" style="width:250px;" disabled="disabled" value=""/></td>
</tr>

<tr>
<td></td>
<td><span id="tr45"></span><span id="ar45">State/Province</span><br/>
  <input class="txtField" name="province" type="text" id="province"  value="" style="width:250px;" size="35" maxlength="60" />
  </td>
</tr>

<tr>
<td><span style="color:#F00;">*</span> <span id="tr43"></span><span id="ar43">City:</span><br/>
<input class="txtField" name="city" type="text" id="city"  value="" style="width:325px;" size="35" maxlength="60"/></td>
<td></td>
<td><span style="color:#F00;">*</span> <span id="tr46"></span><span id="ar46">Postal Code:</span><br/>
  <input class="txtField" name="zip" type="text" id="zip"  value="" style="width:250px;" size="35" maxlength="10"/></td>
</tr>
</table>
</div>

<!--<br/>

<div class="headerForm"><p class="titItem"><span id="tr35"></span><span id="ar35">3. Contact Details</span></p></div>
<div class="itemsForm">
<table style="width:95%;">
<tr>
<td style="width:49%; height:40px;">
<span style="color:#F00;">*</span> <span id="tr36"></span><span id="ar36">E-mail address:</span><br/>
<input class="txtField" name="email" type="text" id="email"  value="" style="width:325px;" size="35" maxlength="60"/></td>
<td style="width:4%;">&nbsp;</td>
<td style="width:47%px;"><span style="color:#F00;">*</span> <span id="tr38"></span><span id="ar38">Home Phone:</span> <br/>
  <input class="txtField" name="homephone" type="text" id="homephone"  value="" style="width:250px;" size="35" maxlength="12" /></td>
</tr>

<tr>
<td><span style="color:#F00;">*</span> <span id="tr37"></span><span id="ar37">Confirm E-mail:</span> <br/>
<input class="txtField" name="emailconf" type="text" id="emailconf"  value="" style="width:325px;" size="35" maxlength="60"/></td>
<td>&nbsp;</td>
<td><span id="tr39"></span><span id="ar39">Mobile Phone:</span> <br/>
  <input class="txtField" name="mobile" type="text" id="mobile"  value="" style="width:250px;" size="35" maxlength="12"/></td>
</tr>
</table>
</div>

<br/>

<div class="headerForm"><p class="titItem"><span id="tr40"></span><span id="ar40">4. Home Address</span></p></div>
<div class="itemsForm">
<table style="width:95%;">
<tr>
<td style="width:332px; height:40px;" rowspan="2">
<span style="color:#F00;">*</span> <span id="tr41"></span><span id="ar41">Address:</span> <span style="color:#F00;"><span id="tr42"></span><span id="ar42">(no PO Boxes can be listed for address)</span></span><br/>
<textarea class="txtField" maxlength="124" name="address" id="address" style="height:70px; width:325px; max-height:70px; max-width:325px;" rows="4"></textarea></td>
<td style="width:40px;">&nbsp;</td>
<td style="width:349px;"><span style="color:#F00;">*</span> <span id="tr44"></span><span id="ar44">Country:</span><br/>
  <input class="txtFieldDesable" type="text" name="country2" id="country2" style="width:250px;" disabled="disabled" value="60"/></td>
</tr>

<tr>
<td></td>
<td><span id="tr45"></span><span id="ar45">State/Province</span><br/>
  <input class="txtField" name="province" type="text" id="province"  value="" style="width:250px;" size="35" maxlength="60" />
  </td>
</tr>

<tr>
<td><span style="color:#F00;">*</span> <span id="tr43"></span><span id="ar43">City:</span><br/>
<input class="txtField" name="city" type="text" id="city"  value="" style="width:325px;" size="35" maxlength="60"/></td>
<td></td>
<td><span style="color:#F00;">*</span> <span id="tr46"></span><span id="ar46">Postal Code:</span><br/>
  <input class="txtField" name="zip" type="text" id="zip"  value="" style="width:250px;" size="35" maxlength="10"/></td>
</tr>
</table>
</div>-->

<br/>

<div class="headerForm">
  <p class="titItem"><span id="tr47"></span><span id="ar47">3. Employment Information</span></p></div>
<div class="itemsForm">
<table style="width:100%;">
<tr>
<td style="width:209px; height:40px;">
<span style="color:#F00;">*</span> <span id="tr48"></span><span id="ar48">Employment Status:</span><br/>
<select id="employmentstatusselect_src" style="width:200px; display:none;">
	<option value="">Choose One</option>
	<option value="Employed">Employed</option>
	<option value="Self-Employed">Self-Employed</option>
	<option value="Retired">Retired</option>
    <option value="Unemployed">Unemployed</option>
</select>
<select onChange="risk_check(); employment_check();"  name="employmentstatusselect" id="employmentstatusselect" style="width:200px;">
	<option value="" selected="selected">Choose One</option>
	<option value="Employed" >Employed</option>
	<option value="Self-Employed" >Self-Employed</option>
	<option value="Retired" >Retired</option>
    <option value="Unemployed" >Unemployed</option>
</select>
</td>
<td style="width:9px;">&nbsp;</td>
<td style="width:213px;"><span style="color:#F00;">*</span> <span id="tr49"></span><span id="ar49">Employer:</span>
  <input class="txtField" name="employer" type="text" id="employer"  value="" style="width:200px;" size="35" maxlength="60" />
  </td>
  <td style="width:18px;">&nbsp;</td>
<td style="width:235px;"><span style="color:#F00;">*</span> <span id="tr51"></span><span id="ar51">Annual Salary:</span>
<select style="width:200px; display:none;" id="annualsalaryselect_src">
		  <option value="">Choose One</option>
		  <option value="Less than $25,000">Less than $25,000</option>
		  <option value="$25,000 to $50,000">$25,000 to $50,000</option>
		  <option value="$50,000 to $100,000">$50,000 to $100,000</option>
          <option value="Greater than $100,000">Greater than $100,000</option>
</select>
<select onChange="risk_check();" style="width:200px;"  name="annualsalaryselect" id="annualsalaryselect">
		  <option value="0" selected="selected">Choose One</option>
		  <option value="Less than $25,000" >Less than $25,000</option>

		  <option value="$25,000 to $50,000" >$25,000 to $50,000</option>
		  <option value="$50,000 to $100,000" >$50,000 to $100,000</option>
          <option value="Greater than $100,000" >Greater than $100,000</option>
</select>
  </td>
</tr>

<tr>
<td>&nbsp;</td>
<td style="width:9px;">&nbsp;</td>
<td><span style="color:#F00;">*</span> <span id="tr50"></span><span id="ar50">Occupation:</span>
  <input class="txtField" name="occupation" type="text" id="occupation"  value="" style="width:200px;" size="35" maxlength="60" />
  </td>
  <td style="width:18px;">&nbsp;</td>
<td style="width:235px;"><span style="color:#F00;">*</span> <span id="tr52"></span><span id="ar52">Approximate Net Worth:</span>
  <select style="width:200px; display:none;" id="networthselect_src">
    <option value="0">Choose One</option>
    <option value="Less than $25,000">Less than $25,000</option>
    <option value="$25,000 to $50,000">$25,000 to $50,000</option>
    <option value="$50,000 to $100,000">$50,000 to $100,000</option>
    <option value="Greater than $100,000">Greater than $100,000</option>
  </select>
  <select onChange="risk_check();" style="width:200px;"  name="networthselect" id="networthselect">
    <option value="0" selected="selected">Choose One</option>
    <option value="Less than $25,000" >Less than $25,000</option>
    <option value="$25,000 to $50,000" >$25,000 to $50,000</option>
    <option value="$50,000 to $100,000" >$50,000 to $100,000</option>
    <option value="Greater than $100,000" >Greater than $100,000</option>
  </select></td>
</tr>
</table>
</div>

<br/>

<div class="headerForm">
  <p class="titItem"><span id="tr53"></span><span id="ar53">4. Investment Experience</span><span style="color:#F00;"> * </span><span id="tr54"></span><span id="ar54">(please select at least one)</span></p></div>
<div class="itemsForm">
<table style="width:100%;">
<tr>
<td style="width:307px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="securitiescb"  value="Securities (Stocks and Bonds)"> <span id="tr55"></span><span id="ar55">Securities (Stocks and Bonds)</span><br/></td> 
<td style="width:19px;">&nbsp;</td>
<td style="width:145px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="commoditiescb" value="Commodities"/>
  <span id="tr58"></span><span id="ar58">Commodities</span></td>
<td style="width:18px;">&nbsp;</td>
<td style="width:195px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="optionscb" value="Options"/>
  <span id="tr60"></span><span id="ar60">Options</span></td>
</tr>

<tr>
<td style="width:307px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="cfdcb"  value="CFD & Precious Metal"/>
  <span id="tr56"></span><span id="ar56">CFD & Precious Metals</span><br/></td>
<td style="width:19px;">&nbsp;</td>
<td style="width:145px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="futurescb" value="Futures"/>
  <span id="tr59"></span><span id="ar59">Futures</span> </td>
<td style="width:18px;">&nbsp;</td>
<td style="width:195px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="mutualcb" value="Mutual Funds"/>
  <span id="tr61"></span><span id="ar61">Mutual Funds</span></td>
</tr>

<tr>
<td style="width:307px;"><input onClick="exp_click(); risk_check();" type="checkbox"  name="experience_[]" id="forexcb" value="Forex"/>
  <span id="tr61"></span><span id="ar61">Forex</span></td>
<td style="width:19px;">&nbsp;</td> 
<td colspan="3"><input onClick="noexp_click(); risk_check();" type="checkbox"  name="experience_[]" id="noxp"  value="I have no prior investing experience"/>
  <span id="tr57"></span><span id="ar57">I have no prior investing experience</span></td>
  
</tr>

</table>
</div>

<br/>

<div class="headerForm">
  <p class="titItem"><span id="tr62"></span><span id="ar62">5. Referral and Comments</span></p></div>
<div class="itemsForm">
<table style="width:100%;">
<tr>
<td style="width:48%; height:40px">
<span id="tr63"></span><span id="ar63">Introducing Broker, if applicable:</span><br/>
<input class="txtField" type="text" name="intbroname" id="intbroname"  value="" style="width:300px;" maxlength="80" />
</td>
<td style="width:4%;">&nbsp;</td>
<td style="width:48%;"><span id="tr64"></span><span id="ar64">Sales person, if applicable:</span><br/>
<input class="txtField" type="text" name="salesperson" id="salesperson"  value="" style="width:300px;" maxlength="80"/>
</td>
</tr>
</table>
</div>

<br/>

<div id="riskdisc" style="display:none">
<div class="headerForm"><p class="titItem">6. Supplemental Risk Disclosure<span style="color:#F00;"> * </span></p></div>
<div class="itemsForm">
<table style="width:100%;">
<tr>
<td><a href="download_files.php?op=5&df=21" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Open Live Account"/></a></td>
<td><a href="download_files.php?op=5&df=21" target="_blank">Please read this supplemental risk disclosure</a></td>
</tr>
<tr>
<td style="text-align:center;"><input type="checkbox"  id="supp_risk_disc" name="supp_risk_disc" ></td>
<td><span id="tr67"></span><span id="ar67">I have carefully considered the financial risk involved in trading Contracts for Difference, I am willing to assume such risks associated with this type of investment, and wish to proceed with opening an account.</span></td>
</tr>
</table>
</div>
</div>
</td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</div>
<!-- END STEP 3 --->





<div id="two">
<table style="border:none; width:810px; margin:0 auto; background-color:#F3F3F3">
<tr><td>

<div style="padding:0 20px 20px 20px;">
<table style="width:100%;" class="tableContent"><tr>
<td style="padding:20px;">
<div><h2>Read the Legal Information</h2></div>
<p>To protect you from potential losses that may occur as a result of uninformed decisions and in accordance with legal and regulatory requirements, we invite you to carefully read the following agreements and policies governing the relationship between you and TVF.</p>

<p>Please check the box below to confirm that you have read, understand and agree to be bound by the terms, disclosures and guides below.</p>
<div style="background-color:#FFF; border:solid; border-width:thin; border-color:#CCC; padding:10px;">

<table style="width:100%;">

<tr>
<td style="width:9%;"><div style="text-align:right;"><a href="download_files.php?op=5&df=14" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Client Agreement"/></a></div></td>
<td style="width:40%;">&nbsp;<a href="download_files.php?op=5&df=14" target="_blank">Client Agreement</a></td>

<td style=" width:9%;text-align:right;"><a href="download_files.php?op=5&df=17" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Electronic Trading Agreement"/></a></td>
<td style=" width:40%;">&nbsp;<a href="download_files.php?op=5&df=17" target="_blank">Electronic Trading Agreement</a></td>
</tr>


<tr>
<td style="text-align:right;"><a href="download_files.php?op=5&df=19" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Risk Disclosure Statement"/></a></td>
<td>&nbsp;<a href="download_files.php?op=5&df=19" target="_blank">Risk Disclosure Statement</a></td>

<td style="text-align:right;"><a href="download_files.php?op=5&df=18" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Privacy Policy Notice"/></a></td>
<td>&nbsp;<a href="download_files.php?op=5&df=18" target="_blank">Privacy Policy Notice</a></td>
</tr>


<tr>
<td style="text-align:right;"><a href="download_files.php?op=5&df=15" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Consent to Delivery of Statements by Electronic Media"/></a></td>
<td>&nbsp;<a href="download_files.php?op=5&df=15" target="_blank">Consent to Delivery of Statements by Electronic Media</a></td>

<td style="text-align:right;"><a href="download_files.php?op=5&df=13" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Citizenship Acknowledgement"/></a></td>
<td>&nbsp;<a href="download_files.php?op=5&df=13" target="_blank">Citizenship Acknowledgement</a></td>
</tr>


<tr>
<td style="text-align:right;"><a href="download_files.php?op=5&df=16" target="_blank"><img height="25" style="border:0;" src="images/formOpenAccount/pdf.png" alt="Disclosure of Introducing Broker Commissions"/></a></td>
<td>&nbsp;<a href="download_files.php?op=5&df=16" target="_blank">Disclosure of Introducing Broker Commissions</a></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

</table>
</div>
<br/>
<p>
<input type="checkbox" id="riskagree" name="riskagree" >
<strong>I acknowledge that I have read the above documents and fully understand the information provided therein.</strong>
</p>


</td>
</tr>
</table>
<br/>
<div style="text-align:right;">
<img style="cursor:pointer;cursor:hand" src="images/formOpenAccount/submit.png" onClick="submit_click()" alt="Open Live Account"/>
</div>

</div>

</td>
</tr>
</table>
</div>

</form>
   
<!--Fin Formulario-->
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
	<div id="main_bottom"></div>
	<div class="cleaner"></div>
    
</div>


<!-- Google Code for 100% Bonus 1 step Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 998289381;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "TZj3CKO6swMQ5d-C3AM";
var google_conversion_value = 1;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/998289381/?value=1&amp;label=TZj3CKO6swMQ5d-C3AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<!-- Google Code for Remarketing tag -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 998289381;
var google_conversion_label = "tf3bCLvctAMQ5d-C3AM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/998289381/?value=0&amp;label=tf3bCLvctAMQ5d-C3AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>