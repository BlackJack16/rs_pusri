<div class="login-box">
	
	<div class="login-logo">
		<a href="../admin/index.php">
			<img style="height:100px; width:100px" src='../dist/img/profile/icon-pusri-white.png' class='user-image' alt='User Image'>				
		</a>
	</div>

	<div class="box box-info">
		<div class="login-box-body" style="border-color:white">
			<p class="login-box-msg">Pendaftaran Pasien Online RS Pusri</p>
			<form action="../admin/index.php?page=act-login&op=in" method="POST">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required=""><span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required=""><span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-2"></div>
					<!-- <div class="col-xs-4">
						<button type="submit" class="btn btn-info btn-block btn-flat">Daftar</button>
					</div> -->
					<div class="col-xs-12">
						<button type="submit" class="btn btn-info btn-block btn-flat">Login</button>
					</div>
					<!-- <div class="col-xs-12"style="padding-top:20px;">
					Belum punya akun? <b><a href="index.php?page=daftar">Daftar</a></b>
					</div> -->
				</div>
			</form>
		</div>
	</div>
</div>