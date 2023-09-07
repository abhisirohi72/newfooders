<link href="<?php echo SITE_URL.'/assets/backend/css/chosen.css';?>" rel="stylesheet">
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <h2>Support Ticket Reply</h2> 
                </div>
            </div>
<select data-placeholder="Your Favorite Football Team" style="width:350px;" class="chosen-select" multiple tabindex="6">
            <option value=""></option>
            <optgroup label="NFC EAST">
              <option>Dallas Cowboys</option>
              <option>New York Giants</option>
              <option>Philadelphia Eagles</option>
              <option>Washington Redskins</option>
            </optgroup>
            <optgroup label="NFC NORTH">
              <option>Chicago Bears</option>
              <option>Detroit Lions</option>
              <option>Green Bay Packers</option>
              <option>Minnesota Vikings</option>
            </optgroup>
            <optgroup label="NFC SOUTH">
              <option>Atlanta Falcons</option>
              <option>Carolina Panthers</option>
              <option>New Orleans Saints</option>
              <option>Tampa Bay Buccaneers</option>
            </optgroup>
            <optgroup label="NFC WEST">
              <option>Arizona Cardinals</option>
              <option>St. Louis Rams</option>
              <option>San Francisco 49ers</option>
              <option>Seattle Seahawks</option>
            </optgroup>
            <optgroup label="AFC EAST">
              <option>Buffalo Bills</option>
              <option>Miami Dolphins</option>
              <option>New England Patriots</option>
              <option>New York Jets</option>
            </optgroup>
            <optgroup label="AFC NORTH">
              <option>Baltimore Ravens</option>
              <option>Cincinnati Bengals</option>
              <option>Cleveland Browns</option>
              <option>Pittsburgh Steelers</option>
            </optgroup>
            <optgroup label="AFC SOUTH">
              <option>Houston Texans</option>
              <option>Indianapolis Colts</option>
              <option>Jacksonville Jaguars</option>
              <option>Tennessee Titans</option>
            </optgroup>
            <optgroup label="AFC WEST">
              <option>Denver Broncos</option>
              <option>Kansas City Chiefs</option>
              <option>Oakland Raiders</option>
              <option>San Diego Chargers</option>
            </optgroup>
          </select>
   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL.'/assets/backend/js/chosen.jquery.js'?>" type="text/javascript"></script>
     
 <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script> 
   