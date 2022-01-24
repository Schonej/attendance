<?php $title = 'Home Page'?>
<?php
 require_once 'includes/header.php';
 require_once 'db/conn.php';

 $result = $crud->getSpecialties();
?>


    <h1 class="text-center">Registration for IT Conference</h1>


    <form method="post" autocomplete="off" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Date of birth</label>
            <input required type="text" class="form-control" id="datepicker" placeholder="Date Of Birth" name="datepicker">
        </div>
        <div class="form-group">
            <label for="speciality">Speciality</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input required type="text" class="form-control" id="phone" placeholder="Enter Contact Number" name="phone">
            <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once 'includes/footer.php'?>