	 <?php echo $displayaccount;?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo famf;?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small>
		</h1>
	</div>
	<!--/.page-header-->
	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			<div class="span6">
				<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>"
					name="account_management" method="post">
					<input autocomplete="off" type="hidden" name="save_bemail_ip"
						value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
					<div class="space-6"></div>
					<h3 class="center blue"><?php echo famcd;?></h3>
					<div class="control-group">
						<label class="control-label grey" for="form-field-6"><?php echo famcn;?> </label>
						<div class="controls">
							<input autocomplete="off" type="text" name="contact_name"
								value="<?php echo fooder_contact_name;?>" /> <span
								class="help-button-required" data-rel="popover"
								data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fampopcn;?>" title="<?php echo popr;?>">?</span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label grey" for="form-field-6">Email </label>
						<div class="controls">
							<input autocomplete="off" type="text" name="login_email"
								value="<?php echo fooder_login_email;?>" disabled="disabled" />
							<span class="help-button" data-rel="popover" data-trigger="hover"
								data-placement="bottom" data-content="<?php echo fampopeol;?>"
								title="<?php echo popb;?>">?</span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label grey" for="form-field-6">Username </label>
						<div class="controls">
							<input autocomplete="off" type="text" name="username" value="<?php echo fooder_username;?>" />
							
						</div> 
					</div>


					<div class="control-group">
						<label class="control-label grey" for="form-field-6"><?php echo fambe;?> </label>
						<div class="controls">
							<input autocomplete="off" type="text" name="business_email"
								value="<?php echo fooder_business_email;?>"
								placeholder="Business Email" /> <span class="help-button"
								data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fampopbe;?>" title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label grey" for="form-field-6">Notification Email </label>
						<div class="controls">
							<input autocomplete="off" type="text" name="notification_email"
								value="<?php echo fooder_notification_email;?>"
								placeholder="Notification Email" /> <span class="help-button"
								data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fampopnotemail;?>" title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label grey" for="form-field-6">Notification Mobile No. </label>
						<div class="controls">
							<input autocomplete="off" id="fooderMobile" type="text" name="notification_mobile"
								value="<?php echo fooder_notification_mobile;?>"
								placeholder="Notification Mobile Number" /> <span class="help-button"
								data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fampopnotemobile;?>" title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<div class="hr"></div>

					<div class="form-actions">
						<button class="btn btn-large btn-info" type="submit"
							name="change_bemail">
							<i class="icon-ok bigger-110"></i> <?php echo fambs;?>
						</button>
						&nbsp; &nbsp; &nbsp;
						<button class="btn btn-large" type="reset">
							<i class="icon-undo bigger-110"></i> <?php echo fambr;?>
						</button>
					</div>
				</form>
			</div>
			<div class="span6">
				<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>"
					name="change password" method="post">
					<input autocomplete="off" type="hidden" name="save_password_ip"
						value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
					<div class="space-6"></div>
					<h3 class="center blue"><?php echo famcpass;?></h3>
					<div class="control-group">
						<label class="control-label grey" for="form-field-6"><?php echo famnpass;?>
						</label>
						<div class="controls">
							<input autocomplete="off" type="password" name="new_password"
								placeholder="New Password" /> <span class="help-button"
								data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fampoppass;?>"
								title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label grey" for="form-field-6"><?php echo famrnpass;?> </label>
						<div class="controls">
							<input autocomplete="off" type="password"
								name="retype_new_password" placeholder="Retype New Password" />
						</div>
					</div>
					<div class="hr"></div>
					<div class="form-actions">
						<button class="btn btn-large btn-info" type="submit"
							name="change_password">
							<i class="icon-ok bigger-110"></i> <?php echo fambs;?>
						</button>
						&nbsp; &nbsp; &nbsp;
						<button class="btn btn-large" type="reset">
							<i class="icon-undo bigger-110"></i> <?php echo fambr;?>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
