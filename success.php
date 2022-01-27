<?php
  $title = 'Success';
  require_once 'includes/header.php';
  require_once 'db/conn.php'; 

  if(isset($_POST['submit'])){
    //extract values from the $_POST Array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $datepicker = $_POST['datepicker'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialty = $_POST['speciality'];

    $org_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$phone.$ext";
    move_uploaded_file($org_file, $destination);

    //call function to insert and track if success or not
    $isSuccess = $crud->insertAttendees($fname,$lname,$datepicker,$email,$phone,$specialty, $destination);

    if($isSuccess){
      include 'includes/successmessage.php';
    }else{
      include 'includes/errormessage.php';
    }
  }
?>

<h1 class="text-center text-success">You have been registered</h1>


<!-- prints out values that were passed to the actions page using method="get"-->
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_GET['firstname'] .' '. $_GET['lastname'];?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_GET['speciality'];?></h6>
    <p class="card-text">Date of Birth: <?php echo $_GET['dob']?></p>
    <p class="card-text">Email: <?php echo $_GET['email']?></p>
    <p class="card-text">Phone: <?php echo $_GET['phone']?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->
<img src="<?php echo $destination?>" style="width: 50%"/>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] .' '. $_POST['lastname'];?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality'];?></h6>
    <p class="card-text">Date of Birth: <?php echo $_POST['datepicker']?></p>
    <p class="card-text">Email: <?php echo $_POST['email']?></p>
    <p class="card-text">Phone: <?php echo $_POST['phone']?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>


<?php require_once 'includes/footer.php'?>