<?php
    // Checking whether the user has input a white spaces in the first and last name fields
    if(empty(trim($fName)))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! First name is required, it cannot be blank !! </h5>
                </div>';
        $flag = false;
    }
    if(empty(trim($lName)))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Last name is required, it cannot be blank !! </h5>
                </div>';
        $flag = false;
    }
    // Checking whether the year of birth being input is a blank.
    if(empty($yob))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Year of Birth is required, it cannot be empty !! </h5>
                </div>';
        $flag = false;
    }
    // Checking whether the value of year of birth is numeric or not.
    elseif(!is_numeric($yob))
    {   
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Year of Birth can only be a numeric value, please !! </h5>
                </div>';
        $flag = false;
    }
    // I have done similar validation for studentId by checking whether its a blank or a non-numeric value
    if(empty($studentId))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Student ID is required, it cannot be empty !! </h5>
                </div>';
        $flag = false;
    }
    elseif(!is_numeric($studentId))
    {   
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Student ID can only be a numeric value, please !! </h5>
                </div>';
        $flag = false;
    }
    // Checking whether the college name, address, city, postal code is empty 
    if(empty(trim($cName)))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! College name is required, it cannot be blank !! </h5>
                </div>';
        $flag = false;
    }
    if(empty(trim($add)))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Address line cannot be empty !! </h5>
                </div>';
        $flag = false;
    }
    if(empty(trim($city)))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! City name is required, it cannot be blank !! </h5>
                </div>';
        $flag = false;
    }
    if(empty(trim($pCode)))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Postal code is required, it cannot be empty !! </h5>
                </div>';
        $flag = false;
    }
    // since both the stateId and residenceId represent a numeric value associated with the text being displayed 
    // So I validated it by checking whether its a blank or non-numeric type
    if(empty($stateId))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! State Id is required, it cannot be empty !! </h5>
                </div>';
        $flag = false;
    }
    elseif(!is_numeric($stateId))
    {   
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! State Id can only be a numeric value, please !! </h5>
                </div>';
        $flag = false;
    }
    if(empty($residenceId))
    {
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Residence Id is required, it cannot be empty !! </h5>
                </div>';
        $flag = false;
    }
    elseif(!is_numeric($residenceId))
    {   
        echo    '<div class="alert alert-warning" role="alert">
                    <h5>!! Residence Id can only be a numeric value, please !! </h5>
                </div>';
        $flag = false;
    }
?>