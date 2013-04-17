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
    
    <body>
        <div id='div_payment_wrapper'>
            <div id='div_search'>
                <input type='text' id='p_student_search'/>
                    <button id='btn_p_search_stud' class='btn btn-medium btn-primary'>Searchs</button>
            </div>  
            <!-- /SEARCH/ -->
            <div id='div_for_payment_data'>
             <div id=''></div>
                <span id="date">DATE  : </span>&nbsp;&nbsp;<span id='date_now'>00000-00-00 00:00:00</span>
                <br/><br/>
                   <div id="div_for_show_records">
                        <label>STUDENT ID</label>
                            <input type="text" id='student_id' class='p_spn_right' readonly='readonly'/>
                        <br/>
                        <label>STUDENT NAME</label>
                            <input type="text" id='student_name' class='p_spn_right' readonly='readonly'/>
                        <br/>
                        <label>ENROLLMENT NO</label>
                            <input type="text" id='enrollment_no' class='p_spn_right' readonly='readonly'/>
                        <br/>
                        <label>GRADE | YEAR LEVEL</label>
                            <input type="text" id='grade_year_level' class='p_spn_right' readonly='readonly'/>
                    </div> 
                 <br/>
                
            </div>
            <!-- /PAYMENT DATAS/ -->
            
            <div id='div_assessment_data'>
                <div id='div_alert_msg_p'>
                    <span class="ui-icon ui-icon-notice" style="float: left; margin: 0 7px 20px 0;"></span>
                    <span id='alert_msg_p'>Note: The exist amount your current payment is automatically saved to advance payment.</span>
                </div><!-- end div-alert-msg-F -->
                <table id='tbl_for_assessment'>
                    <thead>
                        <tr>
                            <th colspan=4>ASSESSMENT NO.: [-:&nbsp;&nbsp;<span id="assessment_no">
                            </span>&nbsp;&nbsp;:-] | MODE OF PAYMENT [-:&nbsp;&nbsp;<span id="mode_of_payment"></span>&nbsp;&nbsp;:-]</th>
                        </tr>
                        <tr>
                            <th>DESCRIPTION</th>
                            <th>ASSESSMENT AMOUNT</th>
                            <th>ASSESSMENT BAL.</th>
                            <th>PAYMENT HERE</th>
                            <th>ADVANCE PYMNT.</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_for_tbl_assessment">
                        
                    </tbody>
                </table><!-- END tbl_for_assessment -->
                <div id="div_bottom_cash_payment">
                    <label>TOTAL AMOUNT FOR THIS ASS.</label><input type="text" id="t_amount_ass"/>
                    <p>
                    <label>TOTAL CURRENT PAYMNT.</label><input type="text" id="t_current_pymnt"/>
                    <p>
                    <div id="div_cash_tendered">
                        <label>AMOUNT TENDER</label><input type="text" id="amount_ten"/>
                        <p>
                        <label>CHANGE</label><input type="text" id="change" />
                        <p>
                    </div>
                    
                    <div id="div_button_cancel_done">
                        <button id="btn_ass_payment_done" class="btn btn-medium btn-primary">DONE</button>
                        <button id="btn_ass_payment_cancel" class="btn btn-medium btn-default">CANCEL</button>
                    </div><!-- END div_button_cancel_done -->
                    
                </div><!-- -->
            </div>
            <!-- /ASSESSMENT DATA/ -->
        </div>
        <!-- /PAYEMENT WRAPPER/ -->
    </body>
</htmL>
