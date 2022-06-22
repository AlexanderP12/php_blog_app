<?php require_once 'bootstrap.php';

if (!isset($_SESSION['loggedUser'])) {
  header("Location:index.php");
}

$posts = $post->selectAll('posts');

$results = $post->getPostsFromUser($_SESSION['loggedUser']->id);

require_once 'views/user_profile_view.php';?>
