/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    //$('#label_change_pic').removeClass('label_change_pic');
    $('.div-image').html("<img src=upload_pic/default-user-image.jpg />");
    $('#grade').attr('disabled','disabled');
    $('#yrLevel').attr('disabled','disabled');

    $('input[name=radioDepartment]:checked').removeAttr('checked');

    //======================end showing div-please-select,div-for-full======================//

    //=============disabling buttons,textboxes,divs,etc.. while opening the form============//
    //$('#btn-done-assmnts').attr('disabled','disabled');
    disabledBT();
    $('#btn-done-assmnt').attr('disabled','disabled');
    //============end disabling buttons,textboxes,divs,etc.. while opening the form=========//
    
    //=============enabling buttons, textboxes,divs,etc.. while opening the form============//
    setEnabledBT();
    $('#btn-sub-next').removeAttr('disabled');
    $('#btn-sub-back').removeAttr('disabled');
    //===========end enabling buttons, textboxes,divs,etc.. while opening the form==========//
    
    //================================setting the current date==============================//
    var today = new Date();
    var dateNow = today.getDate();
    var month = today.getMonth();
    var year = today.getFullYear();
    $('#span-date').html((month+1)+"/"+dateNow+"/"+year);
    setInterval(function(){
        refreshTime();
    },1000);
    //================================end setting the current date=========================//
    
    //===========calling the functions setEnrollmentNo() and setTransactionNo==============//
    setEnrollmentNo();
    setTransactionNo();
    
    //===================================search student====================================//
    $('#btn-search-stud').click(function(){
        var studentId = document.getElementById('searchStudId').value;
        //
        deleteCurrentMSAssessment();//delete current MS assessment
        deleteCurrentMSPayment();//delete current ms payment
        //
        searchStudent(studentId);
        setEnabledBT();
        $('input[name=radioPaymnt]:checked').removeAttr('checked');
        $('#radioFullPaymnt').attr('disabled','disabled');
        $('#radioSemestralPaymnt').attr('disabled','disabled');
        $('#radioMonthlyPaymnt').attr('disabled','disabled');
        
        hideSubjectsForm();
        hideFullPaymentFormTF();
        hideMSPaymentFormTF();
        
        //unfinished..the text will not enabled
        
    });
    //==================================end search student=================================//

    //change profile picture//
    $('#label_change_pic').click(function(){
        if(getStudentId() === "" || getStudentId() === null){
            //alert("hi");
        }else{
            $('.div-overlay-upload-wrapp').show();
        }
    });
    $('#photo_upload').live('change', function(){
        alert("hiihihdfdfdfd");
        $('#form_upload_pic').vPB({
            url: 'process/file_upload.php',
            beforeSubmit: function()
            {
                $('#photo_upload_status').show();
                $('#photo_upload_status').html('');
                $('#photo_upload_status').html('<div style="font-family: Verdana, Geneva, sans-serif; font-size:12px; color:black;" align="center">Upload <img src="images/loadings.gif" align="absmiddle" alt="Upload...." title="Upload...."/></div><br clear="all">');
            },
            success:function(response)
            {
                $('#photo_upload_status').hide().fadeIn('slow').html(response);
                console.log(response);
                setProfilePic();
                $('.div-overlay-upload-wrapp').hide().fadeOut('slow');
            }
        }).submit();
    });
    $('#close_upload').click(function(){
        $('.div-overlay-upload-wrapp').hide();
    });
    //end (change profile picture)//

    //===============================choose what department================================//
    $('#radioElemDept').click(function(){
        $('#grade').removeAttr('disabled');
        $('#yrLevel').attr('disabled','disabled');
        $('#btn-sub-fees').removeAttr('disabled');
        //
        deleteCurrentMSAssessment();//delete current MS assessment
        deleteCurrentMSPayment();//delete current ms payment
        //
        hideSubjectsForm();
        hideFullPaymentFormTF();
        hideMSPaymentFormTF();
        //
        disabledMode();
        $('#genAverage').removeAttr('disabled');
        $('#age').removeAttr('disabled');
        $('#syEntered').removeAttr('disabled');
    });
    $('#radioHighSchDept').click(function(){
        $('#yrLevel').removeAttr('disabled');
        $('#grade').attr('disabled','disabled');
        $('#btn-sub-fees').removeAttr('disabled');
        //
        deleteCurrentMSAssessment();//delete current MS assessment
        deleteCurrentMSPayment();//delete current ms payment
        //
        hideSubjectsForm();
        hideFullPaymentFormTF();
        hideMSPaymentFormTF();
        //
        
        disabledMode();
        $('#genAverage').removeAttr('disabled');
        $('#age').removeAttr('disabled');
        $('#syEntered').removeAttr('disabled');
        
    });
    //============================end choose what department===============================//

    //=================.keyup() (validate age,sch.year entered,gen.average)================//
    $('#age').keyup(function(){
        var age = $(this).val();
        specifyAge(age);
    });
    $('#syEntered').keyup(function(){
        var schYear = $(this).val();
        noSpacingOnSY(schYear);
    });
    $('#genAverage').keyup(function(){
        var genAverage = $(this).val();
        specifyAve(genAverage);
    });
    //===============end .keyup() (validate age,sch.year entered,gen.average)==============//
    
    //============================clicking the SUB./FEES button============================//
    $('#btn-sub-fees').click(function(){
        setFeesSubjects();
        $('input[name=radioPaymnt]:checked').removeAttr('checked');
    });
    //=========================end clicking the SUB./FEES button===========================//

    //===================radio button for mode of payment .click() event===================//
    
    $('#radioFullPaymnt').click(function(){
        deleteCurrentMSAssessment();//delete current MS assessment
        deleteCurrentMSPayment();//delete current ms payment
        hideMSPaymentFormTF();//HIDE MONTHLY PAYMENT FORM
        showFullPaymentFormTF();//SHOW FULL PAYMENT FORM
        showFeesForFullPymnt();
        hideSubjectsForm();//HIDE SUBJECTS FORM
    });
    $('#radioMonthlyPaymnt').click(function(){
        hideFullPaymentFormTF();//HIDEFULL PAYMENT FORM
        showMSPaymentFormTF();//SHOW MONTHLY PAYMENT FORM
        showFeesForMSPymnt();
        hideSubjectsForm();//HIDE SUBJECTS FORM
    });
    $('#radioSemestralPaymnt').click(function(){
        hideFullPaymentFormTF();//HIDEFULL PAYMENT FORM
        showMSPaymentFormTF();//SHOW MONTHLY PAYMENT FORM
        showFeesForMSPymnt();
        hideSubjectsForm();//HIDE SUBJECTS FORM
    });
    //==================end radio button for mode of payment .click() event=================//
    
    //==================validate cash amount and calculate the change=======================//
    $('#cashAmountF').keyup(function(){
        validateCashAmountF();
    });
    $('#cashAmount').keyup(function(){
        validateCashAmount();
    });
    //===============end validate cash amount and calculate the change======================//
    
    //btn-fee-full-back,btn-fee-full-next,btn-sub-back,btn-sub-next//
    $('#btn-fee-full-back').click(function(){
        $('input[name=radioPaymnt]:checked').removeAttr('checked');
        hideFullPaymentFormTF();
    });
    $('#btn-fee-full-next').click(function(){
        $('#dialog-confirm').dialog({
            resizable: false,
            height: 140,
            modal: true,
            position: [290,200],
            buttons:{
                "Proceed to subjects":function(){
                    saveDataFullPayment();
                    $('#btn-sub-next').removeAttr('disabled');
                    $('#btn-sub-back').removeAttr('disabled');
                    $(this).dialog("close");
                },
                 Cancel: function(){
                    $(this).dialog("close");
                 }
            }
        });
    });
    $('#btn-fee-MS-back').click(function(){
        clearFPTotalAmount();
        clearFPCPayment();
        $('input[name=radioPaymnt]:checked').removeAttr('checked');
        deleteCurrentMSAssessment();
        deleteCurrentMSPayment();
        $('#cashAmount').removeAttr('readonly ');
        hideMSPaymentFormTF();
        hideFullPaymentFormTF();
    });
    $('#btn-fee-MS-next').click(function(){
        //hidePartialPaymentFormTF();
        //showSubjectsForm();
        $('#dialog-confirm').dialog({
           resizable: false,
           height: 140,
           modal: true,
           position: [240,200],
           buttons:{
               "Proceed to subjects?":function(){
                   paymentMSProcess();
                   $(this).dialog("close");
               },
               Cancel: function(){
                   $(this).dialog("close");
               }
           }
        });
        
    });
    $('#btn-sub-back').click(function(){
        var paymentFormShowed = $('input[name=radioPaymnt]:checked').val();
        if(paymentFormShowed==="Full"){
            hideSubjectsForm();
            showFullPaymentFormTF();
            deleteCurrentFullPayment();
            deleteTemporySubjects();
            delPCG_PB();
        }else if(paymentFormShowed==="Monthly" || paymentFormShowed==="Semestral"){
            deleteTemporySubjects();
            deleteCurrentMSPayment();
            hideSubjectsForm();
            showMSPaymentFormTF();
        }
        
    });
    $('#btn-sub-next').click(function(){
        $(this).attr('disabled','disabled');
        
        var paymentFormShowed = $('input[name=radioPaymnt]:checked').val();
        if(paymentFormShowed==="Full"){
            $('#btn-sub-back').attr('disabled','disabled');
            $('#btn-done-assmnt').removeAttr('disabled');
            $('#btn-cancel-assmnt').removeAttr('disabled');
            
            saveSubjectsByYearLevel();
            
        }else if(paymentFormShowed==="Monthly" || paymentFormShowed==="Semestral"){
            $('#btn-sub-back').attr('disabled','disabled');
            $('#btn-done-assmnt').removeAttr('disabled');
            $('#btn-cancel-assmnt').removeAttr('disabled');
            saveSubjectsByYearLevel();
            
        }
        
        
    });
    //end btn-fee-full-back,btn-fee-full-next//
    
    //btn-done-assmnt,btn-cancel-assmnt,btn-reset-all-assmnt//
    $('#btn-done-assmnt').click(function(){
        var modeOfPayment = $('input[name=radioPaymnt]:checked').val();
        if(modeOfPayment==="Full"){
            doneAssessmentModeFP();
        }else if(modeOfPayment==="Monthly" || modeOfPayment==="Semestral"){
            doneMSAssesssment();
        }
        //$('#btn-cancel-assmnt').attr('disabled','disabled');
    });
    $('#btn-cancel-assmnt').click(function(){
        var paymentFormShowed = $('input[name=radioPaymnt]:checked').val();
        if(paymentFormShowed==="Full"){
            $('#dialog-cancel-ass').dialog({
                resizable: false,
                height: 140,
                modal: true,
                position: [290,200],
                buttons: {
                    "Yes": function(){
                        hideSubjectsForm();
                        deleteCurrentFullPayment();
                        deleteTemporySubjects();
                        hidePleaseSelect();
                        showFullPaymentFormTF();
                        $('#btn-sub-back').removeAttr('disabled');
                        $('#btn-sub-next').removeAttr('disabled');
                        $(this).dialog("close");
                    },
                    "No": function(){
                        $(this).dialog("close");
                    }
                }
            });
        }else if(paymentFormShowed==="Monthly" || paymentFormShowed==="Semestral"){
            
            $('#dialog-cancel-ass').dialog({
                resizable: false,
                height: 140,
                modal: true,
                position: [240,230],
                buttons: {
                    "Yes": function(){
                        deleteTemporySubjects();
                        deleteCurrentMSAssessment();
                        deleteCurrentMSPayment();
                        hideSubjectsForm();
                        hideFullPaymentFormTF();
                        hideMSPaymentFormTF();
                        cancelMSAssessment();
                        $(this).dialog("close");
                    },
                    "No": function(){
                        $(this).dialog("close");
                    }
                }
            });
        }
    });
    
    $('#btn-reset-all-assmnt').click(function(){
        var conF = confirm("Reset all assessment data?");
        if(conF){
            resetAllAssessment();
            renewAllData();
            alert("MySQL returned an empty result set (i.e. zero rows).Succesfully reset!");
        }else{
            alert("wa na reset");
        }
        
    });
    //end btn-done-assmnt,btn-cancel-assmnt,btn-reset-all-assmnt//
    
});

