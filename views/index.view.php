<?php require_once 'partials/top.php'; ?>

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
<div class="jumbotron text-center">
  <h4>Blogger Posts</h4>
</div>
<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <?php foreach($posts as $post): ?>
        <div class="card mb-5">
          <div class="card-header text-center">
            <h3> <a href="single_post.php?id=<?php echo $post->id; ?>" class="text-dark"><?php echo $post->title;?> </a>
              <small class="float-right">
            <?php if (isset($_SESSION['loggedUser']) && $post->user_id == $_SESSION['loggedUser']->id): ?>
                  <a href="index.php?post_id=<?php echo $post->id ?>" class="btn btn-sm btn-danger">Delete</a>
            <?php endif; ?>
            </small></h3>
          </div>
          <div class="card-body">
            <p><?php echo $post->description; ?></p>
          </div>
          <div class="card-footer">
            <button class="btn btn-info btn-sm float-right" title= "Created at" name="button">
              <?php $date = date_create($post->created_at); echo date_format($date,"Y-m-d"); ?>
            </button>
            <?php if (isset($_SESSION['loggedUser']) && $post->user_id == $_SESSION['loggedUser']->id): ?>
            <a href="user_profile.php">
            <?php endif; ?>
              <button class="btn btn-warning btn-sm float-left" title="Owner of this post" data-toggle="tooltip">
              <?php echo $user->getUserWithId($post->user_id)->name; ?>
            </button>
              </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php require_once 'partials/bottom.php'; ?>
