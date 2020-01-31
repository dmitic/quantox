<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>
  <?php 
    use App\Controllers\RegisterController;
    use App\Models\UserTypeModel;
    
    $typeModel = new UserTypeModel($dbConnection);
    $types = $typeModel->getAll();

    if (isset($_SESSION['is_logged']) && isset($_SESSION['user_id'])){
      header("Location: dashboard.php");
    }

    if(isset($_POST['submit'])){
      $register = new RegisterController($dbConnection);
      $register->register(); 
    }
  ?>
  <div class="container mt-3">
    
  <?php require_once('includes/greska.php'); ?>

    <form method="POST" action="register.php">
      <fieldset>
        <legend>Registration</legend>
        <div class="form-group">
          <label for="userType">UserType</label>
          <select class='form-control col-md-2' name='userType'>
          <?php
              foreach($types as $type)  { 
                if (strlen($type->type_id) === 1){
                  echo "<optgroup label='$type->name'>";
                } else {
                    echo "<option value=" . $type->type_id . " ";
                    echo isset($_POST['userType']) ? ($_POST['userType'] === $type->type_id ? 'selected' : '') : ''; 
                    echo ">";
                    for($i=1; $i<strlen($type->type_id); $i++) 
                      echo "&emsp;";
                      echo $type->name;
                      echo "</option>";
                  }
                } 
                echo "</optgroup>"; 
            ?>
            </select>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?? ''; ?>" placeholder="Enter your name...">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?= $_POST['email'] ?? ''; ?>" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="confirmed_password">Confirm Password</label>
          <input type="password" class="form-control" name="confirmed_password" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </fieldset>
    </form>
  </div>
<?php require_once('includes/footer.php'); ?>