$(document).ready(function(){
    $('#btn_p_search_stud').removeAttr('disabled');
    $('#btn_del_AS').click(function(){
	$.ajax({
	   type: 'POST',
	   url: 'process/delAS.php',
	   success: function(data){
		//alert(data);
	   },
	   error: function(data){
		alert("error in deleting =>" +data);
	   }
	});
    });
    //delete from table assessment
    /*$.ajax({
        type: 'POST',
        url: 'process/p_deleteDNAss.php',
        success: function(data){
            //alert(data);
        },
        error: function(data){
            alert('error in deleting data from tblnextAssessment =>'+data);
        }
    });*/
    //SEARCH STUDENT FOR ASSESSMENT
    $('#btn_p_search_stud').click(function(){
        searchStudent();
        $(this).attr('disabled', 'disabled');
    });
    $('#btn_ass_payment_cancel').click(function(){
	cancelAssPayment();
    });
    
});

//=================================================F U N C T I O N S====================================================//
//GET STUDENT ID
function getStudentId(){
    return $('#p_student_search').val();
}
function getEnrollmentNo(){
    return $('#enrollment_no').val();
}
//SEARCH STUDENT
function searchStudent(){
    var studentId = getStudentId();
    
    var obj = {"studentId": studentId};
    $.ajax({
        type: 'POST',
        url: 'process/p_searchStudent.php',
        data: obj,
        success: function(data){
            if(data==="notEnrolled"){
                alert("This student id is not enrolled.");
		$('#btn_p_search_stud').removeAttr('disabled');
                $('#tbody_for_tbl_assessment').html("<tr id='noAss'><td colspan=5>No assessment found!!!!</td></tr>");
            }else{
                var objStudData = JSON.parse(data);
                var studentId = objStudData.studentNo;
                var studentName = objStudData.studentName;
                var enrollmentNo = objStudData.enrollmentNo;
                var gradeYearLevel = objStudData.gradeYearLevel;
                document.getElementById('student_id').value=studentId;
                document.getElementById('student_name').value=studentName;
                document.getElementById('enrollment_no').value=enrollmentNo;
                document.getElementById('grade_year_level').value=gradeYearLevel;

                var obj2 = {"enrollmentNo": enrollmentNo,"studentNo": studentId};

                $.ajax({
                    type: 'POST',
                    url: 'process/p_getCurrentAssessment.php',
                    data: obj2,
                    success: function(data){
			//console.log(data);
                        document.getElementById('tbody_for_tbl_assessment').innerHTML=data;
                        //SET MODE OF PAYMENT
                        $.ajax({
                            type: 'POST',
                            url: 'process/p_setModePayment.php',
                            data: obj2,
                            success: function(data){
                                document.getElementById('mode_of_payment').innerHTML=data;
                                var assNo = document.getElementById('assNum').value;
                                document.getElementById('assessment_no').innerHTML= assNo;
                            },
                            error: function(data){
                                alert("error in setting mode of payment =>"+data);
                            }
                        });

                    },
                    error: function(data){
                        alert("error in getting current assessment =>"+data);
                    }
                });

            }
        },
        error: function(data){
            alert('error in searching student for assessment ->'+data);
        }
    });
}

