<?php
require_once 'dbconfig.php';
if (isset($_POST['update'])){
    $userId = intval($_GET['id']);
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonen_umber = $_POST['phonen_umber'];
    $addres = $_POST['addres'];
    $sql = 'UPDATE user set firstName=:firstname,lastName=:lastname,email=:email,phonen_umber=:phonen_umber,addres=:addres WHERE id=:id';
    $query = $connection->prepare($sql);
    $query ->bindParam(":firstname" , $fname, PDO::PARAM_STR);
    $query ->bindParam(":lastname" , $lname, PDO::PARAM_STR);
    $query ->bindParam(":email" , $email, PDO::PARAM_STR);
    $query ->bindParam(":phonen_umber" , $phonen_umber, PDO::PARAM_STR);
    $query ->bindParam(":addres" , $addres, PDO::PARAM_STR);
    $query->bindParam(':id', $userId, PDO::PARAM_STR);
    $query -> execute();
    echo '<script>alert("fuck you why added new insert beach");</script>';
    echo '<script>window.location.href="index.php"</script>';
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container border p-4 mt-4">

        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">ویرایش اطلاعات</h3>
                <hr />
            </div>
        </div>
        <?php
        $user_id = intval($_GET['id']);
        $sql = 'select firstname , lastname , email , phonen_umber , addres from user where id=:identity ';
        $query = $connection->prepare($sql);
        $query->bindParam("identity" , $user_id ,PDO::PARAM_STR );
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        ?>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>نام</label>
                    <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($result->firstname) ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>نام خانوادگی</label>
                    <input type="text" name="lastname" class="form-control" value="<?= htmlspecialchars($result->lastname) ?>">
                </div>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($result->email) ?>">
            </div>
            <div class="form-group">
                <label>شماره</label>
                <input type="number" name="phonen_umber" class="form-control" value="<?= htmlspecialchars($result->phonen_umber) ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>آدرس</label>
                    <textarea class="form-control" name="addres" rows="5"> <?= htmlspecialchars($result->addres) ?></textarea>

                </div>
            </div>
            <input type="submit" class="btn btn-warning" value="ویرایش" name="update">
        </form>


    </div>
</body>
</html>