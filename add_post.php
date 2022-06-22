<?php
require_once 'bootstrap.php';

if (!isset($_SESSION['loggedUser'])){
  header("Location:index.php");
}

if (isset($_POST['post_sub_btn'])) {
  $post->createPost();
}

require_once 'views/add.post.view.php';
 ?>
