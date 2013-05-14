$(document).ready(function(){
    $('#btn_ass_payment_done').removeAttr('disabled');
    $('#btn_ass_payment_cancel').removeAttr('disabled');
    $('#btn_new_AS').attr('disabled','disabled');
    $('#btn_p_search_stud').removeAttr('disabled');
    $('#btn_new_AS').click(function(){
	   newPaymentAss();
    });
    setTransactionNo();
    //SEARCH STUDENT FOR ASSESSMENT
    $('#amount_ten').keyup(function(){
    computeChange(); 
    });
    $('#btn_p_search_stud').click(function(){
        searchStudent();
        $(this).attr('disabled', 'disabled');
    });

    //done payment of assessment
    $('#btn_ass_payment_done').click(function(){
        var cf = confirm("Finish this assessment...\n\nAre you sure?");
        if(cf){
            doneAssPayment();
        }
        
    });

    $('#btn_ass_payment_cancel').click(function(){
	cancelAssPayment();
    });
    
});

//=================================================F U N C T I O N S====================================================//
//SET TRANSACTION NO
function setTransactionNo(){
    var year = new Date;
    var curYear = year.getFullYear();
    var nextYear = curYear + 1;
    var tnformat = "TN-"+curYear+"-"+nextYear+"-";
    $.ajax({
        type: 'POST',
        url: 'process/p_setTransaction.php',
        success: function(data){
            $('#transactionNo').val(tnformat+data);
        },
        error: function(data){
            console.log("error in p_setTransactionNo.php => "+data);
        }
    });
}
//GET TRANSACTION NO
function getTransactionNo(){
    return $('#transactionNo').val();
}
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
                //alert("This student id is not enrolled.");
		        $('#btn_p_search_stud').removeAttr('disabled');
                $('#tbody_for_tbl_assessment').html("<tr id='noAss'><td colspan=5>No assessment found!!!!</td></tr>");
                $('#t_amount_ass').val(0);
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
                        var tbody = document.getElementById('tbody_for_tbl_assessment');
                            var tr = tbody.getElementsByTagName('tr');
                            var totalAssAmnt = 0;
                            for(var ctr = 0; ctr<tr.length;ctr++){
                                var tdVal = tr[ctr].getElementsByTagName('td')[1].getElementsByTagName('span')[0].innerHTML;
                                var tp = parseFloat(tdVal);
                                totalAssAmnt = totalAssAmnt + tp;
                            }
                            $('#t_amount_ass').val(totalAssAmnt);
                            console.log(totalAssAmnt);

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
    }
    var obj = {"enrollmentNo": enrollmentNo, "studentNo": studentNo, "curAssNo": assessmentNo, "nextAssNo": nextAssNo,
		"assName": assName,"origBal": assOrigBal, "assAmount": assAmount, "assAdvance": assAdvance, "assBalance": assBalance};
		
    $.ajax({
	type: 'POST',
	url: 'process/p_setupCurNextAss.php',
	data: obj,
	success: function(data){
	    //lert(data);
	},
	error: function(data){
	    alert("error in setupCurNextAss => "+data);
	}
    });
    var tbody = document.getElementById('tbody_for_tbl_assessment');
    var tr = tbody.getElementsByTagName('tr');
    var totalCP = 0;
    for(var ctr = 0; ctr<tr.length;ctr++){
        var tdIn = tr[ctr].getElementsByTagName('td')[3].getElementsByTagName('input')[0].value;
            if(tdIn === NaN || tdIn === "" || tdIn === null){
                tdIn = 0;
            }
        var cp = parseFloat(tdIn);
        totalCP = totalCP + cp;
    }
    console.log(totalCP);
    $('#t_current_pymnt').val(totalCP);
    
    $('#assBalance'+id).html(assBalance);
    $('#advanceP'+id).html(assAdvance);
    console.log("assOriginal amnt:"+assOrigAmnt +" assOrigBal:"+assOrigBal +" assessment name: "+assName+" assAmount :"+assAmount +
		" CURRENT PAYMENT :" +assCPayment +" assessment Balance: "+assBalance +" assessment Advance: "+assAdvance
		);
    
   console.log("balance.."+assBalance);
}

//COMPUTE THE CHANGE
function computeChange(){
    var change = 0;
    var ad = $('#amount_ten').val();
    if(ad === NaN || ad === "" || ad === null){
        ad = 0;
    }
    var amntTend = parseFloat(ad);
    var tCP = parseFloat($('#t_current_pymnt').val());
    if(amntTend >= tCP){
        change = amntTend - tCP;
    }else{
        change = 0;
    }
    $('#change').val(parseFloat(change));
}

