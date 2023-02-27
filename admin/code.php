<?php
session_start();
require 'dbconnection.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM tbl_animals WHERE id='$animal_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Animals Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_animal']))
{
    $animal_id = mysqli_real_escape_string($con, $_POST['animal_id']);

    $CageNumber = mysqli_real_escape_string($con, $_POST['CageNumber']);
    $AnimalName = mysqli_real_escape_string($con, $_POST['AnimalName']);
    $Breed = mysqli_real_escape_string($con, $_POST['Breed']);
    $CreationDate = mysqli_real_escape_string($con, $_POST['CreationDate']);

    $query = "UPDATE tbl_animals SET AnimalName='$AnimalName', CageNumber='$CageNumber', AnimalName='$AnimalName', Breed='$Breed' , CreationDate='$CreationDate' WHERE id='$animal_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students (name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>