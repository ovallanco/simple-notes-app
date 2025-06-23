<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Notes App</title>
</head>
<body>
    <h1>Simple Notes App</h1>

    <h2>Add New Note</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="content" placeholder="Your note..." required></textarea><br>
        <button type="submit" name="add">Add Note</button>
    </form>

    <?php
    // Add note
    if (isset($_POST['add'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $content = $conn->real_escape_string($_POST['content']);
        $conn->query("INSERT INTO notes (title, content) VALUES ('$title', '$content')");
        header("Location: index.php");
    }

    // Fetch all notes
    $result = $conn->query("SELECT * FROM notes ORDER BY created_at DESC");
    ?>

    <h2>All Notes</h2>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
            <small><?php echo $row['created_at']; ?></small><br>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this note?')">Delete</a>
        </div>
    <?php endwhile; ?>

</body>
</html>
