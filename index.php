<?php
require_once 'dbconfig.php';

 if (isset($_REQUEST['del'])){
     $user_id = intval($_GET['del']);
     $sql = 'DELETE FROM user where id=:code';
     $query = $connection->prepare($sql);
     $query ->bindParam("code", $user_id , PDO::PARAM_STR);
     $query -> execute();
     echo '<script>alert("fuck you why doing that beach");</script>';
     echo '<script>window.location.href="index.php"</script>';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>پروژه عملی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
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
                <a href="insert.php"><button class="btn btn-primary font-16 m-3">وارد کردن رکورد</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>شماره</th>
                            <th>آدرس</th>
                            <th>تاریخ ساخت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </thead>
                        <tbody>
                        	<?php
                        	      $sql = "SELECT firstname, lastname,email,phonen_umber,addres,create_at,id  FROM user";
                        	      $query = $connection->prepare($sql);
                        	      $query->execute();
                        	      $result = $query -> fetchAll(PDO::FETCH_OBJ);
                        	      if($query -> rowCount() > 0){

                        	          $counter = 0;
                        	      foreach($result as $result ){
                        	?>
                            <tr>
                                <td>
                                    <?= htmlentities($counter) ?>
                                </td>
                                <td>
                                    <?= htmlentities($result -> firstname) ?>
                                </td>
                                <td>
                                    <?= htmlentities($result -> lastname) ?>
                                </td>
                                <td>
                                    <?= htmlentities($result -> email) ?>
                                </td>
                                <td>
                                    <?= htmlentities($result -> phonen_umber) ?>
                                </td>
                                <td>
                                    <?= htmlentities($result -> addres) ?>
                                </td>
                                <td>
                                    <?= htmlentities($result -> create_at) ?>
                                </td>

                                <td><a href="update.php?id=<?= htmlentities($result->id) ?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

                                <td><a href="index.php?del=<?= htmlentities($result->id)?>"><button class="btn btn-danger" onClick="return confirm('آیا حذف انجام شود');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                            </tr>
                        <?php
                                      $counter ++;
                        	      }}
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>