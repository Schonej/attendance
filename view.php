<?php $title = 'View Record'?>
<?php
 require_once 'includes/header.php';
 require_once 'db/conn.php';
 require_once 'includes/auth_check.php';

 if(!isset($_GET['id'])){
  include 'includes/errormessage.php';
 }else{
  $id = $_GET['id'];
  $result = $crud->getAttendeeDetails($id);
 
?>
<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path'] ; ?>" style="width: 20%;" />
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $result['firstname'] .' '. $result['lastname'];?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'];?></h6>
        <p class="card-text">Date of Birth: <?php echo $result['dateofbirth']?></p>
        <p class="card-text">Email: <?php echo $result['emailaddress']?></p>
        <p class="card-text">Phone: <?php echo $result['contactnumber']?></p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
    <br>

    <a href="viewrecords.php" class="btn btn-info" value="id">Back to info</a>
    <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning" value="id">Update</a>
    <a onclick="return confirm('are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger" value="id">Delete</a>
 <?php }?>

<?php require_once 'includes/footer.php'?>