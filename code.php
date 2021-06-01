<?php
session_start();
$connection=mysqli_connect('localhost','root','','nischay_userdata');
$con=mysqli_connect('localhost','root','','user');
$connection1=mysqli_connect('localhost','root','','post');
//mysqli_select_db($connection,'nischay_userdata');

if(isset($_POST['login_btn']))
{
    $name=$_POST['username'];
    $email_login = $_POST['email']; 
    $password_login = $_POST['password'];
    $pass=md5($password_login); 
  
    $query = "SELECT * FROM register WHERE username='$name' AND password='$pass'";
    echo "ma";
    $query_run = mysqli_query($connection,$query);
    $usertypes=mysqli_fetch_array($query_run);
    
   if($usertypes['usertype']== 'admin')
   {
        $_SESSION['username'] = $email_login;
        $_SESSION['id']=$id;
        header('Location: index.php');
   } 
   else if ($usertypes['usertype']== 'user') {
  
    $_SESSION['username'] = $name;
     $_SESSION['id']=$usertypes['Id'];
     header('Location: signed.php'); 
       }
   else{
        $_SESSION['status'] =  $email_login ;
        header('Location: login.php');
   }
    
}
if(isset($_POST['composebtn']))// member save
{
    $title=$_POST['title'];
    $blog=$_POST['blog'];
    $subtitle=$_POST['subtitle'];
    $file=$_FILES['file'];
    $filename=$file['name'];
    $fileerror=$file['error'];
    $filetmp=$file['tmp_name'];


    $fileext=explode('.', $filename);
    $filecheck=strtolower(end($fileext));

     $table=$_SESSION['username'];
    $fileextstored = array('png','jpg','gif','jpeg');

    if(in_array($filecheck, $fileextstored))
    {
        $destinationfolder='upload/'.$filename;
        
        $query="insert into $table (title,subtitle,blog,file) values ('$title','$subtitle','$blog','$destinationfolder')";
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            move_uploaded_file($filetmp, $destinationfolder);
        
        $_SESSION['blog'] = "$blog";
        $_SESSION['file'] = "$destinationfolder";
        header('Location: post.php');
        }
        else
        {
        $_SESSION['success'] = "About Us NOT added";
        header('Location:signed.php');
        }
    }
  }

if(isset($_POST["signup"]))
{
  //$id;
  $name=$_POST['name'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $confirmpassword=$_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
  $pass=md5($password);  

  if ($password===$confirmpassword) {
  $query="insert into register (Name,username,email,password,usertype) values('$name','$username','$email','$pass','$usertype')";

  $query_run=mysqli_query($connection,$query);
  if($query_run){
    //echo "saved";
    $sql="CREATE TABLE $username( id INT NOT NULL AUTO_INCREMENT , title VARCHAR(255) NOT NULL , blog LONGTEXT NOT NULL , file VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $query_run1=mysqli_query($con,$sql);
    $_SESSION['username']= $username;
    header('location:signed.php');

  }
  else{
    //echo "not saved";
    $_SESSION['Status']= "Admin profile NOT added";
    header('location:login.php');
    echo "connect";
  }



  }else
  {
    $_SESSION['Status']= "Password and confirm password DOES NOT match";
    header('location:register.php');
    echo "connect";
  }
  

}


if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $designation=$_POST['designation'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $website=$_POST['website'];
    $twitter=$_POST['twitter'];
    $instagram=$_POST['instagram'];
    $facebook = $_POST['facebook']; 
    $github = $_POST['github']; 
    $id=$_SESSION['id'];

    $query="UPDATE `register` SET `Name`='$name',`email`='$email',`mobile`='$mobile',`phone`='$phone',`address`='$address',`designation`='$designation',`website`='$website',`github`='$github',`twitter`='$twitter',`instagram`='$instagram',`facebook`='$facebook' WHERE Id='$id'";
    echo "ma";
    $query_run = mysqli_query($connection,$query);
    
    //$sql = "SELECT * FROM register WHERE username='$name' AND password='$password_login'";
    //$query_run1 = mysqli_query($connection,$sql);
    //$id=mysqli_fetch_array($query_run1);
   if($query_run)
   {
        
        header('Location: profile.php');
   } 
   
   else{
        
        header('Location: profile_edit.php');
   }
    
}
if(isset($_POST['postbtn']))// post
{
    $caption=$_POST['caption'];
    $name=$_SESSION['username'];
    $id=$_SESSION['id'];
    $file=$_FILES['file'];
    $filename=$file['name'];
    $fileerror=$file['error'];
    $filetmp=$file['tmp_name'];

    
    $fileext=explode('.', $filename);
    $filecheck=strtolower(end($fileext));

     $table=$_SESSION['username'];
    $fileextstored = array('png','jpg','gif','jpeg');
    if($filename==null)
    {
      
      $query="insert into user_post (id,name,caption) values ('$id','$name','$caption')";
      $query_run = mysqli_query($connection1, $query);
        if($query_run)
          {
            
            echo 'maa';
    
            header('Location: community.php');
          }
        else
          {
            $_SESSION['success'] = "About Us NOT added";
            header('Location:signed.php');
          }
        }
     elseif(in_array($filecheck, $fileextstored))
      {
        $destinationfolder='upload/'.$filename;
        
        
          
        $query="insert into user_post (id,name,caption,file) values ('$id','$name','$caption','$destinationfolder')";
        $query_run = mysqli_query($connection1, $query);
        if($query_run)
        {
            move_uploaded_file($filetmp, $destinationfolder);
        
        
        header('Location: community.php');
        }
        else
        {
        $_SESSION['success'] = "About Us NOT added";
        header('Location:signed.php');
        }
      }
    
  }


?>