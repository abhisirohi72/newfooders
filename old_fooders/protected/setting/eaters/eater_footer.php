

 <footer>
  	<div class="footer-top hidden-phone">
     <?php if($query1ans!="home"){?>
        <div style="text-align:right; color: white;">
       Top <a href="#" id="btn-scroll-up"
	class="btn-scroll-up btn btn-small btn-inverse"> <i
	class="icon-double-angle-up icon-only bigger-110"></i>

</a>
</div>


<?php }?>
<div id="basket-data"></div>
<div id="delivery-data"></div>
<!--  ********************************** Contact Us Modal Box *********************************************  -->      
      
    <!--     <div class="md-modal md-effect-8" id="modal-8">
			<div class="md-content">
					<h3>Contact Us <i class="icon-remove md-pro md-close"></i></h3>
				<div>
				<form method="post" id="form-contactus">
				<input type="hidden" name="contactus_ip" value="<?php // echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
				<input type="hidden" name="contactus_check" value="contactus">
					
					<br>
					<div class="row-fluid">
					<div class="span12">
					<input class="krinputboxes" type="text" name="contact_name" id="contact_name" value="">
					<label class="krlabel">NAME</label>
					</div>
					</div>
					<br>
					<div class="row-fluid">
					<div class="span12">
					<input class="krinputboxes" type="text"  id="contact_email" name="contact_email" value="">
					<label class="krlabel">EMAIL</label>
					</div>
					</div>
					<br>
					<div class="row-fluid">
					<div class="span12">
					<input class="krinputboxes" type="text"  id="contact_phone"  name="contact_phone" value="">
					<label class="krlabel">PHONE NUMBER (Optional)</label>
					</div>
					</div>
					<br>
					
					<div class="row-fluid">
					<div class="span12">
					<textarea class="krtextarea" id="contact_message" name="contact_message"></textarea>
					<label class="krlabel">MESSAGE</label>
					</div>
					</div>
					<br><br>
					<div class="row-fluid">
					<div class="span12">
					<div class="span3"><button class="button-submit fltlft" type="submit" name="contact_us"><i class="icon-check"></i> Submit</button></div>
					<div class="span2"><img id="loading1" src="<?php echo SITE_URL.'/assets/eaters/img/loader.gif';?>"></div>
					<div class="span7"></div>
					</div>
					</div>
					<br>
					<div class="row-fluid">
					<div class="span12" id="info-contactus"></div>
					</div>
					</form>
					
				</div>
			</div>
		</div>
		<div class="md-overlay"></div>
		
    </div> -->
  
  </footer>






<footer class="footer">
      
    
    <div class="container"> 
    <div class="flinkpd">
                    <div class="uk-grid-large" uk-grid>
                        <div class="uk-width-medium">
                             <a href="<?php echo $link->link('home',eaters);?>">
                                   <img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>wlogo.png" class="logowd">
                                </a>
                        <!--    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam interdum leo at finibus ornare.
Aliquam gravida condimentum neque, vel ultrices purus dignissim a. </p>-->
                        </div>
                        <div  class="uk-width-1-5@s">
                            <div class="flink">
                                <h4>About Khate Raho</h4>
                                <ul class="uk-list">
                                <li> <a href="<?php echo $link->link('contact',eaters);?>" class="">Contact Us</a></li>
                                </ul>
                             </div>
                        </div>
                        <div  class="uk-width-1-5@s">
                           <div class="flink">
                            <h4>Business</h4>
                            <ul class="uk-list">
                            <li><a href="<?php echo $link->link('fooders_business',eaters);?>">Fooders</a></li>
                            <li><a href="<?php echo $link->link('eaters_info',eaters);?>">Eaters</a></li>
                            </ul>
                            </div>
                        </div>
                        <div class="uk-width-expand@s">
                            <div class="flink">
                                <h4>Catch Khate Raho on</h4>
                                <div class="socialbtns">
                                    <a href="<?php echo $get_social_links['facebook'];?>" target="_blank" ><div class="socbtn"><i class="fa fa-facebook-f"></i></div></a>
                                    <a href="<?php echo $get_social_links['twitter'];?>"  target="_blank"><div class="socbtn"><i class="fa fa-twitter"></i></div></a>
                                     <a href="<?php echo $get_social_links['google_plus'];?>" target="_blank"><div class="socbtn"><i class="fa  fa-google-plus"></i></div></a>
                                   <!-- <a href="#"><div class="socbtn"><i class="fa fa-instagram"></i></div></a>
                                    <a href="#"><div class="socbtn"><i class="fa fa-linkedin"></i></div></a>
                                    <a href="#"><div class="socbtn"><i class="fa fa-youtube"></i></div></a>-->
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
        </div>
        
    <div class="privacy">
      <div class="container">   
           <div class="" uk-grid>
                    <div class="uk-width-expand@m">
                        <ul class="uk-padding-remove-left">
                        <li><a href="<?php echo $link->link('privacy-policy',eaters);?>" class="">Privacy Policy</a></li>
                        <li><a href="<?php echo $link->link('terms',eaters);?>">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <div class="uk-width-auto@m">
                        <!--<img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>cards.png" alt="">-->
                    </div>
                </div>
        </div>
    </div>
    
    <div class="copyright">
        <span>&copy; <?php echo date('Y').' '.Appname; ?> . All rights reserved. <br>The <?php echo Appname;?> name, logos, and related marks are trademarks of <?php echo Appname;?>.</span><br><span>All other trademarks are the property of their respective owners.</span>
      </div>
