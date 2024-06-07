<?php
ini_set("display_errors", 0);
$cap = 'notEq';


include "phpmailer/class.smtp.php";
require_once('phpmailer/class.phpmailer.php');
require 'phpmailer/PHPMailerAutoload.php';

if (isset($_POST['SubmtBtn'])) {

if ($_POST['captcha'] == $_SESSION['cap_code']) 
    {
        // Captcha verification is Correct. Do something here!
        $cap = 'Eq';
    } 
    else 
    {
        // Captcha verification is wrong. Take other action
        $cap = '';
    }
	
	if(preg_match('/^[a-zA-Z0-9.@_-]*$/',' AND SLEEP (5) ='))
        {
                echo "Username:True";
        }
        if(preg_match('/^[a-zA-Z0-9.@_-]*$/',' AND SLEEP (5) ='))
        {
               echo "<BR>userEmail:True";
        }
        if(preg_match('/^[a-zA-Z0-9.@_-]*$/',' AND SLEEP (5) ='))
        {
               echo "<BR>userPhone:True";
        }
        if(preg_match('/^[a-zA-Z0-9.@_-]*$/',' AND SLEEP (5) ='))
        {
               echo "<BR>userMsg:True";
        }
    $userName = mysql_escape_string($_REQUEST['userName']); //echo $userEmail;
    $userEmail = mysql_escape_string($_REQUEST['userEmail']); //customer emailid
    $userPhone = mysql_escape_string($_REQUEST['userPhone']);
    $CompName = mysql_escape_string($_REQUEST['CompName']);
    $userMsg = mysql_escape_string($_REQUEST['userMsg']);

    $mail = new PHPMailer();

    $mail->IsSMTP();                       // telling the class to use SMTP

    $mail->SMTPDebug = 0;
    // 0 = no output, 1 = errors and messages, 2 = messages only.

    $mail->SMTPAuth = true;                // enable SMTP authentication 
    $mail->SMTPSecure = "ssl/tls";              // sets the prefix to the servier
    $mail->Host = "mail.softlandindia.co.in";        // sets Gmail as the SMTP server //mail.softlandindia.co.in
    $mail->Port = 25;                     // set the SMTP port for the GMAIL 

    $mail->Username = "info@softlandindia.co.in";  // Gmail username //ebilling@technopark.org //info@softlandindia.co.in
    $mail->Password = "fEgd9_05";      // Gmail password //Billing@910 //Wd2jg50@

    $mail->CharSet = 'windows-1250';
    $mail->SetFrom($userEmail, 'Softland-contact');

    $mail->Subject = "Softland-Contact-Details";
    $mail->ContentType = 'text/plain';
    $mail->IsHTML(false);

    $mail->Body = $userMsg;

    $mail->AddAddress('info@softlandindia.co.in', 'Customer');
	$mail->AddAddress($userEmail, 'Customer');
    $mail->AddReplyTo('info@softlandindia.co.in', 'Customer Email Address');

    if (!$mail->Send()) {
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
        $FailureCount = $FailureCount + 1;
    } else {
        $error_message = "Successfully sent!";
        $SuccessCount = $SuccessCount + 1;
    }
    ?>
<script>alert("<?php echo $error_message ?>");</script>
<?php }
?>
<!DOCTYPE html>
<html dir=ltr lang=en-US>
<head>
<title>Softland India LTD | Contact</title>
<meta charset=UTF-8>
<meta name=description content="About Softland India Limited">
<meta name=keywords content="About Softland India Limited,Vision,Certifications,Hierarchy,Team,Careers,LifeCycle,FacilitiesExpertise,Directors,Milestones">
<meta name=viewport content="width=device-width, initial-scale=1" />
<link rel=canonical href=http://softlandindiasalesforce.com/>
<script src=js/jquery.validate.min.js type=text/javascript></script>
<script src=js/jquery-1.4.2.min.js type=text/javascript></script>
<script language=javascript src=js/form-validation.js></script>
<script type=text/javascript>jQuery(".slider1.bd li").first().before(jQuery(".slider1.bd li").last());jQuery(".slider1").hover(function(){jQuery(this).find(".arrow").stop(true,true).fadeIn(500)},function(){jQuery(this).find(".arrow").fadeOut(500)});jQuery(".slider1").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true,vis:3,autoPage:true,trigger:"click"});$(document).ready(function(){$("#SubmtBtnSubmtBtn").click(function(){if($("#contackform").valid()==true){$(".error").hide();var b=false;var d=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;var c=$("#userEmail").val();if(c==""){b=true}else{if(!d.test(c)){b=true}}if(b==true){$("#userEmail").val("");$("#userEmail").attr("required",true);return $("#contackform").valid()}return true}return false});var a="<?php echo $cap; ?>";if(a!="notEq"){if(a=="Eq"){$(".cap_status").html("Your form is successfully Submitted ").fadeIn("slow").delay(3000).fadeOut("slow")}else{$(".cap_status").html("Human verification Wrong!").addClass("cap_status_error").fadeIn("slow")}}});function isNumberKey(b){var a=(b.which)?b.which:event.keyCode;if(a>31&&(a<48||a>57)){return false}return true};</script>
<style type=text/css>.cap_status{padding-top:10px;font:14px arial;color:#fff;display:none}.cap_status_error{color:#bd0808!important}</style>
<style>.contact-form input:hover:not([type="submit"]),.contact-form textarea:hover{border-color:#5bc0de}.contact-form input:not([type="submit"]),.contact-form textarea{border:1px solid #ddd;border-radius:3px;box-shadow:0 2px 3px #ddd inset;font-weight:300;margin-bottom:10px;outline:medium none;padding:10px 20px;width:100%}</style>
<link rel=stylesheet href=css/fonts-googleapis.css type=text/css />
<link rel=stylesheet href=css/bootstrap.css type=text/css />
<link rel=stylesheet href=css/style.css type=text/css />
<link rel=stylesheet href=css/dark.css type=text/css />
<link rel=stylesheet href=css/font-icons.css type=text/css />
<link rel=stylesheet href=css/animate.css type=text/css />
<link rel=stylesheet href=css/responsive.css type=text/css />
<link rel=stylesheet href=font-awesome/css/font-awesome.min.css>
<link rel=stylesheet href=css/style1.css type=text/css />
<link rel="stylesheet" href="css/Montserrat.css" type="text/css" />
</head>
<body class=stretched>
<div id=wrapper class=clearfix>
<?php include "header.php"; ?>
<div class=container>
<div id=map style=width:100%;height:500px></div>
<script src=js/contact.js type=text/javascript></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ04fWGan34d8BM-u8J9GExmDZ0Y3IaPk &callback=myMap"></script>
</div>
<section id=content>
<div class=content-wrap>
<div class="container clearfix">
<div class="row contactus_row">
<div class=col-sm-3>
<h3 style=text-decoration:underline;color:#000>Send us an Email</h3>
<form method=post action=contact.php class=contact-form id=contact-form>
<input type=text class=required name=userName id=userName placeholder=Name value>
<input type=text class=required name=CompName id=CompName placeholder="Company Name" value>
<input type=text class=required name=userPhone id=userPhone placeholder="Phone No" value>
<input type=text class=required name=userEmail id=userEmail placeholder=Email value>
<textarea name=userMsg id=userMsg class=required placeholder=Message></textarea>
<div>
<span><img src="captcha.php" style="width:148px;height:57px;" alt="captcha" /></span>

<span><input type=text name=captcha id=captcha maxlength=6 autocomplete=off class=required size="6"/></span>
<br>
</div>

<input type=submit name=SubmtBtn id=SubmtBtn class=button value="Send Mail">
</form>
</div>
<div class="col-sm-4 contact_address">
<address>
<h3 class=contact_address_head>Headquarters:</h3>
<h4>Reg. Office:</h4>Plot No.14A,
Kinfra Small Industries Park,
Menamkulam, St.Xaviers College P.O,
Thumba, Trivandrum, Kerala- 695586. INDIA
</address>
<strong>Phone : </strong>91-471-2704090, 2705880,<br>
<strong>Fax : </strong>91-471-2706350<br>
<strong>Email : </strong>info@softlandindia.co.in
</div>
<div class=col-sm-5>
<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_sale_click>Contact For Sales</button>
<div class=contact_sale id=contact_sale>
<ul>
<li style="text-align: center;">Kerala : +91 8111888002</li>
<li style="text-align: center;">Rest of India : +91 8111888001</li>
<div class=clear> </div>
</ul>
</div>

<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_consumable_sale_click>Contact For Consumables Sales</button>
<div class=contact_sale id=contact_consumable_sale>
<ul>
<li style="text-align: center;">Consumables Sales : +91 8111888028</li>
<div class=clear> </div>
</ul>
</div>

<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_consumable_Dealership_click>Contact For Dealership</button>
<div class=contact_sale id=contact_consumable_Dealership>
<ul>
<li style="text-align: center;">Dealership ContactNo : +91 8111888010</li>
<div class=clear> </div>
</ul>
</div>


<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_amc_click>Contact For AMC</button>
<div class=contact_sale id=contact_amc>
<ul>
<li style="text-align: center;">AMC : +91 8111888016</li>
<div class=clear> </div>
</ul>
</div>
<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_support_click>Contact For Support</button>
<div class=contact_sale id=contact_support>
<ul>
<li style="text-align: center;">Kerala : +91 8111888003</li>
<li style="text-align: center;">south India : +91 8111888004</li>
<li style="text-align: center;">Rest of India : +91 8111888065</li>
<div class=clear> </div>
</ul>
</div>
<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_hr_click>Contact HR</button>
<div class=contact_sale id=contact_hr>
<ul>
<li style="text-align: center;">HR : +91 8111888029</li>
<div class=clear> </div>
</ul>
</div>
<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_procurement_click>Contact For Procurement</button>
<div class=contact_sale id=contact_procurement>
<ul>
<li style="text-align: center;">Procurement : +91 8111888021</li>
<div class=clear> </div>
</ul>
</div>
<button class="btn btn-info collapsed right_sidebar_contact" type=button id=contact_escalation_click>Emergency Contact For Escalation</button>
<div class=contact_sale id=contact_escalation>
<ul>
<li style="text-align: center;">Service Escalation : +91 8111888010</li>
<div class=clear> </div>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<?php include "footer.php"; ?>
</div>
<div id=gotoTop><i class="fa fa-arrow-up" aria-hidden=true></i></div>
<script type=text/javascript src=js/jquery.js></script>
<script type=text/javascript src=js/plugins.js></script>
<script type=text/javascript src=js/functions.js></script>
</body>
</html>