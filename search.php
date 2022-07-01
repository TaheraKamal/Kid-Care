<!DOCTYPE html>
<html>
<head>
	<head>
	<meta charset="utf-8">
	<title>Find Day Care</title>
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link href="style.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/png" href="img/icons/favicon.png"/>

</head>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="profilestyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<header>
			<nav>
				<ul>
					<li><a href="about.html"><button class="button">About</button></a></li>
					<li><a href="postoffer.html"><button class="button">Services</button></a></li>
					<li><a href="Register.html"><button class="button">Sign In</button></a></li>
                    
				</ul>
			</nav>
		</div>
	</header>

	<div class="searchbar">
	<form action="search1.php" method="post">

		<select name="searchby">
                <option value="address">Location</option>
                <option value="Name">Name</option>
            </select>
		<input type="text" name="search" placeholder="  search here" required="">
		<input type="submit" name="submit" value="Search">
	</form>
	</div>
	<br><br>
	<div class="tables">
		<table>
			<tr>
				<th>Name</th>
				<th>Website</th>
				<th>Phone</th>
				<th>Address</th>
			</tr>
	        <?php 
	            if(isset($_POST["submit"]))
	            {
		            include 'db.php';
		            $searchby=$_POST['searchby'];
		            $search=$_POST['search'];
					$sql="SELECT * FROM `daycare` WHERE $searchby LIKE('%$search%')";
		            $result=$conn->query($sql);
			        while($row = mysqli_fetch_assoc())
			        {
				        echo 
				          "<tr>
					       <td>" .$row['Name']. "</td>
					       <td>" .$row['Website']. "</td>
					       <td>" .$row['Phone']. "</td>
					       <td>" .$row['Location']. "</td>
				           </tr>";
			        }
	            }
	        ?>
		</table>
	</div>
</body>
</html>