//=====================================F U N C T I O N S===================================//
//ENABLED BUTTONS,TEXTBOX
function setEnabledBT(){
    $('#age').removeAttr('readonly');
    $('#syEntered').removeAttr('readonly');
    $('#yrLevel').removeAttr('readonly');
    $('#genAverage').removeAttr('readonly');
    $('#btn-sub-fees').removeAttr('readonly');
    $('#btn-fee-full-back').removeAttr('disabled');
    $('#btn-fee-full-next').removeAttr('disabled');
    $('#btn-fee-MS-back').removeAttr('disabled');
    $('#btn-fee-MS-next').removeAttr('disabled');
}
//DISABLED BUTTONS,TEXTBOX
function disabledBT(){
    $('#btn-sub-fees').attr('disabled','disabled');
    $('#radioFullPaymnt').attr('disabled','disabled');
    $('#radioMonthlyPaymnt').attr('disabled','disabled');
    $('#radioSemestralPaymnt').attr('disabled','disabled');
}
function disabledMode(){
    $('#radioFullPaymnt').attr('disabled','disabled');
    $('#radioMonthlyPaymnt').attr('disabled','disabled');
    $('#radioSemestralPaymnt').attr('disabled','disabled');
}
function enabledMode(){
    $('#radioFullPaymnt').removeAttr('disabled');
    $('#radioMonthlyPaymnt').removeAttr('disabled');
    $('#radioSemestralPaymnt').removeAttr('disabled');
}

