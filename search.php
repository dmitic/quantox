<?php require_once('includes/header.php'); ?>
<?php 
  $str = htmlspecialchars($_GET['str']);
  $type = htmlspecialchars($_GET['userType']);
  if (!$_SESSION['is_logged'] || !$_SESSION['user_id']){
    $_SESSION['str'] = $str;
    $_SESSION['userType'] = $type;
    header("Location: login.php?str=" . $str . "&userType=" . $type);
  }
?>
<?php require_once('includes/navbar.php'); ?>
  <div class="container mt-3">
  <?php require_once('includes/greska.php'); ?>
    <div class="row">
      <div class="col-md-3">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque at nihil voluptatum praesentium. Magni quia sed illum ducimus recusandae, reprehenderit optio fugit blanditiis consequatur rem dignissimos necessitatibus magnam! Perspiciatis, illum?
        Recusandae debitis excepturi, reprehenderit nihil perferendis asperiores expedita dicta atque iure cum, quia cupiditate exercitationem! Beatae eveniet blanditiis, libero quam incidunt deleniti fuga iste repellat aut. Eligendi recusandae doloribus voluptas.
      </div>
      <div class="col-md-9">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae iure ex voluptatibus officia minima magnam nobis dignissimos. Consequatur asperiores et placeat nisi, perspiciatis voluptates architecto fugiat labore harum aliquid alias?
        Saepe, facilis? Aperiam et quod voluptatum consequuntur minus reiciendis labore tempora quae distinctio vero eos, rem non fugit odio ex a alias. Laudantium, adipisci distinctio? Eum fuga praesentium in soluta?
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae iure ex voluptatibus officia minima magnam nobis dignissimos. Consequatur asperiores et placeat nisi, perspiciatis voluptates architecto fugiat labore harum aliquid alias?
        Saepe, facilis? Aperiam et quod voluptatum consequuntur minus reiciendis labore tempora quae distinctio vero eos, rem non fugit odio ex a alias. Laudantium, adipisci distinctio? Eum fuga praesentium in soluta?
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae iure ex voluptatibus officia minima magnam nobis dignissimos. Consequatur asperiores et placeat nisi, perspiciatis voluptates architecto fugiat labore harum aliquid alias?
        Saepe, facilis? Aperiam et quod voluptatum consequuntur minus reiciendis labore tempora quae distinctio vero eos, rem non fugit odio ex a alias. Laudantium, adipisci distinctio? Eum fuga praesentium in soluta?
      </div>
    </div>
  </div>
<?php require_once('includes/footer.php'); ?>