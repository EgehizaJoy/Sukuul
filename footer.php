   </div> 
  </div>
  <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("top_");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

$(function() {
     $( "#keywords" ).autocomplete({
       source: 'autocomplete.php',
     });
  });
</script>
 </body>
 <?php } ?>
</html>