//SET TIME
function refreshTime(){
    var time= new Date();
    var hour = time.getHours();
    var minute = time.getMinutes();
    var second = time.getSeconds();
    $('#span-time').html(hour+":"+minute+":"+second);
}

//GET STUDENT ID,YEAR LEVEL,TRANSACTION NO.
function getStudentId(){
    var studentId = $('#studentId').html();
    return studentId;
}
function getCategory(){
    var category = $('#category').html();
    return category;
}
function getTransactionNo(){
    var transactionNo = $('#transactionNo').val();
    return transactionNo;
}
function getEnrollmentNo(){
    var enrollmentNo = $('#enrollmntId').val();
    return enrollmentNo;
}
//SEARCH STUDENTS
function searchStudent(studentId){
    $('#h_student_id').val(studentId);
    var obj = {'studentId':studentId};
    $.ajax({
        type: 'POST',
        url: 'process/searchStudent.php',
        data: obj,
        success: function(data){
            
            if(data==="not_reg"){
                $('.span-alert-msg').html("STUDENT ID YOU'VE ENTERED IS NOT REGISTERED!");
                $('#div-overlay-alert-msg').show();
            }else{
                $('#div-overlay-alert-msg').hide();
                $('#label_change_pic').addClass('label_change_pic');
                var objStudData = JSON.parse(data);

                var studentId = objStudData.studentId;
                var fName = objStudData.firstname;
                var mName = objStudData.middlename;
                var lName = objStudData.lastname;
                var balance = objStudData.balance;
                var profilepic = objStudData.profilepic;
                if(balance===0 || balance==="" || balance===null){
                    balance = 0;
                }
                var name = fName+" "+mName+" "+lName;
                $('#studentId').html(studentId);
                $('#studentName').html(name);
                $('#recentBal').val(balance);
                $('#btn-sub-fees').removeAttr('disabled');
                $('#h_student_id').val(studentId);
                if(profilepic === "" || profilepic === null){
                    $('.div-image').html("<img src=upload_pic/default-user-image.jpg />");
                }else{
                    $('.div-image').html("<img src=upload_pic/"+profilepic+ " />");
                }

                //create a function that will get only the profile pic of the student
            }
        },
        error: function(data){
            alert('error in searcing student ->'+data);
        }
    });
}

//SET PROFILE PICTURE
function setProfilePic(){
    var student_id = getStudentId();
    var obj = {"student_id":student_id};
    $.ajax({
        type: 'POST',
        data: obj,
        url: 'process/setProfilePic.php',
        success: function(data){
            console.log(data);
            var profilepic = data;
            if(profilepic === "" || profilepic === null){
                    $('.div-image').html("<img src=upload_pic/default-user-image.jpg />");
                }else{
                    $('.div-image').html("<img src=upload_pic/"+profilepic+ " />");
                }
        },
        error: function(data){
            console.log("error in setting profile pic -..-"+data);
        }
    });
}

