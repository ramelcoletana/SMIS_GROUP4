 
 
 <!DOCTYPE html>
 <html>
 <head>
 <script>
    function modeC(){
        
         var mode = "";
         var entrance = 0;
         var books = 0;
         var b_gsp = 0;
         var total = 0;
        mode = document.getElementById('effectTypes').value;
        entrance = document.getElementById('ttl_entrance').value;
        books = document.getElementById('ttl_books').value;
        b_gsp = document.getElementById('ttl_b_gsp').value;
        total = document.getElementById('subtotal').value;
        var subtotal = 0;
        
        if(mode==="monthly"){
        alert("please remember your responsibelity that you have to pay every month......")
            entrance = entrance/10; 
            books = books/10;
            b_gsp = b_gsp/10;
            
            subtotal = (parseFloat(entrance) + parseFloat(books) + parseFloat(b_gsp));
            
            document.getElementById('entrance').value = entrance;
            document.getElementById('books').value = books;
            document.getElementById('b_gsp').value = b_gsp;
             document.getElementById('total').value = subtotal;
                
        }else if(mode==="semestral"){
        alert("please remember your responsibelity that you have to pay before the semestral ends......")
              entrance = entrance/2; 
            books = books/2;
            b_gsp = b_gsp/2;
            
            subtotal = (parseFloat(entrance) + parseFloat(books) + parseFloat(b_gsp));
            document.getElementById('entrance').value = entrance;
            document.getElementById('books').value = books;
            document.getElementById('b_gsp').value = b_gsp;
             document.getElementById('total').value = subtotal;
             
        }else if(mode==="yearly"){
        alert("please remember your responsibelity that you have to pay at yhe end of the school year.....")
            entrance = entrance/1; 
            books = books/1;
            b_gsp = b_gsp/1;
            
            subtotal = (parseFloat(entrance) + parseFloat(books) + parseFloat(b_gsp));
            document.getElementById('entrance').value = entrance;
            document.getElementById('books').value = books;
            document.getElementById('b_gsp').value = b_gsp;
             document.getElementById('total').value = subtotal;
        }
    }
 </script>

 </head>
 
 <body>
 <div id="baraydan">
<label id="currentbalance">Entrance: </label>
  <input type="text" disabled="yes" name="total" id="ttl_entrance" value="<? echo $total1; ?>"/><br/>
  
  
  <label id="tbalance">Books: </label>
  <input type="text" disabled="yes" name="total" id="ttl_books" value="<? echo $total2; ?>"/><br/>
  
  <label id="tbalance">BSP/GSP </label>
  <input type="text" disabled="yes" name="total" id="ttl_b_gsp" value="<? echo $total3; ?>"/><br/>

  <label id="tbalance">Total: </label>
  <input type="text" disabled="yes" name="total" id="subtotal" value="<? echo $total; ?>"/><br/>
  </div>
  
  
 
 <fieldset style="background-color: 33CCFF"><legend><h3>Mode Of Payment</h3></legend>	
 <label id="mode" ><h3>please select:</h3> </label></br >
 
   <form action="" method="post">
   
 <select name="effects" id="effectTypes" onchange='modeC()'>
    <option>Option</option>
    <option name="monthly"  value="monthly" >Monthly</option>
    <option name="semestral" value="semestral">Semestral</option>       
    <option name="yearly" value="yearly">Yearly</option>    
 </select>
 
 
<div id="baraydanMode">
    <!-- ramz-->
       <TABLE BORDER CELLPADDING=4>
            <TR BGCOLOR="#99CCFF">
        <h3 class="ui-widget-header ui-corner-all">HERE IS YOUR PAYABLE</h3>
                <TH>ENTRANCE</TD>
               <TH>BOOKS</TD>
               <TH>BSP/GSP</TD>
               <TH>TOTAL</TD>
            </TR>
            
            <tr>
                <TD><INPUT TYPE=TEXT NAME="pl_amount" id='entrance'  SIZE=10 DISABLED="YES"></TD>
               <TD><INPUT TYPE=TEXT NAME="pl_amount" id='books'   SIZE=10 DISABLED="YES"></TD>
                <TD><INPUT TYPE=TEXT NAME="pl_amount" id='b_gsp'    SIZE=10 DISABLED="YES"></TD>
                <TD><INPUT TYPE=TEXT NAME="pl_amount" id='total'   SIZE=10 DISABLED="YES"></TD>
            </tr>
        </TABLE>
    <!--end-->

  </div>
  </form>
  </fieldset>
	</fieldset>						
			</li>
		        </ul>	
		        													  
						 <h3>||||PAY HERE||||  </h3>
						 
						 <?php include 'rowelCopy.html' ?>
						<form action="desplayBalance.php" method="post">
                                <input type="submit" id="done" value="DONE" name="done" />
						</form>    
				         
						  <p>
						  <form>
							  <label>Type:</label>  
							   <input type="radio" name="mabayad" value="cash" /> cash
							   <input type="radio" name="mabayad" value="partial"/> partial
						  </form>
						  </p> 
						  <br />
						 
							 <!--<label for="cash"></label><input id="cash" title="AMOUNT" />-->
					
 </body>
 </html>            
