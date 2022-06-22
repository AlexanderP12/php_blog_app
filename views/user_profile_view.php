<?php require_once 'partials/top.php'; ?>

<nav class="navbar navbar-expand navbar-light bg-light">
  <a href="index.php" class="navbar-brand">Blogger</a>
    <ul class="navbar-nav ml-auto">
  <?php if(isset($_SESSION['loggedUser'])): ?>
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

<div class="jumbotron text-center">
  <h4>Welcome <?php echo $_SESSION['loggedUser']->name; ?></h4>
</div>
<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <a href="add_post.php"> <button class="mb-5 btn btn-success form-control">Add new post</button></a>
    </div>
  </div>

  <div class="row">
    <div class="col-8 offset-2">
    </div>
    <?php foreach ($results as $result):?>
      <div class="col-8 offset-2">
        <div class="card mb-5">
          <div class="card-header text-center">
            <a href="single_post.php?id=<?php echo $result->id; ?>" class="text-dark">
              <h3> <?php echo $result->title; ?> </h3>
            </a>
          </div>
          <div class="card-body text-center">
            <p><?php echo $result->description; ?></p>
          </div>
          <div class="card-footer">
            <button class="btn btn-warning float-left"><?php echo $result->name; ?></button>
            <button class="btn btn-primary float-right"><?php $date = date_create($result->created_at); echo date_format($date,"Y-m-d");?></button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

<?php require_once 'partials/bottom.php'; ?>
