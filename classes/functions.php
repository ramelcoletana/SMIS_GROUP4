<?php
include 'connection.php';
class sqlfunction extends DB_Connect{
    /*LOGIN USERS*/
    function loginUsers($username,$password){
        $sql1 = "SELECT flduserID,fldpassword,fldusertype FROM tbluseraccount WHERE flduserID='$username' AND fldpassword='$password'";
        $result1 = mysql_query($sql1,$this->openCon());
        $row = mysql_fetch_array($result1);
        if($row[0]=="" || $row[0]==null || $row[1]=="" || $row[1]==null){
            return "notexist";
        }else{
            return $row[2];
        }
    }
    

    //===========================================================================================================//
    /*DELETE CURRENT MS ASSESSMENT*/
    function temDelete($transactionNo){
        $sql = "DELETE FROM tblassissment WHERE fldTransactionNo='$transactionNo'";
        mysql_query($sql,$this->openCon());
        
        $sql1 = "DELETE FROM tblpreparedAssessment WHERE fldTransactionNo='$transactionNo'";
        mysql_query($sql1,$this->openCon());
        
        echo 'successfully deleted';
        $this->openCon();
    }
    
    /*DELETE CURRENT MS PAYMENT*/
    function deleteCurrenMSPayment($transactionNo,$studentNo){
        $sql1 = "DELETE FROM tblpaymentcashflow WHERE fldTransactionNo='$transactionNo' AND fldStudentNum='$studentNo'";
        mysql_query($sql1,$this->openCon());
        
        $sql2 = "DELETE FROM tblpaymentbreakdown WHERE fldTransactionNo='$transactionNo' AND fldStudentNum='$studentNo'";
        mysql_query($sql2,$this->openCon());
        
        $this->closeCon();
    }
    
    /*DELETING CURRENT FULL PAYMENT*/
    function deleteCurrentFullPayment($enrollmentNo,$studentNum){
        $sql = "DELETE FROM tblassissment WHERE fldEnrollmentNo='$enrollmentNo' AND fldStudentNum='$studentNum'";
        mysql_query($sql,$this->openCon());
        
        echo 'Successfully deleted';
        $this->closeCon();
    }
    
    /*DELETING CURRENT PAYMENT CASH FLOW AND PAYMENT BREAKDOWN*/
    function delPCG_PB($transactionNo,$studentNo){
        //deleting from tblpaymentcashflow
        $sql1 = "DELETE FROM tblpaymentcashflow WHERE fldTransactionNo='$transactionNo' AND fldStudentNum='$studentNo'";
        mysql_query($sql1,$this->openCon());
        
        //deleting from tblpaymentbreakdown
        $sql2 = "DELETE FROM tblpaymentbreakdown WHERE fldTransactionNo='$transactionNo' AND fldStudentNum='$studentNo'";
        mysql_query($sql2,$this->openCon());
        
        echo "Successfull deleted...";
    }
    
    /*SEARCH REGISTERED STUDENT FOR ASSESSMENT AND VIEW RECENT BALANCE*/
    
    function searchStudent($studentId){
        $con = $this->openCon();
        $sql = "Select fldStudent_No,fldStud_FirstName,fldStud_MiddleName,fldStud_LastName,fldStudent_Status from tblstudentrecord 
		where fldStudent_No='".$studentId."'";
		$result = mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
	        
	    $sql2 = "Select fldBalance from tblassissment where fldStudentNum='".$studentId."'";
	    $result2 = mysql_query($sql2,$con);
	    $balance = 0;
	    while($row2 = mysql_fetch_array($result2)){
	        $balance = $balance + $row2[0];
	    }
		if($row[0]=="" || $row[0]==null){
			echo "not_reg";
		}else{
			$json_data = array('studentId'=>$row[0],'firstname'=>$row[1],'middlename'=>$row[2],'lastname'=>$row[3],'balance'=>$balance);
			$json_string = json_encode($json_data);
			echo $json_string;
		}
       	$this->closeCon();
    }

    /*SETTING ENROLLMENT NO.*/
    function setEnrollmentNo(){
         $sql = "SELECT MAX(fldId) from tblenrolldata";
         $result = mysql_query($sql,$this->openCon());
         $row = mysql_fetch_array($result);
         echo $row[0] + 1;

         $this->closeCon();
    }
    /*SETTING TRANSACTION NO.*/
    function setTransactionNo(){
        $sql = "SELECT MAX(fldId) from tblpaymentcashflow";
        $result = mysql_query($sql,$this->openCon());
        $row = mysql_fetch_array($result);
        echo $row[0] + 1;

        $this->closeCon();
    }

