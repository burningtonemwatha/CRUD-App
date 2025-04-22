<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Posts</title>
  <link rel="stylesheet" href="style.css"> <!-- External CSS -->
</head>
<body>
  <div class="container">
    <h2>All Posts</h2>
    <a href="create.php" class="btn">Add New Post</a>
    <hr>

    <?php
    $limit = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT $limit OFFSET $offset");

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<div class='post'>";
          echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
          echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
          echo "<div class='actions'>";
          echo "<a href='edit.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>";
          echo "<a href='delete.php?id=" . $row['id'] . "' class='delete-btn' onclick=\"return confirm('Are you sure?');\">Delete</a>";
          echo "</div>";
          echo "</div><hr>";
      }
    } else {
      echo "<p>No posts yet.</p>";
    }

    // Pagination links
    $total = $conn->query("SELECT COUNT(*) as total FROM posts")->fetch_assoc()['total'];
    $totalPages = ceil($total / $limit);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i' class='page-link'>$i</a> ";
    }
    echo "</div>";
    ?>
  </div>
</body>
</html>
