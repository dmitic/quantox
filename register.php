<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>

  <div class="container mt-3">
    
    <form method="POST" action="register.php">
      <fieldset>
        <legend>Registration</legend>
        <div class="form-group">
          <label for="userType">User type</label>
          <select name="userType" class="form-control mr-sm-2 col-md-2">
            <option value="1">Front End Developer</option>
            <option value="2">Back End Developer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?? ''; ?>" placeholder="Ener name...">
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