//DONE PAYMENT OF ASSESSMENT
function doneAssPayment(){
    var d = new Date;
    var today = d.getMonth() +"/"+d.getDate()+"/"+d.getFullYear();
    var transactionNo = getTransactionNo();
    var enrollmentNo = getEnrollmentNo();
    var studentNo = getStudentId();
    var totalCP = $('#t_current_pymnt').val();
    var amountT = $('#amount_ten').val();
    var curAssNo = $('#assessment_no').html();
    if(transactionNo === "" || transactionNo === null || enrollmentNo === "" || enrollmentNo === null
    || studentNo === "" || studentNo === null){
        alert("OPZ!!!INVALID ASSESSMENT...");
    }else if(parseFloat(amountT) < parseFloat(curAssNo)){
        alert("The system found out that the amount tendered is less than the total curent payment!! Change the amount tendered!!");
    }else{
        var obj = {"transactionNo": transactionNo, "enrollmentNo": enrollmentNo, "studentNo": studentNo, 
        "totalCP": totalCP, "amountT": amountT, "curAssNo": curAssNo, "today": today};
        $.ajax({
            type: 'POST',
            url: 'process/p_doneAssPayment.php',
            data: obj,
            success: function(data){
                console.log("from p_doneAssPayment.php "+data);
            },
            error: function(data){
                console.log("error in p_doneAssPayment.php => "+data);
            }
        });

        var tbody = document.getElementById('tbody_for_tbl_assessment');
        var tr = tbody.getElementsByTagName('tr');
        for(var ctr=0;ctr<tr.length;ctr++){
            var assName = tr[ctr].getElementsByTagName('td')[0].getElementsByTagName('span')[0].innerHTML;
            var amountP = tr[ctr].getElementsByTagName('td')[3].getElementsByTagName('input')[0].value;
            if(amountP === NaN || amountP === "" || amountP === null){
                amountP = 0;
            }
            //console.log(amountP);
            var obj = {"transactionNo": transactionNo, "enrollmentNo": enrollmentNo, "studentNo": studentNo, "assName": assName, "amountP" : amountP};
            $.ajax({
                type: 'POST',
                url: 'process/p_inToPBdown.php',
                data: obj,
                success: function(data){
                    console.log("from p_inToPBdown.php "+data);
                },
                error: function(data){
                    console.log("error in p_inToPBdown.php");
                }
            });
            $('#btn_ass_payment_cancel').attr('disabled','disabled');
            $('#btn_new_AS').removeAttr('disabled');
            $('#btn_ass_payment_done').attr('disabled','disabled');
            //$('#p_student_search').val("");
            //$('#student_id').val("");
           // $('#student_name').val("");
            //$('#enrollment_no').val("");
            //$('#grade_year_level').val("");
            //$('#assessment_no').html("");
           // $('#mode_of_payment').val("");
            //$('#t_amount_ass').val("");
            //$('#t_current_pymnt').val("");
            //$('#amount_ten').val("");
            //$('#change').val("");
        }
    }
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
	    //searchStudent();
        resetData();
	    $('#btn_p_search_stud').removeAttr('disabled');
	    $('#assessment_no').html("");
	    $('#mode_of_payment').html("");
	    console.log(data+" from p_canelAssPayment.php");
        resetData();
	},
	error: function(data){
	    console.log("error in cancelAssPayment.php =>"+data);
	}
    });
    $('#btn_new_AS').attr('disabled','disabled');
}

function resetData(){
    $('#p_student_searc').val("");
    $('#student_id').val("");
    $('#student_name').val("");
    $('#enrollment_no').val("");
    $('#grade_year_level').val("");
    $('#assessment_no').html("");
    $('#mode_of_payment').val("");
    $('#t_amount_ass').val("");
    $('#t_current_pymnt').val("");
    $('#amount_ten').val("");
    $('#change').val("");
    $('#tbody_for_tbl_assessment').html("");
     //searchStudent();
}
//NEW PAYMENT ASSESSMENT
function newPaymentAss(){
    //searchStudent();
    $('#p_student_search').val("");
    resetData();
    $('#btn_new_AS').attr('disabled','disabled');
    $('#btn_p_search_stud').removeAttr('disabled');
    $('#btn_ass_payment_done').removeAttr('disabled');
    $('#btn_ass_payment_cancel').removeAttr('disabled');
}
