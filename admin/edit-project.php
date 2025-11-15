<?php
// Redirect to add-project.php with ID parameter for editing
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $projectId = (int)$_GET['id'];
    header("Location: add-project.php?id=$projectId");
    exit;
} else {
    header("Location: projects.php");
    exit;
}
?>
