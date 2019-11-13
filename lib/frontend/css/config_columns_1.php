<?php if($box_content_alignment == 'left'){ // LEFT / FLEX START ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: flex-start;
    }

<?php }elseif($box_content_alignment == 'right'){ // LEFT / FLEX END ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: flex-end;
    }

<?php }elseif($box_content_alignment == 'spread'){ // SPREAD / SPACE BETWEEN ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: center;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
        justify-content: center;
    }

<?php }else{  // CENTER / FLEX START ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: center;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
        justify-content: center;
    }

<?php } ?>