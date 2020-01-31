<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>
  <div class="container mt-3">
  <?php 
    if (!$_SESSION['is_logged'] || !$_SESSION['user_id']){
      header("Location: login.php");
    }
    
    require_once('includes/dash_search_incs.php');
    $typeStr = htmlspecialchars($_GET['type'] ?? '');
    $types = $typeModel->getAllTypes();
  ?>
    <div class="jumbotron">
      <h1 class="display-3">Welcome <?= $user->name; ?></h1>
    </div>
    <?php require_once('includes/greska.php'); ?>
    <div class="row">
      <div class="col-md-3">
        <ul class="list-unstyled">
          <?php foreach($types as $type): ?> 
            <?php if (strlen($type->type_id) === 1): ?>
              <li>
                <strong><?= $type->name ?></strong>
              </li>
            <?php  else: ?>
              <li class="uvuci<?=strlen($type->type_id)?>">
                <a href="dashboard.php?type=<?= $type->type_id;?>"><?= $type->name; ?> (<?= $usersModel->countUsersByType($type->type_id); ?>)</a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-md-9">
        <?php 
          $users = $typeStr ? $usersModel->getAllByType($typeStr) : $usersModel->getAll();
          require_once('includes/userTable.php'); 
        ?>
        <?php if (empty($users)): ?>
          <div class="alert alert-light">
            There are no users in category: <strong><?= $typeModel->getTypeNameByTypeId($typeStr)->name; ?></strong>.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php require_once('includes/footer.php'); ?>