//SET ENROLLMENT NO. ,TRANSACTION NO. AUTOMATICALLY
function setEnrollmentNo(){
    var date = new Date();
    var currYear = date.getFullYear();
    var nextYear = currYear + 1;
    $.ajax({
        type: 'POST',
        url: 'process/setEnrollmentNo.php',
        success: function(data){
            var enrollmentNo = "EN-"+currYear+"-"+nextYear+"-"+data;
            $('#enrollmntId').val(enrollmentNo);
        },
        error: function(data){
            console.log('error setting enrollment no->'+data);
        }
    });
}
function setTransactionNo(){
    var date = new Date();
    var currYear = date.getFullYear();
    var nextYear = currYear + 1;
    $.ajax({
        type: 'POST',
        url: 'process/setTransactionNo.php',
        success: function(data){
            var transactionNo = "TN-"+currYear+"-"+nextYear+"-"+data;
            $('#transactionNo').val(transactionNo);
        },
        error: function(data){
            console.log("error while setting transaction no. please check your code-->"+data);
        }
    });
}

//SET FEES AND SUBJECTS (SUB./FEES event .click)
function setFeesSubjects(){
    var schYear = $('#syEntered').val();
    var regexNoSpace = /^\d{0,4}(\-\d{0,4})?$/;
    var schYearLength = schYear.length;
    var lastSchYearInput = schYear.substring(schYearLength-1,schYearLength);
    
    if($('#studentId').html()==="" || $('#studentName').html()===""){
        $('.span-alert-msg').html("Enter student ID on the search textbox!");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
    }else if($('#age').val()===""){
        $('.span-alert-msg').html("Please enter age!");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
        $('#age').css({border: '1px solid red'});
        $('#syEntered').css({border: '1px solid #c0c0c0'});
        $('#genAverage').css({border: '1px solid #c0c0c0'});
    }else if(!regexNoSpace.test(lastSchYearInput) || $('#syEntered').val()===""){
        var resultSchYear = schYear.substring(0,schYearLength-1);
        $('#syEntered').val(resultSchYear);
        $('.span-alert-msg').html("Please enter school year correctly.");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
        $('#syEntered').css({border: '1px solid red'});
        $('#age').css({border: '1px solid #c0c0c0'});
        $('#genAverage').css({border: '1px solid #c0c0c0'});
    }else if($('#genAverage').val()===""){
        $('.span-alert-msg').html("Please enter gen average!");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
        $('#genAverage').css({border: '1px solid red'});
        $('#syEntered').css({border: '1px solid #c0c0c0'});
        $('#age').css({border: '1px solid #c0c0c0'});
    }else{
        $('#genAverage').css({border: '1px solid #c0c0c0'});
        $('#syEntered').css({border: '1px solid #c0c0c0'});
        $('#age').css({border: '1px solid #c0c0c0'});
        
        $('#radioFullPaymnt').removeAttr('disabled');
        $('#radioMonthlyPaymnt').removeAttr('disabled');
        $('#radioSemestralPaymnt').removeAttr('disabled');
        $('#age').attr('readonly','readonly');
        $('#syEntered').attr('readonly','readonly');
        $('#genAverage').attr('readonly','readonly');
        $('#yrLevel').attr('disabled','disabled');
        var category="";
        if($('input[name=radioDepartment]:checked').val()==="Elementary Dept."){
            category = $('#grade').val();
            enabledMode();
            $('#btn-sub-fees').attr('disabled','disabled');
        }else if($('input[name=radioDepartment]:checked').val()==="High School Dept."){
            category = $('#yrLevel').val();
            enabledMode();
            $('#btn-sub-fees').attr('disabled','disabled');
        }else{
            $('.span-alert-msg').html("Please choose what department!");
            $('#div-overlay-alert-msg').show().fadeIn(2000);
            $('#div-overlay-alert-msg').show().fadeOut(3000);
            disabledMode();
            $('#btn-sub-fees').removeAttr('disabled');
        }
        $('#category').html(category);
    }
}

//REGEX ONKEYUP(age,school-year,general average)
function specifyAge(age){
    var regexAge = /^[0-9]$/;
    var ageLength = age.length;
    var lastAgeInput = age.substring(ageLength-1,ageLength);
    if(!regexAge.test(lastAgeInput)){
        var resultAge = age.substring(0,ageLength-1);
        $('#age').val(resultAge);
        $('.span-alert-msg').html("Please enter age correctly.");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
    }
}
function noSpacingOnSY(schYear){
    var regexNoSpace = /^[0-9\-]$/;
    var schYearLength = schYear.length;
    var lastSchYearInput = schYear.substring(schYearLength-1,schYearLength);
    if(!regexNoSpace.test(lastSchYearInput)){
        var resultSchYear = schYear.substring(0,schYearLength-1);
        $('#syEntered').val(resultSchYear);
        $('.span-alert-msg').html("Please enter school year correctly.");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
    }
}
function specifyAve(genAverage){
    var regexAve = /^[0-9\.]$/;
    var genAverageLength = genAverage.length;
    var lastGenAveInput = genAverage.substring(genAverageLength-1,genAverageLength);
    if(!regexAve.test(lastGenAveInput)){
        var resultGenAve = genAverage.substring(0,genAverageLength-1);
        $('#genAverage').val(resultGenAve);
        $('.span-alert-msg').html("Opzz! For me, That kind of grade is not valid.Check it!");
        $('#div-overlay-alert-msg').show().fadeIn(2000);
        $('#div-overlay-alert-msg').show().fadeOut(3000);
    }
}

