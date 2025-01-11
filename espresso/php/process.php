
 <?php
session_start();
    
    include("connection1.php");
    include("conn1.php");

    if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = md5($password);
  

    
    
    $count = 0;
    $sql = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '$username' AND password = '$hashed_password'");
    while($sql_rc_row = mysqli_fetch_array($sql)){
        $count = 1;
        $id=$sql_rc_row['id'];
        $fname=$sql_rc_row['fname'];
        $lname=$sql_rc_row['lname'];
        $address=$sql_rc_row['address'];
        $email=$sql_rc_row['email'];
        $contact=$sql_rc_row['contact'];
        $type=$sql_rc_row['type'];
    }

    // var_dump($type);
    // die();
    
    if($count==1){
        if($type == "Participant"){

            $_SESSION['id'] = $id;
            $_SESSION['fname'] = $id;;
            $_SESSION['lname'] = $id;;
            $_SESSION['address'] = $id;;
            $_SESSION['email'] = $id;;
            $_SESSION['contact'] = $id;;
            $_SESSION['type'] = $id;;
        
             header("Location:user_menu.php");
        }
        else if($type == "Admin"){
            $_SESSION["id"] = $id;
             header("Location:../admin/admin_dashboard.php");
        }
        else{
             header("Location:error");   
        }

    
    }
    else{
     header("Location:signin.php?error");

    exit();
}

    }
     ?>
