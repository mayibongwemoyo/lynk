<?php require_once("../include/session.php"); ?>

<section id="content">
	<div class="container content">
		<p> <?php check_message(); ?></p>
		<form class="row form-horizontal span6  wow fadeInDown" action="../process.php?action=employerregister" method="POST">
			<h2 class=" ">Personal Info</h2>
			<div class="row">
				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="company_name">Company:</label>

						<div class="col-md-8">

							<input class="form-control input-sm" id="company_name" name="company_name" placeholder="Company name" type="text" value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="fname">Firstname:</label>

						<div class="col-md-8">
							<!-- <div hidden>
					  <input name="company_id" type="hidden" value="<?php echo $_GET['job']; ?>">
						</div> -->
							<input class="form-control input-sm" id="fname" name="fname" placeholder="Firstname" type="text" value="" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="lname">Lastname:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="lname" name="lname" placeholder="Lastname" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="role">Role:</label>
						<div class="col-md-8">
							<input class="form-control input-sm" id="role" name="role" placeholder="Role in Company" type="text" any value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="employer_email">Company Email Address:</label>
						<div class="col-md-8">
							<input type="Email" class="form-control input-sm" id="employer_email" name="employer_email" placeholder="Strictly Email Address" autocomplete="false" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="employer_pass">Password:</label>

						<div class="col-md-8">
							<input name="deptid" type="hidden" value="">
							<input class="form-control input-sm" id="employer_pass" name="employer_pass" placeholder="Password" type="password" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
						
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for=""></label>

						<div class="col-md-8">
							<label><input type="checkbox"> By Sign up you are agree with our <a href="#">terms and condition</a></label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						<label class="col-md-4 control-label" for="idno"></label>

						<div class="col-md-8">
							<button class="btn btn-primary btn-sm" name="btnEmployerRegister" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>

						</div>
					</div>
				</div>
		</form>
	</div>
</section>