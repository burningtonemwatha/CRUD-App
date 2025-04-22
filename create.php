<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Post</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Create a New Post</h2>

    <form action="store.php" method="POST">
      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title" required><br><br>

      <label for="content">Content:</label><br>
      <textarea id="content" name="content" rows="6" required></textarea><br><br>

      <button type="submit" class="save-btn">Save Post</button>
      <a href="index.php" class="edit-btn">Back to Posts</a>
    </form>
  </div>
</body>
</html>
