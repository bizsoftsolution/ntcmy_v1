<?php

include_once "db/connection.php";

      $name=$_POST['name'];
      $email=$_POST['email'];
      $message=$_POST['message'];
       $website=$_POST['website'];
		

 $messages='	<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book My College </title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="24x24">
</head>

<body>
<table width="600" border="2" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid rgb(216, 216, 216);">
  <tr>
    <td align="left" valign="top" style="background-color: rgb(0, 123, 201);"><img src="http://ntc.my/images/logo.png" style="margin-left: 106px;"></td>
  </tr>
  <tr>
  <td>
 <table width="600" border="0" align="center">
  

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Name</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$name.'</strong></td>
        </tr>
        
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Email</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$email.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Web Site</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$website.'</strong></td>
        </tr>
         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Message </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$message.'</strong></td>
        </tr>
       
       
        
          </table>
          </td>
          </tr>
      <tr>
      <td style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 201); padding: 5px; text-align: center;">Copyright © ntc 2016.All rights reserved.</td>
      </tr>
        
               
  </table>

</body>
</html>';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

$to='nube_hq@nube.org.my';
$subject="NTC Contacts";




//send the email
$mail = mail( $to, $subject , $messages,$headers);

echo $mail ? "Mail sent" : "Mail sending failed";
	 	
		 
		

?>