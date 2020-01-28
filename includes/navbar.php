<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <?php if(!isset($_SESSION['is_logged'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['is_logged'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
      <?php endif; ?>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="str" value="<?= isset($_GET['str']) ? htmlspecialchars($_GET['str']) : ''; ?>">
        <select name="userType" class="form-control mr-sm-2">
          <option value="1" <?= isset($_GET['userType']) ? ($_GET['userType'] == 1 ? 'selected' : '') : ''; ?> >Front End Developer</option>
          <option value="2" <?= isset($_GET['userType']) ? ($_GET['userType'] == 2 ? 'selected' : '') : ''; ?> >Back End Developer</option>
        </select>
        <button class="btn btn-secondary my-2 my-sm-0 mr-sm-2" type="submit">Search</button>
      </form>
      <?php if(isset($_SESSION['is_logged'])): ?>
        <form action="logout.php" method="POST">
          <button type="submit" name="logout" class="btn btn-primary mx-2 mx-sm-0" >Logout</button>
        </form>
      <?php endif; ?> 
  </div>
</nav>