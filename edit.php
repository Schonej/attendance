<?php $title = 'Home Page'?>
<?php
 require_once 'includes/header.php';
 require_once 'db/conn.php';

 $result = $crud->getSpecialties();
 if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
   }else{
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
   
?>
 <?php }?>


    <h1 class="text-center">Edit Record</h1>


    <form method="post" autocomplete="off" action="editpost.php">
        <input type = "hidden" name = "id" id = "id" value="<?php echo $attendee['attendee_id']?>">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" value="<?php echo $attendee['firstname']?>" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" value="<?php echo $attendee['lastname']?>" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Date of birth</label>
            <input type="text" class="form-control" id="datepicker" value="<?php echo $attendee['dateofbirth']?>" name="datepicker">
        </div>
        <div class="form-group">
            <label for="speciality">Speciality</label>
            <select class="form-control" id="speciality" name="speciality">
            <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id']
                    == $attendee['specialty_id']) echo 'selected'?>>
                        <?php echo $r['name']?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $attendee['emailaddress']?>" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" value="<?php echo $attendee['contactnumber']?>" name="phone">
            <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit Changes</button>
    </form>

<?php require_once 'includes/footer.php'?>