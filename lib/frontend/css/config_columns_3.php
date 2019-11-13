<?php if($box_content_alignment == 'left'){ // LEFT / FLEX START ------------- ?>
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
<?php }elseif($box_content_alignment == 'right'){ // LEFT / FLEX END ------------- ?>
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
<?php }elseif($box_content_alignment == 'spread'){ // SPREAD / SPACE BETWEEN ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
    justify-content: space-between;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
    flex: 0 1 auto;
    width: auto;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:last-child{
    justify-content: flex-end;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:nth-child(2){
    justify-content: center;
    }

<?php }else{  // CENTER / FLEX START ------------- ?>
    .sv100_sv_header .sv100_sv_header_bar {
    justify-content: center;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
    margin-left: 5%;
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
    flex: 0 1 32%;
    width: auto;
    }

    .sv100_sv_header .sv100_sv_header_bar > *:first-child{
    justify-content: flex-end;
    margin-left: 0;
    }

    <?php if($navigation_order == 1){ ?>
        .sv100_sv_header .sv100_sv_header_bar .sv100_sv_navigation_sv_header_primary{
        justify-content: flex-end;
        }
    <?php } ?>

<?php } ?>