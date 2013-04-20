$(document).ready(function(){
     $('#signup_submit').attr('disabled','disabled');

     //click radio button --user type
     $("input[name=radio_user_type]").click(function(){
        $('#signup_submit').removeAttr('disabled');
     });
});