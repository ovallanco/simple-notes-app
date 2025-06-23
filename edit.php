<?php include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM notes WHERE id = $id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $conn->query("UPDATE notes SET title='$title', content='$content' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>
</head>
<body>
    <h2>Edit Note</h2>
    <form method="post">
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required><br>
        <textarea name="content" required><?php echo htmlspecialchars($row['content']); ?></textarea><br>
        <button type="submit" name="update">Update Note</button>
    </form>
</body>
</html>
