<?php if($alignment == 'left'){ // LEFT / FLEX START ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: flex-start;
	}

	.sv100_sv_header .sv100_sv_header_bar > *{
	margin-left: 5%;
	}

	.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_header_bar_column,
	.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_navigation_sv_header_primary{
	flex: 0 0 auto;
	width: auto;
	}

	.sv100_sv_header .sv100_sv_header_bar > *:last-child{
	margin-right:0;
	}
<?php }elseif($alignment == 'right'){ // LEFT / FLEX END ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: flex-end;
	}

	.sv100_sv_header .sv100_sv_header_bar > *{
	margin-left: 5%;
	}

	.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_header_bar_column,
	.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_navigation_sv_header_primary{
	flex: 0 0 auto;
	width: auto;
	}

	.sv100_sv_header .sv100_sv_header_bar > *:first-child{
	margin-left:0;
	}
<?php }elseif($alignment == 'spread'){ // SPREAD / SPACE BETWEEN ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: space-between;
	}

	.sv100_sv_header .sv100_sv_header_bar > *{
	justify-content: center;
	flex: 0 1 32%;
	width: auto;
	}

	.sv100_sv_header .sv100_sv_header_bar > *:first-child{
	justify-content: flex-start;
	}

	.sv100_sv_header .sv100_sv_header_bar > *:last-child{
	justify-content: flex-end;
	}

<?php }else{  // CENTER / FLEX START ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: center;
	}

	.sv100_sv_header .sv100_sv_header_bar > *{
	justify-content: center;
	flex: 0 1 32%;
	width: auto;
	margin-left: 5%;
	}

	.sv100_sv_header .sv100_sv_header_bar > *:first-child{
	justify-content: flex-end;
	margin-left: 0;
	}

	.sv100_sv_header .sv100_sv_header_bar > *:last-child{
	justify-content: flex-start;
	}
<?php } ?>