    /*SHOWING TUITION FEES BY YEAR LEVEL [FULL PAYMENT,MONTHLY PAYMENT,SEMESTRAL]*/
    function showFeesForFullPayment($category){
        
    	$sql = "SELECT fldFeeId,fldFeeDescription,fldFeeAmount FROM tblfor_fees WHERE fldFeeCategory='".$category."'";
    	$result = mysql_query($sql,$this->openCon());
        $notFound = true;
        $zebra = 0;
        $zebraClass1 ="";
    	while($row = mysql_fetch_array($result)){
            if($zebra%2==0){
                $zebraClass1 = "even";
            }else{
                $zebraClass1 = "odd";
            }
            echo "<tr class='$zebraClass1'>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "</tr>";
            
            $notFound = false;
            $zebra++;
    	}
        if($notFound){
            echo "<tr><td colspan=3 ><No tuition fees found for ".$category."<input type='hidden' id='fp_null' value='null'/></td></tr>";
        }
    	
    	$this->closeCon();
    }

    function showFeesMonthlyPaymnt($category,$studentId,$enrollNo,$transactionNo,$paymentMode){
    	$sqlST = "SELECT fldTransactionNo FROM tblassissment WHERE fldTransactionNo='$transactionNo'";
        $result1 = mysql_query($sqlST,$this->openCon());
        $row = mysql_fetch_array($result1);
        if($row[0]==$transactionNo){
            $sql2 = "DELETE FROM tblassissment WHERE fldTransactionNo='$transactionNo'";
            mysql_query($sql2,$this->openCon());
        }
        
        $assessmentPaid = 0;
        $advancedPayment = 0;
        $assessmentCounter = 1;
        $zebraCounter = 0;
        $zebraClass2 = "";
        $notFound = true;
        $sql1 = "SELECT fldFeeId,fldFeeDescription,fldFeeAmount FROM tblfor_fees WHERE fldFeeCategory='$category'";
        $result2 = mysql_query($sql1,$this->openCon());
        while($row1 = mysql_fetch_array($result2)){
            if($zebraCounter%2==0){
                $zebraClass2 = "even";
            }else{
                $zebraClass2 = "odd";
            }
            
            echo "<tr class='$zebraClass2'>";
            echo "<td>".$row1[0]."</td>";
            echo "<td><span id='assName".$row1[0]."'>".$row1[1]."</span></td>";
            echo "<td>".$row1[2]."</td>";
            echo "<td><span id='balance".$row1[0]."'>".$row1[2]."</span></td>";
            echo "<td><input type='text' id='curr".$row1[0]."' class='currentPayment' onkeyup = 'keyupCurrPayment($row1[0],$row1[2])'/></td>";
            echo "</tr>";

            //inserting data to table tblassissment
            $sql2 = "INSERT INTO tblassissment (fldTransactionNo,fldEnrollmentNo,fldStudentNum,fldAssessmentName,fldOriginalAmount,fldAssessmentPaid,fldBalance,fldAdvancedPayment,fldAssessmentCounter,fldModeOfPayment) VALUES ('$transactionNo','$enrollNo','$studentId','$row1[1]',$row1[2],$assessmentPaid,$row1[2],$advancedPayment,$assessmentCounter,'$paymentMode')";
            mysql_query($sql2,$this->openCon());
            
            //inserting data to table tblpreparderAssessment
            $advancep = 0;
            //$transactionNo = htmlintities($transactionNo);
            $sql3 = "INSERT INTO tblpreparedAssessment (fldTransactionNo,fldEnrollmentNo,fldStudentNo,fldAssessmentName,fldOriginalAmount,fldOriginalBalance,fldAssessmentAmount,fldAdvancedPayment,fldAssessmentNo) 
            VALUES ('$transactionNo','$enrollNo','$studentId','$row1[1]',$row1[2],$row1[2],$row1[2],$advancep,$assessmentCounter)";
            mysql_query($sql3,$this->openCon());
            $notFound = false;
            $zebraCounter++;

        }
        if($notFound){
            echo "<tr class='alertMsg'><td colspan=5 >No tuition fees found for ".$category."<input type='hidden' id='msfp_null' value='null'/></td></tr>";
        }

        $this->closeCon();
    }
    