</footer>



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script async src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/pagination/jquery.bootpag.min.js';?>" type="text/javascript"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/rating/star-rating.min.js';?>" type="text/javascript"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/bootstrap.min.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/modal/classie.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/modal/modalEffects.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/bootstrap-datepicker.min.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/chosen.jquery.min.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/jquery.easy-pie-chart.min.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/upload_progress.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/ace-elements.min.js';?>"></script>
<script src="<?php  echo SITE_URL.'/assets/eaters/js/crop/imagecrop.min.js';?>"></script>
<script src="<?php  echo SITE_URL.'/assets/eaters/js/rating/jRating.jquery.js';?>"></script>
<script src="<?php  echo SITE_URL.'/assets/eaters/js/bootstrap-timepicker.min.js';?>"></script>

<?php if($query1ans=="recipes_view" || $query1ans=="eater_orders"){?>
<script src="<?php echo SITE_URL.'/assets/eaters/js/datatable/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo SITE_URL.'/assets/eaters/js/datatable/jquery.dataTables.bootstrap.js';?>"></script>
<script type="text/javascript">
$( document ).ready(function() {
var oTable1 = $('#sample-table-2').dataTable( {
	"aoColumns": [
      { "bSortable": false },
      null, null, null, null,
	  { "bSortable": false }
	] } );

var oTable1 = $('#order-table-2').dataTable( {
	"aoColumns": [
      { "bSortable": false },
      null, null, null,
	  { "bSortable": false }
	] } );
	


});



</script>
<?php }?> 
<script type="text/javascript">
$('#timepicker1').timepicker({
	showMeridian:false
});
        </script>


<script type="text/javascript">
$(document).ready(function(){
	$(".comment-rating").jRating({
		 type:'small', // type of the rate.. can be set to 'small' or 'big'
		  length : 5, // nb of stars
		  decimalLength : 1, // number of decimal in the rate
	  isDisabled : true
	  
	});
  });

        $( document ).ready(function() {
        	$('.date-picker').datepicker();
		});

        $( document ).ready(function() {
        	var date = new Date();
        	date.setDate(date.getDate()-1);
        	$('.booking-date').datepicker({ 
        		format: 'dd/mm/yyyy_D',
        	    startDate: date
        	   
        	});
        	
        	
		});
		
        $('.chzn-select').chosen({ max_selected_options: 5 }); 
</script>
<script>
//===================== This script for highlight ============================
<?php /* if($search!=''){?>
	var src_str = $("#content").html();
	var term = "<?php echo $search;?>";
	term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
	var pattern = new RegExp("("+term+")", "gi");
	src_str = src_str.replace(pattern, "<mark class='mark'>$1</mark>");
	src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");
	$("#content").html(src_str);
	<?php } */?>
//========================== end this script ==================================
$( document ).ready(function() {
	 $("#loader").hide();
    $( "#rimage" ).click(function(){ 
    	$( "#loader" ).show();
    });
     
    });
