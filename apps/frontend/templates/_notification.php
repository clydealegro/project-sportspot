<div id="mailWrapper" style="
		background-color:#f8f8f8;
		padding:40px;
		color:#474747;
		font:12px/1.5 'Helvetica Neue',Arial,Helvetica,sans-serif;
	">
	<div id="mailContainer" style="
		-moz-box-shadow:0 1px 5px #999999;
		-webkit-box-shadow:0 1px 5px #999999;
		background:none repeat scroll 0 0 #FFFFFF;
		margin:0 auto;
		width:600px;
	">
		<div id="mailHead" style="
			background:none repeat scroll 0 0 #E5E5E5;
			border-color:#BFBFBF #AFAFAF;
			border-style:solid;
			border-width:1px;
		">
			<h2 style="
				color:#333333;
				font-size:24px;
				line-height:28px;
				margin:0;
				padding:20px;
				text-shadow:0 1px #FFFFFF;
			"> <?php if(isset($header)) echo $header?> </h2>
		</div>
		<div id="mailBody" style="
			border-bottom:1px solid #BFBFBF;
			border-left:1px solid #BFBFBF;
			border-right:1px solid #BFBFBF;
			padding:20px;
		">
     <p><?php if(isset($greeting)) echo $greeting?>,</p>

     <?php if(isset($body)) echo html_entity_decode($body)?>

			<div id="mailFoot" style="
				border-top:1px solid #DFDFDF;
				margin-top:30px;
				padding-top:10px;
			">

			<p> <?php if(isset($closing)) echo $closing?> </p>

			</div>
		</div>
	</div>
</div>