    /*GETTING FEES TOTAL AMOUNT*/
    function getFeesTotalAmount($category){
    	$sql = "SELECT fldFeeAmount FROM tblfor_fees WHERE fldFeeCategory ='".$category."'";
    	$result = mysql_query($sql,$this->openCon());
    	$totalAmount = 0;
    	while($row = mysql_fetch_array($result)){
    		$totalAmount += $row[0];
    	}
    	echo $totalAmount;
        
        $this->closeCon();
    }
    /*GETTING CURRENT PAYMENT*/
    function getCPayment($studentId,$enrollNo,$transactionNo){
        
        
        $sql3 = "SELECT fldAssessmentPaid from tblassissment WHERE fldTransactionNo = '$transactionNo' AND fldEnrollmentNo='$enrollNo' AND fldStudentNum='$studentId'";
        $result2 = mysql_query($sql3,$this->openCon());
        $cPayment = 0;
        while($row1 = mysql_fetch_array($result2)){
            $cPayment += $row1[0];
        }
        echo $cPayment;

        $this->closeCon();
    }
    
    /*UPDATE AND GETTING THE CURRENT NPAYMENT*/
    function updateGetCurrentPayment($transactionNo,$enrollmentNo,$studentNo,$assessmentName,$currentPayment,$balance){
        $sqlUpdate = "UPDATE tblassissment SET fldAssessmentPaid=$currentPayment,fldBalance=$balance WHERE fldAssessmentName='$assessmentName' AND fldTransactionNo='$transactionNo' 
            AND fldEnrollmentNo='$enrollmentNo' AND fldStudentNum='$studentNo'";
        mysql_query($sqlUpdate,$this->openCon());
        $sqlGet = "SELECT fldAssessmentPaid from tblassissment WHERE fldTransactionNo='$transactionNo' 
            AND fldEnrollmentNo='$enrollmentNo' AND fldStudentNum='$studentNo'";
        $result = mysql_query($sqlGet,$this->openCon());
        $currPayment = 0;
        while($row = mysql_fetch_array($result)){
            $currPayment += $row[0];
        }
        echo $currPayment;
        $this->openCon().mysql_close();
    }
    
    /*SAVING FEES FULL PAYMENT*/
    function saveFeesFullPayment($transactionNo,$enrollmentNo,$studentNum,$balance,$modePayment,$category,$tAmount,$amountT,$date){
        
        //select data from tblfor_fees
        $sql1 = "SELECT fldFeeDescription,fldFeeAmount FROM tblfor_fees WHERE fldFeeCategory='$category'";
        $result = mysql_query($sql1,$this->openCon());
        $advanceP = 0;
        $assCtr = 1;
        while($row = mysql_fetch_array($result)){
            //inserting data into tblassissment
            $sql2 = "INSERT INTO tblassissment (fldTransactionNo,fldEnrollmentNo,fldStudentNum,fldAssessmentName,fldOriginalAmount,fldAssessmentPaid,fldBalance,fldAdvancedPayment,fldAssessmentCounter,fldModeOfPayment) 
            VALUES ('$transactionNo','$enrollmentNo','$studentNum','$row[0]',$row[1],$row[1],$balance,$advanceP,$assCtr,'$modePayment')";
            mysql_query($sql2,$this->openCon());
            
            //inserting data into tblpaymentbreakdown
            $sql3 = "INSERT INTO tblpaymentbreakdown (fldTransactionNo,fldStudentNum,fldFeeName,fldAmountPaid) 
                VALUES ('$transactionNo','$studentNum','$row[0]',$row[1])";
            mysql_query($sql3,$this->openCon());
            echo $sql3;
        }
        
        //inserting data into tblpaymentcashflow
        $type = "Cash";
        $sql4 = "INSERT INTO tblpaymentcashflow (fldTransactionNo,fldStudentNum,fldDate,fldTotalAmount,fldAmountTendered,fldType) 
            VALUES ('$transactionNo','$studentNum','$date',$tAmount,$amountT,'$type')";
        mysql_query($sql4,$this->openCon());
        
        
        $this->closeCon();
    }
    
