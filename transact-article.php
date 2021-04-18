<?php
session_start();
require_once('conn.php');
require_once('http.php');
   if(isset($_REQUEST['action'])){
     switch ($_REQUEST['action']) {
             case 'Submit Video':
              $statusMsg = '';
              // File upload path
              $maxsize=104857600;
              $targetDir = "uploads/videos/";
              $fileName = $_FILES["file"]["name"];
              $targetFilePath = $targetDir . $_FILES["file"]["name"];
              $fileType =strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

              // Allow certain file formats
              $allowTypes = array('mp4','avi','3gp','mov','mpeg');
              if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                      // Insert image file name into database
                     //isset($_SESSION['gradeonemath'])
                      $sql=$conn->prepare("INSERT INTO videos(title,date_submitted,location_,name_) VALUES
                      ('".$_POST['title']."','".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                       $sql->execute();   
                      }  
                      else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }       
                   if($sql){
                          $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                      }else{
                          $statusMsg = "File upload failed, please try again.";
                      } 
              }
            else{
                  $statusMsg = 'Invalid file extention.';
              } 
              redirect('reviewVideo.php'); 
             break;
             #trials for selecting grade and submitting to appropriate grade table
             case 'Submit New Article':

                //variables for inserting the header image
                $statusMsg = '';
                // File upload path
                $maxsize=104857600;
                $targetDir = "uploads/";
                $fileName = $_FILES["file"]["name"];
                $targetFilePath = $targetDir . $_FILES["file"]["name"];
                $fileType =strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','pdf','mp4','avi','3gp','mov','mpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                        // Insert image file name into database
                       //isset($_SESSION['gradeonemath'])
                    if(isset($_POST['title'])
                    and isset($_POST['body'])
                    and isset($_SESSION['user_id'])){
                       if (isset($_SESSION['gradeonemath'])) {
                        $sql=$conn->prepare("INSERT INTO grade_one_math (title,body,author_id,date_submitted,location_,name_) VALUES
                        ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                         $sql->execute();   
                        }
                       if (isset($_SESSION['gradeoneeng'])) {
                          $sql=$conn->prepare("INSERT INTO grade_one_eng (title,body,author_id,date_submitted,location_,name_) VALUES
                          ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                           $sql->execute();   
                          }
                        if (isset($_SESSION['gradeonescie'])) {
                            $sql=$conn->prepare("INSERT INTO grade_one_sci(title,body,author_id,date_submitted,location_,name_) VALUES
                            ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                             $sql->execute();   
                            }
                        if (isset($_SESSION['gradetwomath'])) {
                              $sql=$conn->prepare("INSERT INTO grade_two_math (title,body,author_id,date_submitted,location_,name_) VALUES
                              ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                               $sql->execute();   
                              }
                        if (isset($_SESSION['gradetwoeng'])) {
                              $sql=$conn->prepare("INSERT INTO grade_two_eng(title,body,author_id,date_submitted,location_,name_) VALUES
                              ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                               $sql->execute();   
                              }  
                        if (isset($_SESSION['gradetwoscie'])) {
                                $sql=$conn->prepare("INSERT INTO grade_two_sci (title,body,author_id,date_submitted,location_,name_) VALUES
                                ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                                 $sql->execute();   
                                } 
                        if (isset($_SESSION['gradethreemath'])) {
                                 $sql=$conn->prepare("INSERT INTO grade_three_math (title,body,author_id,date_submitted,location_,name_) VALUES
                                ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                                   $sql->execute();   
                                  }    
                        if (isset($_SESSION['gradethreeeng'])) {
                                 $sql=$conn->prepare("INSERT INTO grade_three_eng (title,body,author_id,date_submitted,location_,name_) VALUES
                                ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                                   $sql->execute();   
                                  } 
                        if (isset($_SESSION['gradethreescie'])) {
                                 $sql=$conn->prepare("INSERT INTO grade_three_sci (title,body,author_id,date_submitted,location_,name_) VALUES
                                ('".$_POST['title']."','".$_POST['body']."',".$_SESSION['user_id'].",'".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."')");  
                                   $sql->execute();   
                                  }         
                     if($sql){
                            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                        }else{
                            $statusMsg = "File upload failed, please try again.";
                        } 
                        }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }
              else{
                    $statusMsg = 'Invalid file extention.';
                }
              }
              redirect('cpanel.php');  
              break;

         case 'Edit': 
                redirect('composearticle.php?article_category='.$_POST['article_category'].'&a=edit&article='.$_POST['article']);
             break;  

         case 'Save changes':
                if(isset($_POST['title'])
                   and isset($_POST['body'])
                   and isset($_POST['article'])){
                    if (isset($_POST['category'])) {
                      if($_POST['category']=='g1math'){
                        $sql=$conn->query("UPDATE grade_one_math SET title='".$_POST['title']."',
                        body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                        WHERE article_id=".$_POST['article']);
                        }
                      if($_POST['category']=='g1eng'){
                          $sql=$conn->query("UPDATE grade_one_eng SET title='".$_POST['title']."',
                          body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                          WHERE article_id=".$_POST['article']);
                          }
                      if($_POST['category']=='g1scie'){
                      $sql=$conn->query("UPDATE grade_one_sci SET title='".$_POST['title']."',
                      body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                      WHERE article_id=".$_POST['article']);
                      }

                      if($_POST['category']=='g2math'){
                        $sql=$conn->query("UPDATE grade_two_math SET title='".$_POST['title']."',
                        body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                        WHERE article_id=".$_POST['article']);
                        }

                      if($_POST['category']=='g2eng'){
                      $sql=$conn->query("UPDATE grade_two_eng SET title='".$_POST['title']."',
                      body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                      WHERE article_id=".$_POST['article']);
                      }

                      if($_POST['category']=='g2scie'){
                        $sql=$conn->query("UPDATE grade_two_sci SET title='".$_POST['title']."',
                        body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                        WHERE article_id=".$_POST['article']);
                        }

                      if($_POST['category']=='g3math'){
                      $sql=$conn->query("UPDATE grade_three_math SET title='".$_POST['title']."',
                      body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                      WHERE article_id=".$_POST['article']);
                      }
                      if($_POST['category']=='g3eng'){
                      $sql=$conn->query("UPDATE grade_three_eng SET title='".$_POST['title']."',
                      body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                      WHERE article_id=".$_POST['article']);
                      }
                      if($_POST['category']=='g3scie'){
                        $sql=$conn->query("UPDATE grade_three_sci SET title='".$_POST['title']."',
                        body='".$_POST['body']."',date_submitted='".date("Y-m-d H:i:s",time())."' 
                        WHERE article_id=".$_POST['article']);
                        }
                    }
                      
                       if (isset($_POST['author_id'])) {
                           $sql.="AND author_id=".$_POST['authorid'];
                       }
                }
                if(isset($_POST['author_id'])){
                  redirect('cpanel.php');
                }else {
                    redirect('cpanel.php');
                }
             break;    

         case 'Publish':
               if ($_POST['article']) {
                if (isset($_POST['article_category'])) {
                  if($_POST['article_category']=='g1eng'){
                    $sql=$conn->query("UPDATE grade_one_eng ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g1math'){
                    $sql=$conn->query("UPDATE grade_one_math ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g1scie'){
                    $sql=$conn->query("UPDATE grade_one_sci ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  } 
                  if($_POST['article_category']=='g2math'){
                    $sql=$conn->query("UPDATE grade_two_math ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g2eng'){
                    $sql=$conn->query("UPDATE grade_two_eng ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g2scie'){
                    $sql=$conn->query("UPDATE grade_two_sci ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g3math'){
                    $sql=$conn->query("UPDATE grade_three_math ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g3eng'){
                    $sql=$conn->query("UPDATE grade_three_eng ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                  if($_POST['article_category']=='g3scie'){
                    $sql=$conn->query("UPDATE grade_three_sci ar SET ar.is_published=1, ar.date_published='".date("Y-m-d H:i:s",time())."'
                   WHERE ar.article_id=".$_POST['article']) ;
                  }
                }
               }
             redirect('cpanel.php');  
             break;    
        case 'Retract':
               if ($_POST['article']) {
                if (isset($_POST['article_category'])) {
                  if($_POST['article_category']=='g1eng'){
                    $sql=$conn->query("UPDATE grade_one_eng 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g1math'){
                    $sql=$conn->query("UPDATE grade_one_math 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g1scie'){
                    $sql=$conn->query("UPDATE grade_one_sci
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  } 
                  if($_POST['article_category']=='g2math'){
                    $sql=$conn->query("UPDATE grade_two_math 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g2eng'){
                    $sql=$conn->query("UPDATE grade_two_eng 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g2scie'){
                    $sql=$conn->query("UPDATE grade_two_sci 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g3math'){
                    $sql=$conn->query("UPDATE grade_three_math 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g3eng'){
                    $sql=$conn->query("UPDATE grade_three_eng 
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g3scie'){
                    $sql=$conn->query("UPDATE grade_three_sci
                    SET is_published=0,date_published='' WHERE article_id=".$_POST['article']);
                  }
                }
                  
               }
            redirect('cpanel.php');   
            break;
           
        case 'Delete':
              if ($_POST['article']) {
                if (isset($_POST['article_category'])) {
                  if($_POST['article_category']=='g1eng'){
                    $sql=$conn->query("DELETE FROM grade_one_eng WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g1math'){
                    $sql=$conn->query("DELETE FROM grade_one_math WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g1scie'){
                    $sql=$conn->query("DELETE FROM grade_one_sci WHERE  article_id=".$_POST['article']);
                  } 
                  if($_POST['article_category']=='g2math'){
                    $sql=$conn->query("DELETE FROM grade_two_math WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g2eng'){
                    $sql=$conn->query("DELETE FROM grade_two_eng WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g2scie'){
                    $sql=$conn->query("DELETE FROM grade_two_sci WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g3math'){
                    $sql=$conn->query("DELETE FROM grade_three_math WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g3eng'){
                    $sql=$conn->query("DELETE FROM grade_three_eng WHERE  article_id=".$_POST['article']);
                  }
                  if($_POST['article_category']=='g3scie'){
                    $sql=$conn->query("DELETE FROM grade_three_sci WHERE  article_id=".$_POST['article']);
                  }
                }
              }
            redirect('cpanel.php');  
            break;    

            case 'Publish Video';
            $sql=$conn->query("UPDATE videos SET is_published=1, date_published='".date("Y-m-d H:i:s",time())."'
              WHERE id=".$_SESSION['video']);
             redirect('reviewVideo.php');
             break;

            case 'Retract Video';
               $sql=$conn->query("UPDATE videos
                SET is_published=0,date_published='' WHERE id=".$_SESSION['video']);
                redirect('reviewVideo.php');
             break;

           case 'Delete Video';
           $sql=$conn->query("DELETE FROM videos WHERE id=".$_SESSION['video']);
           redirect('reviewVideo.php');
            break;
        case 'Send':
              if (isset($_POST['article'])
                  and $_POST['article']
                  and isset($_POST['comment'])
                  and $_POST['comment']){
                      if($_POST['comment_type']=='g1mathcomment'){
                        $sql=$conn->query("INSERT INTO grade1math_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradeonemath.php?article=".$_POST['article']); 
                      } 
                      if($_POST['comment_type']=='g1engcomment'){
                        $sql=$conn->query("INSERT INTO grade1eng_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradeoneeng.php?article=".$_POST['article']); 
                      }
                      if($_POST['comment_type']=='g1sciecomment'){
                        $sql=$conn->query("INSERT INTO grade1sci_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradeonescie.php?article=".$_POST['article']); 
                      }
                      if($_POST['comment_type']=='g2mathcomment'){
                        $sql=$conn->query("INSERT INTO grade2math_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradetwomath.php?article=".$_POST['article']); 
                      } 
                      if($_POST['comment_type']=='g2engcomment'){
                        $sql=$conn->query("INSERT INTO grade2eng_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradetwoeng.php?article=".$_POST['article']); 
                      } 
                      if($_POST['comment_type']=='g2sciecomment'){
                        $sql=$conn->query("INSERT INTO grade2sci_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradetwoscie.php?article=".$_POST['article']); 
                      } 
                      if($_POST['comment_type']=='g3mathcomment'){
                        $sql=$conn->query("INSERT INTO grade3math_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradethreemath.php?article=".$_POST['article']); 
                      } 
                      if($_POST['comment_type']=='g3engcomment'){
                        $sql=$conn->query("INSERT INTO grade3eng_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradethreeeng.php?article=".$_POST['article']); 
                      } 
                      if($_POST['comment_type']=='g3sciecomment'){
                        $sql=$conn->query("INSERT INTO grade3sci_comments (article_id,comment_date,comment_user,comment_)
                        VALUES (".$_POST['article'].",'".date("Y-m-d H:i:s",time())."',".$_SESSION['user_id'].",
                        '".$_POST['comment']."')");
                        redirect("viewgradethreescie.php?article=".$_POST['article']); 
                      } 
              }
            break;    
        
        case 'remove':
              if (isset($_GET['article'])
                 and isset($_SESSION['user_id'])) {
                    $sql=$conn->query("DELETE FROM cms_articles WHERE article_id=".$_GET['article'].
                    "AND aurhor_id".$_SESSION['user_id']) or die('could nt remove article'.mysql_error());
              }
            redirect('cpanel.php');  
            break;    
     }
   }else {
       redirect('index.php');
   }
?>