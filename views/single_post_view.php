<?php require 'partials/top.php'; ?>

<nav class="navbar navbar-expand navbar-light bg-light">
  <a href="index.php" class="navbar-brand">Blogger</a>
    <ul class="navbar-nav ml-auto">
  <?php if(isset($_SESSION['loggedUser'])): ?>
    <li class="nav-item">
      <a href="add_post.php" class="nav-link">Add post</a>
    </li>
    <li class="nav-item">
      <a href="logout.php" class="nav-link">Logout</a>
    </li>
    <li class="nav-item">
      <a href="user_profile.php" class="btn btn-warning"><?php echo $_SESSION['loggedUser']->name;?></a>
    </li>
  <?php else: ?>
    <li class="nav-item">
      <a href="login_register.php" class="nav-link">Login/Register</a>
    </li>
  <?php endif; ?>
  </ul>
</nav>

<?php foreach ($results as $result): ?>
  <div class="jumbotron text-center">
    <h3><?php echo $result->title; ?></h3>
    <?php if (isset($_SESSION['loggedUser']) && $result->user_id == $_SESSION['loggedUser']->id):?>
      <a href="user_profile.php">
    <?php endif; ?>
      <button class="btn btn-success btn-sm"><?php echo "Owner: ". $result->name; ?></button>
    </a>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2 text-center">
        <p><?php echo $result->description; ?></p>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php require 'partials/bottom.php'; ?>
