<?php
include 'db.php';

if (!isset($_GET['id'])) {
  echo "Post ID not specified.";
  exit;
}

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id = $id");

if ($result->num_rows !== 1) {
  echo "Post not found.";
  exit;
}

$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Post</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Edit Post</h2>

    <form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

      <label for="content">Content:</label><br>
      <textarea id="content" name="content" rows="6" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

      <!-- 🔥 Changed class from btn to save-btn -->
      <button type="submit" class="save-btn">Update Post</button>
      <a href="index.php" class="edit-btn">Cancel</a>
    </form>
  </div>
</body>
</html>
