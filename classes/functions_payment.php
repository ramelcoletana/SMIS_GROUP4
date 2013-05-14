<?php
include "connection.php";
     class payment extends DB_Connect{
		//DELETE FROM ALL ASSESSMENT
		function delAS(){
	    	$sql = "Delete from tblallassessment where fldAssessmentNo = 2";
	   	 mysql_query($sql,$this->openCon());
		}
		//SET TRANSACTION NO
		function p_setTransaction(){
			$con = $this->openCon();
			$sqlGTN = "SELECT max(fldId) FROM tblpaymentCashFlow";
			$resTN = mysql_query($sqlGTN, $con);
			$rowTN = mysql_fetch_array($resTN);
			$TN = $rowTN[0] + 1;
			echo $TN;
		}
	
        //SEARCHING STUDENT
        function p_search_student($student_id){
            $con = $this->openCon();
            //
            $sql1 = "SELECT fldStudent_No,fldStud_FirstName, fldStud_MiddleName, fldStud_LastName FROM tblstudentrecord WHERE fldStudent_No='$student_id' AND fldStudent_Status='enrolled'";
            $result1 = mysql_query($sql1,$con);
            $row1 = mysql_fetch_array($result1);
            $full_name = $row1[1]." ".$row1[2]." ".$row1[3];
            //echo $row1[0]." ".$row1[1]." ".$row1[2];
            //
            $enrolled = true;
            $sql2 = "SELECT fld_Enrollment_Id, fld_Grade_Year_Level FROM tblenrolldata WHERE fld_Student_Num = '$student_id'";
            $result2 = mysql_query($sql2,$con);
            $row2 = mysql_fetch_array($result2);
            if($row2[0] == "" || $row2[1] == null){
                $enrolled = false;
            }
            if($enrolled){
                $json_data = array('studentNo'=>$row1[0],'studentName'=>$full_name,'enrollmentNo'=>$row2[0],'gradeYearLevel'=>$row2[1]);
                $json_string = json_encode($json_data);
                echo $json_string;
            }else{
                echo "notEnrolled";
            }

            $this->closeCon();

        }

        //GET CURRENT ASSESSMENT
        function p_getCurrentAssessment($enrollmentNo,$studentNo){
            $con = $this->openCon();
            //
            $sql1 = "SELECT MAX(fldAssessmentNo) FROM tblnextassessment WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo'";
            $result1 = mysql_query($sql1,$con);
            $row1 = mysql_fetch_array($result1);
            $assNo = $row1[0];
	    
	    //getting data from table tblnextassessment
		    $sqlGetNS = "SELECT fldId,fldTransactionNo,fldEnrollmentNo,fldStudentNo,fldAssessmentName,
		    fldOriginalAmount,fldOriginalBalance,fldAssessmentAmount,fldAdvancedPayment,fldAssessmentNo FROM tblnextassessment WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo' AND fldAssessmentNo = $assNo";
	            $result3 = mysql_query($sqlGetNS, $con);
		    while($rowGNS = mysql_fetch_array($result3)){
			$autoId = $rowGNS[0];$transNo = $rowGNS[1];$enrollNo = $rowGNS[2];$studentNo = $rowGNS[3];
			$assName = $rowGNS[4];$assOrigAmnt = $rowGNS[5];$assOrigBal = $rowGNS[6];$assAmount = $rowGNS[7];
			$assAdvance = $rowGNS[8];$assNo = $rowGNS[9];
			
			//inserting data into table tblallassessment
			$sqlInAS = "INSERT INTO tblallassessment (fldTransactionNo,fldEnrollmentNo,fldStudentNo,fldAssessmentName,
			fldOriginalAmount,fldOriginalBalance,fldAssessmentAmount,fldAdvancedPayment,fldAssessmentNo)
			VALUES ('$transNo','$enrollNo','$studentNo','$assName',$assOrigAmnt,$assOrigBal,$assAmount,$assAdvance,$assNo)";
			mysql_query($sqlInAS, $con);
			
		    }
		    
		    //getting data from table tblallassessment and table tblamountPerAssessment
		    $sql = "SELECT aa.fldId, aa.fldTransactionNo, aa.fldEnrollmentNo, aa.fldStudentNo, aa.fldAssessmentName,
		    aa.fldOriginalAmount, aa.fldOriginalBalance, aa.fldAssessmentAmount, aa.fldAdvancedPayment, aa.fldAssessmentNo, aps.fldAssessmentAmount FROM tblallassessment AS aa, tblamountperassessment AS aps WHERE aa.fldAssessmentNo = $assNo AND aa.fldAssessmentAmount !=0
		    AND aps.fldAssessmentAmount !=0 AND aa.fldTransactionNo = aps.fldTransactionNo AND aa.fldStudentNo = aps.fldStudentNo AND aa.fldEnrollmentNo = '$enrollmentNo' AND aa.fldStudentNo = '$studentNo' AND aa.fldAssessmentName = aps.fldAssessmentName
		    AND aa.fldTransactionNo = aps.fldTransactionNo AND aa.fldStudentNo = aps.fldStudentNo";
		    $result2 = mysql_query($sql, $con);
		    //echo $sql;
		    $notFound = true;
		    while($row2 = mysql_fetch_array($result2)){
			$transNo = $row2[1];$enrollNo = $row2[2];$studentNo = $row2[3];
			$assName = $row2[4];$assOrigAmnt = $row2[5];$assOrigBal = $row2[6];
			$assAdvance = $row2[8];$assNo = $row2[9];
			
			$assAmount = $row2[7];
			if($assAmount > $row2[6]){
			    $assAmount = $row2[6];
			}else{
			    $assAmount = $row2[7];
			}
			
			echo "<tr>";
	                echo "<td><span id=assName".$row2[0].">".$row2[4]."</span>
			            <input type=hidden id=assOrigBal".$row2[0]." value = ".$row2[6]." />
			             <input type=hidden id=amntPerAss".$row2[0]." value = ".$row2[10]." /></td>";
	                echo "<td><span id=assAmnt".$row2[0].">".$assAmount."</span></td>";
	                echo "<td><span id=assBalance".$row2[0].">".$row2[7]."</span></td>";
	                echo "<td><input type='text' id=c_payment".$row2[0]." onkeyup = 'computeTotalCPayment(".$row2[0].")' /></td>";
	                echo "<td><span id=advanceP".$row2[0].">0</span><input type=hidden id=assNum value=".$row2[9]." />
			    <input type=hidden id=assOrigAmnt".$row2[0]." value=".$row2[5]." /></td>";
	                echo "</tr>";
			
			$sqlInN = "INSERT INTO tblnextAssessment (fldTransactionNo,fldEnrollmentNo,fldStudentNo,fldAssessmentName,
			fldOriginalAmount,fldOriginalBalance,fldAssessmentAmount,fldAdvancedPayment,fldAssessmentNo)
			VALUES ('$transNo','$enrollNo','$studentNo','$assName',$assOrigAmnt,$assOrigBal,$assAmount,$assAdvance,$assNo + 1)";
			mysql_query($sqlInN, $con);
			$notFound = false;
		    }
		    if($notFound){
			echo "<tr><td>No assessment found!!!!</td></tr>";
		    }
		    
		    
	            //close connection
	            $this->closeCon();
        }

        //SET MODE OF PAYMENT
        function p_setModePayment($enrollmentNo,$studentNo){
            $sql = "SELECT fldModeOfPayment FROM tblassissment WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNum = '$studentNo' limit 0,1";
            $result = mysql_query($sql, $this->openCon());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
        
	//SETUP CURRENT ASSESSMENT AND NEXT ASSESSMENT
	function p_setupCurNextAss($enrollmentNo, $studentNo, $curAssNo, $nextAssNo, $assName, $origBal, $assAmount, $assAdvance, $assBalance){
	    $con = $this->openCon();
	    $sqlUAs = "UPDATE tblallassessment SET fldOriginalBalance = $origBal, fldAdvancedPayment = $assAdvance
		WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo' AND fldAssessmentName = '$assName' AND fldAssessmentNo = $curAssNo";
	    mysql_query($sqlUAs, $con);
	    
	    $sqlUNA = "UPDATE tblnextassessment SET fldOriginalBalance = $origBal, fldAssessmentAmount = $assAmount, fldAdvancedPayment = 0
		WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo' AND fldAssessmentName = '$assName' AND fldAssessmentNo = $nextAssNo";
	    mysql_query($sqlUNA, $this->openCon());
	}

	//DONE PAYMENT OF ASSESSMENT
	function p_doneAssPayment($transactionNo, $enrollmentNo, $studentNo, $totalCP, $amountT, $curAssNo, $today){
		$con = $this->openCon();
		$type = "Cash";

		$sqlSCA = "SELECT fldAssessmentName, fldOriginalAmount, fldOriginalBalance FROM tblallAssessment
		WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo' AND fldAssessmentNo = $curAssNo";
		$res = mysql_query($sqlSCA, $con);
		while($row1 = mysql_fetch_array($res)){
			$assPaid = $row1[1] - $row1[2];
			$assName = $row1[0];$assOrigAmount = $row1[1];$assOrigBal = $row1[2];
			//echo $assName."-assessment paid ".$assPaid ."- assOrigBal";

			$sqlUA = "UPDATE tblassissment SET fldAssessmentPaid = $assPaid, fldBalance = $assOrigBal, 
			fldAssessmentCounter = $curAssNo WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNum = '$studentNo' 
			AND fldAssessmentName = '$assName' ";
			//echo $sqlUA;
			mysql_query($sqlUA, $con);

		}

		$sqlIPCF = "INSERT INTO tblpaymentCashFlow (fldTransactionNo, fldStudentNum, fldDate, 
		fldTotalAmount, fldAmountTendered, fldType) VALUES ('$transactionNo', '$studentNo', '$today', $totalCP, $amountT,
		'$type')";
		mysql_query($sqlIPCF, $con);

		$nAN = $curAssNo + 1;
		$sqlDel = "DELETE FROM tblnextAssessment WHERE fldEnrollmentNo = '$enrollmentNo'
		AND fldStudentNo = '$studentNo' AND fldAssessmentNo != $nAN";
		echo $sqlDel;
		mysql_query($sqlDel, $con);
	}

	function p_inToPBdown($transactionNo, $enrollmentNo, $studentNo, $assName, $amountP){
		$sqlIPB = "INSERT INTO tblpaymentBreakdown (fldTransactionNo, fldStudentNum, fldFeeName, fldAmountPaid) 
			VALUES ('$transactionNo','$studentNo', '$assName', $amountP)";
			//echo $sqlIPB;
			mysql_query($sqlIPB, $this->openCon());
	}

	//CANCEL CURRENT ASSESSMENT
	function p_cancelAssPayment($enrollmentNo, $studentNo, $curAssNo, $nextAssNo){
	    $sqlDCA = "DELETE FROM tblallAssessment WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo'
		AND fldAssessmentNo = $curAssNo";
	    mysql_query($sqlDCA, $this->openCon());
	    
	    $sqlDNA = "DELETE FROM tblnextAssessment WHERE fldEnrollmentNo = '$enrollmentNo' AND fldStudentNo = '$studentNo'
		AND fldAssessmentNo = $nextAssNo";
	    mysql_query($sqlDNA,$this->openCon());
	}
     }
?>
