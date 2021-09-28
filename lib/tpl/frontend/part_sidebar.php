<?php
	if (
		in_array('1', $this->get_setting( 'sidebar_active' )->get_data())
		&& $this->get_module( 'sv_sidebar' )
		&& $this->has_sidebar_content()
	) {
	?>
		<aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>  <?php echo $this->get_prefix( 'bar_column' ); ?>">
			<?php echo $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar')->get_data() ); ?>
		</aside>
<?php
	}