<?php require_once('includes/header.php'); ?>
<?php 
  $str = isset($_GET['str']) ? htmlspecialchars($_GET['str']): NULL;
  $typeSearch = isset($_GET['userType']) ? htmlspecialchars($_GET['userType']): NULL;
  $byTypeSearch = isset($_GET['byUserType']) ? htmlspecialchars($_GET['byUserType']): NULL;

  if (!$_SESSION['is_logged'] || !$_SESSION['user_id']){
    $_SESSION['str'] = $str;
    $_SESSION['userType'] = $typeSearch;
    header("Location: login.php?str=" . $str . "&userType=" . $typeSearch);
  }

  require_once('includes/dash_search_incs.php');
  
  $types = $typeModel->getTypesByTypeSearch($typeSearch);
?>
<?php require_once('includes/navbar.php'); ?>
  <div class="container mt-3">
  <div class="jumbotron">
    <h4>Search results for: <strong><?= $str; ?></strong></h4>
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
              <?php else: ?>
                <li class="uvuci<?= strlen($type->type_id); ?>">
                  <a href="search.php?str=<?= $str;?>&userType=<?= $typeSearch ?>&byUserType=<?= $type->type_id ?>"><?= $type->name; ?> (<?= $usersModel->countSearchedUsersByType($type->type_id, $str); ?>)</a>
                </li>
              <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-md-9">
        <?php 
          $users = $byTypeSearch ? $usersModel->searchByType($str, $byTypeSearch) : $usersModel->searchDefault($str, $typeSearch);
          require_once('includes/userTable.php'); 
        ?>
        <?php if (empty($users)): ?>
          <div class="alert alert-light">
            There are no results matching search criteria!</strong>.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php require_once('includes/footer.php'); ?>