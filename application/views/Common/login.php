<body class="container-fluid">
<div class="row" id="login_card">
	<div class="container"id="login_card">
	
		<div class="col s12"><center><img id="aai_logo" src="<?php echo base_url();?>media/images/aai_logo.jpg"></center></div>
		<div  class="col s12  card">
			<form role="form" name="form"  id="card_form" action="login/check_db" method="post" enctype="multipart/form-data" >
				<div class="status"></div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" id="username" name="username" class="materialize-textarea"></textarea>
						<label id="labelid" for="username">Username</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">vpn_key</i>
						<input type="password"id="password" name="username" class="materialize-textarea"></textarea>
						<label id="labelid" for="password">Password</label>
					</div>
				</div>
				<div class="row">
					<center><button class="btn waves-effect waves-light" id="login" name="action">Login
						<i class="material-icons right">send</i>
					</button></center>
				</div>
					
			</form>
		</div>
	</div>
</div>

<script>
	
	
	
	
	$(document).ready(function()
	{
		$("#login").click(function(){
			
			var username = $('#username').val();
			var password = $('#password').val();
			
			dataSet = 'username='+username+'&password='+password;
			$('#login').html('Please Wait .....');
			$.ajax({
				type:'POST',
				url: '<?php echo base_url('login/check_db');?>',
				data: dataSet,
				success:function (data) {
					var json_data = $.parseJSON(data);
					if(json_data.status =='Success'){
						setTimeout(function(){
							$('.status').html(json_data.msg);
							location.reload();
						},1000);
					}
					else {
						$('.status').html(json_data.msg);
						$('#username').val('');
						$('#password').val('');
						$('#login').html('Login ');
						return false;
					}
					
					
					
					
				}	
			});
			return false;
		});
	});
	
	
	
	
</script>

<script>
	$(document).ready(function(){
		$('.carousel').carousel();
	});
	
	</script>								