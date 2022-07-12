<?php
    session_start();
    require_once "../external/db.php";
    $att_name = $_POST["name"];
    $att_nric = $_POST["nric"];
    $att_age = $_POST["age"];
    $att_email = $_POST["email"];
    $att_phone = $_POST["phone"];

    $registerSQL = "INSERT INTO attendees (attendee_name, attendee_ic, attendee_age, attendee_email, attendee_phone) VALUES (?, ?, ?, ?, ?)";
    if ($stmt=mysqli_prepare($conn, $registerSQL)){
        mysqli_stmt_bind_param($stmt, "sssss", $attendee_name, $attendee_ic, $attendee_age, $attendee_email, $attendee_phone);

        $attendee_name = $att_name;
        $attendee_ic = $att_nric;
        $attendee_age = $att_age;
        $attendee_email = $att_email;
        $attendee_phone = $att_phone;

        if(mysqli_stmt_execute($stmt)){
            //echo "SUCCESS ADD TO USERS TABLE!<br>";
        } else {
            header("refresh:0;url=index.html");
            echo "<script>alert(\"Error while processing: ".mysqli_error($conn)."\")</script>";
            die();
        }

        mysqli_stmt_close($stmt);
    }
    header("refresh:0;url=success.html");
?>