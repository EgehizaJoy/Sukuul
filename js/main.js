function Home(){
    window.location="http://localhost/kidscms/";
}
function Students() {
  window.location="http://localhost/kidscms/Students.php";
}
function Educators() {
  var modal=document.getElementById("login_popup");
  modal.style.display="block";
}
function closelogin_popUp() {
  var modal=document.getElementById("login_popup");
  modal.style.display="none";
}
function close_popUp() {
  var modal=document.getElementById("signup_popup");
  modal.style.display="none";
}
function Educators_() {
  window.location="http://localhost/kidscms/Foreducators.php";
}
function Addcomment() {
  var mysession=document.getElementById("mysession").value;
  if(mysession===""){
    window.location="http://localhost/kidscms/commentLogin.php";
  }else{
  var modal=document.getElementById("submitComment");
  modal.style.display="block";
  }
}
function Admin() {
  var modal=document.getElementById("login_popup");
  modal.style.display="block";
}
function SignUp() {
  var modal=document.getElementById("signup_popup");
  modal.style.display="block";
}
function Showmodal(){
  var modal=document.getElementById("myModal");
  modal.style.display="block";
}
function showMsg() {
  var modal=document.getElementById("no_article_modal");
  modal.style.display="block";
}
function closeTextModal() {
  var modal=document.getElementById("text_modal");
  modal.style.display="none"
  var modal1=document.getElementById("text_");
  modal1.style.display="block" 
}
function Closemodal(){
  var modal=document.getElementById("myModal");
  var modal1=document.getElementById("myModal1");
  var modal2=document.getElementById("myModal2");
  modal.style.display="none";
  modal1.style.display="none";
  modal2.style.display="none";
}
function gradeoneM() {
  var grade1math=document.getElementById("grade1math");
  window.location.href="http://localhost/kidscms/composearticle.php?grade1math"+grade1math;
}
function gradeoneE() {
  var grade1eng=document.getElementById("grade1eng");
  window.location.href="http://localhost/kidscms/composearticle.php?grade1eng"+grade1eng;
}
function gradeoneS() {
  var grade1scie=document.getElementById("grade1scie");
  window.location.href="http://localhost/kidscms/composearticle.php?grade1scie"+grade1scie;
}
function gradetwoM() {
  var grade2math=document.getElementById("grade2math");
  window.location.href="http://localhost/kidscms/composearticle.php?grade2math"+grade2math;
}
function gradetwoE() {
  var grade2eng=document.getElementById("grade2eng");
  window.location.href="http://localhost/kidscms/composearticle.php?grade2eng"+grade2eng;
}
function gradetwoS() {
  var grade2scie=document.getElementById("grade2scie");
  window.location.href="http://localhost/kidscms/composearticle.php?grade2scie"+grade2scie;
}
function gradethreeM() {
  var grade3math=document.getElementById("grade3math");
  window.location.href="http://localhost/kidscms/composearticle.php?grade3math"+grade3math;
}
function gradethreeE() {
  var grade3eng=document.getElementById("grade3eng");
  window.location.href="http://localhost/kidscms/composearticle.php?grade3eng"+grade3eng;
}
function gradethreeS() {
  var grade3scie=document.getElementById("grade3scie");
  window.location.href="http://localhost/kidscms/composearticle.php?grade3scie"+grade3scie;
}
function preview_image(event) {
  var reader=new FileReader();
  reader.onload=function() {
    var output=document.getElementById('output_image');
    output.src=reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
function preview_video(event) {
  var reader=new FileReader();
  reader.onload=function() {
    var output=document.getElementById('output_video');
    output.src=reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
function getgradeoneM() {
  var getg1math=document.getElementById("getg1mathArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg1math"+getg1math;
}
function getgradeoneE() {
  var getg1eng=document.getElementById("getg1engArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg1eng"+getg1eng;
}
function getgradeoneS() {
  var getg1scie=document.getElementById("getg1scieArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg1scie"+getg1scie;
}
function getgradetwoM() {
  var getg2math=document.getElementById("getg2mathArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg2math"+getg2math;
}
function getgradetwoE() {
  var getg2eng=document.getElementById("getg2engArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg2eng"+getg2eng;
}
function getgradetwoS() {
  var getg2scie=document.getElementById("getg2scieArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg2scie"+getg2scie;
}
function getgradethreeM() {
  var getg3math=document.getElementById("getg3mathArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg3math"+getg3math;
}
function getgradethreeE() {
  var getg3eng=document.getElementById("getg3engArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg3eng"+getg3eng;
}
function getgradethreeS() {
  var getg3scie=document.getElementById("getg3scieArticles");
  window.location.href="http://localhost/kidscms/outputArticles.php?getg3scie"+getg3scie;
}
function Videos() {
  window.location.href="http://localhost/kidscms/videos.php";
  }
function Books() {
  window.location.href="http://localhost/kidscms/books.php";
}
function Games() {
  window.location.href="http://localhost/kidscms/games.php";
}
function show_controls() {
document.getElementById("vid1").controls=true; 
}
function remove_controls() {
  document.getElementById("vid1").controls=false; 
  }
function refresh() {
  document.getElementById("vid1").play();
}
function my_vid(index,more){
  var vid = document.getElementById("vid1");
  vid.src = index; 
  vid.play();
  document.getElementById('more_abt').innerHTML=more;
  }
function my_games(index) {
  var theFrame=document.getElementById("main_game");
  theFrame.src = index; 
}
function my_books(index) {
  var theFrame=document.getElementById("main_pdf_file");
  theFrame.src = index; 
}
function ModifyUsers(params) {
  window.location.href="http://localhost/kidscms/admin.php";
}
function AddBooks(params) {
  window.location.href="http://localhost/kidscms/admin.php";
}
function AddGames(params) {
  window.location.href="http://localhost/kidscms/admin.php";
}
function AddVideos() {
  window.location.href="http://localhost/kidscms/uploadVideos.php?addVideos";
}
function ShowVidLinks() {
  var manage_divs=document.getElementById("manage_videos");
  manage_divs.style.display="block";
}
function ShowGameLinks() {
  var manage_divs=document.getElementById("manage_games");
  manage_divs.style.display="block";
}
function ShowBookLinks() {
  var manage_divs=document.getElementById("manage_books");
  manage_divs.style.display="block";
}
function contactUs() {
  window.location.href="http://localhost/olskool/contactUs.php";  
}
function matchPass() {
  var passwd=document.getElementById("passwd").value;
  var passwd2=document.getElementById("passwd2").value;
  if (passwd==passwd2) {
    document.getElementById("matchingPass").innerHTML ="They match!";
  }
  else{
   document.getElementById("matchingPass").innerHTML ="passwords do not match";
  }
}