<?php require_once 'header.php';?>
<div class="grade_buttons" style="background-image: url('assets/images/monster3.jpg');">
    <div class="grade_one">
    <div class="flip-card" id="getg1mathArticles" onclick="getgradeoneM()">
       <div class="flip-card-inner">
       <div class="flip-card-front">

        <img src="assets/images/g1m.jpg">
       </div>  
       <div class="flip-card-back">
       <h2>grade one math</h2>
       <p>Text Description</p>
       <Button class="go">Go</Button>
       </div>
       </div>
       </div>

       <div class="flip-card" id="getg1engArticles" onclick="getgradeoneE()">
       <div class="flip-card-inner">
       <div class="flip-card-front">
         <div>GRADE 1  ENGLISH</div>
         <div class="tableimage"><img src="assets/images/g1ek.jpg"></div>
       </div>  
       <div class="flip-card-back">
       <h2>grade one english</h2>
       <p>Text Description</p>
       <Button class="go">Go</Button>
       </div>
       </div>
       </div>

       <div class="spec_btn" id="getg1scieArticles" onclick="getgradeoneS()">GRADE 1 SCIENCE</div>
    </div> 

    <div class="grade_one">
    <div class="spec_btn" id="getg2mathArticles" onclick="getgradetwoM()">GRADE 2 MATH</div>
       <div class="spec_btn" id="getg2engArticles" onclick="getgradetwoE()">GRADE 2 ENGLISH</div>
       <div class="spec_btn" id="getg2scieArticles" onclick="getgradetwoS()">GRADE 2 SCIENCE</div>
    </div>
    <div class="grade_one">
    <div class="spec_btn" id="getg3mathArticles" onclick="getgradethreeM()">GRADE 3 MATH</div>
       <div class="spec_btn" id="getg3engArticles" onclick="getgradethreeE()">GRADE 3 ENGLISH</div>
       <div class="spec_btn" id="getg3scieArticles" onclick="getgradethreeS()">GRADE 3 SCIENCE</div> 
    </div>
</div>
<?php require_once 'footer.php';?>