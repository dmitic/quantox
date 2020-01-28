<?php if(!empty($_SESSION['poruka'])): ?>
  <div class="alert alert-dismissible <?= $_SESSION['poruka']['status'] === 'uspesno' ? 'alert-success' : 'alert-danger'; ?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php 
      echo $_SESSION['poruka']['msg'];
      unset($_SESSION['poruka']);
    ?>
  </div>
<?php endif; ?>