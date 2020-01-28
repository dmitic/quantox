<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>
  <div class="container mt-3">
  
  <?php 
    use App\Controllers\LoginController;
    
    if (isset($_SESSION['is_logged']) && isset($_SESSION['user_id'])){
      header("Location: dashboard.php");
    }

    if(isset($_POST['submit'])){
      $login = new LoginController($dbConnection);
      $user = $login->login(); 
      if($user){
        header("Location: index.php");
      }
    }
  ?>

  <?php require_once('includes/greska.php'); ?>

    <form method="POST" action="login.php">
      <fieldset>
        <legend>Login</legend>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $_POST['email'] ?? ''; ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
      </fieldset>
    </form>
  </div>
<?php require_once('includes/footer.php'); ?>