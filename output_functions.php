<?php
echo "<link href='css/style.css' rel='stylesheet' type='text/css' media='all'/>";
echo "<link href='css/articlestyle.css' rel='stylesheet' type='text/css' media='all'/>";
require_once 'conn.php';
require_once 'http.php';
function trimBody($theText,$lmt=200, $stop_character="\n", $stop_count=2){
   $position=0;
   $trimmed=FALSE;
     for($i=1;$i<=$stop_count;$i++){
        if($tmp=strpos($theText,$stop_character,$position+1)){
            $position=$tmp;
            $trimmed=TRUE;
        }else{
            $position=strlen($theText)-1;
            $trimmed=FALSE;
        break;
        }
     }
    $theText=substr($theText,0,$position);
    
    if(strlen($theText)>$lmt){
        $theText=substr($theText,0,$lmt);
        $theText=substr($theText,0,strrpos($theText,''));
        $trimmed=TRUE;
    }
    if($trimmed) $theText.='...';
    return $theText;
}

function outputgradeonemath($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_one_math ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradeonemath.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradeonemath1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_one_math ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradeoneeng($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_one_eng ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradeoneeng.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradeoneeng1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_one_eng ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradeonescie($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_one_sci ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradeonescie.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradeonescie1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_one_sci ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradetwomath($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_two_math ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradetwomath.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradetwomath1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_two_math ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradetwoeng($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_two_eng ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradetwoeng.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradetwoeng1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_two_eng ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradetwoscie($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_two_sci ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradetwoscie.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradetwoscie1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_two_sci ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradethreemath($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_three_math ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradethreemath.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradethreemath1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_three_math ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradethreeeng($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_three_eng ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradethreeeng.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradethreeeng1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_three_eng ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function outputgradethreescie($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_three_sci ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='articles'>";
            echo "<div class=showArticles><a href=\"viewgradethreescie.php?article=" .$row['article_id'] . "\" style='color:black'>";
            include 'outputStory_component.php';       
       }
    }
}
function outputgradethreescie1($article,$only_snippet=FALSE){
    global $conn;
    if($article){
        $sql = "SELECT ar.*,usr.name FROM grade_three_sci ar LEFT OUTER JOIN cms_users usr
        ON ar.author_id=usr.user_id WHERE ar.article_id=".$article;
        $result=$conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<div class=viewArticle>";
            include 'outputStory_component2.php';      
       }
    }
}
function g1mathcomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_one_math WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g1mathcomment";
      $_SESSION['current_page']=$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade1math_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g1engcomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_one_eng WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g1engcomment";
      $_SESSION['current_page']=$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade1eng_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g1sciecomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_one_sci WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g1sciecomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade1sci_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g2mathcomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_two_math WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g2mathcomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade2math_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g2engcomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_two_eng WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g2engcomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade2eng_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g2sciecomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_two_sci WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g2sciecomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade2sci_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g3mathcomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_three_math WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g3mathcomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade3math_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g3engcomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_three_eng WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g3engcomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade3eng_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}
function g3sciecomments($article, $showLink=TRUE){
    global $conn;
    
    if($article){
      $sql1=$conn->prepare("SELECT is_published FROM grade_three_sci WHERE article_id=".$article);
      $sql1->execute();

      $row = $sql1->fetch(PDO::FETCH_ASSOC);
      $is_published=$row['is_published'];
      $comment_type="g3sciecomment";
      $_SESSION['current_page']=$_SERVER['REQUEST_URI'];
      $sql=$conn->prepare("SELECT co.*, usr.name
       FROM grade3sci_comments co LEFT OUTER JOIN cms_users usr 
       ON co.comment_user=usr.user_id WHERE co.article_id=$article ORDER BY co.comment_date DESC");
      $sql->execute();
      require 'comments_component.php';
    }
}

?>