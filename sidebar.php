<?php
if ( ! is_active_sidebar( 'sidebar_main' ) ) {
	return;
}
?>
<aside class="sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar_main' ); ?>
</aside>
