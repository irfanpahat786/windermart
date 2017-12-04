<?php
include_once'db.php';
$error_message=''; 
$success='';
?>
<div class="footer-wrapper">
	<div class="footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3">
						<div class="widget right-border footerdesc">
                            <h2 class="widgettitle">
                          <img  src="<?php echo $fullur;?>/assets/img/logo (1).png" alt="Materialist"></h2>

							<p align="justify" >
								Our Mission: "Guided by the relentless focus of our visions and values, we deliver top of the line products and tailored solutions through continuous innovations with technology and immense product knowledge for sustained profitability."
							</p>
						</div><!-- /.widget -->
					</div><!-- /.col-* -->

					<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
						<div class="widget right-border footerdesc">
							<h2 class="widgettitle">Related Links</h2>

							<ul class="nav nav-stacked">
								<li class="nav-item"><a href="<?php echo $fullur;?>/#" class="nav-link">Home</a></li>
								<li class="nav-item"><a href="<?php echo $fullur;?>/#" class="nav-link">Company</a></li>
								<li class="nav-item"><a href="<?php echo $fullur;?>/pricelisting.php" class="nav-link">Price Listing</a></li>
								<li class="nav-item"><a href="<?php echo $fullur;?>/about.php" class="nav-link">About us</a></li>
								<li class="nav-item"><a href="<?php echo $fullur;?>/contactus.php" class="nav-link">Contact us</a></li>
							</ul>
						</div><!-- /.widget -->
					</div>

					<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
						<div class="widget right-border footerdesc">
							<h2 class="widgettitle">Categories</h2>

							<ul class="nav nav-stacked">
								 <?php 
									 $s="select * from category order by id desc limit 8,4";
									 $ser=ExecuteQueryResule($s);
								  	 foreach ($ser as $k) {
									 ?>
								<li class="nav-item"><a href="<?php echo $fullur;?>/portal/category/<?php echo $k['url'];?>" class="nav-link"><?php echo $k['cat_name'];?></a></li>
								<?php } ?>
								<li class="nav-item mor" ><a href="<?php echo $fullur;?>/allcategories.php" class="nav-link">More </a></li>
							</ul>
						</div><!-- /.widget -->
					</div><!-- /.col-* -->						

					<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
						<div class="widget footerdesc">
							<h2 class="widgettitle">News Letter</h2>
							
							<form name="subscribe" method="post" action="check.php">
							  <div class="form-group"><?php if($error_message!='') { echo $error_message; } else{ echo $success;} ?>
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" name="emailid" class="form-control email" id="exampleInputEmail1" placeholder="Enter Your Email"  required>
							  </div>
							  
							  <button type="submit" name="email" class="btn btn-default">Submit</button>
							</form>
						</div><!-- /.widget -->
					</div><!-- /.col-* -->				
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer-widgets -->

		<div class="footer-top">
			<div class="container">
				<div class="footer-top-left footerdesc">
					<strong class="hidden-xs-down">Supported credit cards:</strong>
					<i class="fa fa-cc-stripe"></i>
					<i class="fa fa-cc-visa"></i>
					<i class="fa fa-cc-discover"></i>
					<i class="fa fa-cc-mastercard"></i>
				</div><!-- /.footer-top-left -->
				<div class="footer-top-right footerdesc">
					
					<ul class="nav nav-pills">
						<p  class="keep">KEEP IN TOUCH :</p>
						<li class="footer-nav-item"><a href="https://www.facebook.com/windermart">
                        <img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook40x40.png" border="0"></a>
						</li>
						<li class="footer-nav-item"><a href="https://twitter.com/windermart">
						<img alt="follow me on twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter40x40.png" border="0"></a></li>
						<li class="footer-nav-item"><a href="https://plus.google.com/+WinderMart"><img alt="follow me on google plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus40x40.png" border="0"></a></li>
					</ul>
				</div><!-- /.footer-top-right -->
			</div><!-- /.container -->
		</div><!-- /.footer-top -->
		<div class="footer-bottom">
			<div class="container">
				<?php 
					$sql="select * from sitevisitors where id=1";
					$result=ExecuteQueryResule($sql);
					foreach ($result as $k) {
						$tatalviews=$k["totalviews"];
						$updatetatalviews=$tatalviews+1;
						$sql="update sitevisitors set totalviews=".$updatetatalviews." where id=1";
					    $result=ExecuteQuery($sql);
					}
				?>	
				<div class="footer-bottom-left">
					<a href="#">Total Visitors <?php echo $tatalviews ;?></a>
				</div>
				<div class="footer-bottom-right">
					Copyright &copy; 2016 - All Rights Reserved
				</div><!-- /.footer-bottom-right -->			
			</div><!-- /.container -->
		</div><!-- /.footer-bottom 
	</div><!-- /.footer -->
</div><!-- /.footer-wrapper -->
</div><!-- /.page-wrapper -->

<!-- /.customizer -->


<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>


 <script type="text/javascript">
    	
    	$('.slider').slick({
 autoplay:true,
  autoplaySpeed:6000,
    slidesToShow: 4,
    slidesToScroll: 1,
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
<script type="text/javascript">
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5988078207069aa2"></script>-->
<script type="text/javascript">
// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
    
    var correspondence=["","Really Bad","Bad","Fair","Good","Excelent"];
      
  $('.ratable').on('starrr:change', function(e, value){
   
     $(this).closest('.evaluation').children('#count').html(value);
     $(this).closest('.evaluation').children('#meaning').html(correspondence[value]);
     
     var currentval=  $(this).closest('.evaluation').children('#count').html();
     
    var target=  $(this).closest('.evaluation').children('.indicators');
    target.css("color","black");
    target.children('.rateval').val(currentval);
    target.children('#textwr').html(' ');
   
    
    if(value<3){
     target.css("color","red").show(); 
     target.children('#textwr').text('What can be improved?');
    }else{
        if(value>3){    
            target.css("color","green").show(); 
            target.children('#textwr').html('What was done correctly?');
        }else{
       target.hide();  
        }
    }
    
  });
  
  
  
 
  
  $('#hearts-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});





$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'fa fa-square-o'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104907821-1', 'auto');
  ga('send', 'pageview');

</script>
<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display ==='none') {
        x.style.display ='block';
    } else {
        x.style.display ='none';
    }
}
</script>
<script>
$(document).ready(function () {
    $("#preview").toggle(function() {
        $("#myDIV1").hide();
        $("#myDIV").show();
    }, function() {
        $("#myDIV1").show();
        $("#myDIV").hide();
    });
});
</script>
</body>


</html>