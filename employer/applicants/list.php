<?php
	 if(!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Applicant's   </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<th>Applicant</th>
									<th>Job Title</th>
									<th>Company</th>
									<th>Applied Date</th> 
									<th>Remarks</th>
									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `users` WHERE TYPE != 'Customer'");
							  		$mydb->setQuery("SELECT * FROM `company` c  , `jobregistration` j, `job` j2, `tblapplicants` a WHERE c.`job_id`=j.`job_id` AND  j.`company_id`=j2.`company_id` AND j.`applicant_id`=a.`applicant_id` ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		echo '<td>'. $result->applicant.'</td>';
							  		echo '<td>' . $result->occupation_title.'</a></td>';
							  		echo '<td>' . $result->company_name.'</a></td>'; 
							  		echo '<td>'. $result->registration_date.'</td>';
							  		echo '<td>'. $result->remarks.'</td>';  
					  				echo '<td align="center" >    
					  		             <a title="View" href="index.php?view=view&id='.$result->registration_id.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-info fw-fa"></span> View</a> 
					  		             <a title="Remove" href="index.php?view=delete&id='.$result->registration_id.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
       
                 
 