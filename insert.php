<?php

      require_once 'dbconfig.php';
      if(isset($_POST['insert'])){

          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $email = $_POST['email'];
          $phone =  $_POST['phonen_umber'];
          $address = $_POST['addres'];
          $sql = 'INSERT INTO user(firstname,lastname,email,phonen_umber,addres) VALUES (:firstnames,:lastnames,:emailes,:phones,:address)';
          $query = $connection->prepare($sql);
          $query ->bindParam(":firstnames" , $fname, PDO::PARAM_STR);
          $query ->bindParam(":lastnames" , $lname, PDO::PARAM_STR);
          $query ->bindParam(":emailes" , $email, PDO::PARAM_STR);
          $query ->bindParam(":phones" , $phone, PDO::PARAM_STR);
          $query ->bindParam(":address" , $address, PDO::PARAM_STR);
          $query -> execute();
          $lastInsertId = $connection->lastInsertId();
          if($lastInsertId){
              echo '<script>alert("fuck you why added new insert beach");</script>';
              echo '<script>window.location.href="index.php"</script>';
          }
          else{
              echo '<script>alert("errore 404");</script>';
              echo '<script>window.location.href="index.php"</script>';
          }
      }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container border p-4 mt-4">

        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">وارد کردن اطلاعات</h3>
                <hr />
            </div>
        </div>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>نام</label>
                    <input type="text" name="firstname" class="form-control" placeholder="مثال : علی">
                </div>
                <div class="form-group col-md-6">
                    <label>نام خانوادگی</label>
                    <input type="text" name="lastname" class="form-control" placeholder="مثال : کریمی">
                </div>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email" class="form-control" placeholder="مثال : ali@gmail.com">
            </div>
            <div class="form-group">
                <label>شماره</label>
                <input type="number" name="phonen_umber" class="form-control" placeholder="مثال : 0912813774">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>آدرس</label>
                    <textarea name="addres" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="ثبت" name="insert">
        </form>
    </div>
</body>
</html>