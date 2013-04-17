
 <!DOCTYPE html>
 <html>
 <head>
 
 </head>
 <body>
 
  <ul>                   
						 <li>
							<label id="studNo">Student No.: </label>
							<input type="text" name="studNo" disabled="yes" id="studNo" value="<? echo $res1['fldStudentNum']; ?>" />
						</li>
						  <li>
		 <label id="studName">Student Name: </label>
	<input type="text" name="studName" disabled="yes" id ="studName" value="<? echo $res['fldStud_FirstName'] .' ' . $res['fldStud_MiddleName'].' ' . $res['fldStud_LastName']; ?>"/>
						  </li>
						  
							<li>
							  <label id="level">Year level: </label>
							  <input type="level" name="level" disabled="yes" id="level" value="<? echo $res['fldGrade_Year_Lvl_Entered']; ?>"/>
							  
							</li>
      </ul>
          
   
	<fieldset><legend><h3>Payable</h3></legend>								
<?php
$con=mysql_connect('localhost','root','');
if(!$con){
die('Could not connect: ' .mysql_error());
}

mysql_select_db("ATISsmis",$con);
$result = mysql_query("SELECT * FROM tblassissment");

?>
  <table border='0'>
  <thead>
  <tr>
  <th rowspan=2 colspan=0>ASSESSMENT_NAME</th>
  <th rowspan=2 colspan=0>AMOUNT</th>
  <th rowspan=2 colspan=0>BALANCE</th>
  </tr>
  </thead>
  
   <?php
 $total1=0;
 $resultE = mysql_query("SELECT * FROM tblassissment WHERE fldAssessment_Name='Entrance'");
 
 while($rows = mysql_fetch_array($resultE))
		  {
		  $bal = $rows['fldBalance'];
		  $total1 = $total1 + $bal;
		  
		  }
		  ?>
		  

		  
		  <?php
 $total2=0;
 $resultB= mysql_query("SELECT * FROM tblassissment WHERE fldAssessment_Name='Books'");
 while($rows = mysql_fetch_array($resultB))
		  {
		  
		    
		  $bal = $rows['fldBalance'];
		  $total2 = $total2 + $bal;
		  
		  }
  ?>		 
  
     <?php
 $total3=0;
 $resultA = mysql_query("SELECT * FROM tblassissment WHERE fldAssessment_Name='BSP/GSP'");
 while($rows = mysql_fetch_array($resultA))
		  {
		  $bal = $rows['fldBalance'];
		  $total3 = $total3 + $bal;
		  
		  }
		  ?>
		  
		  
 <?php
 $total=0;
 while($rows = mysql_fetch_array($result))
		  {
		  
		    
		  $bal = $rows['fldBalance'];
		  $total = $total + $bal;
		  
		  
  ?>
  <?php
		
		echo " 
		  <tr style='background-color:violet'>
		  <td>".$rows['fldAssessment_Name']   . "  </td>
		  <td>".$rows['fldAmount']   . "  </td>
		  <td>". $rows['fldBalance']." </td></tr>";	
		  }
		  ?>
		  </tr>
	     </table>
	  
		 
<?php
		  mysql_close($con);
	?>
	
	<?php include 'footerpayment.php' ?>
							
					
         
            </body>
            </html>
