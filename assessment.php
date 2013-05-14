
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Accounts &raquo; Assessment</title>
        <link rel="icon" href='images/deped_logo_old.jpg'/>
        <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css'/>
        <link rel='stylesheet' type='text/css' href='css/reset.css'/>
        <link rel='stylesheet' type='text/css' href='css/button.css'/>
        <link rel='stylesheet' type='text/css' href='css/assessment.css'/>
        <link rel='stylesheet' type='text/css' href='themes/base/jquery.ui.all.css'/>

        <script  src="scripts/jquery.min.js"></script>
        <script src="js-ui/jquery-ui-darkhive.js"></script>
        <script type="text/javascript" src="scripts/file_upload.js"></script>
        <script type="text/javascript" src="scripts/assessmnt.js"></script>
    </head>
    <body>
        <div id='div-assessment-wrapper'>
            <div class="alert alert-error" id="div-overlay-alert-msg"></div><!-- end div-overlay-alert-msg -->
            <div id="div-alert-success" class="alert alert-success"></div>
                <div id='div-search'>
                    <div id='control-search'>
                        <input type='text' name='searchStudId' id='searchStudId' placeholder="ENTER STUDENT ID HERE" required><button id='btn-search-stud' class='btn btn- medium btn-primary'>Search</button>
                    </div>
                </div>
            
            <div id='div-stud-info'>
                <div id='div-primary-info'>
                     <div id='div-for-pic'>
                        <div class="div-image">

                        </div><!-- end div-image -->
                        <span id = "label_change_pic">&nbsp;&nbsp;<i class="icon-pencil"></i>&nbsp;&nbsp;Change Picture</span>
                    </div><!-- end div-for-pic -->
                    <div id='div-float-left'>
                        <div class="control-group">

                            <label class="control-label">STUDENT ID NO</label>
                            <div class="controls">
                                <span id='studentId'></span>
                                <input type='hidden' id='currentGYL' />
                            </div>

                        </div>
                        <!--br/><br/>
                        &nbsp;<label class='labelForStudId'>STUDENT ID NO.:</label><br/>&nbsp;&nbsp;<small id='studentId'></small-->
                            <br/>
                            &nbsp;<small id='studentName'  /></small><br/>
                            &nbsp;<small class='studNameLabel'>FIRST NAME</small>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small class='studNameLabel'>MIDDLE NAME</small>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small class='studNameLabel'>LAST NAME</small>
                            <br/><br/>

                         <div id='div-department'>
                            <h3 id='h3-department'>DEPARTMENT</h3><br/>
                                <form>
                                    <input type='radio' name='radioDepartment' id='radioElemDept' value='Elementary Dept.'/>&nbsp;<label class='labelF' label for='radioElemDept'>ELEMENTARY DEPT.</label>&nbsp;&nbsp;&nbsp;
                                    <input type='radio' name='radioDepartment' id='radioHighSchDept' value='High School Dept.'/>&nbsp;<label class='labelF' for='radioHighSchDept'>HIGH SCHOOL DEPT.</label>
                                </form>
                         </div><!-- end div-department -->
                         <br/>
                         <div class='floatleft-input-label'>
                            <label class='labelF'>AGE</label><input type='text' name='age' id='age'/><br/><br/>
                            <label class='labelF'>S.Y. ENTERED</label>
                            <select id='syEntered'>
                                <?php
                                    $n = 2050;
                                    for($i=2013;$i<$n;$i++){
                                        $p = $i+1;
                                        echo '<option value='.$i.'-'.$p.'>'.$i.'-'.$p.'</option>';
                                    }
                                 ?>
                            </select>
                            <br/><br/>
                            <label class='labelF'>GRADE</label>
                                <select id='grade'>
                                    <option value='Grade 1'>I</option>
                                    <option value='Grade 2'>II</option>
                                    <option value='Grade 3'>III</option>
                                    <option value='Grade 4'>IV</option>
                                    <option value='Grade 5'>V</option>
                                    <option value='Grade 6'>VI</option>
                                </select>
                             <br/><br/>

                             <label class='labelF'>YEAR LVL.</label>
                                <select id='yrLevel'>
                                    <option value='First Year'>FIRST YEAR</option>
                                    <option value='Second Year'>SECOND YEAR</option>
                                    <option value='Third Year'>THIRD YEAR</option>
                                    <option value='Fourth Year'>FOURTH YEAR</option>
                                </select>
                             <br/><br/><label class='labelF'>GEN. AVE.</label><input type='text' name='genAverage' id='genAverage' class='text-line'/>
                        </div>
                    </div><!-- end div-float-left -->
                    <div id='div-float-right'>
                        <span id='span-date' title='(Month/Date/Year)'></span>&nbsp;<span id="span-time"></span>
                        <br/><br/>
                        <label class="labelForEnrollNo">ENROLL. NO.</label><p><input type='text' name='enrollmntId' id='enrollmntId' class='text-line' readonly="readonly"/>
                        <br/>
                        <label class="labelForTranNo">T.N. NO.</label><p><input type='text' name='transactionNo' id='transactionNo' class='text-line' readonly="readonly"/>
                        <br/>
                        <label class="labelForRecentBal">RECENT BAL.</label><p><input type='text' name='recentBal' id='recentBal' class='text-line' readonly="readonly"/>
                        <br/><br/>
                        <button id='btn-sub-fees' class='btn btn-large btn-primary'>SUB./FEES</button>
                    </div>
                    
                </div><!-- end div-primary-info -->
            <div id='div-payment-info'>
                <div id='div-radio-mode'>
                    <h3 id='h3-how-to-pay'>MODE OF PAYMENT</h3><br/>
                    <form id='form-radio-mode'>
                        <input type='radio' name='radioPaymnt' id='radioFullPaymnt' value="Full"/>&nbsp;<label class='mode-label' for='radioFullPaymnt'>FULL</label>&nbsp;&nbsp;
                        <input type='radio' name='radioPaymnt' id='radioMonthlyPaymnt' value='Monthly'/>&nbsp;<label class='mode-label' for='radioMonthlyPaymnt'>MONTHLY</label>&nbsp;&nbsp;
                        <input type='radio' name='radioPaymnt' id='radioSemestralPaymnt' value='Semestral'/>&nbsp;<label class='mode-label' for='radioSemestralPaymnt'>SEMESTRAL</label>
                    </form>
                </div><!-- end div-radio-mode -->
                
                <div id='div-category'>
                    <br/>
                    <label class='labelF'>CATEGORY:</label>&nbsp;<small id='category' ></small>
                </div>
                
                <div id='div-sub-fee-wrapper' class='div-sub-fee-wrapper'>
                    <div id='div-for-full'>
                        <div id='div-for-table-full-pymnt'>
                            <table id='tbl-for-full' class='tbl-for-fee-sub'>
                                <thead>
                                    <tr>
                                        <th colspan=4>FEES [FULL PAYMENT]</th>
                                    </tr>
                                    <tr>
                                        <th>CODE</th>
                                        <th>DESCRIPTION</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody-for-full' class='tbody-for-fee-sub'>

                                </tbody>
                            </table><!-- end tbl-for-full -->
                            <br/>
                            <div id='div-alert-msg-F' class="alert alert-error"></div><!-- end div-alert-msg-F -->
                        </div><!-- end div-for-table-full-pymnt -->
                            <br/>
                            <div id='div-foot-full' class='div-foot-full-partial'>
                                <label class='lbl-foot-full-MS'>TOTAL AMOUNT:</label>
                                <input type="text" name='totalAmountFull' id='totalAmountFull' readonly='readonly'/>
                                <label class='lbl-foot-full-MS'>CURR. PAYMNT.:</label>
                                <input type="text" name='cPaymentFull' id='cPaymentFull' readonly='readonly'/>
                                
                                <div id='div-enter-cash'>
                                    <label class='labelF'>ENTER CASH HERE!</label><p>
                                    <input type='text' name='cashAmountF' id='cashAmountF' placeholder='0.00'/><p>
                                    <label class='labelF'>YOUR CHANGE!</label>
                                    <input type='text' name='cashChangeF' id='cashChangeF' placeholder='0.00' readonly='readonly'/><p>
                                </div>
                                <div id='div-btn-back-next-F'>
                                    <button id='btn-fee-full-back' class='btn btn-medium btn-default'>Back</button>
                                    <button id='btn-fee-full-next' class='btn btn-medium btn-primary'>Next</button>
                                </div><!-- end div-btn-back-next-F -->
                            </div><!-- end div-foot-full -->
                            <br/>
                    </div><!-- end div-for-full -->
                    
                    <div id='div-for-MS'>
                        <div id='div-for-table-MS-pymnt'>
                            <table id='tbl-for-MS' class='tbl-for-fee-sub'>
                                <thead>
                                    <tr>
                                        <th colspan=5>FEES [MS PAYMENT]</th>
                                    </tr>
                                    <tr>
                                        <th>CODE</th>
                                        <th>DESCRIPTION</th>
                                        <th>AMOUNT</th>
                                        <th>BALANCE</th>
                                        <th>CURR. PAYMENT</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody-for-fees-MS' class='tbody-for-fee-sub'>
                                    
                                </tbody>
                            </table>
                            <br/>
                            <div id='div-alert-msg-MS' class="alert alert-error"></div><!-- end div-alert-msg -->
                            <!--button class='btn btn-medium btn-primary' id='tempDelete' title='This is just a temporary button to delete current transaction'>Delete</button-->
                        </div><!-- end div-for-table-monthly-pymnt -->
                        
                        <div id='div-bottom-monthly-pymnt'>

                            <div id='div-foot-MS' class='div-foot-full-monthly'>
                                <br/>
                                <label class='lbl-foot-full-MS'>TOTAL AMOUNT:</label>
                                <input type="text" name='totalAmountMS' id='totalAmountMS' readonly='readonly'/>
                                <label class='lbl-foot-full-MS'>CURR. PAYMNT.:</label>
                                <input type="text" name='cPaymentMS' id='cPaymentMS' readonly='readonly'/>
                                <div id='div-enter-cash'>
                                    <label class='labelF'>ENTER CASH HERE!</label><p>
                                    <input type='text' name='cashAmount' id='cashAmount' placeholder='0.00'/><p>
                                    <label class='labelF'>YOUR CHANGE!</label>
                                    <input type='text' name='cashChange' id='cashChange' placeholder='0.00' readonly='readonly'/><p>
                                </div>
                                <div id='div-btn-back-next-MS'>
                                    <button id='btn-fee-MS-back' class='btn btn-medium btn-default'>Back</button>
                                    <button id='btn-fee-MS-next' class='btn btn-medium btn-primary'>Next..</button>
                                </div>
                            </div><!-- end div-foot-MS -->
                        </div><!-- end div-bottom-monthly-pymnt -->
                    </div><!-- end div-for-monthly -->
                    
                    <div id='div-for-subject'>
                        <div id='div-for-table-subject'>
                            <table id='tbl-for-subject' class='tbl-for-fee-sub'>
                                <thead>
                                    <tr>
                                        <th colspan=3>SUBJECTS</th>
                                    </tr>
                                    <tr>
                                        <th>CODE</th>
                                        <th>NAME</th>
                                        <th>UNITS</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody-for-tbl-for-subject' class='tbody-for-fee-sub'>
                                    
                                </tbody>
                            </table>
                        </div><!-- end div-for-table-subject -->
                        <br/>
                        <div id='div-foot-subject'>
                            <div id='div-btn-back-next-sub'>
                                <button id='btn-sub-back' class='btn btn-medium btn-default'>Back</button>
                                <button id='btn-sub-next' class='btn btn-medium btn-primary'>Next..</button>
                            </div>
                        </div>
                    </div><!-- end div-for-subject -->
                </div>
            </div><!-- end div-payment-info -->
            
            </div><!-- end div-stud-info -->
            
            <div id="div-btn-done-cancel">
                <button id='btn-done-assmnt' class='btn btn-small btn-primary'>DONE</button>
                <button id='btn-cancel-assmnt' class='btn btn-small btn-default'>CANCEL</button>
                <button id='btn-reset-all-assmnt' class='btn btn-small btn-warning'>RESET?</button>
            </div><!-- end div-btn-done-cancel -->
            
            
            <div id="dialog-confirm" title="Proceed....">
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Proceed to subjects..<br/>Are you sure?</p>
            </div><!-- end dialog-confirm -->
            <div id="dialog-cancel-ass" title='Cancel this transaction..'>
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>All saved data in this transaction will permanently deleted. Continue anyway?</p>
            </div><!-- end dialog-cancel-ass -->
            <div id='dialog-confirm-done-MS-assessment' title='DONE ASSESSMENT'>
                <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><span class='labelData'>NOTE:CHECK DATA BEFORE PROCEED!</span>
                <br><br/>
                <span class='labelData'>STUDENT NO.:</span>&nbsp;&nbsp;<small id='small-studNum'></small>
                <br>
                <span class='labelData'>NAME:</span>&nbsp;&nbsp;<small id='small-name'></small>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='labelData'>DEPARTMENT:</span>&nbsp;&nbsp;<small id='small-department'></small>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='labelData'>AGE:</span>&nbsp;&nbsp;<small id='small-age'></small>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='labelData'>SCHOOL YEAR:</span>&nbsp;&nbsp;<small id='small-schYear'></small>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id='for-grade' class='labelData'>GRADE:</span>&nbsp;&nbsp;<small id='small-grade'></small>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id='for-yearLevel'class='labelData'>YEAR LEVEL:</span>&nbsp;&nbsp;<small id='small-yrLevel'></small>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='labelData'>GENERAL AVERAGE:</span>&nbsp;&nbsp;<small id='small-generalAve'></small>
                <br><br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='labelData'>Do you want to proceed?</span>
            </div>
        </div><!-- end div-assessment-wrapper -->
        <div class='div-overlay-upload-wrapp'>
        <div class="div-overlay-upload">
            <div id='photo_upload_status' align='center'>

            </div>
            <div id='close_upload'>
                <i class='icon-remove'></i>
            </div>
            <center>
            <div style="width: 350px; margin-left: 20px;" align="center">
            <form id="form_upload_pic" method="post" enctype="multipart/form-data" action="javascript:void(0);" autocomplete="off">
                <div class='browse_label' align="left">Browse Photo</div>
                <div class='attach_file_wrapp' align="left">
                    <div class='attach_file'><input type='file' name='photo_upload' id='photo_upload'/></div><br>
                    <!--div><button class="btn btn-primary">Upload</button></div-->
                    <input type='hidden' name='h_student_id' id='h_student_id' " />
                </div><br clear="all">
            </form>
            </div>
            </center>
        </div><!-- end div-overlay-upload -->
        </div><!-- end div-overlay-upload-wrapp-->
    </body>
</html>
