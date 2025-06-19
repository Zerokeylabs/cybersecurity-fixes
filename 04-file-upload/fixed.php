<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $allowed_ext = ['jpg', 'png', 'gif'];
    $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $mime = mime_content_type($_FILES['file']['tmp_name']);

    if (!in_array($ext, $allowed_ext)) {
        die("Invalid file type!");
    }

    if (strpos($mime, 'image') === false) {
        die("Invalid file content!");
    }

    $target = "C:/xampp/htdocs/uploads/" . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        echo "Secure upload complete! <a href='/uploads/" . basename($_FILES['file']['name']) . "'>View Image</a>";
    } else {
        echo "Upload failed.";
    }
}
?>

<h2>Upload File (Fixed)</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>