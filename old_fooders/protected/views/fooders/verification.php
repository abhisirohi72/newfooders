
<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>


<div class="page-content">
   <div class="page-header position-relative">
      <h1>Verification</h1>
   </div>
   <div class="space-6"></div>
   <!--/.page-header-->
   <div class="row-fluid">
      <div class="span12">
         <div class="widget-box">
            <div class="widget-header">
               <h4 class="widget-title">Upload documents</h4>
            </div>
            <div class="widget-body">
               <div class="widget-main">
                  <div class="row-fluid">
                     <div class="span4">
                        <form class="form-horizontal" name="2" action="" method="POST" enctype="multipart/form-data">
                           <input autocomplete="off" type="hidden" name="fooders_details2" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']); ?>">
                           <div class="control-group">
                              <label class="control-label grey" for="form-field-6">Document Type</label>
                              <div class="controls">
                                 <select name="document_type">
                                    <option value="">Select</option>
                                    <?php
                                       if (!empty($document_array)) {
                                           foreach ($document_array as $dtk => $dtv) { ?>
                                    <option value="<?php echo $dtk; ?>"><?php echo $dtv; ?></option>
                                    <?php  }
                                       }
                                       ?>
                                 </select>
                              </div> 
                           </div>
                           <div class="control-group">
                              <label class="control-label grey" for="form-field-1"> Choose document</label>

                     

                              <div class="controls">
                                 <input autocomplete="off" type="file" name="file" id="id-input-file-2"><br>
                                 <font class="red">Only pdf, jpeg, jpg and png files allowed</font>
                              </div>
                           </div>
                           <button name="document_submit" class="btn btn-large btn-primary" type="submit">
                           <i class="icon-ok bigger-110"></i> Save </button>
                        </form>
                     </div>
                     <div class="span8">
                        <?php
                           if (!empty($document_array)) {
                               foreach ($document_array as $dtk => $dtv) { ?>
                        <button class="accordion"><?php echo $dtv; ?></button>
                        <div class="panel">
                           <?php
                              $fooders_documents = $db->get_all('fooders_documents', array('fooder_id' => $fooder_id, 'document_type' => $dtk));
                              if (!empty($fooders_documents)) {
                                $sn=1;
                                  foreach ($fooders_documents as $fdrow) {
                                    $path = SITE_URL . '/uploads/fooder_documents/' . $fooder_id . '/' . $fdrow['document_name'];
                         
                              ?>
                               <div class="row-fluid">
      <div class="span4"><h4>File #<?php echo $sn; ?>
      </div>
      <div class="span4 h4"><?php if($fdrow['verification_status']=='1'){echo '<span class="label label-success arrowed-in label-xlg"><strong><i class="icon-ok bigger-110"></i>Verified</strong></span>';}else{echo '<span class="label label-xlg label-warning arrowed-in"><strong>Not Verified</strong></span>';} ?></div>
      <div class="span4 text-right">
        <?php /* if($fdrow['verification_status']=='0'){?>
      <form method="post" action="">
                                <input type="hidden" name="delete_id" value="<?php echo $fdrow['id'] ?>">
                                <input type="hidden" name="file_name" value="<?php echo $fdrow['document_name'] ?>">
                                <button class="btn btn-mini btn-danger" name="delete_submit">Delete</button>
                            </form> 
                            <?php } */?>
      </div>
      </div>
                              
                           
                            
                            </h4>
                           <iframe src="<?php echo $path; ?>" height="600px;" width="100%" title="Iframe Example"></iframe>
                           <hr>
                           <?php 
                           $sn++;
                        }
                              }else{
                                echo '<p class="red">'.$dtv.' files not uploaded!</p>';
                              }
                              ?>
                        </div>
                        <?php  } 
                           }
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/row-->
      </div>
      <!--/.span-->
   </div>
   <!--/.row-fluid-->
</div>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>