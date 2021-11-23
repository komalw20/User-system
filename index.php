<?php require_once('include/function.php');
$con = getPDOObject();

if (isset($_REQUEST['submit'])) {
			// checking 4 empty filed
			if (($_REQUEST['name'] =="")|| ($_REQUEST['email'] =="") || ($_REQUEST['phone'] =="") || ($_REQUEST['addr'] =="")) {
				echo "Fill the data..<hr><br>";
			}
			else{
				$name = $_REQUEST['name'];
				$email = $_REQUEST['email'];
				$phone = $_REQUEST['phone'];
				$addr = $_REQUEST['addr'];

				//insert query
			$sql = "INSERT INTO tbluser1(name,email,phone,addr) VALUES('$name','$email','$phone','$addr')";
				$affected_row = $con->exec($sql);
				echo $affected_row ."Row Inserted <br>";

				header("location:show.php");
			}
		}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User System</title>
	<?php include_once 'include/head_css.php';?>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<!-- Forms -->
<section class="pt-5 pb-5">
<div class="container-fluid" style="width:550px">
	<div class="w3-card-4">
		<div class="w3-container w3-center">
			  <div class="mt-3"><!-- for margin top -->
			
				<header class="w3-container w3-blue">
			      <h1>Sign Up</h1>
			    </header>

			      <div class="w3-container"><!-- form design-->
			      	 <form method="POST" class="col-lg-6 offset-lg-3" id="formid">
			    		<tr>
		                    <td>Name *</td>
		                    <td>
		                      <div class="form-group row">
		                      	<div class="col-xs-3">
		                       		 <input type="text" name="name" id="name" class="form-control"
		                         	    placeholder="Name" align="right" pattern="[a-zA-Z-]+" required>
		                          </div>
		                      </div>
		                    </td>
  						</tr>
 
 						<tr>
		                    <td>Email *</td>
		                    <td><div class="form-group row">
		                    		<div class="col-xs-3">
				                        <input type="email"   name="email" id="email"  class="form-control"
				                          placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
			                    	</div>
		                    </div></td>
                  		</tr>

                  		<tr>
		                    <td>Mobile Number *</td>
		                    <td><div class="form-group row">
		                    		<div class="col-xs-3">
				                        <input type="number"  name="phone" id="phone"  class="form-control"
				                          placeholder="Mobile Number please..." pattern="\d{10}" required>
			                    	</div>
		                    </div></td>
                  		</tr>

                  		<tr>
		                    <td>Address *</td>
		                    <td><div class="form-group row">
		                    		<div class="col-xs-3">
				                         <textarea name="addr" id="addr" placeholder="Address please..." required></textarea>
			                    	</div>
		                    </div></td>
                  		</tr>

                  		<input type="submit" class="btn bg-success text-white btn-lg" name="submit"  id="submit"value="Submit">

				</form>
      
    			  </div>
			     <footer class="w3-container w3-blue">
			     	 <h5></h5>
			    </footer>
			</div>
		</div>
	</div>
</div>
</section>

<!-- end forms-->

</body>
</html>

<?php  $con = "null";?>