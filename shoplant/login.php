<?php include "header.php"; ?> 
<body>
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Login </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
<form action="loginck.php" method="post">

  <table border="0" align="left" cellpadding="10" cellspacing="0">
	
	        <tr align="right">	
		     <td> <img src="Login.png" style="width: 50%"> <br>
			 
		      <a href="registration.php"> New User? Register</a></td> 
		 </tr> 
		<tr>
             <td> Username : 
         <input type="text" name="uid" placeholder="Enter Your User ID" style="padding: 5px; width: 150%"> <br>  </td>
		
		</tr>

		<tr>
           <td> Password :
		<input type="Password" name="pass" placeholder="Enter Your Password" style="padding: 5px; width: 150%"> <br>   </td>
		
		</tr>

		<tr>	    
 <td align="right"> <input type="submit" name="" value="Login Now" style="color: white; background-color: green; font-size: 1.5em; font-family: times new roman;"> </td> 
</tr>
               
              
</form>
		</table>			




				</div>
			</div>
		
		</div>
	</div>
	<!-- End Contact -->
<?php include "footer.php"; ?>