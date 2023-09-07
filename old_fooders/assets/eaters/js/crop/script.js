 

       // update info by cropping (onChange and onSelect events handler)
       function updateInfo(e) {
           $('#x1').val(e.x);
           $('#y1').val(e.y);
           $('#x2').val(e.x2);
           $('#y2').val(e.y2);
           $('#w').val(e.w);
           $('#h').val(e.h);
       };
       // check for selected crop region
       function checkForm() {
           if (parseInt($('#w').val())) return true;
           $('.error').html('Please select a crop region and then press Upload').show();
           return false;
       };
       // clear info by cropping (onRelease event handler)
       function clearInfo() {
           $('.info #w').val('');
           $('.info #h').val('');
       };

       // Create variables (in this scope) to hold the Imagecrop API and image size
       var Imagecrop_api, boundx, boundy;

   

           // get selected file
           var oFile = $('#image_file')[0].files[0];

           // hide all errors
           $('.error').hide();

           // check for image type (jpg and png are allowed)
           var rFilter = /^(image\/jpeg|image\/png)$/i;
           if (! rFilter.test(oFile.type)) {
               $('.error').html('Please select a valid image file (jpg and png are allowed)').show();
               return;
           }

      

                   // destroy Imagecrop if it is existed
                   if (typeof Imagecrop_api != 'undefined') {
                       Imagecrop_api.destroy();
                       Imagecrop_api = null;
                      
                   }
                 
                       // initialize Imagecrop
        
                       $('#preview').Imagecrop({
                    	   bgColor:     'black',
                    	   minSize : [250,250],
                           bgOpacity:   .2,
                           setSelect:   [ 50, 50, 300, 300 ],
                           aspectRatio : 1, // keep aspect ratio 1:1
                           bgFade: true, // use fade effect
                           onChange: updateInfo,
                           onSelect: updateInfo,
                           boxWidth:500,
                           boxHeight:300,
                           onRelease: clearInfo
                          
                       }, function(){

                           // use the Imagecrop API to get the real image size
                          
                    	   $( Imagecrop_api ).removeData();
                           // Store the Imagecrop API in the Imagecrop_api variable
                           Imagecrop_api = this;
                       });
               

            
      