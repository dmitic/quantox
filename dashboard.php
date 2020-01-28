<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>
  <div class="container mt-3">
  <?php require_once('includes/greska.php'); ?>

  <?php 
    if (!$_SESSION['is_logged'] || !$_SESSION['user_id']){
      header("Location: login.php");
    }

    use App\Models\UserModel;
    $userModel = new UserModel($dbConnection);
    $user = $userModel->getById($_SESSION['user_id']);
  ?>
    <div class="jumbotron">
      <h1 class="display-3">Welcome <?= $user->name; ?></h1>
    </div>
  </div>
<?php require_once('includes/footer.php'); ?>