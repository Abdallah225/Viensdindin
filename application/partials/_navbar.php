<!-- Navigation -->
<nav class="navbar navbar-expand-lg  navbar-dark fixed-top">
<?php 
if (!empty($_SESSION['id']))
{
echo "<a class='navbar-brand' href='page.php''>";
}
else
{
  echo "<a class='navbar-brand' href='./'>";
}
?>
    <img class="img-fluid" src="asset/images/Logo_viendindin.png" alt="Responsive image" width="150">
  </a>
  <button class="navbar-toggler" onclick="function()" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <input id="search" class="btn btn-outline-dark my-2 my-sm-0" type="text" placeholder="Que recherchez vous ?"> 
      <!-- <img src="asset/images/magnifying-glass.svg" alt=""> -->
      <br><br>
      <ul class="navbar-nav ml-auto">
        <?php 
							if (!empty($_SESSION['id']))
							{
                echo "<li class='nav-item active'>";
                echo "<a class='nav-link active' href='page'>Acceuil";
                echo "<span class='sr-only'>(current)</span>";
                echo "</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='explorer'>Explorer</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='profile'><i class='fas fa-user-circle ico'></i></a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='#'><i class='fas fa-bell ico'></i></a>";
                echo "</li>";
                // echo "<li class='nav-item'>";
                // echo "<a class='nav-link' href='edit_profile.php'><i class='fas fa-cog ico'></i></a>";
                // echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='php/logout'><i class='fas fa-sign-out-alt'></i></a>";
                echo "</li>";
							}
							else
							{
                echo "<li class='nav-item active'>";
                echo "<a class='nav-link active' href='./'>Acceuil";
                echo "<span class='sr-only'>(current)</span>";
                echo "</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='register'>Inscription</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='login'>Connexion</a>";
                echo "</li>";
							}
								
							?>
        
      </ul>
    </div> 
</nav>
<script src="asset/js/jquery.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
<script>
    $(document).ready(function(){
        $('.menu').click(function(){
            $('mylink').toggleClass('active');
        })
    })
</script>
<script>
   $(function(){
$(window).scroll(function() {
 if($(window).scrollTop() >= 200) {
   $('nav').addClass('scrolled');
 }
else {
  $('nav').removeClass('scrolled');
}
});
});

// click change backround color navbar
clicked = true;
    $(document).ready(function(){
        $(".navbar").click(function(){
            if(clicked){
                $(this).css('background-color', 'rgba(0, 0, 0, 0.8)');
                clicked  = false;
            } else {
                $(this).css('background-color', 'rgba(0, 0, 0, 0)');
                clicked  = true;
            }   
        });
    });
</script>
