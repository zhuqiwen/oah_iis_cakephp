<?php
	echo $this->Html->css('c3');
	echo $this->Html->script(['c3', 'd3']);

	$this->assign('title', $page_title = 'Donation Statistics Visualization');
?>


<!---->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<div id="module_heading">
	<h1 class="bold"> <?php echo $page_title; ?> </h1>
</div>

<div id="function_body">

	<div id="tabs">
		<ul>
			<li class="override-interface-li"><a href="#tabs-barYearlyDonation-yearly_donations" style="font-size: 0.65em;
			margin-bottom: 0em;">Donation by Year</a></li>
			<li class="override-interface-li"><a href="#tabs-donutTypeDonation-type_donations" style="font-size: 0.65em;
			margin-bottom: 0em;">Donation by Type</a></li>
		</ul>

		<div id="tabs-barYearlyDonation-yearly_donations">
			<?php
				echo $this->element(
					'visualizations/donations/donation_by_year'
				);
			?>
		</div>

		<div id="tabs-donutTypeDonation-type_donations">
			<?php
				echo $this->element(
					'visualizations/donations/donation_by_type'
				);
			?>
		</div>

	</div>

</div>



<script>

	var all_data = <?php echo json_encode($data)?>;
	console.log(all_data);

	$(function() {
		$( "#tabs" ).tabs();
	});

	$('#tabs li a').click(function(event) {
		var funcname = this.href.split("#")[1].split("-")[1];
		var arg_string = this.href.split("#")[1].split("-")[2];
		var arg_data = all_data[arg_string];
		window[funcname](arg_data);
		window.location.hash = this.hash;
	});

	$(document).ready(function() {

		barYearlyDonation(all_data['yearly_donations']);

	});
</script>

<!-- Reinclude the OAH style sheet to override some of the the jQuery "Smoothness" template rules. -->
<link rel="stylesheet" type="text/css" href="/css/oah_oiis.css" />

<style>

	#interface ul li.override-interface-li
	{
		margin-bottom: 0.0em;
	}

</style>


<!---->





