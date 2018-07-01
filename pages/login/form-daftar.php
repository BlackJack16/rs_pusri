<div class="login-box">
	
	<div class="login-logo">
		<a href="index.php">
			<img style="height:100px; width:100px" src='dist/img/profile/icon-pusri-white.png' class='user-image' alt='User Image'>				
		</a>
	</div>

	<div class="box box-info">
		<div class="login-box-body" style="border-color:white">
			<p class="login-box-msg">Daftar</p>
			<form action="index.php?page=act-daftar" method="POST">
				
				<div class="form-group has-feedback">
					<input type="text" name="NIK" class="form-control" placeholder="No KTP / SIM"><span class="glyphicon glyphicon-th-list form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
					<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"><span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>

				<!-- <div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Alamat"><span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div> -->
				
				
				<div class="form-group has-feedback">
					<input type="password" id="password" name="password" class="form-control" placeholder="Password"><span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<p id="p1" style="color:red;"></p>
					<div class="form-group has-feedback">
					<input type="password" id="password2" name="password2" onfocusout="myFunction()" class="form-control" placeholder="Ulangi Password"><span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
	<script>
function myFunction() {
    var x = document.getElementById("password");
    var y = document.getElementById("password2");
    if (x.value != y.value){
			document.getElementById("p1").innerHTML = "Password tidak sama!";
			document.getElementById("submit").disabled = true;
			
		}

		else if(x.value == y.value){
			document.getElementById("p1").innerHTML = "";
			
			document.getElementById("submit").disabled = false;
		}
}
</script>

				<div class="row">
					<div class="col-xs-2"></div>
					<!-- <div class="col-xs-4">
						<button type="submit" class="btn btn-info btn-block btn-flat">Daftar</button>
					</div> -->
					<div class="col-xs-12">
						<button type="submit" id="submit" class="btn btn-info btn-block btn-flat" name="save" value="save" disabled>Daftar</button>
					</div>
					<div class="col-xs-12"style="padding-top:20px;">
					Sudah punya akun? <b><a href="index.php?page=default">Login</a></b>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>