    /*SHOW SUBJECTS BY YEAR LEVEL*/
    function showSubjectsByYearLevel($category){
        $sql1 = "SELECT fldSubCode,fldSubName,fldSubUnit FROM tblallsubjects WHERE fldSubYearLevel='$category'";
        $result = mysql_query($sql1,$this->openCon());
        $zebraCounter= 0;
        $zebraClass = "";
        while($row = mysql_fetch_array($result)){
            if($zebraCounter%2==0){
                $zebraClass = "even";
            }else{
                $zebraClass = "odd";
            }
            echo "<tr class='$zebraClass'>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "</tr>";
            
            $zebraCounter ++;
        }
    }

    /*SAVE SUBJECTS BY YEAR LEVEL*/
    function saveSubjectsByYearLevel($category,$enrollmentNo,$studentId){
        $sql1 = "SELECT fldSubCode,fldSubName,fldSubUnit FROM tblallsubjects WHERE fldSubYearLevel='$category'";
        $result = mysql_query($sql1,$this->openCon());
        while($row = mysql_fetch_array($result)){
            $sql2 = "INSERT INTO tbl_subjects (fld_EnrollmentId,fld_Student_Num,fld_Subject_Id,fld_Subject_Name,fld_Subject_Unit) VALUES ('$enrollmentNo','$studentId','$row[0]','$row[1]',$row[2])";
            mysql_query($sql2,$this->openCon());
        }
        echo 'Saved!';
    }

    /*DELETE TEMPORARY SUBJECTS IN ASSESSMENT*/
    function deleteTemporySubjects($enrollmentNo,$studentNum){
        $sql = "DELETE FROM tbl_subjects WHERE fld_EnrollmentId='$enrollmentNo' AND fld_Student_Num='$studentNum'";
        mysql_query($sql,$this->openCon());
        echo "Subjects deleted!";
    }
    
    /*PROCESSING PAYMENT MONTHLY-SEMESTRAL(MS)*/
    function paymentMSProcess($dateNow,$transactionNo,$enrollmentNo,$studentNo,$totalAmountPaid,$amountTendered){
        $con = $this->openCon();
        $amountType = "Cash";
        
        //Inserting data to tblpaymentcashflow
        $sqlPCF = "INSERT INTO tblpaymentcashflow (fldTransactionNo,fldStudentNum,fldDate,fldTotalAmount,fldAmountTendered,fldType) 
            VALUES ('$transactionNo','$studentNo','$dateNow',$totalAmountPaid,$amountTendered,'$amountType')";
        mysql_query($sqlPCF,$con);
        
        //Select data from tblassissment
        $sqlPB = "SELECT fldAssessmentName,fldAssessmentPaid FROM tblassissment WHERE fldTransactionNo='$transactionNo' AND fldEnrollmentNo='$enrollmentNo'
                AND fldStudentNum = '$studentNo'";
        $result2 = mysql_query($sqlPB,$con);
        while($rowPB = mysql_fetch_array($result2)){
            //Inserting data to tblpaymentbreakdown
            $sqlInsertPCF = "INSERT INTO tblpaymentbreakdown (fldTransactionNo,fldStudentNum,fldFeeName,fldAmountPaid) 
                VALUES ('$transactionNo','$studentNo','$rowPB[0]',$rowPB[1])";
            mysql_query($sqlInsertPCF,$con);
        }
        
        
        $this->closeCon();
    }

