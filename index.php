<?php
include 'config.php';
include 'database.php';
?>
<?php
$db = new database();
$query = "SELECT * FROM studentdetails";
$read = $db->select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD project</title>
</head>
<body>
    <div class="container text-center my-2">
        <?php
        if(isset($_GET['msg'])) {
            echo "<span class='bg-success text-white p-2'>".$_GET['msg']."</span>";
        }
        ?>
    </div>
    <div class="container">
        <div class="data_content">
            <div class="row">
                <div class="col-6 offset-3">
                    <table class="table table-dark my-2">
                        <thead>
                            <tr class="table-info">
                                <th scoope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">City</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <?php if($read) { ?>
                            <?php $i = 1; ?>
                        <?php while($row = $read->fetch_assoc()){ ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['age']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row['id']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        <?php } else { ?>
                            <h1 class="text-danger">Data is not available</h1>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center m-3">
            <a href="create.php" class="text-decoration-none btn btn-primary">
                CREATE
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>