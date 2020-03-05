<?php
    if (
        $this->get_setting( 'sidebar_active' )->get_data() == 1
        && $this->get_root()->get_module( 'sv_sidebar' )
        && ! empty(
        $this->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name().'_sidebar', ) )
        )
    ) {
    ?>
        <aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>  <?php echo $this->get_prefix( 'bar_column' ); ?>">
            <?php
            echo $this->get_root()->get_module( 'sv_sidebar' )
                ->load( array( 'id' => $this->get_module_name().'_sidebar', ) );
            ?>
        </aside>
<?php
    }