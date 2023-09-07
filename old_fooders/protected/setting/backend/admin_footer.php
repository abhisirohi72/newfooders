 </div>
 <?php //exit; ?>
  <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/jquery-1.11.0.js';?>"></script>
    <!-- /#wrapper -->
   <?php /* if($query2ans=="map_generator"){?>
 	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&v=3.exp&libraries=places"></script>

    <script>
    $( document ).ready(function() {
    $('#locationInput').change(function() 
    	    {
	    
        $('#address2').val($(this).val());
    }); });
    </script>
    <script src="<?php echo SITE_URL.'/assets/map/js/jquery.gmap.min.js'; ?>"></script>
    <script src="<?php echo SITE_URL.'/assets/map/farbtastic/farbtastic.js'; ?>" type="text/javascript" ></script>
    <script src="<?php echo SITE_URL.'/assets/map/js/generator.js'; ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo SITE_URL.'/assets/map/farbtastic/farbtastic.css'; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo SITE_URL.'/assets/map/css/generator.css'; ?>" type="text/css" media="all" />
 	<?php } */?>
   




   
       <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/bootstrap.min.js';?>"></script>
 <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/plugins/metisMenu/metisMenu.min.js';?>"></script>
     <?php if($query2ans!="map_generator"){?> 
  <!-- DataTables JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/plugins/dataTables/jquery.dataTables.js';?>"></script>
    <script src="<?php echo SITE_URL.'/assets/backend/js/plugins/dataTables/dataTables.bootstrap.js';?>"></script>
 <?php if($query2ans=='send_email' || $query2ans=="setting" || $query2ans=='send_email_all'){?> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL.'/assets/backend/js/chosen.jquery.js'?>" type="text/javascript"></script>
     
 <script type="text/javascript">
 $("#one-by-one").hide();
 $(".chosen-select").chosen({
	    disable_search_threshold: 10,
	    no_results_text: "Oops, nothing found!",
	    max_selected_options : "infinity",
	    display_selected_options:true,
	    width: "100%"
	  });
 
    $(document).ready(function() {
    $("#show_select_box").click(function(){
		$("#one-by-one").show();
        });	
    $("#hide_select_box_all").click(function(){
		$("#one-by-one").hide();
        });
    $("#hide_select_box_food").click(function(){
		$("#one-by-one").hide();
        });
    $("#hide_select_box_eat").click(function(){
		$("#one-by-one").hide();
        });
    
    }) ;	
    
  </script> 
<?php }?>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo SITE_URL.'/assets/backend/js/sb-admin-2.js';?>"></script>
     <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable({
        	"aaSorting": [[0, 'desc']]
		 });
    });
    </script>
    <script type="text/javascript" charset="utf-8">
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
  

//============================== For  Bell =====================================================    
   function addmsg(type, msg){
        /* Simple helper to add a div.
        type is the name of a CSS class (old/new/error).
        msg is the contents of the div */
        $(".user_data").html(msg);
    }
     function waitForMsg(){
         /* This requests the url "msgsrv.php"
         When it complete (or errors)*/
         $.ajax({
             type: "POST",
             url: "<?php echo $link->link('post&userdata=user_data',admin);?>",

             async: true, /* If set to non-async, browser shows page as "Loading.."*/
             cache: false,
             timeout:50000, /* Timeout in ms */

             success: function(data){ /* called when request to barge.php completes */
                 addmsg("new", data); /* Add response to a .msg div (with the "new" class)*/
                 setTimeout(
                     waitForMsg, /* Request next message */
                     5000 /* ..after 1 seconds */
                 );
                 
             },
             error: function(XMLHttpRequest, textStatus, errorThrown){
                 addmsg("error", textStatus + " (" + errorThrown + ")");
                 setTimeout(
                     waitForMsg, /* Try again after.. */
                     15000); /* milliseconds (15seconds) */
             }
         });
     };
    $(document).ready(function(){
        //waitForMsg(); /* Start the inital request */
   });
  //============================== Bell End =====================================================

  //============================== For  Order Status ============================================ 

    function addstatus(type, status){
        /* Simple helper to add a div.
        type is the name of a CSS class (old/new/error).
        msg is the contents of the div */
        $(".order_status").html(status);
    }
     function waitForStatus(){
         /* This requests the url "msgsrv.php"
         When it complete (or errors)*/
         $.ajax({
             type: "POST",
             url: "<?php echo $link->link('post&orderstatus=order_status',admin);?>",

             async: true, /* If set to non-async, browser shows page as "Loading.."*/
             cache: false,
             timeout:50000, /* Timeout in ms */

             success: function(data){ /* called when request to barge.php completes */
                 addstatus("new", data); /* Add response to a .msg div (with the "new" class)*/
                 setTimeout(
                     waitForStatus, /* Request next message */
                     5000 /* ..after 1 seconds */
                 );
                 
             },
             error: function(XMLHttpRequest, textStatus, errorThrown){
                 addstatus("error", textStatus + " (" + errorThrown + ")");
                 setTimeout(
                     waitForStatus, /* Try again after.. */
                     15000); /* milliseconds (15seconds) */
             }
         });
     };
    $(document).ready(function(){
        //waitForStatus(); /* Start the inital request */
   });

    
  //==============================  Order Status End ============================================

  //==============================  Dashboard Stats Start ============================================
    function adddash(type, dash){
        /* Simple helper to add a div.
        type is the name of a CSS class (old/new/error).
        msg is the contents of the div */
        $(".dash_stats").html(dash);
    }
     function waitForDash(){
         /* This requests the url "msgsrv.php"
         When it complete (or errors)*/
         $.ajax({
             type: "POST",
             url: "<?php echo $link->link('post&dashstats=dash_stats',admin);?>",

             async: true, /* If set to non-async, browser shows page as "Loading.."*/
             cache: false,
             timeout:50000, /* Timeout in ms */

             success: function(data){ /* called when request to barge.php completes */
                 adddash("new", data); /* Add response to a .msg div (with the "new" class)*/
                 setTimeout(
                     waitForDash, /* Request next message */
                     5000 /* ..after 1 seconds */
                 );
                 
             },
             error: function(XMLHttpRequest, textStatus, errorThrown){
                 adddash("error", textStatus + " (" + errorThrown + ")");
                 setTimeout(
                     waitForDash, /* Try again after.. */
                     15000); /* milliseconds (15seconds) */
             }
         });
     };
    $(document).ready(function(){
        //waitForDash(); /* Start the inital request */
   });
               
 
  //==============================  Dashboard Stats End ============================================  
    </script>
<?php }?>    

</body>
</html>
 