//SHOW AND HIDE TUITION FEES FORM [FULL PAYMENT] or [MONTHLY PAYMENT] and SUBJECTS
function showFullPaymentFormTF(){
    $('#div-for-full').show('blind',1000);
}
function showMSPaymentFormTF(){
    $('#div-for-MS').show('blind',1000);
}
function showSubjectsForm(){
    $('#div-for-subject').show('blind',1000);
}
function hideSubjectsForm(){
    $('#div-for-subject').hide('blind',1000);
}
function hideFullPaymentFormTF(){
    $('#div-for-full').hide('blind',1000);
}
function hideMSPaymentFormTF(){
    $('#div-for-MS').hide('blind',1000);
}


//CLEAR FULL PAYMENT TOTAL AMOUNT,MONTHLY PAYMENT TOTAL AMOUNT
function clearFPTotalAmount(){
    $('#totalAmountFull').val("");
}
function clearMSTotalAmount(){
    $('#totalAmountMS').val("");
}

//CLEAR FULL-CURRENT PAYMENT,MONTHLY-CURRENT PAYMENTD
function clearFPCPayment(){
    $('#cPaymentFull').val("");
}
function clearMSCPayment(){
    $('#cPaymentMS').val("");
}

//SHOW FEES IN FULL PAYMENT FORM//
function showFeesForFullPymnt(){
    var obj = {'category': getCategory()};
    $.ajax({
        type: 'POST',
        url: 'process/showFeesForFullPayment.php',
        data: obj,
        success: function(data){
                $('#tbody-for-full').html(data);
                var fp_data = $('#fp_null').val();
                if(fp_data==="null"){
                    $('#btn-fee-full-back').attr('disabled','disabled');
                    $('#btn-fee-full-next').attr('disabled','disabled');
                }else{
                    $('#btn-fee-full-back').removeAttr('disabled');
                    $('#btn-fee-full-next').removeAttr('disabled');
                }
        },
        error: function(data){
            alert('error in showing fees for full payment->'+data);
        }
    });
    getFeesTotalAmount(obj.category);
}
function getFeesTotalAmount(category){
    var obj = {'category':category};
    $.ajax({
        type: 'POST',
        url: 'process/getFeesTotalAmount.php',
        data: obj,
        success: function(data){
            $('#totalAmountFull').val(data);
            $('#cPaymentFull').val(data);
        },
        error: function(data){
            alert("error in getting the fees total amount for "+yearLevel+"->>"+data);
        }
    });
    //return data;
}

//SHOW SUBJECTS BY YEAR LEVEL//
function showSubjectsByYearLevel(){
    var obj = {"category": $('#category').html()};
    $.ajax({
       type: 'POST',
       url: 'process/showSubjectsByYearLevel.php',
       data: obj,
       success: function(data){
           $('#tbody-for-tbl-for-subject').html(data);
       },
       error: function(data){
           alert("error in showing subjects by year level-->"+data);
       }
    });
}

//SAVE SUBJECTS BY YEAR LEVEL
function saveSubjectsByYearLevel(){
   var obj = {"category": $('#category').html(),"enrollmentNo":$('#enrollmntId').val(),"studentId":getStudentId()};
   $.ajax({
      type: 'POST',
      url: 'process/saveSubjectsByYearLevel.php',
      data: obj,
      success: function(data){
          console.log(data);
      },
      error: function(data){
           alert('error in saving subjectrs by year level-->'+data);
      }
   });
}

//GETTING DATA FROM THE TABLE [FULL PAYMENT,MONTHLY PAYMENT]
function saveDataFullPayment(){
    var category = $('#category').html();
    var transactionNo = getTransactionNo();
    var enrollmentNo = getEnrollmentNo();
    var studentNo = getStudentId();
    var tAmount = parseFloat($('#cPaymentFull').val());
    var amountT = parseFloat($('#cashAmountF').val());
    var date = $('#span-date').html();
    var balance = 0;
        
         var obj = {"transactionNo": transactionNo,
                     "enrollmentNo":enrollmentNo,
                    "studentNum": studentNo,
                    "balance": balance,
                    "modePayment": ($('[name=radioPaymnt]:checked').val()),
                    "category":category,
                    "tAmount": tAmount,
                    "amountT": amountT,
                    "date": date
        };
        if(obj.amountT <=0 ){
            $('#warning-msg-F').html("It seems that you don't have a current payment to be paid!");
            $('#div-warning-msg-F').show('blind',500);
        }else if(obj.amountT < obj.tAmount){
            $('#warning-msg-F').html("Insuficient amount tendered!");
            $('#div-warning-msg-F').show('blind',500);
        }else if($('#cashAmountF').val() === "" || $('#cashAmountF').val() === null ){
            $('#warning-msg-F').html("Pay first!");
            $('#div-warning-msg-F').show('blind',500);
        }else{
            $('#div-warning-msg-F').hide('blind',500);
            $.ajax({
                   type: 'POST',
                   url: 'process/saveFeesFullPayment.php',
                   data: obj,
                   success: function(data){
                       console.log(data);
                       hideFullPaymentFormTF();
                       showSubjectsByYearLevel();
                       showSubjectsForm();
                   },
                   error: function(data){
                       alert("error in saving fees full payment ->"+data);
                   }
            });
        }
   // }
}

//DELETING CURRENT FULL PAYMENT AND MONTHLY PAYMENT BY PRESSING BACK[FULL/MONTHLY] BUTTON
function deleteCurrentFullPayment(){
    var enrollmentNo = getEnrollmentNo();
    var obj = {"enrollmentNo":enrollmentNo,"studentNum":getStudentId()};
    $.ajax({
       type: 'POST',
       url: 'process/deleteCurrentFullPayment.php',
       data: obj,
       success: function(data){
           console.log(data);
       },
       error: function(data){
            alert("error in deleting current full payment-->"+data);
       }
    });
}

