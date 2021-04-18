<div id="linkbar">
        <?php
               if(!isset($_SESSION['user_id'])){
                #include 'linkbar_two.php';
               }else{
                    if($_SESSION['access_lvl']==2){
                       echo '<a href="Foreducators.php" class="compose" id="mylink"><i class="fas fa-edit link_icon"></i>Compose Article</a>';
                       echo '<a href="cpanel.php" id="mylink"><i class="fas fa-thumbtack link_icon"></i>My Articles</a>';
                       echo '<a href="transact-user.php?action=Logout" id="mylink"><i class="fa fa-user link_icon"></i>Logout</a>';
                    }
                    if($_SESSION['access_lvl']==3){
                      echo '<div class="my_link_divs">';
                      echo '<a href="admin.php" id="mylink"><i class="fas fa-edit link_icon"></i>Manage Users</a>';
                       //manage games
                       echo  '<div class="spanning_class" id="spanning_class">';
                       echo '<div id="my_manager"><a onclick="ShowBookLinks();"><i class="fas fa-book icon_"></i>Manage Books</a></div>';
                       echo '<div class="manage_divs" id="manage_books">';
                       echo '<div><a href="uploadBooks.php"><i class="fas fa-edit link_icon"></i>Add Book</a></div>';
                       echo '<div><a href="reviewBooks.php"><i class="fas fa-thumbtack link_icon"></i>View Books</a></div>';
                       echo '</div>';
                       echo '</div>';

                      //manage videos
                      echo  '<div class="spanning_class" id="spanning_class">';
                       echo '<div id="my_manager"><a onclick="ShowVidLinks();"><i class="fas fa-video icon_"></i>Manage Videos</a></div>';
                       echo '<div class="manage_divs" id="manage_videos">';
                       echo '<div><a href="uploadVideos.php"><i class="fas fa-edit link_icon"></i>Add Videos</a></div>';
                       echo '<div><a href="reviewVideo.php"><i class="fas fa-thumbtack link_icon"></i>View Videos</a></div>';
                       echo '</div>';
                       echo '</div>';

                       //manage games
                       echo  '<div class="spanning_class" id="spanning_class">';
                       echo '<div id="my_manager"><a onclick="ShowGameLinks();"><i class="fas fa-gamepad icon_"></i>Manage Games</a></div>';
                       echo '<div class="manage_divs" id="manage_games">';
                       echo '<div><a href="uploadGames.php"><i class="fas fa-edit link_icon"></i>Add Games</a></div>';
                       echo '<div><a href="reviewGames.php"><i class="fas fa-thumbtack link_icon"></i>View Games</a></div>';
                       echo '</div>';
                       echo '</div>';

                       echo '<a href="homeVid.php" id="mylink"><i class="fa fa-video icon_"></i>Change Home Video</a>';
  
                        echo '<a href="transact-user.php?action=Logout" id="mylink"><i class="fa fa-user link_icon"></i>Logout</a>';
                        echo '</div>';
                    }
                    if($_SESSION['access_lvl']==1){
                        echo '<div class="linkbars">';
                        #include 'linkbar_two.php';
                        echo '<a href="transact-user.php?action=Logout" id="mylink"><i class="fa fa-user link_icon"></i>Logout</a>';
                        echo '</div>';
                    }
               }
        ?> 
</div>