$(document).ready(function(){
    $('#btn_p_search_stud').removeAttr('disabled');
    //delete from table assessment
    $.ajax({
        type: 'POST',
        url: 'process/p_deleteDNAss.php',
        success: function(data){
            //alert(data);
        },
        error: function(data){
            alert('error in deleting data from tblnextAssessment =>'+data);
        }
    });
    //SEARCH STUDENT FOR ASSESSMENT
    $('#btn_p_search_stud').click(function(){
        searchStudent();
        $(this).attr('disabled', 'disabled');
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
    var assBalance = 0;
    var assAdvance = 0;
    var totalCurrentP = 0;
    
    //alert("lastInput--"+lastInput);
    
    if(!regexNum.test(lastInput)){
        var resP = inputCPayment.substring(0,inputCPaymentLength-1);
        $('#c_payment'+id).val(resP);
    }
    var assessmentNo = $('#assessment_no').html();
    
    var assAmount = parseFloat($('#assAmnt'+id).html());
    var assCPayment = parseFloat($('#c_payment'+id).val());
    var assName = $('#assName'+id).html();
    var assOrigAmnt = parseFloat($('#assOrigAmnt'+id).val());
    var chkCP = $('#c_payment'+id).val();
    //var chkOA = $('#assOrigAmnt'+id).val();
    if( chkCP === NaN  || chkCP === "" || chkCP === null ){
        assCPayment = 0;
    }
    //if( chkOA === NaN || chkOA === "" || chkOA === null){
        //assOrigAmnt = 0;
    //}
    //
    //alert(assCPayment)
    if(assCPayment <= assAmount){//NO ADVANCE PAYMENT || HAS A BALANCE
    	assBalance = (assAmount - assCPayment);
    	$('#assBalance'+id).html(assBalance);
    	$('#advanceP'+id).html(assAdvance);
    	//
    	var balance = ($('#assBalance'+id).html());
        if(balance === "" || balance === null || balance === "NaN"){
            balance = 0;
        }
    	var objNA = {"enrollmentNo": getEnrollmentNo(), "studentNo": getStudentId(), "autoId": id,
    	"assName": assName,"assessmentNo": assessmentNo, "balance": parseFloat(balance), "assOrigAmnt": assOrigAmnt, "assCPayment": assCPayment};
    	$.ajax({
    		type: 'POST',
    		url: 'process/p_noadvanceAss.php',
    		data: objNA,
    		success: function(data){
    			console.log(data);
    		},
    		error: function(data){
    			alert("error in processing assessment NA =>"+data);
    		}
    	});
    	
    	
    }else if(assCPayment > assAmount){//IT HAS ADVANCE PAYMENT
    	assBalance = 0;
    	assAdvance = assCPayment - assAmount;
    	$('#advanceP'+id).html(assAdvance);
    	$('#assBalance'+id).html(assBalance);
        //maybe there is a problem in changing advance payment..
        alert(assAdvance);
        var objHA = {"enrollmentNo": getEnrollmentNo(), "studentNo": getStudentId(), "autoId": id,
            "assName": assName, "assessmentNo": assessmentNo, "assBalance": assBalance, "assAdvance": assAdvance, "assOrigAmnt": assOrigAmnt, "assCPayment" : assCPayment};

        $.ajax({
           type: 'POST',
            url: 'process/p_hasadvance.php',
            data: objHA,
            success: function(data){
                alert(data);
            },
            error: function(data){
                alert("error in processing assessment HA =>"+data);
            }
        });
    }
    /*
    	NOTE: select the next payment
    */
    //unfinished ..i'll be right back here..
    
   console.log("balance.."+assBalance);
    
    
}
