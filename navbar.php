
<style>
	.collapse a{
		text-indent:10px;
	}
	nav .sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
	nav#sidebar {
    	/*background-image: linear-gradient(135deg, #4ca1af 0%, #c4e0e5 100%);*/
    	background-color:  #023047;
    	font-size: 1.1m !important;
	}
	a.nav-item:hover, .nav-item.active {
		background: #219ebc;
	    color: white;
	}
	a.nav-item {
	    border: 4px solid rgba(0,0,0,.125);
	    color: white;
	    /*background-image: linear-gradient(135deg, #4ca1af 0%, #c4e0e5 100%);*/
	    background-color:  #023047;
	}
</style>

<nav id="sidebar">
		
		<div class="sidebar">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-th-list "></i></span> Dorm Type</a>
				<a href="index.php?page=houses" class="nav-item nav-houses"><span class='icon-field'><i class="fa fa-bed "></i></span> Rooms</a>	
				<a href="index.php?page=tenants" class="nav-item nav-tenants"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Customers</a>
				<a href="index.php?page=invoices" class="nav-item nav-invoices"><span class='icon-field'><i class="fa fa-file-invoice "></i></span> Payments</a>
				<a href="index.php?page=announce" class="nav-item nav-announce"><span class='icon-field'><i class="fa fa-bullhorn "></i></span> Announcement</a>
				<a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-comment"></i></span> SMS Notification</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Users</a>
				<!-- <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs text-danger"></i></span> System Settings</a> -->
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
