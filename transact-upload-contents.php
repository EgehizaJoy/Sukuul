<?php
session_start();
require_once('conn.php');
require_once('http.php');
   if(isset($_REQUEST['action'])){
     switch ($_REQUEST['action']) {

      case 'Submit Game':
        $statusMsg = '';
        // File upload path
        $maxsize=104857600;
        $targetDir = "uploads/games/";
        $fileName = $_FILES["file"]["name"];
        $targetFilePath = $targetDir . $_FILES["file"]["name"];
        $fileType =strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                // Insert image file name into database
               //isset($_SESSION['gradeonemath'])
                $sql=$conn->prepare("INSERT INTO games(title,date_submitted,location_,image_location) VALUES
                ('".$_POST['title']."','".date("Y-m-d H:i:s",time())."','".$_POST['gameLink']."','".$targetFilePath."')");  
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
        redirect('reviewGames.php'); 
      break;

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
                $sql=$conn->prepare("INSERT INTO videos(title,date_submitted,location_,name_,more) VALUES
                ('".$_POST['title']."','".date("Y-m-d H:i:s",time())."','".$targetFilePath."','".$fileName."','".$_POST['description']."')");  
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

      case 'Change Video':

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
                 $sql=$conn->query("UPDATE header_video SET title='".$_POST['title']."', name_='".$fileName."', location_='".$targetFilePath."' WHERE id=1"); 
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
        redirect('index.php'); 
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

            case 'Publish Game';
            $sql=$conn->query("UPDATE games SET is_published=1, date_published='".date("Y-m-d H:i:s",time())."'
              WHERE id=".$_SESSION['games']);
             redirect('reviewGames.php');
             break;

            case 'Retract Game';
               $sql=$conn->query("UPDATE games SET is_published=0,date_published='' WHERE id=".$_SESSION['games']);
                redirect('reviewGames.php');
             break;

           case 'Delete Game';
           $sql=$conn->query("DELETE FROM games WHERE id=".$_SESSION['games']);
           redirect('reviewGames.php');
            break;

           case 'Delete Book';
           $sql=$conn->query("DELETE FROM books WHERE id=".$_SESSION['games']);
           redirect('reviewBooks.php');
            break;

            case 'Submit Book':
              $statusMsg = '';
              // File upload path
              $maxsize=104857600;
              $targetDir = "uploads/books/";
              $fileName = $_FILES["file"]["name"];
              $pdfName = $_FILES["pdf_file"]["name"];
              $targetFilePath = $targetDir . $_FILES["file"]["name"];
              $targetpdfpath=$targetDir . $_FILES["pdf_file"]["name"];
              $fileType =strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

              // Allow certain file formats
              $allowTypes = array('png','doc','jpg','pdf','jpeg','gif');
              if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                      // Insert image file name into database
                     //isset($_SESSION['gradeonemath'])
                     if(move_uploaded_file($_FILES["pdf_file"]["tmp_name"],$targetpdfpath)){
                      $sql=$conn->prepare("INSERT INTO books(title,book_cover,location_,name) VALUES
                      ('".$_POST['title']."','".$targetFilePath."','".$targetpdfpath."','".$pdfName."')");  
                       $sql->execute();
                     }   
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
              redirect('reviewBooks.php'); 
             break;
     }
   }else {
       redirect('index.php');
   }
?>