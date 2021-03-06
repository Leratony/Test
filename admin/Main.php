<?php 
$name = $_SESSION['user_name'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brand || Admin</title>
<link href="css/Admin_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
<div id = "headerInside">
	<div id ="logo"></div>
	<div id ="companyName">Brand Admin</div>
	<div id ="navWrap">
		<a href="/">Main</a>
		
		
	</div>
	
</div>
</header>


<main>

	<nav id ='SideBar'>
	 	<ul>
	 		<li>
	 			<div class = 'ItemNav'>
					<div id = 'AvatarDefault'></div>
					<div class = 'CurrentAdmin'> <font color='red'><?php $name ?></font></div>
					<div class = 'OnlineStatus'> Online status</div>
					
	 			</div>
	 		</li>
	 		<li>
 				<div class = 'MainNav'>
 					<div class = 'Notice'><a href = 'Main.php?page=home'>HOME</a></div>
 				</div>
	 		</li>
	 		<li>
	 		     <div class = 'ItemNav'>
					<div class = 'ItemTitle_Icon'><a href = '#'>Users</a>
					<ul class = 'UsersMenu'>
					   
							<li><a href = 'Main.php?page=list' >List</a></li>
							<li><a href = 'Main.php?page=create' >Create new user</a></li>
						
					</ul>
					
			
               	     </div>
            	</div>
	 		</li>
	 		<li>
		 		<div class = 'ItemNav'>
					<div class = 'ItemTitle_Icon'><a href = '#'>Admin Panel</a>
						<ul class = 'UsersMenu'>
					   
							<li><a href = 'Main.php?page=stats' >Stats</a></li>
							<li><a href = '#'>Settings</a></li>
						
					</ul>
           	         </div>
            	</div>
	 		</li>
	 		
	 		<li>
	 			<div class = 'ItemNav'>
	 				<div class ='ItemTitle_Icon'>Developers</div>
	 				</div>
	 		</li>
	 		<li>
	 			<div class = 'ItemNav'>
	 			<div class ='ItemTitle_Icon'>FAQ</div>
	 			</div>
	 		</li>
	 		<li>
				<div class = 'Out'>
				<div class = 'ItemTitle_Icon'>
				<a href = 'logout.php'>Sign Out</a>
				</div>
				</div>
	 		</li>
	 		
	 	</ul>
	</nav>
	

	<div class = 'content'>
	
	<?php
	$page = $_GET['page'];
	if ($page == 'home'){
		require('Home.php');
	}elseif ($page == 'list'){
	require('List.php');
	}elseif ($page == 'create'){
	require('Create.php');	
	}elseif ($page == 'stats'){
	require('Stats.php');
	}elseif ($page == 'edit'){
		require('Edit.php');
	}elseif ($page == 'delete'){
		require('Delete.php');
	}
    ?>
		
	</div>
	
    
            
	            
</main>

<footer>
	<div id ="copyrightFooter">
		&copy Brand
	</div>
	
</footer>
</body>
</html>
	  
