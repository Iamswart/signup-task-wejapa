<?php include_once "session.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>sign up</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background-color: <?php echo $_SESSION['favcolor']; ?>;">
<div class="container">
    <section class="col col-lg-7" style="font-size: larger;">  
    <h1>HERE ARE YOUR DETAILS:</h1>
<?php
    if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['email']) && isset($_SESSION['department']) && isset($_SESSION['date']) ) {
        echo 'Firstname: ' . $_SESSION['firstname'] . "<br>";
        echo 'Lastname: ' . $_SESSION['lastname'] . "<br>";
        echo 'Email: ' . $_SESSION['email'] . "<br>";
       // echo $_SESSION['favcolor'] . "<br>";
        echo 'Department: ' . $_SESSION['department'] . "<br>";
        echo 'Date: ' . $_SESSION['date'] . "<br>";
    }
    if (isset($_SESSION['gender_male'])) {
        echo  "Gender: Male <br>";
    } else {
        echo "Gender: Female <br>";
    }

?>
</section>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>