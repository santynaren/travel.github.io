<body class="container-fluid">
<div class="row" id="login_card">
	<div id="login_card">
	
		<div class="col s12"><center><img id="yathra_logo" src="<?php echo base_url();?>media/images/final_logo.png"></center></div>
		<div  class="col s12">
			<form role="form" name="form"  id="card_form" action="login/check_db" method="post" enctype="multipart/form-data" >
				<div class="status"></div>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">speaker_notes</i>
						<input type="text" id="pnr_number" name="username" >
						<label for="username">PNR Number</label>
					</div>
				
					<div class="input-field col s6">
						<i class="material-icons prefix">work</i>
						<input type="text"id="number_of_baggage" name="number_of_baggage" >
						<label  for="number_of_baggage">Number of Baggage</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">call_made</i>
						<input type="text"id="from_airport" name="from_airport" >
						<label  for="from_airport">From </label>
					</div>
				
					<div class="input-field col s6">
						<i class="material-icons prefix">call_received</i>
						<input type="text"id="to_airport" name="to_airport" >
						<label  for="to_airport">To</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">closed_caption</i>
						<input type="text"id="rfid_one" name="rfid" >
						<label  for="rfid_one">RFID Value</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">track_changes</i>
						<input type="text"id="colour_one" name="colour">
						<label  for="colour_one">Colour</label>
					</div>
				</div>
			
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">closed_caption</i>
						<input type="text"id="rfid_two" name="rfid" >
						<label  for="rfid_two">RFID Value</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">track_changes</i>
						<input type="text"id="colour_two" name="colour">
						<label  for="colour_two">Colour</label>
					</div>
				</div>
				<div class="row">
					<center><button class="btn waves-effect waves-light indigo darken-2" id="login" name="action">Submit
						
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
			
			var pnr_number = $('#pnr_number').val();
			var number_of_baggage = $('#number_of_baggage').val();
			var from_airport = $('#from_airport').val();
			var to_airport = $('#to_airport').val();
			var rfid_one = $('#rfid_one').val();
			var rfid_two = $('#rfid_two').val();
			var colour_one = $('#colour_one').val();
			var colour_two = $('#colour_two').val();
			
			dataSet = 'pnr_number='+pnr_number+'&number_of_baggage='+number_of_baggage+'&from_airport='+from_airport+'&to_airport='+to_airport+'&rfid_one='+rfid_one+'&colour_one='+colour_one+'&rfid_two='+rfid_two+'&colour_two='+colour_two;
			$('#login').html('Please Wait .....');
			$.ajax({
				type:'POST',
				url: '<?php echo base_url('Employee/insert_detail');?>',
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