//COMPUTE CURRENT PAYMENT
function computeTotalCPayment(id){
    var regexNum = /^[0-9\.]$/;
    var inputCPayment = $('#c_payment'+id).val();
    var inputCPaymentLength = inputCPayment.length;
    var lastInput = inputCPayment.substring(inputCPaymentLength-1,inputCPaymentLength);
    //
    
    if(!regexNum.test(lastInput)){
        var resP = inputCPayment.substring(0,inputCPaymentLength-1);
        $('#c_payment'+id).val(resP);
    }
    
    var enrollmentNo = $('#enrollment_no').val();
    var studentNo = $('#student_id').val();
    var assAdvance = 0;
    var totalCurrentP = parseFloat($('#t_current_pymnt').val());
    var chckTC = $('#t_current_pymnt').val();
    var assBalance = 0;
    var assHalfP = 0;
    var assessmentNo = $('#assessment_no').html();
    var nextAssNo = parseFloat($('#assessment_no').html()) + 1;
    var assOrigBal = parseFloat($('#assOrigBal'+id).val());
    var assOrigAmnt = parseFloat($('#assOrigAmnt'+id).val());
    var assAmount = parseFloat($('#assAmnt'+id).html());
    var amntPerAss = parseFloat($('#amntPerAss'+id).val());
    var assCPayment = parseFloat($('#c_payment'+id).val());
    var assName = $('#assName'+id).html();
    var chkCP = $('#c_payment'+id).val();
    //var chkOA = $('#assOrigAmnt'+id).val();
    if( chkCP === NaN  || chkCP === "" || chkCP === null ){
        assCPayment = 0;
    }
    if (chckTC === NaN || chckTC === "" || chckTC === null) {
	totalCurrentP = 0;
    }
    if (assCPayment > assOrigBal) {
	alert("not valid amount..current paymnt should not exceed from the original balance : "+assOrigBal);
	assCPayment = inputCPayment.substring(0, inputCPaymentLength - 1);
	$('#c_payment'+id).val(assCPayment);
	assAdvance = assCPayment - assAmount;
	assOrigBal = assOrigAmnt - assCPayment;
	assHalfP = assAmount * .5;
	if (assAdvance >= assAmount || assAdvance > assHalfP) {
	    assAmount = assAmount;
	}
	if (assOrigBal < assAmount) {
	    assAmount = assOrigBal;
	}
    }else{
	assBalance = assAmount - assCPayment;
	assOrigBal = assOrigBal - assCPayment;
	if (assAmount <= assCPayment) {
	    assBalance = 0;
	    assAdvance = assCPayment - assAmount;
	    assHalfP = assAmount * .5;
	    if (assAdvance >= assAmount || assAdvance > assHalfP) {
		assAmount = assAmount;
	    }else{
		assAmount = assAmount - assAdvance;
	    }
	    
	    if (assOrigBal < assAmount) {
		assAmount = assOrigBal;
	    }
	}else{
	    assBalance = assBalance;
	}
	//if (test) {
	    
	//}
    }
    //Note://unfinished computation
    //alert(totalCurrentP +"-." +assCPayment)
    //edit the assBal ,original bal, advance of the current payment
    //edit the assBal, assessmentAmount, original balance of the next assessment
    var obj = {"enrollmentNo": enrollmentNo, "studentNo": studentNo, "curAssNo": assessmentNo, "nextAssNo": nextAssNo,
		"assName": assName,"origBal": assOrigBal, "assAmount": assAmount, "assAdvance": assAdvance, "assBalance": assBalance};
		
    $.ajax({
	type: 'POST',
	url: 'process/p_setupCurNextAss.php',
	data: obj,
	success: function(data){
	    alert(data);
	},
	error: function(data){
	    alert("error in setupCurNextAss => "+data);
	}
    });
    /*Note:
     *1.finish the computation of the total current payment
     *2.get the temporary total amount of the current assessment
     *3.Compute the amount tender
     */
    totalCurrentP = totalCurrentP + assCPayment;
    $('#t_current_pymnt').val(totalCurrentP);
    $('#assBalance'+id).html(assBalance);
    $('#advanceP'+id).html(assAdvance);
    console.log("assOriginal amnt:"+assOrigAmnt +" assOrigBal:"+assOrigBal +" assessment name: "+assName+" assAmount :"+assAmount +
		" CURRENT PAYMENT :" +assCPayment +" assessment Balance: "+assBalance +" assessment Advance: "+assAdvance
		);
    
   console.log("balance.."+assBalance);
}

function cancelAssPayment() {
    var curAssNo = $('#assessment_no').html();
    var nextAssNo = parseFloat($('#assessment_no').html()) + 1;
    var enrollmentNo = $('#enrollment_no').val();
    var studentNo = $('#student_id').val();
    var obj = {"enrollmentNo": enrollmentNo, "studentNo": studentNo, "curAssNo" : curAssNo, "nextAssNo": nextAssNo};
    $.ajax({
	type: 'POST',
	url: 'process/p_cancelAssPayment.php',
	data: obj,
	success: function(data){
	    $('#p_student_search').val("");
	    searchStudent();
	    $('#btn_p_search_stud').removeAttr('disabled');
	    $('#assessment_no').html("");
	    $('#mode_of_payment').html("");
	    console.log(data+" from p_canelAssPayment.php");
	},
	error: function(data){
	    console.log("error in cancelAssPayment.php =>"+data);
	}
    });
}