$(document).ready(function(){
    $("[rel=tooltip]").tooltip({ placement: 'bottom'});
    $('[data-rel=popover]').popover({container:'body'});
     $('#btn-scroll-up').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
		return false;
	});
});
$(document).ready(function(){
    $('#btn-scroll-down').click(function () {
       
        $('body,html').animate({
            scrollTop: $("#bottom-review").offset().top
        }, 800);
    	return false;
    });

});

$(document).ready(function() {
    var text_min = 0;
    $('#textarea_feedback').html();

    $('.textarea').keyup(function() {
        var text_length = $('.textarea').val().length;
        var text_remaining =  text_length - text_min;

        $('#textarea_feedback').html(text_remaining + ' characters entered');
    });
});

$(document).ready(function() {
	
   $("#profile-pic").hover(
		   function(){$("#change-picture").show();},
		   function(){$("#change-picture").hide();}
		   );
});

</script>

 <script>
 $(document).ready(function() {
	        $("#forgot_email").focus();
	});
 $( document ).ready(function() {
	 $("#loading").hide(); 
	 $("#loading1").hide(); 
	 $("#loading2").hide();
	 $("#loading3").hide();
	 
	});
	
        $('#form-discrepancy').submit(function(event) {
                event.preventDefault();
                $("#loading").show();
               $.ajax({
                        type: 'POST',
                        url: '<?php echo $link->link('post',eaters);?>',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (data) {
                             $('#loading').fadeToggle(1500, function () {  $('#info-discrepancy').html(data.msg); });			
                              }
                });
        });
               $('#form-reviews').submit(function(event) {
                event.preventDefault();
                $("#loading2").show();
                $.ajax({
                        type: 'POST',
                        url: '<?php echo $link->link('post',eaters);?>',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: 
                            function (data) {
                        	$('#loading2').fadeToggle(1500, function () {  $('#info-reviews').html(data.msg); });
                                 }
                });
        });
       
               $('#form-contactus').submit(function(event) {
                   event.preventDefault();
                   $("#loading1").show();
                   $.ajax({
                           type: 'POST',
                           url: '<?php echo $link->link('post',eaters);?>',
                           data: $(this).serialize(),
                           dataType: 'json',
                           success: function (data) {
                        	   $('#loading1').fadeToggle(1500, function () {  $('#info-contactus').html(data.msg); });
                                 }
                   });
           });

               $('#form-eater-forgot').submit(function(event) {
                   event.preventDefault();
                   $("#loading3").show();
                   $.ajax({
                           type: 'POST',
                           url: '<?php echo $link->link('post',eaters);?>',
                           data: $(this).serialize(),
                           dataType: 'json',
                           success: function (data) {
							   $('#loading3').fadeToggle(1500, function () {  $('#info-eater-forgot').html(data.msg); });
                                 }
                   });
           });

              
        </script>     
        
   <script type="text/javascript">
	$(document).ready(function(){
			$(".comments").jRating({
				bigStarsPath: '<?php echo SITE_URL.'/assets/eaters/img/stars.png'; ?>',
				  type:'big',
				  length : 5, 
				  rateMax : 5,
				  decimalLength : 1,
				  
				  isDisabled:true
			    });
		});
	</script>
	<?php if($query1ans=="profile"){?>
	<script type="text/javascript">
	var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
	var percent = $('.percent');
			$('.easy-pie-chart.percentage').each(function(){
				
				$(this).easyPieChart({
					barColor: $(this).data('color'),
					trackColor: '#EEEEEE',
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: 8,
					animate: oldie ? false : 1000,
					size:120
				}).css('color', $(this).data('color'));
			});
			$("#image_file").change(function(){
				
				var file = $("#image_file")[0].files[0];
				if(file.type=='image/jpg' || file.type=='image/jpeg' || file.type=='image/png'){
				$('#upload_form').ajaxForm({
				    beforeSend: function() {
				            var percentVal = '0%';
					        $('.wid').data('easyPieChart').update(percentVal);
					        percent.html(percentVal);
				    },
				    uploadProgress: function(event, position, total, percentComplete) {
				        var percentVal = percentComplete + '%';
				        $('.wid').data('easyPieChart').update(percentVal);
						  if(percentComplete=='100')
							  percent.html('Loading...');
						  else   	
			             percent.html(percentVal+'\nUploaded');
				             event.preventDefault();
					//console.log(percentVal, position, total);
				    },
				    
				    success: function(data) {
				    
				    	 if(data!='')
						$('#hide-progress').hide();
				    	
				        $('#pic').html(data);
				        
				       <?php require_once SERVER_ROOT.'/assets/eaters/js/crop/script.js';?>
				    },
					  complete: function(xhr) {
						  percent.html("...");
							},
				}).submit();
				}else{
					 $('#pic').html('<div class="crop-image-error"><i class="icon-warning-sign"></i> Invalid File ! Only jpg, jpeg and png allowed. Please try again  <i class="icon-remove crop-image-icon" data-dismiss="alert"></i></div>');
					}
				
		});
</script>
<?php }?>				       
				       
