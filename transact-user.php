<?php
  require_once 'conn.php';
  require_once 'http.php';

  if(isset($_REQUEST['action'])){
      switch($_REQUEST['action']){
          case 'Login':
               if(isset($_POST['name']) and isset($_POST['passwd'])){
                   $sql="SELECT user_id,access_lvl,name FROM cms_users WHERE name='".$_POST['name']."' 
                   and passwd='".$_POST['passwd']."'";
                   $result=$conn->query($sql) or die('could not look up user information;'.mysql_error());

                   if($row = $result->fetch(PDO::FETCH_ASSOC)){
                      session_start();
                      $_SESSION['user_id']=$row['user_id'];
                      $_SESSION['access_lvl']=$row['access_lvl'];
                      $_SESSION['name']=$row['name'];
                      if ($_SESSION['access_lvl']==2) {
                        redirect('Foreducators.php');
                      }elseif ($_SESSION['access_lvl']==3) {
                        redirect('admin.php');
                      }else{
                        redirect('index.php');
                      }
                   }else {
                    redirect('login.php?q=error_msg');
                   }
                   if (isset($_POST['remember_me']) ) {
                    setcookie ("username",$_POST["name"],time()+ 3600);
                   }
                   else {
                    setcookie("username","");
                  }
                }
              break;
             case 'CLogin':
                if(isset($_POST['name']) and isset($_POST['passwd'])){
                  $sql="SELECT user_id,name,access_lvl FROM cms_users WHERE name='".$_POST['name']."' 
                  and passwd='".$_POST['passwd']."'";
                  $result=$conn->query($sql);

                  if($row = $result->fetch(PDO::FETCH_ASSOC)){
                     session_start();
                     $_SESSION['user_id']=$row['user_id'];
                     $_SESSION['access_lvl']=$row['access_lvl'];
                     $_SESSION['name']=$row['name'];
                     header("Location:".$_SESSION['current_page']);
                  }else {
                    redirect('commentlogin.php?q=error_msg');
                  }
               }
                break;
            case 'Logout':
                  session_start();
                  session_unset();
                  session_destroy();

                  redirect('index.php');
                break;  

             case 'CreateAccount':
                   if(isset($_POST['name']) 
                   and isset($_POST['passwd'])
                   and isset($_POST['passwd2'])
                   and $_POST['passwd']==$_POST['passwd2']){
                    $sql = $conn->query("INSERT INTO cms_users (name, passwd) VALUES
                     ('".$_POST['name']."','".$_POST['passwd']."')");
                   
                   session_start();
                   $_SESSION['$user_id']=$conn->lastInsertId();
                   $_SESSION['access_lvl']=1;
                   $_SESSION['name']=$_POST['name']; 
                }
                 redirect('index.php');
                 break;   
             case 'Modify Account':
                   $del=$_POST['accl_'];
                   if(isset($_POST['userid'])){
                     if (isset($_POST['name'])) {
                      $sql= $conn->query("UPDATE cms_users SET name='".$_POST['name']."' WHERE user_id='".$_POST['userid']."'");
                    }
                     if (isset($_POST['accl_'])) {
                      $sql= $conn->query("UPDATE cms_users SET access_lvl='".$_POST['accl_']."' WHERE user_id='".$_POST['userid']."'");
                     }
                   }
                   else if ($del=="delete") {
                    $sql1=$conn->query("DELETE FROM cms_users WHERE user_id='".$_POST['userid']."'");
                   }
                   redirect('admin.php');
                 break;    
              case 'Send reminder':
                    if(isset($_POST['email'])){
                      $sql=$conn->prepare("SELECT passwd FROM cms_users WHERE name='".$_POST['name']."'");
                      $sql->execute();
                        if($sql->rowCount()==0){
                          $row = $sql->fetch(PDO::FETCH_ASSOC);

                          $subject='password reminder';
                          $body="Your password is:" .
                                 $row['passwd']. 
                                 "\n\nYou can use it to log at at http://". 
                                 $_SERVER['HTTP_HOST']. 
                                 dirname($_SERVER['PHP_SELF']). '/';
                           
                          mail($_POST['email'],$subject,$body) or die('cold not send reminder');      
                        }
                    }
                    redirect('login.php');    
                    break;
            case 'Change my info':
                  session_start();
                  
                  if(isset($_POST['name'])
                     and isset($_POST['email'])
                     and isset($_SESSION['user_id'])){
                       $sql=$conn->query("UPDATE cms_users SET email='".$_POST['email']."',name='".$_POST['name']."'
                        WHERE user_id=".$_SESSION['user_id'])
                       or die('could not update user account'.mysql_error());
                  }
                  redirect('cpanel.php');
                  break;

      }
  }
?>