function delPCG_PB(){
   var transactionNo = getTransactionNo();
   var studentNo = getStudentId();
   var obj = {"transactionNo": transactionNo,"studentNo": studentNo};
   $.ajax({
      type: 'POST',
      url: 'process/delPCG_PB.php',
      data: obj,
      success: function(data){
          console.log(data);
      },
      error: function(data){
          alert("error in deleting PCG and PB=>"+data);
      }
   });
}
//DELETING TEMPORARY SUBJECTS BY YEAR LEVEL BY PRESSING btn-cancel-assmnt and btn-sub-next
function deleteTemporySubjects(){
    var obj = {"enrollmentNo":$('#enrollmntId').val(),"studentNum": getStudentId()};
    $.ajax({
        type: 'POST',
        url: 'process/deleteTemporySubjects.php',
        data: obj,
        success: function(data){
            console.log(data);
        },
        error: function(data){
            alert("error in deleting temporary subjects=>"+data);
        }
    });
}

//===================================D O N E  A S S E S S M E N T=================================>//
function doneAssessmentModeFP(){
    var status = "enrolled";
    var transaction = getTransactionNo();
    var enrollmentNo = getEnrollmentNo();
    var studentNo = getStudentId();
    var name = $('#studentName').html();
    var department = $('input[name=radioDepartment]:checked').val();
    var age = $('#age').val();
    var schoolYear = $('#syEntered').val();
    var grade = $('#grade').val();
    var yrLevel = $('#yrLevel').val();
    var genAverage = $('#genAverage').val();
    
    var gy = "";
    $('#small-studNum').html(studentNo);
    $('#small-name').html(name);
    $('#small-department').html(department);
    $('#small-age').html(age);
    $('#small-schYear').html(schoolYear);
    if(department==="Elementary Dept."){
        $('#for-grade').show();
        $('#small-grade').show();
        $('#for-yearLevel').hide();
        $('#small-yrLevel').hide();
        $('#small-grade').html(grade);
        gy = $('#small-grade').html();
    }else if(department==="High School Dept."){
        $('#for-yearLevel').show();
        $('#small-yrLevel').show();
        $('#for-grade').hide();
        $('#small-grade').hide();
        $('#small-yrLevel').html(yrLevel);
        gy = $('#small-yrLevel').html();
    }
    $('#small-generalAve').html(genAverage);
    
    

    var obj = {"transactionNo": transaction,"enrollmentNo": enrollmentNo,"studentNum": studentNo,"schYear": schoolYear,"gy": gy,"status": status};

    $('#dialog-confirm-done-MS-assessment').dialog({
        resizable: false,
        modal: true,
        position: [240,230],
        buttons:{
            "Yes":function(){
                $.ajax({
                   type: 'POST',
                   url: 'process/doneAssessmentModeFP.php',
                   data: obj,
                   success: function(data){
                        renewAllData();
                   },
                   error: function(data){
                        alert("error in processing assessment=>"+data);
                   }
                });
                $(this).dialog("close");
            },
            "No":function(){
                $('#btn-cancel-assmnt').removeAttr('disabled');
                $(this).dialog("close");
            }
        }
    });
     
}

//===============================================MODE OF PAYMENT [MONTHLY]=============================================//
function showFeesForMSPymnt(){
    var category = $('#category').html();
    var studentId = getStudentId();
    var enrollNo = $('#enrollmntId').val();
    var transactionNo = getTransactionNo();
    var paymentMode = $('input[name=radioPaymnt]:checked').val();
    var obj;
    obj = {'category':category,'studentId':studentId,'enrollNo':enrollNo,'transactionNo':transactionNo,'paymentMode':paymentMode};
    $.ajax({
        type: 'POST',
        url: 'process/showFeesMonthlyPayment.php',
        data: obj,
        success: function(data){
            $('#tbody-for-fees-MS').html(data);
            
            var msfp_data = $('#msfp_null').val();
            if(msfp_data==="null"){
                $('#btn-fee-MS-back').attr('disabled','disabled');
                $('#btn-fee-MS-next').attr('disabled','disabled');
            }else{
                $('#btn-fee-MS-back').removeAttr('disabled');
                $('#btn-fee-MS-next').removeAttr('disabled');
                
                var tbody = document.getElementById('tbody-for-fees-MS');
                var tr = tbody.getElementsByTagName('tr');
                //var td = tr.getElementsByTagName('td')[2];
                var totalAmount = 0;
                for(var ctr = 0;ctr<tr.length;ctr++){
                	var amount = tr[ctr].getElementsByTagName('td')[2].innerHTML;
                	totalAmount = (totalAmount + parseFloat( amount));
                }
                $('#totalAmountMS').val(totalAmount);
                $('#cPaymentMS').val(0);
                
            }
            /*var tbody = document.getElementById('tbody-for-fees-MS');
            var tr = tbody.getElementsByTagName('tr');
            //var td = tr.getElementsByTagName('td')[2];
            var totalAmount = 0;
            for(var ctr = 0;ctr<tr.length;ctr++){
            	var amount = tr[ctr].getElementsByTagName('td')[2].innerHTML;
            	totalAmount = (totalAmount + parseFloat( amount));
            }
            $('#totalAmountMS').val(totalAmount);
            $('#cPaymentMS').val(0);*/
            
            
            //set current payment
            $.ajax({
                type: 'POST',
                url: 'process/getCPayment.php',
                data: obj,
                success: function(data){
                    $('#cPaymentMS').val(data);
                },
                error: function(data){
                    alert("error in getting current payment=>"+data);
                }
            });
            
        },
        error: function(data){
            alert("error in showing fees [monthly mode]-->"+data);
        }
    });
    
    
}