<script type="text/javascript">			
	$(".delivery-areas").click(function(){
		$(".md-effect-3").addClass("md-show"); 
	      var del_fooderid = $(this).attr("id");
      $.ajax({
          type: 'POST',
          url: '<?php echo $link->link("post&fooderid_del=");?>'+del_fooderid,
          data: $(this).serialize(),
          dataType: 'json',
          success: function (data) {
        	  $(".md-effect-3").removeClass("md-show"); 
        	  $("#delivery-data").html(data.msg); 
    	      }
       });
		});		
	$(".basket-modal").click(function(){
	     $(".md-effect-3").addClass("md-show");
	    
		     var basketdata = $(this).attr('id');
		     var cookiedata = $(this).attr('value');
			 //console.log(basketdata+"========"+cookiedata);
				 if(basketdata=='cookiedata')
		     {
			  $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("basket&cookiedata=");?>'+cookiedata,
	          cache:false,
	          data: $(this).serialize(),
	          dataType: 'json',
	       
	          success: function (data) {
				  $(".md-effect-3").removeClass("md-show");
	              $("#basket-data").html(data.msg);
	        
	              }
	       });
			 }
		 else
		 {
		  $.ajax({
          type: 'POST',
          url: '<?php echo $link->link("basket&basketdata=");?>'+basketdata,
          cache:false,
          data: $(this).serialize(),
          dataType: 'json',
          timeout: 1000,
          success: function (data) {
              setTimeout(function(){ 
            	  $(".md-effect-3").removeClass("md-show");
            	  $("#basket-data").html(data.msg)
                  },1000);
              }
       });
		 }
	});

   $(".closed-fooder").click(function(){
	   $(".md-effect-9").addClass("md-show");  
	   });
 /*  
   $(".basket-modal").click(function(){
   	$(".md-effect-11").addClass("md-show");
   });
   $(".closed-fooder").click(function(){
	   	$(".md-effect-11").addClass("md-show");
	   });
   
   $("#fooder-closed-del").click(function(){
   	$(".md-effect-11").removeClass("md-show");
   });

  */
	$('#id-input-file-3, .id-input-file-2').ace_file_input({
		style:'well', 
		no_file:'Only jpg/png formats allowed',
		btn_choose:'Choose',
		btn_change:'Change',
		//droppable:false,
		onchange:null,
		droppable:false,
	});	
	
	$(".md-overlay").click(function(){
		$(".md-effect-3").removeClass("md-show");
		$(".md-effect-7").removeClass("md-show");
		$(".md-effect-8").removeClass("md-show");
		$(".md-effect-1").removeClass("md-show");
		$(".md-effect-9").removeClass("md-show");
		$(".md-effect-11").removeClass("md-show");
		});
	$("#fooder-closed").click(function(){
		$(".md-effect-9").removeClass("md-show");
		$(".md-effect-11").removeClass("md-show");
		});	
	$(".md-close").click(function(){
		$(".md-effect-9").removeClass("md-show");
		$(".md-effect-11").removeClass("md-show");
		});
	      $("#filter").keyup(function(){
	    // Retrieve the input field text and reset the count to zero
	    var filter = $(this).val(), count = 0;
	    // Loop through the comment list
	    $(".list").each(function(){
        // If the list item does not contain the text phrase fade it out
	        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
	            $(this).fadeOut();
	        // Show the list item if the phrase matches and increase the count by 1
	        } else {
	            $(this).show();
	            count++;
	        }
	    });
	    // Update the count
	    var numberItems = count;
	    $("#filter-count").text("Number of Comments = "+count);
	});
	      $("#filter-loc").keyup(function(){
		  	    // Retrieve the input field text and reset the count to zero
		  	    var filter = $(this).val(), count = 0;
		  	    // Loop through the comment list
		  	    $(".list-loc").each(function(){
	  	        // If the list item does not contain the text phrase fade it out
		  	        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
		  	            $(this).fadeOut();
		  	        // Show the list item if the phrase matches and increase the count by 1
		  	        } else {
		  	            $(this).show();
		  	            count++;
		  	        }
		  	    });
		  	    // Update the count
		  	    var numberItems = count;
		  	    $("#filter-count").text("Number of Comments = "+count);
		  	});
 $(".location-act").click(function(){
   $(".active-loc").addClass("active-li");
   $(".md-effect-3").addClass("md-show");
    $(".hide-location").show();
    $(".hide-loc-search").show();
     $(".hide-cuisine").hide();
    $(".hide-cuisine-search").hide();
    $(".active-cuis").removeClass("active-li");
    var location = "fooder-location";
    $.ajax({
        type: 'POST',
        url: '<?php echo $link->link("post&flocation=");?>'+location,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
        	$(".md-effect-3").removeClass("md-show");
          	$("#location-data").html(data.msg);
      	  
            }
     });
	});


 $(".cuisine-act").click(function(){
	   $(".active-cuis").addClass("active-li");
	   $(".md-effect-3").addClass("md-show");
	   $(".hide-cuisine").show();
	   $(".hide-cuisine-search").show();
	   $(".hide-loc-search").hide();
	   $(".hide-location").hide();
	   $(".active-loc").removeClass("active-li");
	   var cuisines = "fooder-cuisines";
	    $.ajax({
	        type: 'POST',
	        url: '<?php echo $link->link("post&fcuisine=");?>'+cuisines,
	        data: $(this).serialize(),
	        dataType: 'json',
	        success: function (data) {
	        	$(".md-effect-3").removeClass("md-show");
	          	$("#cuisine-data").html(data.msg);
	            }
	     });
	   }); 
		</script>
