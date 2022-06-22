<?php
class Post extends QueryBuilder {

  public $newPostStatus = NULL;

  public function createPost(){
    $title = $_POST['post_title'];
    $description = $_POST['post_description'];
    $createdAt = date('Y-m-d');
    $user_id = $_SESSION['loggedUser']->id;

    $sql = "INSERT INTO posts VALUES (NULL, ?,?,?,?)";
    $query = $this->db->prepare($sql);
    $query->execute([$title, $description, $user_id, $createdAt]);

    if ($query) {
      $this->newPostStatus = true;
    }else {
      $this->newPostStatus = false;
    }
  }

  public function deletePost($id){
    $sql = "DELETE FROM posts WHERE id = ?";
    $query = $this->db->prepare($sql);
    $query->execute([$id]);
  }

  public function getPostsFromUser($id){
    $sql = "SELECT *, posts.id FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.user_id = ?";
    $query = $this->db->prepare($sql);
    $query->execute([$id]);
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    //
    if($query){
      return $results;
    }
  }

  public function showSinglePost($id){
    $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = ?";
    $query = $this->db->prepare($sql);
    $query->execute([$id]);

    $results = $query->fetchAll(PDO::FETCH_OBJ);

      if($query){
        return $results;
        return "works";
      }
  }


}
 ?>
