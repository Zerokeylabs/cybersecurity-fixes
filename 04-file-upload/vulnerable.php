<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $target = __DIR__."/../../uploads/" . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        echo "Uploaded! <a href='/uploads/" . basename($_FILES['file']['name']) . "'>View File</a>";
    } else {
        echo "Upload failed.";
    }
}
?>

<h2>Upload File (Vulnerable)</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>