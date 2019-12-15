<?php 

	$conn = mysqli_connect('localhost','root','','database_library') or die('Database Connection Error !');


//data show.. 
	$data = 'No Data Available !'; 
	if(isset($_POST['readrecords'])){
		$displayquery = "SELECT * FROM ajax_crud_rowphp ORDER BY id DESC"; 
		$result = mysqli_query($conn,$displayquery); 
		if(mysqli_num_rows($result) > 0){
		$data = '
			<table class="table table-bordered text-center">
		      <thead>
		        <tr>
		          <th>Sl</th>
		          <th>Name</th>
		          <th>Email</th>
		          <th>Phone</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		'; 			
			$number = 1; 
			while($row = mysqli_fetch_array($result)){
				$data .= '<tr>
					<td>'.$number.'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
					<td>
						<a href="pdf.php?id='.$row['id'].'" target="_blank" class="btn btn-info btn-sm" >Edit</a>
						<button onclick="DeleteUser('.$row['id'].');" class="btn btn-danger  btn-sm">Remove</button>
					</td>					
				</tr>';
				$number++; 
			}
		}
		$data .= '</table>'; 
		echo $data; 
	}

//data save.. 
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
		$name  = $_POST['name']; 
		$email = $_POST['email']; 
		$phone = $_POST['phone']; 

		$queryAdd = "INSERT INTO `ajax_crud_rowphp` (`id`, `name`, `email`, `phone`) VALUES ( NULL, '$name', '$email', '$phone' )";

		mysqli_query($conn,$queryAdd); 		
	}


//data delete functions...
	if(isset($_POST['deleteid'])){
		$deleteid = $_POST['deleteid']; 
		$deleteQuery = "DELETE FROM `ajax_crud_rowphp` WHERE id='$deleteid'";
		mysqli_query($conn,$deleteQuery);  
	}
?>