<?php
include_once'db.php';
$error_message=''; 
$success='';
?>

<header>
		<div class="container" style="background-color:rgba(153, 144, 51, 0.44);">
		  <div class="row">
			<div class="col-lg-12 col-md-12">
			<div style="text-align:center; ">	   Windermart Copyright &copy; 2016 - All Rights Reserved </div>
			</div>


		  </div>
		 </div>
	</header>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/slick.min.js"></script>
<script type="text/javascript" src="../assets/js/tether.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/leaflet.js"></script>
<script type="text/javascript" src="../assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="../assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="../assets/js/materialist.js"></script>


 <script type="text/javascript">
    	
    	$('.slider').slick({
 autoplay:true,
  autoplaySpeed:1500,
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: true,
    infinite: true,
    cssEase: 'linear'
});
    </script>
    <script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#state').on('change',function(){
        var state = $(this).val();
        if(state){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state='+state,
                success:function(html){
                    $('#city').html(html);
                   
                }
            }); 
        }else{
            $('#city').html('<option value="">Select category first</option>');
            
        }
    });
    
   
});
</script>

<script>
function searchusersfun()
{

var strSearch = $("#search").val();

 $("#mysearchdiv").load('loadsearch.php?strSearch='+strSearch);
}

</script>
</body>


</html>