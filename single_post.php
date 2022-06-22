<?php
require_once 'bootstrap.php';

$results = $post->showSinglePost($_GET['id']);

$posts = $post->selectAll('posts');

require_once 'views/single_post_view.php';
