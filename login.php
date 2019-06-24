<?php

include "dbconnection.php";

if(isset($_POST['login']))
{
  $email = $_POST['email'];
  $password = md5 ($_POST['password']);

  if($email!=''&& $password!='')
  {
    $stmt = $conn->prepare("SELECT * FROM `user_manager` WHERE manager_email=? AND manager_password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    if($stmt->fetch())
    {
      $manager_email =  $email;
      $manager_password =  $password;

      include "dbconnection.php";

      $stmt1 = $conn->prepare("SELECT * FROM `user_manager` WHERE manager_email=? AND manager_password=?");
      $stmt1->bind_param("ss", $manager_email, $manager_password);
      $stmt1->execute();
      $result1 = $stmt1->get_result();
      $row1 = $result1->fetch_assoc();
      $id = $row1 ['manager_id'];

      session_start();

      $_SESSION['manager_id'] = $id;

      echo "<script>alert('Welcome. Login is Successfull!')</script>";
      echo "<script>window.location.href='manager/dashboard.php';</script>";
    }
    else
    {
      $stmt2 = $conn->prepare("SELECT * FROM `user_staff` WHERE staff_email=? AND staff_password=?");
      $stmt2->bind_param("ss", $email, $password);
      $stmt2->execute();

      if($stmt2->fetch())
      {
        $staff_email =  $email;
        $staff_password =  $password;

        include "dbconnection.php";

        $stmt3 = $conn->prepare("SELECT * FROM  `user_staff` WHERE staff_email=? AND staff_password=?");
        $stmt3->bind_param("ss", $staff_email, $staff_password);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        $row3 = $result3->fetch_assoc();
        $id = $row3 ['staff_id'];
        $status = $row3['staff_status'];

        if($status==0){

          session_start();

         $_SESSION['staff_id'] = $id;

         $_SESSION['staff_id'] = $row3['staff_id'];
         $_SESSION['staff_email'] = $row3['staff_email'];

          $statement1 = $conn->prepare("INSERT INTO login_details (staff_id) VALUES ('".$row3['staff_id']."')");
          $statement1->execute();

          $statement2= $conn->prepare("SELECT * FROM login_details ORDER BY login_details_id DESC");
      		$statement2->execute();
      		$result44 = $statement2->get_result();
      		$row44 = $result44->fetch_assoc();
      			$_SESSION['login_details_id'] = $row44 ['login_details_id'];

          echo "<script>alert('Welcome. Login is Successfull!')</script>";
          echo "<script>window.location.href='staff/dashboard.php';</script>";
        }
        else
        {
          echo "<script>alert('Your Account is Inactive!');</script>";
          echo "<script>window.location.href='index.php';</script>";
        }
      }
      else
      {
        $stmt4 = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_email=? AND cust_password=?");
        $stmt4->bind_param("ss", $email, $password);
        $stmt4->execute();

        if($stmt4->fetch())
        {
          $cust_email =  $email;
          $cust_password =  $password;

          include "dbconnection.php";

          $stmt5 = $conn->prepare("SELECT * FROM  `user_customer` WHERE cust_email=? AND cust_password=?");
          $stmt5->bind_param("ss", $cust_email, $cust_password);
          $stmt5->execute();
          $result5 = $stmt5->get_result();
          $row5 = $result5->fetch_assoc();
          $id = $row5 ['cust_id'];

            session_start();

            $_SESSION['cust_id'] = $id;

            echo "<script>alert('Welcome. Login is Successfull!')</script>";
            echo "<script>window.location.href='customer/dashboard.php';</script>";
        }
        else
        {
          echo "<script>alert('Your Email or Password is Incorrect!')</script>";
          echo "<script>window.location.href='index.php';</script>";
        }
      }
    }
  }
  else
  {
    echo "<script>alert('Please enter your Email and Password!')</script>";
    echo "<script>window.location.href='index.php';</script>";
  }
}

?>
