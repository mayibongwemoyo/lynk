<?php
	 if (!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
     }

?> 
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Users  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Add User</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 --> 
   		 	<div class="col-lg-12"> 
				<table id="dash-table" class="table  table-bordered table-hover table-responsive" style="font-size:12px;" cellspacing="0"> 
				  <thead>
				  	<tr>
				  		<th>Account ID</th>
				  		<th>Account Name</th>
				  		<th>Username</th>
				  		<th>Role</th>
				  		<th width="10%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `users` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `employers`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->employer_id.'</a></td>';
				  		echo '<td>' . $result->fname.'</a></td>';
				  		echo '<td>'. $result->employer_email.'</td>';
				  		echo '<td>'. $result->role.'</td>';
				  		If($result->employer_id==$_SESSION['employer_id'] || $result->role=='MainAdministrator' || $result->role=='Administrator') {
				  			$active = "Disabled";

				  		}else{
				  			$active = "";

				  		}

				  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->employer_id.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->employer_id.'" class="btn btn-danger btn-xs" '.$active.'><span class="fa fa-trash-o fw-fa"></span> </a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div> 
 