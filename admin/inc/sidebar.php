							
<?php 
		#include 'search.php';
 ?>	
  <script type="text/javascript">
          function find(val) {
               $.ajax({
                  type: "GET",
                  url: "search.php",
                  data: 'see='+val,
                  success: function (data) {
                        $('#search').html(data);
                  }
               })
          }
         
    </script>
    			<?php #include 'search.php'; ?>
							<div class="col-md-2 shadow darkorange p-0 ">




								<div class="nav-link p-3 text-center">
									<img src="../images/avatar5.png" class="w-50 round" style="border-radius: 50%"><br>
									<b class="text-light">Administrator</b>
									
								</div>
								

								
								<a  href="index.php"  class="nav-link text-light" title="Dashboard">
									<b class="fas fa-box text-light mr-3"></b>DASHBOARD
								</a>
								<div class="nav-link  text-light font-weight-bold">
								Navigation
									<b class="fas fa-caret-down text-light float-right"></b>

							</div>
<!------------------------------ Profile  ------------------------------->
							
								<a href="profile.php" class="nav-link text-light" title="profile">
								<b class="fas fa-users mr-3"></b>
								
								Profile
								<b class="fas fa-caret-right float-right"></b>
								
							</a>
<!------------------------------Education  ------------------------------->
							<a href="education.php" class="nav-link  text-light posts" title="Education">
									<b class="fas fa-city mr-3"></b>
										Education
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
								
<!------------------------------ Experience  ------------------------------->

							

<!------------------------------Manage Jobs  ------------------------------->

								
								
							<!-- <b class="fas fa-caret-down float-right"></b> -->
						
						

							
<!------------------------------Experience  ------------------------------->

								<a href="Experience.php" class="nav-link text-light" title="Manage Terms">
									<b class="fas fa-users mr-3"></b>
										Experience
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
<!------------------------------Skills ------------------------------->
							
								<a href="skills.php" class="nav-link comment text-light" title="Manage Skills">
									<b class="fas fa-plus mr-3"></b>
										Manage Skills
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
								
<!------------------------------ Messages  ------------------------------->

							<a href="Messages.php" title="Manage Messages" class="nav-link text-light page">
								<b class="fas fa-pager mr-3"></b>
								Messages
								<b class="fas fa-caret-right float-right"></b>
							</a>
							
							<!------------------------------ Maths section  ------------------------------->
							
								<a href="maths.php" class="nav-link text-light" title="View Mathematics Questions">
									<b class="fas fa-ellipsis-h mr-3"></b>
										Mathematics
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
								<a href="visitors.php" class="nav-link text-light" title="visitors">
									<b class="fas fa-cogs mr-3"></b>
										Visitors
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>
								<a href="logout.php" class="nav-link text-light" title="Logout">
									<b class="fas fa-question mr-3"></b>
										Logout
									<b class="fas fa-caret-right text-light float-right"></b>
								</a>

							</div>


					<!-- <div class="col-md-10 p-0">
						<div class="p-3 bg-white">
							<form method="post" enctype="multipart/form-data">
							<input type="text"  onkeyup="find(this.value);" placeholder="Search for ..." class="p-2  rounded-top rounded-left border-0 bg-light m-0 search">
							<button class="rounded-right rounded-bottom p-2 bg-primary border-0 fas">&#xf002;</button>
							
							<div class="col-md-2 border-left float-right">
								<b class="fas fa-envelope ml-2" style="color: #e1e1e1"></b>
								<b class="fas fa-bell ml-2" style="color: #e1e1e1"></b>
							</div>
						</form>
						</div>
							<div class="">
						 <div id="search"></div>
						</div> -->

						