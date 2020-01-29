<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>
  <div class="container mt-3">
  <?php require_once('includes/greska.php'); ?>

<?php 
  // use App\Models\UsersModel;
  // $userModel = new UsersModel($dbConnection);
  // echo $userModel->countUsersByType(2);
  // print_r($userModel->getById(1));
  // print_r($userModel->getAll());
  // print_r($userModel->getByEmail('dmitic@gmail.com'));
  // print_r($userModel->getByName('Dragan Mitic'));

  // unset($_SESSION['is_logged']);
  // echo $_SESSION['is_logged'];
  // echo $_SESSION['user_id'];
?>


    <div class="jumbotron">
      <h1 class="display-3">Hello everyone!</h1>
      <p class="lead">Simple test app for Quantox tehnology</p>
    </div>
  </div>
<?php require_once('includes/footer.php'); ?>