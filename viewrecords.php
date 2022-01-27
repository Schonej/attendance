<?php
  $title = 'View Records';
  require_once 'includes/header.php';
  require_once 'db/conn.php'; 
  require_once 'includes/auth_check.php';

  $results = $crud->getAttendees();
?>

<h1 class="text-center text-success">View Records</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Speciality</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
          <tr>
            <td><?php echo $r['attendee_id']?></td>
            <td><?php echo $r['firstname']?></td>
            <td><?php echo $r['lastname']?></td>
            <td><?php echo $r['name']?></td>
            <td>
              <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary" value="id">View Record</a>
              <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning" value="id">Update Record</a>
              <a onclick="return confirm('are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger" value="id">Delete Record</a>
            </td>
          </tr>
      <?php }?>
    </tbody>
</table>


<?php require_once 'includes/footer.php'?>