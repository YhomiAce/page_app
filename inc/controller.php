<?php
	
	function checkPostView($conn,$postId)
	{
		$query = "SELECT * FROM post_view WHERE postId=?";
		$stmt = $conn->prepare($query);
		$stmt->execute([$postId]);
		$result = $stmt->rowCount();
		return $result;
	}

	function getView($conn,$postId)
	{
		$query = "SELECT total_views FROM post_view WHERE postId=?";
		$stmt = $conn->prepare($query);
		$stmt->execute([$postId]);
		$result = $stmt->fetch();
		return $result;
	}

	function addView($conn,$postId)
	{
		$query = "INSERT INTO post_view(postId,total_views) VALUES(:postId,1)";
		$stmt = $conn->prepare($query);
		$stmt->execute(["postId"=>$postId]);
		return true;
	}

	function updateView($conn,$postId)
	{
		$query = "UPDATE post_view SET total_views = total_views + 1 WHERE postId=?";
		$stmt = $conn->prepare($query);
		$resultOfQuery = $stmt->execute([$postId]);
		return true;
	}

	// user registration
	function register($conn,$name,$email,$password)
	{
		$sql = "INSERT INTO users(name,email,password) VALUES(:name,:email,:password)";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['name'=>$name,'email'=>$email,'password'=>$password]);
		return true;
	}

	// check if email exist
	function userExist($conn,$email)
	{
		$sql = "SELECT email FROM users WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['email'=>$email]);
		$result = $stmt->fetch();
		return $result;
	}

	// login existing user
	function login($conn,$email)
	{
		$sql = "SELECT email, password FROM users WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();
		return $row;
	}

	// retreiving current users detatil
	function currentUser($conn,$email)
	{
		$sql = "SELECT * FROM users WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();
		return $row;
	}

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Error log Message
	function showMessage($type,$msg){
		return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
		<strong>'.$msg.'</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>';
	}

	function getPost($conn,$id){
		$sql = "SELECT * FROM posts WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		return $row;
	}
	

	// Function to get the client IP address
	function get_client_ip_add() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	function checkVisitor($conn,$ip)
	{
		$query = "SELECT * FROM visitors WHERE visitor_ip=?";
		$stmt = $conn->prepare($query);
		$stmt->execute([$ip]);
		$result = $stmt->rowCount();
		return $result;
	}

	function addVisitors($conn,$ip)
	{
		$sql = "INSERT INTO visitors(visitor_ip) VALUES(:visitor_ip)";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['visitor_ip'=>$ip]);
		return true;
	}

?>