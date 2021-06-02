<?php
	if (
		in_array('1', $this->get_setting( 'sidebar_active' )->get_data())
		&& $this->get_root()->get_module( 'sv_sidebar' )
		&& ! empty(
		$this->get_root()->get_module( 'sv_sidebar' )->load( $this->get_prefix('right_bar') )
		)
	) {
	?>
		<aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>  <?php echo $this->get_prefix( 'bar_column' ); ?>">
			<?php
			echo $this->get_root()->get_module( 'sv_sidebar' )
				->load($this->get_prefix('right_bar') );
			?>
		</aside>
<?php
	}