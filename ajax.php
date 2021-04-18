function Books() {
  var xhttp = new XMLHttpRequest();
  var xhttp1=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("container_").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "books.php", true);
    xhttp.send();
}
