<?php
    function check_empty_fields($required_fields_array)
    {
        $form_errors = array();

        foreach ($required_fields_array as $name_of_field) {
            if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {
                $form_errors[] = $name_of_field . " is a required field";
            }
        }

        return $form_errors;
    }

    function check_email($data)
    {
        $form_errors = array();
        $key = 'email';

        //check if key email exists in data array
        if (array_key_exists($key, $data)) {
            //check if the email field has a value
            if ($_POST[$key] != null) {
                
                //remove all illegal characters from email
                $key = filter_var($key, FILTER_SANITIZE_EMAIL);

                //check if input is a valid email address
                if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false) {
                    $form_errors[] = $key . " is not a valid email address";
                }
            }
        }
        return $form_errors;
    }

    

    function show_errors($form_errors_array)
    {
        $errors = "<p><ul style='color: red;'>";

        //loop though error array and display all item in a list
        foreach ($form_errors_array as $the_error) {
            $errors .= "<li> {$the_error} </li>";

        }
        $errors .= "</ul></p>";
        return $errors;
    }

    function flashMessage($messsage, $passOrFail = "Fail")
    {
        if ($passOrFail === "Pass") {
            $data = "<p class='alert alert-success'>{$messsage}</p>";
        } else {
            $data = "<p class='alert alert-danger'>{$messsage}</p>";
        }
        return $data;
    }
?>