<!---728x90--->

		<!-- header-starts -->

		<div class="sticky-header header-section ">

			<div class="header-left">

				

				<!--toggle button start-->

				<button id="showLeftPush"><i class="fa fa-bars"></i></button>

				<!--toggle button end-->

				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" style="opacity: 0" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">8</span></a>
						</li>	
					</ul>
					<div class="clearfix"> </div>
				</div>

				<!--notification menu end -->

				<div class="clearfix"> </div>

			</div>

			<div class="header-right">

				

				<div class="profile_details">		

					<ul>

						<li class="dropdown profile_details_drop">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

								<div class="profile_img">	

									<span class="prfil-img">

										<?php if ($user->fotos == ""): ?>

											<img src="<?= base_url()?>assets/dashboard/images/img-profile.png" width="45">

										<?php else: ?>

											<img src="<?= base_url()?>uploads/<?= $user->fotos; ?>" width="45">

										<?php endif ?>

									 </span> 

									<div class="user-name">

										<p><?= $this->session->userdata("name_user") ?></p>
										<?php if ($this->session->userdata("rol") == 2): ?>
											<span>Administrator</span>
										<?php endif ?>
										<?php if ($this->session->userdata("rol") == 3): ?>
											<span>Usuario</span>
										<?php endif ?>

										<?php if ($this->session->userdata("rol") == 4): ?>
											<span>Revisor</span>
										<?php endif ?>
	
									</div>

									<i class="fa fa-angle-down lnr"></i>

									<i class="fa fa-angle-up lnr"></i>

									<div class="clearfix"></div>	

								</div>	

							</a>

							<ul class="dropdown-menu drp-mnu">

								<li> <a href="<?= base_url()?>cuenta/users/profile"><i class="fa fa-suitcase"></i> Perfil</a> </li> 

								<li> <a href="<?= base_url()?>users/logouts"><i class="fa fa-sign-out"></i> Cerrar Sesion</a> </li>

							</ul>

						</li>

					</ul>

				</div>

				<div class="clearfix"> </div>				

			</div>

			<div class="clearfix"> </div>	

		</div>

		<!-- //header-ends -->