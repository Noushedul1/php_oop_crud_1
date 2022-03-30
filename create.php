<!-- <?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?> -->
<?php
include 'config.php';
include 'database.php';
?>
<?php
function validate($str) {
    return trim(htmlspecialchars($str));
}
if($_SERVER['REQUEST_METHOD']==='POST') {
    if(empty($_POST['sname'])) {
        $errorName = 'Your name is empty';
    }else {
        $sname = validate($_POST['sname']);
    }

    if(empty($_POST['age'])) {
        $errorAge = 'Your age is empty'; 
    }else {
        $age = validate($_POST['age']);
    }

    if(empty($_POST['city'])) {
        $errorCity = 'Your city is empty';
    }else {
        $city = validate($_POST['city']);
    }
}
?>
<?php
$db = new database();
if(isset($_POST['submit'])) {
    if(!($sname == '' && $age == '' && $city == '')) {
        $query = "INSERT INTO studentdetails(name,age,city) VALUES('$sname','$age','$city')";
        $insert = $db->insert($query);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CREATE</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="create_data">
            <div class="text-center bg-primary py-2 my-2">
                <strong class="text-white">CREATE DATA </strong>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Name : </label>
                            <input type="text" class="form-control" name="sname" placeholder="Enter your name.">
                            <span class="error"><?php
                                if(isset($errorName)) {
                                    echo $errorName;
                                }
                            ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Age : </label>
                            <input type="text" class="form-control" name="age" placeholder="Enter your age.">
                            <span class="error"><?php
                                if(isset($errorAge)) {
                                    echo $errorAge;
                                }
                            ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">City : </label>
                            <input type="text" class="form-control" name="city" placeholder="Enter your city.">
                            <span class="error"><?php
                                if(isset($errorCity)) {
                                    echo $errorCity;
                                }
                            ?></span>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit" placeholder="Enter your name.">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>