<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Effects - Show Demo</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
 
</head>
<body>
<div class="toggler">
  <div id="effect" class="ui-widget-content ui-corner-all">
    <h3 class="ui-widget-header ui-corner-all">Show</h3>
   
    <?php
$con=mysql_connect('localhost','root','');
if(!$con){
die('Could not connect: ' .mysql_error());
}
mysql_select_db("ATISsmis",$con);
$result = mysql_query("SELECT * FROM tblBalance");

?>
     <table border='0'>
  <thead>
  <tr>
  <th rowspan=2 colspan=0>|ASSESSMENT_NAME|</th>
  <th rowspan=2 colspan=0>|AMOUNT|</th>
   <th rowspan=2 colspan=0>|PAYED|</th>
  <th rowspan=2 colspan=0>|BALANCE|</th>
  
  </thead>
  </tr>
   <?php

 while($rows = mysql_fetch_array($result)){
	
		echo " 
		  <tr style='background-color:violet'>
		  <td>".$rows['ASSESSMENT_NAME']   . "  </td>
		  <td>".$rows['AMOUNT']   . "  </td>
		  <td>".$rows['PAYED']   . "  </td>
		  <td>". $rows['BALANCE']." </td></tr>";	
		  }
		  ?>
  </table>

  </div>
</div>
 

</body>
</html>