<?php if($query1ans=="fooders_search_results"){?>		 
<script type="text/javascript">
$(document).ready(function(){
	//how much items per page to show
	var show_per_page = <?php echo show_results_per_page;?>;
	//getting the amount of elements inside content div
	var number_of_items = $('#content').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);
	//now when we got all we need for the navigation let's make it '

	/*
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
	$('#page_navigation').html(navigation_html);
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');
	//hide all the elements inside content div
	$('#content').children().css('display', 'none');
	//and show the first n (show_per_page) elements
	$('#content').children().slice(0, show_per_page).css('display', 'block');
});
function previous(){
	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
}
function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	//hide all children elements of content div, get specific items and show them
	$('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
	//update the current page input field
	$('#current_page').val(page_num);
}
</script>


<script type="text/javascript">
//================================= POPULARITY SORTING =========================================
$("#icon-popularity-asc").hide();
$("#icon-popularity-desc").hide();
$("#icon-rating-asc").hide();
$("#icon-rating-desc").hide();
$("#icon-cost-asc").hide();
$("#icon-cost-desc").hide();
$(".sort_popular_asc").click(function(){
    $(".sort_popular_desc").show();
    $(".sort_popular_asc").hide();
    $("#icon-popularity-desc").show();
    $("#icon-rating-asc").hide();
    $("#icon-rating-desc").hide();
    $("#icon-cost-asc").hide();
    $("#icon-cost-desc").hide();
	var divList = $(".srched-rest");
	divList.sort(function(a, b){ 
		return $(a).data("popular")-$(b).data("popular")});
   $("#content").html(divList);
   var cl =  go_to_page(0);
   cl.trigger('click');
	});
$(".sort_popular_desc").click(function(){
	$(".sort_popular_desc").hide();
    $(".sort_popular_asc").show();
    $("#icon-popularity-asc").show();
    $("#icon-rating-asc").hide();
    $("#icon-rating-desc").hide();
    $("#icon-cost-asc").hide();
    $("#icon-cost-desc").hide();
    var divList = $(".srched-rest");
	divList.sort(function(a, b){ 
		return $(b).data("popular")-$(a).data("popular")});
   $("#content").html(divList);
   var cl =  go_to_page(0);
   cl.trigger('click');
	});	
//=========================================== RATING SORTING ==================================================
$(".sort_rating_asc").click(function(){
    $(".sort_rating_desc").show();
    $(".sort_rating_asc").hide();
    $("#icon-rating-desc").show();
    $("#icon-popularity-asc").hide();
    $("#icon-popularity-desc").hide();
    $("#icon-cost-asc").hide();
    $("#icon-cost-desc").hide();
    var divList = $(".srched-rest");
	divList.sort(function(a, b){ 
		return $(a).data("rating")-$(b).data("rating")});
   $("#content").html(divList);
   var cl =  go_to_page(0);
   cl.trigger('click');
   });

$(".sort_rating_desc").click(function(){
	$(".sort_rating_desc").hide();
    $(".sort_rating_asc").show();
    $("#icon-rating-asc").show();

    $("#icon-popularity-asc").hide();
    $("#icon-popularity-desc").hide();
    $("#icon-cost-asc").hide();
    $("#icon-cost-desc").hide();
    
    var divList = $(".srched-rest");
	divList.sort(function(a, b){ 
		return $(b).data("rating")-$(a).data("rating")});
   $("#content").html(divList);
   var cl =  go_to_page(0);
   cl.trigger('click');
	});	

//========================================== COST SORTING =========================================================
$(".sort_cost_asc").click(function(){
    $(".sort_cost_desc").show();
    $(".sort_cost_asc").hide();
    $("#icon-cost-desc").show();

    $("#icon-popularity-asc").hide();
    $("#icon-popularity-desc").hide();
    $("#icon-rating-asc").hide();
    $("#icon-rating-desc").hide();
    
	var divList = $(".srched-rest");
	divList.sort(function(a, b){ 
		return $(a).data("cost")-$(b).data("cost")});
   $("#content").html(divList);
   var cl =  go_to_page(0);
   cl.trigger('click');
   
	});

$(".sort_cost_desc").click(function(){
	$(".sort_cost_desc").hide();
    $(".sort_cost_asc").show();
    $("#icon-cost-asc").show();

    $("#icon-popularity-asc").hide();
    $("#icon-popularity-desc").hide();
    $("#icon-rating-asc").hide();
    $("#icon-rating-desc").hide();
    
    var divList = $(".srched-rest");
	divList.sort(function(a, b){ 
		return $(b).data("cost")-$(a).data("cost")});
   $("#content").html(divList);
   var cl =  go_to_page(0);
   cl.trigger('click');
	});	

$(".home-delivery-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".take-out-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".pure-veg-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".dine-in-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".parking-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".bar-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".wi-fi-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".table-booking-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".show-delivery-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
$(".accept-cc-fs").click(function(){
	$(".md-effect-3").addClass("md-show");	
});
</script>
<?php }?>

<script type="text/javascript">
function addbasket(type, basket){
    /* Simple helper to add a div.
    type is the name of a CSS class (old/new/error).
    msg is the contents of the div */
    $(".eater-cart-count").html(basket);
}
 function waitForStatus(){
     /* This requests the url "msgsrv.php"
     When it complete (or errors)*/
     $.ajax({
         type: "POST",
         url: "<?php echo $link->link('post',eaters,'&cartcount=cart_count');?>",

         async: true, /* If set to non-async, browser shows page as "Loading.."*/
         cache: false,
         timeout:5000, /* Timeout in ms */

         success: function(data){ /* called when request to barge.php completes */
             addbasket("new", data); /* Add response to a .msg div (with the "new" class)*/
             setTimeout(
                 waitForStatus, /* Request next message */
                1000 /* ..after 1 seconds */
             );
             
         },
      /*   error: function(XMLHttpRequest, textStatus, errorThrown){
			
             addbasket("error", textStatus + " (" + errorThrown + ")");
             setTimeout(
                 waitForStatus,
                 150000); 
         } */
     });
 };
$(document).ready(function(){
    waitForStatus(); /* Start the inital request */
});


</script>
<script>
$(".hover").mouseover(function(){
$(".left").css('font-size','18px');
});
$(".hover").mouseout(function(){
	$(".left").css('font-size','14px');
	});
 </script>



</body>
</html>