//CURRENT PAYMENT EVENT ONKEYUP//
function keyupCurrPayment(id,amount){
    var regexDouble = /^[0-9\.]$/;
    var currPayment = $('#curr'+id).val();
    var assessmentName = $('#assName'+id).html();
    var currPaymentLength = currPayment.length;
    var lastPaymentInput = currPayment.substring(currPaymentLength-1,currPaymentLength);
    var resCurrPayment = 0;
    var payment = 0;
    var balance = 0;
    if(!regexDouble.test(lastPaymentInput)){
        resCurrPayment = currPayment.substring(0,currPaymentLength-1);
        $('#curr'+id).val(resCurrPayment);
    }
    payment = $('#curr'+id).val();
    if(payment==="" || payment===null){
       payment = 0;
    }
    balance = amount - payment;
    if(payment>amount){
        $('#alert-msg-MS').html("1 Error found: Maximum amount accepted: "+amount+" but you entered: "+currPayment+".But don't worry, the system will automatically fixed this error.");
        $('#div-alert-msg-MS').show('blind',500).fadeOut(3000);
        resCurrPayment = currPayment.substring(0,currPaymentLength-1);
        $('#curr'+id).val(resCurrPayment);
        
    }else{
        var transactionNo = getTransactionNo();
        var enrollmentNo = getEnrollmentNo();
        var studentNo = getStudentId();
        
        var currentPayment = $('#curr'+id).val();
        if(currentPayment===""){
            currentPayment = 0;
        }
        $('#div-alert-msg-MS').hide('blind',2000);
    	$('#balance'+id).html(balance);
        
        var obj = {"transactionNo": transactionNo,"enrollmentNo": enrollmentNo,"studentNo": studentNo,"assessmentName": assessmentName,"currentPayment": currentPayment,"balance": $('#balance'+id).html()};
        
        $.ajax({
           type: 'POST',
           url: 'process/updateGetCurrentPayment.php',
           data: obj,
           success: function(data){
               $('#cPaymentMS').val(data);
           },
           error: function(data){
               alert('error in updating and getting the current payment=>'+data);
           }
        });
    }
}

//VALIDATE CASH AMOUNT FOR FULL PAYMENT AND MS ASSESSMENT PAYMENT//
function validateCashAmountF(){
   var regexDouble = /^[0-9\.]$/;
   var cashEntered = $('#cashAmountF').val();
   var currentPayment = $('#cPaymentFull').val();
   var cashEnteredLength = cashEntered.length;
   var lastCashInput = cashEntered.substring(cashEnteredLength-1, cashEnteredLength);
   var resCash = 0;
   var change = 0;
   if(!regexDouble.test(lastCashInput)){
       resCash = cashEntered.substring(0,cashEnteredLength-1);
       $('#cashAmountF').val(resCash);
   }
   
   var cashTendered = parseFloat($('#cashAmountF').val());
   if(cashTendered<currentPayment){
       $('#warning-msg-F').html("Warning!!!...Insuficient amount tendered!");
       $('#div-warning-msg-F').show('blind',100);
       $('#cashChangeF').val(change);
   }else if($('#cashAmountF').val() === "" || $('#cashAmountF').val() ===null){
       $('#warning-msg-F').html("Warning!!!...No amount entered!");
       $('#div-warning-msg-F').show('blind',100);
       $('#cashChangeF').val(change);
   }else{
       $('#div-warning-msg-F').hide('blind',100);
       change = parseFloat(cashTendered) - parseFloat(currentPayment);
       $('#cashChangeF').val(change);
   }
}//end validateCashAmountF()
function validateCashAmount(){
   var regexDouble = /^[0-9\.]$/;
   var cashEntered = $('#cashAmount').val();
   var currentPayment = $('#cPaymentMS').val();
   var cashEnteredLength = cashEntered.length;
   var lastCashInput = cashEntered.substring(cashEnteredLength-1, cashEnteredLength);
   var resCash = 0;
   var change = 0;
   if(!regexDouble.test(lastCashInput)){
       resCash = cashEntered.substring(0,cashEnteredLength-1);
       $('#cashAmount').val(resCash);
   }
   
   var cashTendered = parseFloat($('#cashAmount').val());
   if(cashTendered<currentPayment){
       $('#warning-msg-MS').html("Warning!!!...Insuficient amount tendered!");
       $('#div-warning-msg-MS').show('blind',100);
       $('#cashChange').val(change);
   }else{
       $('#div-warning-msg-MS').hide('blind',100);
       change = parseFloat(cashTendered) - parseFloat(currentPayment);
       $('#cashChange').val(change);
   }
}//end validateCashAmount()

//BUTTON NEXT IN FORM MS [PROCESSING PAYMENT...]
function paymentMSProcess(){
    var dateNow = $('#span-date').html();
    var transactionNo = getTransactionNo();
    var enrollmentNo = getEnrollmentNo();
    var studentNo = getStudentId();
    var totalAmountPaid = $('#cPaymentMS').val();
    var amountTendered = $('#cashAmount').val();
    
    
    var obj = {"dateNow": dateNow,"transactionNo": transactionNo,"enrollmentNo": enrollmentNo,"studentNo": studentNo,"totalAmountPaid": totalAmountPaid,"amountTendered": amountTendered};
    
    if(obj.totalAmountPaid <=0){
        $('#warning-msg-MS').html("It seems that you don't have a current payment to be paid!");
        $('#div-warning-msg-MS').show('blind',500).fadeOut(3000);
    }else if(amountTendered < totalAmountPaid){
        $('#warning-msg-MS').html("Insuficient amount tendered!");
        $('#div-warning-msg-MS').show('blind',500);
    }else if($('#cashAmount').val() === "" || $('#cashAmount').val() === null) {
        $('#warning-msg-MS').html("Pay first!");
        $('#div-warning-msg-MS').show('blind',500);
    }else{
        $('#div-warning-msg-MS').hide('blind',500);
        $.ajax({
            type: 'POST',
            url: 'process/paymentMSProcess.php',
            data: obj,
            success: function(data){
                hideMSPaymentFormTF();
                showSubjectsByYearLevel();
                showSubjectsForm();
                $('#cashAmount').attr('readonly','readonly');
                $('#tbody-for-fees-MS td input[type=text]').attr('readonly','readonly');
            },
            error: function(data){
                alert("error in processing payment MS=>"+data);
            }
        });
    }
}

