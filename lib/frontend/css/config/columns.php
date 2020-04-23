<?php // content alignment

if($alignment == 'left'){ // LEFT / FLEX START ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: flex-start;
	}

<?php }elseif($alignment == 'right'){ // LEFT / FLEX END ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: flex-end;
	}

<?php }elseif($alignment == 'spread'){ // SPREAD / SPACE BETWEEN ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: center;
	}


<?php }else{  // CENTER / FLEX START ------------- ?>
	.sv100_sv_header .sv100_sv_header_bar {
	justify-content: center;
	}


<?php } ?>
<?php // inner column alignment

