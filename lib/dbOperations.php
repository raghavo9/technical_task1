<?php
    require_once('./config/db1.php');

    function fetchRecordAll($entity,$start=0,$end=10){
        $con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("cann't connect to database server");
        mysqli_select_db($con,"task") or die("database not found");
        // fetch records for entity(category, article, comment) where status is true
        // start and end will control the behaviour for pagination  
        

        $sql = "select * from  $entity LIMIT $start, $end ";
        $res=mysqli_query($con,$sql);
        //$data=mysqli_fetch_assoc($res);
        return $res;

/*
        if($entity=='user')
        {
            $sql = "select * from  user LIMIT $start, $end ";
            $res=mysqli_query($con,$sql);
            //$data=mysqli_fetch_assoc($res);
            return $res;

        }
        if($entity=='category')
        {
            
            $sql = "select * from  category LIMIT $start, $end ";
            $res=mysqli_query($con,$sql);
            //$data=mysqli_fetch_assoc($res);
            return $res;

        }
        if($entity=='article')
        {
            
            $sql = "select * from  article LIMIT $start, $end ";
            $res=mysqli_query($con,$sql);
            //$data=mysqli_fetch_assoc($res);
            return $res;

        }
        if($entity=='comment')
        {
            
            $sql = "select * from  comment LIMIT $start, $end ";
            $res=mysqli_query($con,$sql);
            //$data=mysqli_fetch_assoc($res);
            return $res;

        }
        */
       
    }

    function fetchRecordSpecific($entity,$primary){
        // fetch single record for entity(category, article, comment)
        $sql = "select * from  $entity where  ";
    }

    function insertRecord($entity,$data){
        // insert single record for entity(category, article, comment) with data passed
        //echo 'Insert Called';

        $con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("cann't connect to database server");
        mysqli_select_db($con,"task") or die("database not found");
        /*
        $user=$data["user"];
        $email=$data["email"];
        $pwd=$data["pwd"];
        */

        if($entity=='user')
        {
            $sql="INSERT INTO user(`name`,`email`,`pwd`,`status`) VALUES ('$data[user]','$data[email]','$data[pwd]','A')";
            $res = mysqli_query($con,$sql);
            $dt=mysqli_fetch_assoc($res);
            session_start();
            $_SESSION["user"]=$dt["user"];
            $_SESSION["id"]=$dt["id"];
            $_SESSION["pwd"]=$dt["pwd"];
            $_SESSION["email"]=$dt["email"];
            $_SESSION["status"]=$dt["status"];
            header("location:dashboard.php");
            exit();

        }

        /*
        $sql2="INSERT INTO `$entity` (`id`, `name`, `email`, `pwd`,`status`) VALUES (NULL, '$user','$email','$pwd','A');";
        $res=mysqli_query($con,$sql2);
        $error_db=mysqli_error($con);
        $dt=mysqli_fetch_assoc($res)
        var_dump($error_db);
        if(mysqli_affected_rows($con)>0)
        {
            echo "Registered successfully";
            session_start();
            $_SESSION["user"]=$user;
            $_SESSION["id"]=$dt["id"];
            $_SESSION["pwd"]=$pwd;
            $_SESSION["email"]=$email;
            $_SESSION["status"]=$dt["status"];
            header("location:dashboard.php");
            exit();
        }
       */
    }

    function updateRecord($entity,$primary,$data){
        // update single record for entity(category, article, comment) using its primary key with data passed
        $con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("cann't connect to database server");
        mysqli_select_db($con,"task") or die("database not found");
        if($entity=='category')
        {
            /*
            echo "reached inside update record";
            echo "<br>";
            var_dump($entity);
            echo "<br>";
            var_dump($primary);
            echo "<br>";
            var_dump($data);
            echo "<br>";
            echo "<br>";

            */
            var_dump($_GET);
            session_start();
            //echo "<br><br> this is sesssion id: ";
            var_dump($_SESSION["id"]);
            //echo "<br><br>";
            $v1=$_SESSION["id"];

            $sql4= "UPDATE $entity SET `name`='$data[name]', `descp`='$data[descp]',`status`='$data[status]' WHERE `id`='$v1'";
                     
            $res = mysqli_query($con,$sql4);
            $val1=mysqli_affected_rows($con);
            //var_dump($val1);


            //var_dump($res);
        }
        
       
    }

    function deleteRecord($entity,$primary){
        // delete single record for entity(category, article, comment) using its primary key
        $v3=$_SESSION["id"];
        echo "<br><br>";
        var_dump($v3);
        $con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("cann't connect to database server");
        mysqli_select_db($con,"task") or die("database not found");
        $sql5=" DELETE FROM $entity where `id`=$v3";
        $res= mysqli_query($con,$sql5);
    }

    function authenticate($username, $pwd){
        // if successful, redirect to dashboard
        // else stay on login page
        $con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("DB Server is down");
        mysqli_select_db($con,"task") or die("DB not available");
        echo "<br> function authenticate called";
        echo $username;
        echo $pwd;
        $sql1= "select * from user where `name`= '$username'";
        $res= mysqli_query($con,$sql1);
        var_dump($res);

        echo "<br><br>";
        var_dump(mysqli_num_rows($res));
        $val=mysqli_num_rows($res);
        
        if($val)
        {
            
            
            while($dt=mysqli_fetch_assoc($res))
            {
                echo "<br> inside while";
                if($dt["pwd"]==$pwd)
                {
                    echo "<br> password mathced";
                    session_start();
                    $_SESSION["user"]=$username;
                    $_SESSION["pwd"]=$pwd;
                    $_SESSION["id"]=$dt["id"];
                    $_SESSION["email"]=$dt["email"];
                    $_SESSION["status"]=$dt["status"];


                    header("location:dashboard.php");
                    exit();
                }
                else{
                    return false;
                }
            }
        }
       
    }
?>