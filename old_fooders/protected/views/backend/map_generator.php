 <div id="page-wrapper" >
        <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-4">    
                   <span class="huge">Location builder</span>
              </div>
              <div class="col-lg-8">
              <?php echo $display_map; ?>
              </div>
              </div>
            </div>
       
       
        <div class="row">     
    <!-- Map (background map) -->
    <!-- <div class="col-lg-9" >
    
    <div id="responsive_map" ></div>
    </div> --> 
    
    <!-- End map -->
    <div class=col-lg-12>
    <!-- Form generator -->
    <form action="" id="generatorForm" name="generatorForm" method="post">
        <!-- Color choosen 
        <div class="color-selected">
            <div class="label"><label for="color">SELECT COLOR</label></div>
            <div class="item"><input type="text" id="color" name="color" value="#2bb4a0" onBlur="updateMap()"/></div>
        </div>-->
        <!-- Color picker
        <div class="form-item">
            <div class="label header"></div>
            <div class="item"><div id="picker"></div></div>
        </div> -->
        <!-- Latitude -->
        <input type="hidden" name="add_map_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
        <div class="form-item">
            <div class="label"><label for="region">Region :</label></div>
            <div class="item">
            <input type="text" id="region" name="region" value="none" /></div>
        </div>
        <div class="form-item">
            <div class="label"><label for="city">City :</label></div>
            <div class="item">
            <input type="text" id="city" name="city" value="none" /></div>
        </div>
        
         <div class="form-item">
            <div class="label"><label for="state">State :</label></div>
            <div class="item">
            <input type="text" id="state" name="state" value="none" /></div>
        </div>
        
         <div class="form-item">
            <div class="label"><label for="country">Country :</label></div>
            <div class="item">
            <input type="text" id="country" name="country" value="none" /></div>
        </div>
        
        <div class="form-item">
            <div class="label"><label for="latitude">Latitude:</label></div>
            <div class="item">
            <input type="text" id="latitude" name="latitude" value="-37.801578" onChange="updateMap()"/></div>
        </div>
        <!-- Longitude -->
        <div class="form-item">
            <div class="label"><label for="longitude">Longitude:</label></div>
            <div class="item">
            <input type="text" id="longitude" name="longitude" value="145.060508" onChange="updateMap()"/></div>
        </div>
        
       <!-- Icon picker 
        <div class="form-item">
            <div class="label"><label for="icon">Icon:</label></div>
            
            <div class="item">
                <select name="icon" id="icon">
                    <option value="http://afrikaeats.com/assets/map/icons/carwash.png">http://afrikaeats.com/assets/map/icons/carwash.png</option>
                    <option value="http://afrikaeats.com/assets/map/icons/zoo.png">http://afrikaeats.com/assets/map/icons/zoo.png</option>
                </select>
            <input type="hidden" id="iconUrl" name="iconUrl" value="http://afrikaeats.com/assets/map/icons/administration.png">
        </div>
        </div>
        <div class="form-item">
            <div class="label"><label for="popup">Popup:</label></div>
            <div class="item">
                <select name="popup" id="popup" onChange="updateMap()">
                    <option value="true" selected>true</option>
                    <option value="">false</option>
                </select>
            </div>
        </div>-->
        <div class="form-item">
            <div class="label"><label for="mapType">Map Type:</label></div>
            <div class="item">
                <select name="mapType" id="mapType" onChange="updateMap()">
                    <option value="google.maps.MapTypeId.ROADMAP" selected>roadmap</option>
                    <option value="google.maps.MapTypeId.SATELLITE">satellite</option>
                    <option value="google.maps.MapTypeId.TERRAIN">terrain</option>
                    <option value="google.maps.MapTypeId.HYBRID">hybrid</option>
                </select>
            </div>
        </div>
 
       
       
        <div class="form-item">
            <div class="label"><label for="zoom">Zoom:</label></div>
            <div class="item">
                <select name="zoom" id="zoom" onChange="updateMap()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14" selected>14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                </select>
            </div>
        </div>
       
        <!-- Zoom control -->
            <div class="form-item">
            <div class="label"><label for="zoomControl">Zoom Control:</label></div>
            <div class="item">
                <select name="zoomControl" id="zoomControl" onChange="updateMap()">
                    <option value="true" selected>true</option>
                    <option value="">false</option>
                </select>
            </div>
        </div>
       
       
        <!-- Street view control -->
            <div class="form-item">
            <div class="label"><label for="streetViewControl">Street View:</label></div>
            <div class="item">
                <select name="streetViewControl" id="streetViewControl" onChange="updateMap()">
                    <option value="true" selected>true</option>
                    <option value="">false</option>
                </select>
            </div>
        </div>
       
        <!-- Buttons -->
            <div class="form-item">
            <div class="item"><br>
  <button type="reset" class="btn btn-danger btn-small">Reset</button>
  <button type="submit" name="map_submit" class="btn btn-info btn-small">Submit</button>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>