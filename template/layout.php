<!doctype html>

<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"><!--  Resource style -->
	<!--<link rel="stylesheet" href="dependencies/css/style.css">-->
	<!--<script src="js/modernizr.js"></script>--> <!-- Modernizr -->
  	
	<title>Payroll - <?php echo $title?></title>
</head>
<body>
	<header class="cd-main-header">
		<a href="index.php" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>
		
		<div class=" is-hidden">
			
		</div> <!-- cd-search -->

		<a href="#0" class="cd-nav-trigger"><span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li><a href="#0">Import Data</a></li>
				<li><a href="#0">Export Data</a></li>
				<li><a href="#0">Report</a></li>
				<li><a href="#0">Support</a></li>
				<li class="has-children account">
					<a href="#0">
						<img src="img/cd-avatar.png" alt="avatar">
						<?php echo $_SESSION['UserID']; ?>
					</a>

					<ul>

						<li><a href="#0">My Account</a></li>
						<li><a href="#0">Edit Account</a></li>
						<li><a href="template/logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Main</li>
				<li class="has-children overview">
					<a href="#0">Dashboard</a>
					
					<ul>
						<li><a href="#0">All Data</a></li>
						<li><a href="#0">Category 1</a></li>
						<li><a href="#0">Category 2</a></li>
					</ul>
				</li>
				<li class="has-children notifications active">
					<a href="#0">Notifications<span class="count">3</span></a>
					
					<ul>
						<li><a href="#0">All Notifications</a></li>
						<li><a href="#0">Friends</a></li>
						<li><a href="#0">Other</a></li>
					</ul>
				</li>
				<li class="has-children overview"><a href="#0"onclick="myAccFunc()" >Master Data</a>
				<ul>
						<li><a href="#0">ข้อมูลพนักงาน</a></li>
						<li><a href="#0">ข้อมูลสาขา/บริษัท</a></li>
						<li><a href="#0">ข้อมูลตั้งต้นตำแหน่งงาน/เงินประจำตำแหน่ง</a></li>
						<li><a href="attendance.php">ข้อมูลประเภทการลา</a></li>
						<li><a href="deducttype.php">ข้อมูลประเภทการหักเงิน</a></li>
						<li><a href="#0">ข้อมูลแผนก</a></li>
						<li><a href="#0">รายได้อื่น ๆ</a></li>
					</ul>

			</li>
				<li class="has-children comments">
					<a href="#0">Configuration</a>
					
					<ul>
						<li><a href="systemcontrol.php">กำหนดค่าระบบ</a></li>
						<li><a href="#0">กำหนดเงื่อนไขระบบ</a></li>
					
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Secondary</li>
				<li class="has-children bookmarks">
					<a href="#0">Bookmarks</a>
					
					<ul>
						<li><a href="#0">All Bookmarks</a></li>
						<li><a href="#0">Edit Bookmark</a></li>
						<li><a href="#0">Import Bookmark</a></li>
					</ul>
				</li>
				<li class="has-children images">
					<a href="#0">Images</a>
					
					<ul>
						<li><a href="#0">All Images</a></li>
						<li><a href="#0">Edit Image</a></li>
					</ul>
				</li>

				<li class="has-children users">
					<a href="#0">Users</a>
					
					<ul>
						<li><a href="user.php">ผู้ใช้งานระบบ</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Action</li>
				<li class="action-btn"><a href="#0">+ Button</a></li>
			</ul>
		</nav>


		<div class="content-wrapper">
			<?php include $detail ?>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="dependencies/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script src="dependencies/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script><!-- Resource jQuery --> 

</body>
</html>