    /*/========================/*/
    function doneAssessmentModeFP($enrollmentNo,$studentNum,$schYear,$gy,$status){
        $assStatus = "Fully Paid";
        $section_Advi = "N/A";
        $sql1 = "INSERT INTO tblenrolldata (fld_Enrollment_Id,fld_Student_Num,fld_School_Year,fld_Grade_Year_Level,fld_Section,fld_Adviser,fld_Assessment_Status)
            VALUES ('$enrollmentNo','$studentNum','$schYear','$gy','$section_Advi','$section_Advi','$assStatus')";
        mysql_query($sql1,$this->openCon());
       
        echo $sql1;

        $sqlUpdateStudRec = "UPDATE tblstudentrecord SET fldStudent_Status='$status' WHERE fldStudent_No='$studentNum'";
        mysql_query($sqlUpdateStudRec,$this->openCon());


    }
    
    
    /*/DONE MONTHLY SEMESTRAL ASSESSMENT/*/
    function doneMSAssessment($transactionNo,$enrollmentNo,$studentNo,$schoolYear,$grade_Year){
        //SELECT AND PREPARE FOR THE NEXT ASSESSMENT//
        $sql1 = "SELECT fldAssessmentName,fldOriginalAmount,fldAssessmentPaid,fldBalance,fldAdvancedPayment,fldModeOfPayment FROM 
            tblassissment WHERE fldTransactionNo='$transactionNo' AND fldEnrollmentNo='$enrollmentNo' AND fldStudentNum='$studentNo' AND fldAssessmentCounter=1";
        $result1 = mysql_query($sql1,$this->openCon());
        $assessmentCounter = 2;
        $nextAss = 0;

        $toBePaid = 0;
        while($row1 = mysql_fetch_array($result1)){
            if($row1[5]=="Monthly"){
                $nextAss = number_format($row1[3]/10, 2);
                $toBePaid = 10;
            }else if($row1[4]=="Semestral"){
                $nextAss = number_format($row1[3]/2,2);
                $toBepaid = 2;

        while($row1 = mysql_fetch_array($result1)){
            if($row1[5]=="Monthly"){
                $nextAss = number_format($row1[3]/10, 2);
            }else if($row1[4]=="Semestral"){
                $nextAss = number_format($row1[3]/2,2);

            }
             
            $sql2 = "INSERT INTO tblpreparedAssessment (fldTransactionNo,fldEnrollmentNo,fldStudentNo,fldAssessmentName,fldOriginalAmount,fldOriginalBalance,fldAssessmentAmount,fldAdvancedPayment,fldAssessmentNo)
                VALUES ('$transactionNo','$enrollmentNo','$studentNo','$row1[0]',$row1[1],$row1[3],$nextAss,$row1[4],$assessmentCounter)";
            mysql_query($sql2,$this->openCon());


            //
            $sql5 = "INSERT INTO tblamountPerAssessment (fldTransactionNo, fldEnrollmentNo, fldStudentNo, fldAssessmentName, fldOriginalAmount, fldOriginalBalance, fldAssessmentAmount, fldAdvancedPayment, fldToBePaid) VALUES 
            ('$transactionNo','$enrollmentNo', '$studentNo', '$row1[0]','$row1[1]','$row1[3]',$nextAss, $row1[4], $toBePaid)";
            mysql_query($sql5, $this->openCon());


            
        }
        
        //INSERT INTO ENROLLDATA
        $section = "NOT YET POH";
        $adviser = "WA PA";
        $sql3 = "INSERT INTO tblenrolldata (fld_Enrollment_Id,fld_Student_Num,fld_School_Year,fld_Grade_Year_Level,fld_Section,fld_Adviser) 
            VALUES ('$enrollmentNo','$studentNo','$schoolYear','$grade_Year','$section','$adviser')";
        mysql_query($sql3,$this->openCon());
       

        //UPDATE STUDENT RECORD
        $sql4 = "UPDATE tblstudentrecord SET fldStudentStatus='enrolled' WHERE fldStudent_No='$studentNo'";
        mysql_query($sql4,$this->openCon());
        
        $this->closeCon();
    }
    
    /*/RESET ASSESSMENT/*/
    function resetAllAssessment(){
        //delete all data from tblassissment
        $sqlDelAss = "DELETE FROM tblassissment";
        mysql_query($sqlDelAss,$this->openCon());
        
        //delete all data from tblpaymentbreakdown
        $sqlDelPB = "DELETE FROM tblpaymentbreakdown";
        mysql_query($sqlDelPB,$this->openCon());
        
        //delete all data from tblpaymentcashflow
        $sqlDelPCF = "DELETE FROM tblpaymentcashflow";
        mysql_query($sqlDelPCF,$this->openCon());
        
        //delete all data from tbl_subjects
        $sqlDelS = "DELETE FROM tbl_subjects";
        mysql_query($sqlDelS,$this->openCon());
        
        //delete all data from tblenrolldata
        $sqlDelED = "DELETE FROM tblenrolldata";
        mysql_query($sqlDelED,$this->openCon());
        
        //delete all data from preparedassessment
        $sqlDelPA = "DELETE FROM tblpreparedAssessment";
        mysql_query($sqlDelPA,$this->openCon());
       
    }
}               
