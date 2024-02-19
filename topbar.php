<style>
	.header{
    float: left;
    color: white;
    font-family: inherit;
    font-size: 25px;
    min-height: 5vh;
  }
  .navbar{
    position: fixed-top;
    min-height: 110vh;
    /*background-image: linear-gradient(135deg, #4ca1af 0%, #c4e0e5 100%);*/
    background-color: #023047;
    font-size: 0.9rem !important;
    padding:10px;
    min-height: 3.5rem;
  }
</style>

<nav class="navbar">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="header" >
        <large><b>Dormitory Record Keeping System for Casa Soleil</b></large>
      </div>
	  	<div class="float-right">
        <div class=" dropdown mr-4">
            <a href="#" class="text-black dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <!-- <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a> -->
                <a class="dropdown-item" href="homepage.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>