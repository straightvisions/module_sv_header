<?php if($box_content_alignment == 'left'){ // LEFT / FLEX START ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: flex-start;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:last-child{
        margin-left: 5%;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
        justify-content: flex-start
        flex: 0 0 auto;
        width: auto;
    }

<?php }elseif($box_content_alignment == 'right'){ // LEFT / FLEX END ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: flex-end;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:last-child{
        margin-left: 5%;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
        flex: 0 0 auto;
        width: auto;
    }

<?php }elseif($box_content_alignment == 'spread'){ // SPREAD / SPACE BETWEEN ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
        justify-content: space-between;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
        flex: 0 0 auto;
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
        flex: 1 1 auto;
        width: auto;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:first-child{
        justify-content: flex-end;
        margin-right: 5%;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:last-child{
        justify-content: flex-start;
    }

<?php } ?>