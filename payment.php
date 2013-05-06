<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Accounts &raquo; Payment</title>
        <link rel="icon" href='images/deped_logo_old.jpg'/>
        <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'/>
        <link rel='stylesheet' type='text/css' href='css/reset.css'/>
        <link rel='stylesheet' type='text/css' href='css/button.css'/>
        <link rel='stylesheet' type='text/css' href='css/payment.css'/>
        <link rel='stylesheet' type='text/css' href='themes/base/jquery.ui.all.css'/>

        <script  src="scripts/jquery-1.8.2.min.js"></script>
        <script src="js-ui/jquery-ui-darkhive.js"></script>
        <!--script type="text/javascript" src="bootstrap/js/bootstrap.js"></script-->
        <script src="scripts/payment.js"></script>
    </head>
    
    <body><br />
  
        <div id='div_payment_wrapper'>
                <h2><p>PAYMENT FORM MANAGEMENT</p></h2>    
        
            <div id='div_search'>
                <br/>
            <input type='text' id='p_student_search'/> <button id='btn_p_search_stud' class='btn btn-medium btn-primary'>Search</button>
            </div>
            <br/>
            <div id='div_for_payment_data'>
             <div id=''></div>
                <span id="date">DATE  : </span>&nbsp;&nbsp;<span id='date_now' style="color: #00FFFF ">00000-00-00 00:00:00</span>
                <br/><br/>
                   <div id="div_for_show_records">
                   
                        <label style="color: #00FFFF">STUDENT ID</label>
                            <input type="text" id='student_id' class='p_spn_right' readonly='readonly'/>
                            <input type='hidden' id='transactionNo'/>
                        <br/>
                        <label style="color: #00FFFF">STUDENT NAME</label>
                            <input type="text" id='student_name' class='p_spn_right' readonly='readonly'/>
                        <br/>
                        <label style="color: #00FFFF">ENROLLMENT NO</label>
                            <input type="text" id='enrollment_no' class='p_spn_right' readonly='readonly'/>
                        <br/>
                        <label style="color: #00FFFF">GRADE | YEAR LEVEL</label>
                            <input type="text" id='grade_year_level' class='p_spn_right' readonly='readonly'/>
                    </div> 
                 <br/>
                
            </div>
            <br/>
            <!-- /PAYMENT DATAS/ -->
	      <hr style="background: red">
             <div id='div_alert_msg_p'>
                    <!--<span class="ui-icon ui-icon-notice" style="float: left; margin: 0 7px 20px 0;"></span>-->
                 <span id='alert_msg_p'>Note: The existed amount of your current payment is automatically saved to advance payment.</span>
             </div><!-- end div-alert-msg-F -->
	      <hr style="background: red">
            <div id='div_assessment_data'>
                <table id='tbl_for_assessment' style="border-color:black">
                    <thead>
                        <tr id="assPay">
                            <th colspan=5>ASSESSMENT NO. : &nbsp;&nbsp;<span id="assessment_no">
                            </span>&nbsp;&nbsp;  MODE OF PAYMENT : &nbsp;&nbsp;<span id="mode_of_payment"></span>&nbsp;&nbsp;</th>
                        </tr>
                        <tr id="des">
                            <th id="desc">DESCRIPTION</th>
                            <th id="assess">ASSESSMENT AMOUNT</th>
                            <th id="assbal">ASSESSMENT BAL.</th>
                            <th id="payhere">PAYMENT HERE</th>
                            <th id="advance">ADVANCE PYMNT.</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_for_tbl_assessment">
                        
                    </tbody>
                </table><!-- END tbl_for_assessment -->
                <div id="div_bottom_cash_payment">
                    <br/>
		    <br />
                    <label style="color: #00FFFF" id="label_1" class="label_1">&nbsp;&nbsp;&nbsp;TOTAL AMOUNT :
			&nbsp;&nbsp;&nbsp;<input type="text" id="payment"/> </label>
           		 
                    <label style="color: #00FFFF" id="tcp" class="label_1">&nbsp;&nbsp;&nbsp;TOTAL CURRENT : 
			&nbsp;<input type="text" id="payment" class="payment_2"/></label>
                    <!--div  id="div_cash_tendered"-->
                        <label style="color: #00FFFF" class="label_1">&nbsp;&nbsp;&nbsp;AMOUNT TENDER :
			<input type="text" id="payment" class="payment_2"/> </label>
               		
                        <label style="color: #00FFFF" id="change2" class="label_1">CHANGE : 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="payment" /></label>
              		
                    <!--/div-->
                   </div> 
                    <div id="div_button_cancel_done">
                        <button id="btn_ass_payment_done" class="btn btn-medium btn-primary">DONE</button>
                        <button id="btn_ass_payment_cancel" class="btn btn-medium btn-default">CANCEL</button>
                        <button id="btn_new_AS" class="btn btn-small btn-success">NEW</button>
                    </div><!-- END div_button_cancel_done -->
                 
                <!-- -->
            </div>
            <!-- /ASSESSMENT DATA/ -->
        </div><br />
        <!-- /PAYEMENT WRAPPER/ -->
    </body>
</html>
