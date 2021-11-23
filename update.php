<?php require_once('include/function.php');
$con = getPDOObject();

     if(isset($_GET['data_role']))
    {
            $url_id = $_GET['id'];
    }

     if(isset($_POST['submit']))
    {
        extract($_POST);
        //print_r($_POST);
        //die();
        $sql = "UPDATE tbluser1 set name=?,email=?,phone=?,addr=? WHERE id=?";
        $sql = $con->prepare($sql);
        $result = $sql->execute([$name,$email,$phone,$addr,$url_id]);
     
        if($result)
        {
            $umessage = '<div class="alert alert alert-success" role="alert">
                         Record updated !
                        </div>';
                        header("location:show.php");
        }
        else
        {
            
            $umessage = '<div class="alert alert-alert" role="alert">
                          Error in contect insertion !
                        </div>';
        }
    }



    $selectSql = $con->prepare("SELECT * FROM tbluser1 WHERE id=?");
    $selectSql->execute([$url_id]); 
    $rowData = $selectSql->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>UPDATE DATA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <?php include_once 'include/head_css.php';?>
</head>
<body>
	<section class="pt-5 pb-5 contact_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 auto">
                    <div class="job_form">
                        <div class="row py-3">
                           <div class="col-md-12" id="umessage">
                               
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <h3 class="font-weight-bold">Edit</h3>
                            </div>
                              <div class="col-md-6 col-xs-6 px-4 text-right">
                                <img src="images/edit.png" style="max-width: 65px;">
                            </div>
                            <div class="col-md-6 col-xs-6 px-4 text-right">
                                
                            </div>
                        </div>

                        <div class="form_fields">
                            <form action="" method="POST"  enctype="multipart/form-data">
                                <div class="row">
                                   
                                    <div class="col-6 ps-1">
                                        <input type="text" name="name" id="name" placeholder="Edit Name" value="<?=$rowData['name']?>" pattern="[a-zA-Z-]+" required>
                                    </div> 
                                    <div class="col-6">
                                        <input type="email" name="email" id="email" placeholder="Edit Your Email" value="<?=$rowData['email']?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    
                                      <div class="col-6">
                                        <input type="text" name="phone" id="phone" placeholder="Edit Mobile  no" value="<?=$rowData['phone']?>" pattern="\d{10}" required>
                                    </div>
                                      <div class="col-12">
                                        <textarea  name="addr" id="addr" placeholder="Edit Address"required><?=$rowData['addr']?></textarea>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form_btn">
                                    <button type="submit" id="submit" name="submit">Edit/Update</button>
							 
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


 
</body>
</html>
