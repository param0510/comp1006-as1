<?php
    if(empty(trim($fName)))
    {
        echo '<h3>!! First name is required, it cannot be blank !! </h3>';
        $flag = false;
    }
    if(empty(trim($lName)))
    {
        echo '<h3>!! Last name is required, it cannot be blank !! </h3>';
        $flag = false;
    }
    if(empty($yob))
    {
        echo '<h3>!! Year of Birth is required, it cannot be empty !! </h3>';
        $flag = false;
    }
    elseif(!is_numeric($yob))
    {   
        echo '<h3>!! Year of Birth can only be a numeric value, please !! </h3>';
        $flag = false;
    }
    if(empty($studentId))
    {
        echo '<h3>!! Student ID is required, it cannot be empty !! </h3>';
        $flag = false;
    }
    elseif(!is_numeric($studentId))
    {   
        echo '<h3>!! Student ID can only be a numeric value, please !! </h3>';
        $flag = false;
    }
    if(empty(trim($cName)))
    {
        echo '<h3>!! College name is required, it cannot be blank !! </h3>';
        $flag = false;
    }
    if(empty(trim($add)))
    {
        echo '<h3>!! Address line cannot be empty !! </h3>';
        $flag = false;
    }
    if(empty(trim($city)))
    {
        echo '<h3>!! City name is required, it cannot be blank !! </h3>';
        $flag = false;
    }
    if(empty(trim($pCode)))
    {
        echo '<h3>!! Postal code is required, it cannot be empty !! </h3>';
        $flag = false;
    }
    if(empty($stateId))
    {
        echo '<h3>!! State Id is required, it cannot be empty !! </h3>';
        $flag = false;
    }
    elseif(!is_numeric($stateId))
    {   
        echo '<h3>!! State Id can only be a numeric value, please !! </h3>';
        $flag = false;
    }
    if(empty($residenceId))
    {
        echo '<h3>!! Residence Id is required, it cannot be empty !! </h3>';
        $flag = false;
    }
    elseif(!is_numeric($residenceId))
    {   
        echo '<h3>!! Residence Id can only be a numeric value, please !! </h3>';
        $flag = false;
    }
?>