<div class="specials-section">
					<div class="container">
						<div class="specials-grids">
							
							<div class="col-md-4 specials1">
								<h3> details</h3>
								<ul>
									<li><a href="about.php">About Us</a></li>
									<li><a href="index.php">Home</a></li>
									<li><a href="contact.php">Contact</a></li>
									<li><a href="admin/index.php">Admin</a></li>
								</ul>
							</div>
							<div class="col-md-4 specials1">
								<h3>contact</h3>
								<?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
								<address>
									<p>Email : hasan35-1020@diu.edu.bd/matowara35-1005@diu.edu.bd</p>
								 <p>Phone : 01839095792</p>
								 <p>Daffodil Smart City Bangladesh</p>
								</address><?php } ?>
							</div>
							<div class="col-md-4 specials1">
								<h3>social</h3>
								<ul>
									<li><a href=https://www.facebook.com/dady.yt.9?mibextid=wwXIfr&mibextid=wwXIfr>facebook</a></li>
									<li><a href=https://x.com/Durjoyxx>twitter</a></li>
									<li><a href=https://www.instagram.com/durjoy43/>instagram</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>