<?php
if (!isset($_SESSION['employer_id'])) {
	redirect(web_root . "employer/index.php");
}

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">List of Employee's <a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i class="fa fa-plus-circle fw-fa"></i> Add New Employee</a> </h1>
	</div>
	<!-- /.col-lg-12 -->
</div>


<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">
	<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

		<thead>
			<tr>
				<th width="5%">EmployeeNo</th>
				<th>Name</th>
				<th>Address</th>
				<th>Sex</th>
				<th>Age</th>
				<th>Institution</th>
				<th>ContactNo</th>
				<th>Role</th>
				<th width="14%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// $mydb->setQuery("SELECT * 
			// 			FROM  `users` WHERE TYPE != 'Customer'");
			// $mydb->setQuery("SELECT * FROM   `employees` WHERE company_name = '.'");
			$mydb->setQuery("SELECT e.* FROM " . self::$tblname . " e INNER JOIN " . self::$tblname1 . " s ON e." . self::$colname . " = s." . self::$colname . " WHERE e." . self::$colname1 . " = {$company_id}");

			$cur = $mydb->loadResultList();

			foreach ($cur as $result) {
				echo '<tr>';
				// echo '<td width="5%" align="center"></td>';
				echo '<td>' . $result->employee_id . '</a></td>';
				echo '<td>' . $result->lname . ', ' . $result->fname . '</td>';
				echo '<td>' . $result->address . '</td>';
				echo '<td>' . $result->sex . '</td>';
				echo '<td>' . $result->age . '</td>';
				echo '<td>' . $result->Institution . '</td>';
				echo '<td>' . $result->contact_no . '</td>';
				echo '<td>' . $result->role . '</td>';
				// echo '<td>'. $result->WORKSTATS.'</td>'; 
				echo '<td align="center" >    
					  		             <a title="Edit" href="index.php?view=edit&id=' . $result->employee_id . '"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-edit fw-fa"></span></a> 
					  		             <a title="Delete" href="controller.php?action=delete&id=' . $result->employee_id . '"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span></a> 
					  					 </td>';
				echo '</tr>';
			}
			?>
		</tbody>

	</table>


</form>