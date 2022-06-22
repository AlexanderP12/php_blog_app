<?php

require_once 'bootstrap.php';

if (isset($_GET['post_id']) && ($_SESSION['loggedUser'])) {
  $post->deletePost($_GET['post_id']);
}

$posts = $post->selectAll('posts');
$users = $user->selectAll('users');

require_once 'views/index.view.php';
