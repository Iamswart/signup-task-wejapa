<?php include_once "session.php" ?>
<?php include_once "utilities.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>sign up</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>


   
<body>
<?php
    
    if (isset($_POST['signupBtn'])) {
       
        //initialize an array to stire any error message on the form
        $form_errors = array();

        //form validation
        $required_fields = array('firstname', 'lastname', 'email', 'password', 'favcolor', 'department', 'date', );

        

        //call the function to check empty field and merge the returm data into form_error array
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //email validation /merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));

        

        
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $favcolor = $_POST['favcolor'];
            $department = $_POST['department'];
            $date = $_POST['date'];

            if (isset($_POST['gender_male'])) {
                $gender_male = $_POST['gender_male'];
            } else {
                $gender_female = $_POST['gender_female'];
            }
           
            

            //password validation /merge the return data into form_error array
           // $form_errors = array_merge($form_errors, check_password($password));

           if (isset($password)) {
             $uppercase = preg_match('@[A-Z]@', $password);
             $lowercase = preg_match('@[a-z]@', $password);
             $number    = preg_match('@[0-9]@', $password);
             $specialChars = preg_match('@[^\w]@', $password);

             if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 15) {
                $form_errors[] = 'Password should be at least 15 characters in length and should include at least one upper case letter, one number, and one special character.';
             }
           }

           if((isset($_POST['gender_male'])) && (isset($_POST['gender_female'])))
            {
                echo $welcome = 
                "<script type=\"text/javascript\">
                  swal({
                    title: \"OOPS!\",
                    text: \"You must select male or female.\",
                    icon: 'error',
                    timer: 6000,
                    button: 'Retry' });

                    
                 </script>";
            
            }
            if((!isset($_POST['gender_male'])) && (!isset($_POST['gender_female'])) )
            {
                echo $welcome = 
                "<script type=\"text/javascript\">
                  swal({
                    title: \"OOPS!\",
                    text: \"You must select one gender male or female.\",
                    icon: 'error',
                    timer: 6000,
                    button: 'Retry' });

                    
                 </script>";
            
            }

        if (empty($form_errors)) {

            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['department'] = $department;
            $_SESSION['favcolor'] = $favcolor;
            $_SESSION['date'] = $date;

            if (isset($_POST['gender_male'])) {
                $_SESSION['gender_male'] = $gender_male;
            } else {
                $_SESSION['gender_female'] = $gender_female;
            }
            
           
           
            
            echo $welcome = 
            "<script type=\"text/javascript\">
            swal({
                title: 'Congratulations $firstname!', 
                text:'Registration completed successfully!', 
                icon: 'success',
                timer: 6000,
                button: 'Thank you' });

                setTimeout(function(){
                    window.location.href = 'info.php';
                    }, 5000);

            
            </script>";
        } else {
            if (count($form_errors) == 1) {
                $result = flashMessage("There was 1 error in the form<br>");
                

                
                    
            } else {
                $result = flashMessage("There were " .count($form_errors). "  errors in the form<br>");
                
            }
        }
    }




?>



    <div class="container">
    <section class="col col-lg-7">    

    <h3>Registration Form</h3><hr>
    <?php if (isset($result)) 
       echo $result;
   ?>
   <?php if (!empty($form_errors)) 
       echo show_errors($form_errors);
   ?>
    <form method="post" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="">First Name</label>
            <input type="text" class="form-control" id="" name="firstname">
            </div>
            <div class="form-group col-md-6">
            <label for="">Last Name</label>
            <input type="text" class="form-control" id="" name="lastname">
            </div>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="" name="email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="Password" class="form-control" id="" name="password">
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
            <label for="favcolor">Color</label>
            <input type="color" class="form-control" id="favcolor" name="favcolor">
            </div>
            <div class="form-group col-md-4">
            <label for="">Department</label>
            <select id="" class="form-control" name="department">
                <option>IT</option>
                <option>HR</option>
                <option>Admin</option>
            </select>
            </div>
            <div class="form-group col-md-6">
            <label for="">Date</label>
            <input type="date" class="form-control" id="" name="date">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="" name="gender_male">
            <label class="form-check-label" for="">
                Male
            </label>
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="" name="gender_female">
            <label class="form-check-label" for="">
                Female
            </label>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary" name="signupBtn">Sign up</button>
    </form>


    </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>