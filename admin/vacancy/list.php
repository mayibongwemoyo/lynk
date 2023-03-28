<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Vacancies  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Add Job Vacancy</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  		<!-- <th>No.</th> -->
				  		<th>Company Name</th> 
				  		<th>Occupation Title</th> 
				  		<th>Require no. of Employees</th> 
				  		<th>Salaries</th> 
				  		<th>Duration of Employment</th> 
				  		<th>Qualification/Work experience</th> 
				  		<th>Job Description</th> 
				  		<th>Prefered Sex</th> 
				  		<th>Sector of Vacancy</th> 
				  		<th>Job Status</th> 
				  		 <th width="10%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	 // `company_id`, `occupation_title`, `req_no_employees`, `salaries`, `duration_employment`, `qualification_work_experience`, `job_description`, `prefered_sex`, `sector_vacancy`, `job_status`
				  		$mydb->setQuery("SELECT * FROM `job` j, `company` c WHERE j.company_id=c.company_id");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		// echo '<td>
				  		//      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->category_id. '"/>
				  		// 		' . $result->CATEGORIES.'</a></td>';
				  			echo '<td>' . $result->company_name.'</td>';
				  			echo '<td>' . $result->occupation_title.'</td>';
				  			echo '<td>' . $result->req_no_employees.'</td>';
				  			echo '<td>' . $result->salaries.'</td>';
				  			echo '<td>' . $result->duration_employment.'</td>';
				  			echo '<td>' . $result->qualification_work_experience.'</td>';
				  			echo '<td>' . $result->job_description.'</td>';
				  			echo '<td>' . $result->prefered_sex.'</td>';
				  			echo '<td>' . $result->sector_vacancy.'</td>';
				  			echo '<td>' . $result->job_status.'</td>';
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->company_id.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->company_id.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		// echo '<td></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				 <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if($_SESSION['ADMIN_ROLE']=='Administrator'){
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
			
			
				</form>
	
 <div class="table-responsive">	 