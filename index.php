
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    <?php require_once 'process.php'; ?>

    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']); ?>
    </div>
    <?php endif ?>

    <div class="container">
    <!-- Povezava z bazo in branje podatkov iz nje -->
        <?php  $mysqli = new mysqli('localhost', 'root', 'madagaskar', 'crud') or die(mysqli_error($mysqli));
            $result=$mysqli->query("SELECT * FROM data") or die($mysqli->error); ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Priimek</th>
                        <th>Naslov</th>
                        <th>Pošta</th>
                        <th>Poštna številka</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <!-- Branje podatkov v tabelo -->
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['post']; ?></td>
                    <td><?php echo $row['post_code']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Uredi</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Izbriši</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <?php function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }?>
            <!-- obrazec za vnos in urejanje -->
            <div class="row justify-content-center">
                <form action="process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />

                    <div class="form-group">
                        <label>Ime</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Vnesi ime:">
                    </div>
                    <div class="form-group">
                        <label>Priimek</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" placeholder="Vnesi priimek:">
                    </div>

                    <div class="form-group">
                        <label>Naslov</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Vnesi naslov:">
                    </div>
                    <div class="form-group">
                        <label>Pošta</label>
                        <input type="text" name="post" class="form-control" value="<?php echo $post; ?>" placeholder="Vnesi pošto:">
                    </div>
                    <div class="form-group">
                        <label>Poštna številka</label>
                        <input type="text" name="post_code" class="form-control" value="<?php echo $post_code; ?>" placeholder="Vnesi poštno številko:">
                    </div>

                    <div class="form-group">
                        <!--gumb za shranjevanje se spremeni v gumb za urejanje -->
                        <?php if($update == true): ?>
                            <button type="submit" class="btn btn-info" name="update">Uredi</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary" name="save">Dodaj</button>
                        <?php endif ?>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>