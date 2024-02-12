<!DOCTYPE html>
<html lang="">
<head>
    <title>Your PHP Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php

$avatar = '';
$firstname = '';
$surname = '';
$age = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadDir = 'public/uploads/';
    $uploadFile = $uploadDir . uniqid() . (basename($_FILES['avatar']['name']));
    $maxFileSize = 1048576;
    $authorizedExtensions = ['jpg', 'jpeg', 'png'];
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $errors = [];

    //user infos
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $age = $_POST['age'];

    if (!in_array($extension, $authorizedExtensions)) {
        $errors = 'Please select a correct image format ! (JPG, JPEG, PNG)';
    }
    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['size'] > $maxFileSize)) {
        $errors[] = 'Your file must be smaller than 2MO !';
    }
    if (!$errors) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
        $avatar = $uploadFile;

    }

}

if (isset($_POST["delete"])) {
    if (file_exists($avatar)) {
        unlink($avatar);
        $avatar = '';
    }
}


?>

<div class="container">
    <form method="post" enctype="multipart/form-data" class="php-form">
        <label for="imageUpload">Upload a profile image</label>
        <input type="file" name="avatar" id="imageUpload"/>
        <button type="submit" name="delete">Delete</button>
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname"/>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname"/>
        <label for="age">Age</label>
        <input type="number" name="age" id="age"/>
        <button name="send">Send</button>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !$errors): ?>
        <div class="identity-card">
            <img src="<?php echo $avatar ?>" alt="avatar" class="identity-card-avatar">
            <div>
                <p><?php echo $firstname . " " . $surname ?></p>
                <p><?php echo $age . " ans" ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>