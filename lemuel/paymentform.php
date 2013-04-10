
<!doctype html>
<html>
<head>
<title>Payment Form</title>
<style type="text/css"/>
body {  
     margin-left: 0;  
     padding: 1em 0;  
     color: #fff;  
     background:url(http://img1.imagehousing.com/1/0f68f51b7ffe5390c9dbbd9e601c6694.th.jpg);
     background-size:cover; 
     font-family: Georgia, Times New Roman, serif;  
    } 
    
#right{  
     width: 700px; 
     margin: 120px auto  -100px ;  
    } 
#container {
     width: 650px;  
     background-color: #585858;  
     color: #555;  
     border: 6px solid #ccc;  
       -webkit-border-radius: 10px;  
       -moz-border-radius: 10px;  
       -ms-border-radius: 10px;  
        border-radius: 10px;  
     border-top: 1px solid #ddd;  
     padding: 1em 2em;  
     margin: 0 auto;  
      -webkit-box-shadow: 3px 7px 5px #000;  
      -moz-box-shadow: 3px 7px 5px #000;  
      -ms-box-shadow: 3px 7px 5px #000;  
       box-shadow: 3px 7px 5px #000;  
    } 
.rec{
    border: 1px solid #ccc;  
       -webkit-border-radius: 10px;  
       -moz-border-radius: 10px;  
       -ms-border-radius: 10px;  
        border-radius: 10px; 
    background-color: #ccc;
    }
h1 {
      background-color:#C0C0C0 ;
      margin-top: 80px;
    } 
label {
    display: inline-block;
    width: 2em;
    } 
input{
   color:blue;
   }
  label {
				display: block;
			float: left;
			width: 130px;
								}
	 ul {
								list-style: none;
								padding: 0;
								}
 ul > li {
								padding: 0.12em 1em   }
</style>
 <link type="text/css" rel="stylesheet" href="classes/paymentform.css" /> 
</head>
  <? include("./date.php"); // will work if it's in the same directory ?>
<body> 
    
    
       
     <div id="container">
     <center>
        <h1><strong style="text-align:left ; color:black">PAYMENT FORM</strong></h1>
     </center>   
           <form action="" method="post">
      
            <input type="text" name="id" id="id" placeholder="Enter Student No."/>
             <input type="submit" id="submit" value="SEARCH" name="submit" />
        </form>
    
    
     <div class="rec"> 
     
     <?php
       
          if(isset($_POST['id'])){
          $id = $_POST['id'];
          $No = $_POST['id'];
          
          
          $con=mysql_connect('localhost','root','');
             if (!$con){
               die('Could not connect: ' . mysql_error());
                  }  
                mysql_select_db("ATISsmis", $con);
                
                 $result = mysql_query("SELECT * FROM tblstudentrecord WHERE fldStudent_No='" . $No . "';");
                 $result1= mysql_query("SELECT * FROM tblassissment WHERE fldStudentNum='" . $id . "';");
                 
                   $res=mysql_fetch_array($result);
                    $res1=mysql_fetch_array($result1);
                    
                    
                  ?>
                  
            <?php  
              if($res == "" && $res1=="") {
            ?>
            	<script>alert("NO FOUND DATA!");</script>
            <?php
            } else {
            ?>
            <?php	include 'paymentInfo.php' ?>
            
            <?php
            }
            
          }   
            	
             ?>	
             
              
                </div>
        </div>
   
      	    

</body>
</html>

		
