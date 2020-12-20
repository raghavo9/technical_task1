<?php
session_start();

function is_user_logged_in(){
    // return true if user is already logged in
    // otherwise return false
    session_start();
    if(!isset($_SESSION["user"]) and $_SESSION["user"]=="")
    {
        return false;
    }
    else{
        return true;
    }
    
}

function make_user_session($userdata){
    // set user details in session
    session_start();
    
  

}

function destroy_user_session(){
    // destroy session and redirect to login page
    session_start();
    if(isset($_SESSION["user"]) and $_SESSION["user"])
    {
        session_destroy();
        header("location:index.php");
        exit();
    }
   
}

?>