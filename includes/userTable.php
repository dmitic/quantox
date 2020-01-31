<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user): ?>
    <tr>
      <td><?= $user->name; ?></td>
      <td><?= $user->email; ?></td>
      <td>
        <a href="dashboard.php?type=<?= $user->user_type;?>">
            <?= $typeModel->getTypeNameByTypeId($user->user_type)->name; ?>
        </a>
      </td>
      <td>
        <form action="includes/delete.php" method="post">
          <input type="hidden" name="user_del_id" value="<?= $user->id; ?>">
          <button name="delete" class="btn btn-danger" onclick="return confirm('Are you sure, this action will delete user?')" 
                <?= $user->id === $_SESSION['user_id'] ? 'disabled' : '' ?>>Delete</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
