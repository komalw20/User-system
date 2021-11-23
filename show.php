<?php require_once('include/function.php');
$con = getPDOObject();

if(isset($_GET['del_id']))
		 {
		 	$rec_id = $_GET['del_id'];
		 	// query to delete record //
		 	$desql = $con->prepare("DELETE FROM `tbluser1` WHERE id='".$rec_id."'");
		 	$result = $desql->execute();
		 	if($result)
		 	{
		 		$umessage = '<div class="class="alert alert-danger" role="alert">
							 Record deleted !
							</div>';
							echo '<script>setTimeout(function(){ 
					   window.location.href = "show.php";
						  }, 2000);</script>';
		 	}
 		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fetching Data From Table</title>

	<?php include_once 'include/head_css.php';?>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
  <div class="container">
   	<div class="row">
   	  	<div class="col-md-12 mt-4">
   	  		<div class="card">
				  <h5 class="card-header">Records</h5>
				  <div class="card-body">
				   <table class="table table-hover">
				   	<thead>
					    <tr>
					      <th scope="col">No.</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Mobile number</th>
					      <th scope="col">Address</th>
					    </tr>
					  </thead>
					  <tbody>
					<?php
						$sql = "SELECT * FROM tbluser1";
						$result = $con->query($sql);
						if ($result->rowCount() > 0) {
							$cnt = 1;

							while ($row = $result->fetch(PDO::FETCH_ASSOC))
                    {
			  		?>
					    <tr>
					      <th scope="row"><?=$cnt++; ?></th>
					     
					      <td><?=$row['name']?></td>
					      <td><?=$row['email']?></td>
					      <td><?=$row['phone']?></td>
					      <td><?=$row['addr']?></td>
					      
					      <td>
					      	<a href="update.php?id=<?=$row['id']?>&data_role=update"><i class="fa fa-edit"></i></a>&nbsp;/&nbsp;
					      	<a href="?del_id=<?=$row['id']?>" title="Delete the record"><i class="fa fa-trash"></i></a>


					      </td>
					    </tr>
			    <?php
                     }
                    }
				?>
					  </tbody>
					</table>
					</div>
				</div>
   	  	  </div>
   	  </div>
   </div>		
</div>
</body>
</html>