//BUTTON BACK IN MS FORM [TEMPORARY PAYMENT PROCESS DELETE]

function deleteCurrentMSAssessment(){
    var transactionNo = {'transactionNo':getTransactionNo()};
        $.ajax({
           type: 'POST',
           url: 'process/tempDelete.php',
           data: transactionNo,
           success: function(data){
               console.log(data);
           },
           error: function(data){
               alert("error in deleting transaction-->"+data);
           }

      });
}

//DELETING CURRENT MS PAYMENT
function deleteCurrentMSPayment(){
    var transactionNo = getTransactionNo();
    var studentNo = getStudentId();
    var obj = {"transactionNo": transactionNo,"studentNo": studentNo};
    $.ajax({
        type: 'POST',
        url: 'process/deleteCurrenMSPayment.php',
        data: obj,
        success: function(data){
            //console.log(data);
        },
        error: function(data){
            alert("error in deleting current payment=>"+data);
        }
    });
}

//DONE ASSESSMENT FOR MONTHLY AND SEMESTRAL MODE OF PAYMENT
function doneMSAssesssment(){
    var transaction = getTransactionNo();
    var enrollmentNo = getEnrollmentNo();
    var studentNo = getStudentId();
    var name = $('#studentName').html();
    var department = $('input[name=radioDepartment]:checked').val();
    var age = $('#age').val();
    var schoolYear = $('#syEntered').val();
    var grade = $('#grade').val();
    var yrLevel = $('#yrLevel').val();
    var genAverage = $('#genAverage').val();
    
    var gy = "";
    $('#small-studNum').html(studentNo);
    $('#small-name').html(name);
    $('#small-department').html(department);
    $('#small-age').html(age);
    $('#small-schYear').html(schoolYear);
    if(department==="Elementary Dept."){
        $('#for-grade').show();
        $('#small-grade').show();
        $('#for-yearLevel').hide();
        $('#small-yrLevel').hide();
        $('#small-grade').html(grade);
        gy = $('#small-grade').html();
    }else if(department==="High School Dept."){
        $('#for-yearLevel').show();
        $('#small-yrLevel').show();
        $('#for-grade').hide();
        $('#small-grade').hide();
        $('#small-yrLevel').html(yrLevel);
        gy = $('#small-yrLevel').html();
    }
    $('#small-generalAve').html(genAverage);
    
    var obj = {"transactionNo": transaction,"enrollmentNo": enrollmentNo,"studentNo": studentNo,"schoolYear": schoolYear,"gy": gy};
    $('#dialog-confirm-done-MS-assessment').dialog({
        resizable: false,
        modal: true,
        position: [240,230],
        buttons:{
            "Yes":function(){
                $.ajax({
                   type: 'POST',
                   url: 'process/doneMSAssessment.php',
                   data: obj,
                   success: function(data){
                        renewAllData();
                   },
                   error: function(data){
                        alert("error in processing assessment=>"+data);
                   }
                });
                $(this).dialog("close");
            },
            "No":function(){
                $('#btn-cancel-assmnt').removeAttr('disabled');
                $(this).dialog("close");
            }
        }
    });
    /*Note:(Last edition 03/19/2013)
     * Setup semestral mode of payment
     */
    
}

//CANCEL ASSESSMENT FOR MONTHLY AND SEMESTRAL MODE OF PAYMENT
function cancelMSAssessment(){
    $('#btn-done-assmnt').attr('disabled','disabled');
    $('#btn-sub-next').removeAttr('disabled');
    $('#btn-sub-back').removeAttr('disabled');
}

function renewAllData(){
    clearFPTotalAmount();
    clearFPCPayment();
    clearMSTotalAmount();
    clearMSCPayment();
    $('#searchStudId').val("");
    $('#studentId').html("");
    $('#studentName').html("");
    $('#age').val("");
    $('#syEntered').val("");
    $('#genAverage').val("");
    $('#recentBal').val("");
    $('input[name=radioPaymnt]:checked').removeAttr('checked');
    $('input[name=radioDepartment]:checked').removeAttr('checked');
    $('#div-for-full').show();
    $('#cashAmount').removeAttr('readonly');
    $('#cashAmount').val("");
    $('#cashAmountF').removeAttr('readonly');
    $('#cashAmountF').val("");
    //disabledMode();
    setEnabledBT();
    hideSubjectsForm();
    hideMSPaymentFormTF();
    hideFullPaymentFormTF();
    setEnrollmentNo();
    setTransactionNo();
}

function resetAllAssessment(){
    $.ajax({
       type: 'POST',
       url: 'process/resetAllAssessment.php',
       sucess: function(data){
           console.log(data);
           //renewAllData();
       },
       error: function(data){
           alert("error in resetting assessment=>"+data);
       }
    });
}
//Note: 
/*
*if the table has no data..there is an error especially for monthy and semestral assessment 
*/
