<?php
/**
 * Theme About Page
 */

if ( ! class_exists( 'Nishiki_About_Page' ) ) {
	class Nishiki_About_Page{

		public $menu_title = '';

		/**
			 * Construct
			 */
		public function __construct() {
				add_action( 'admin_menu', array( $this, 'nishiki_about_page' ) );
			add_action( 'after_switch_theme', array( $this, 'nishiki_switch_theme' ) );
		}

		/**
		 * Active Theme Notice
		 */
		function nishiki_about_page_notice() {
			$theme_data = wp_get_theme('nishiki');
			$message = sprintf( wp_kses( __( 'Welcome and thanks for choosing %1$s theme. Please visit our <a href="%2$s">about page</a>.', 'nishiki' ), array( 'a' => array( 'href' => array() ) ) ), esc_attr( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=nishiki-about' ) ) );
			printf( '<div class="updated notice notice-success notice-alt is-dismissible"><p>%s</p></div>', $message );
		}

		/**
		 * Switch Theme
		 */
		function nishiki_switch_theme() {
			add_action( 'admin_notices', array( $this, 'nishiki_about_page_notice' ) );
		}

		/**
		 * Add Theme Page
		 */
		public function nishiki_about_page() {
			$this->menu_title = __( 'Nishiki About Page', 'nishiki' );
			add_theme_page(
				esc_html__( 'Nishiki About Page', 'nishiki' ),
					$this->menu_title,
					'edit_theme_options',
					'nishiki-about',
					array( $this, 'nishiki_theme_info_page' )
				);
		}

		/**
		 * Tab Array
		 */
		public function nishiki_tab_array() {
			$nishiki_tab_array = array(
				'welcome'  => __( 'About Theme', 'nishiki' ),
				'iconfont' => __( 'Use Icon', 'nishiki' ),
			);

			return $nishiki_tab_array;
		}

		/**
			 * Theme Page Info
			 */
		public function nishiki_theme_info_page(){
			$theme_data = wp_get_theme('nishiki');
			?>
				<div class="wrap about-wrap theme_info_wrapper">
					<h1><?php printf(esc_html__('Welcome to Nishiki - Version %1s', 'nishiki'), esc_html( $theme_data->Version ) ); ?></h1>
					<div class="about-text"><?php esc_html_e( 'Nishiki is a fully responsive theme. Elegance,Refined,Multifunctional. In your admin panel, go to Appearance -> Customize. About 80 customization can be done without writing the code. responsive layout, front page setting, movie setting, etc. Customization often required for web production / website operation can be set.', 'nishiki' ); ?></div>
					<p>
						<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'nishiki'); ?></a>
					</p>
					<p>
						<a target="_blank" href="https://support.animagate.com/replace-nishiki-theme-check-setting/" class="button button-primary"><?php esc_html_e('Initial setting of theme reference page.', 'nishiki'); ?></a>
					</p>
					<h3><?php esc_html_e( 'WordPress Theme Nishiki Pro', 'nishiki'); ?></h3>
					<div class="about-text"><?php esc_html_e( 'Nishiki Pro Theme available', 'nishiki'); ?></div>
					<div class="theme_info_right">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wp-nishiki-pro-theme.jpg" alt="Nishiki Pro Theme Screenshot" />
					</div>
					<p><?php esc_html_e( 'WordPress 5.0 Gutenberg block editor support. Custom editor \'Nishiki Blocks Pro\' Built in.', 'nishiki'); ?>
						</p><p><?php esc_html_e( 'The Nishiki Pro theme features \'Create content\' sensibly \'as one of the concepts, and you can create and manage content without writing any code (you can of course write code and customize it). For details, please check the theme specific page.', 'nishiki'); ?></p>
					<p><a class="button button-primary" target="_blank" href="https://support.animagate.com/product/wp-nishiki-pro/"><?php esc_html_e( 'Nishiki Pro Theme Page', 'nishiki'); ?></a></p>
					<?php $this->create_tab(); ?>
					<?php $this->create_tab_content(); ?>
				</div>
			<?php
		}

		/**
		 * Create Tab
		 */
		public function create_tab() {
			$admin_url = 'themes.php?page=nishiki-about';
			$flag       = false;
			$tab_array = $this->nishiki_tab_array();

			echo '<div class="nav-tab-wrapper">';
			foreach ( $tab_array as $key => $val ) {
				$active = '';
				if ( ! isset( $_GET['tab'] ) && $flag === false ) {
					$active = ' nav-tab-active';
					$flag = 1;
				} elseif ( isset( $_GET['tab'] ) && $key === $_GET['tab'] && $flag === false ) {
					$active = ' nav-tab-active';
				}
				echo '<a href="' . esc_url(
						add_query_arg(
							array(
								'tab' => $key,
							), $admin_url
						)
					) . '" class="nav-tab' . esc_attr( $active ) . '">' . esc_html( $val ) . '</a>';
			}

			echo '</div>';
		}


		/**
		 * Create Tab Content
		 */
		public function create_tab_content() {
			$tab_array = $this->nishiki_tab_array();
			$flag = false;

			foreach ( $tab_array as $key => $val ) {
				if ( ! isset( $_GET['tab'] ) && $flag === false ) {
					$flag = true;
				} elseif ( isset( $_GET['tab'] ) && $key === $_GET['tab'] && $flag === false ) {
					$flag = true;
				}

				if ( $flag === true ) {
					$this->$key();

					break;
				}
			}
		}

		/**
		 * Welcome Page.
		 */
		public function welcome() {
			?>
			<h3><?php esc_html_e('Please rating Nishiki', 'nishiki'); ?></h3>
			<p><?php esc_html_e('Nishiki is a freshly made Japanese theme. If you like this theme, please rating Nishiki theme directory. Your evaluation will be encouraging my future development and management.', 'nishiki'); ?></p>
			<a target="_blank" href="https://wordpress.org/support/theme/nishiki/reviews/?filter=5" class="button button-primary"><?php esc_html_e('Rating Nishiki theme directory', 'nishiki'); ?></a>
			<p><a target="_blank" class="button button-primary" href="https://support.animagate.com/product/wp-nishiki/"><?php esc_html_e( 'Nishiki Theme Page', 'nishiki'); ?></a></p>
			<div class="theme_info_right">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="Theme Screenshot" />
			</div>
			<?php
		}

		/**
		 * Plugin Page.
		 */
		public function plugin() {
			?>
			<h3><a target="_blank" href="https://support.animagate.com/product/wp-nishiki-growing-beauty/">Nishiki Growing Beauty Plugin</a></h3>
			<p><?php esc_html_e( 'Nishiki Growing Beauty adds various functions that are useful for increasing efficiency of customization and attracting and converting, towards people who use the official WordPress theme Nishiki to manage websites, and on the management screen It is an integrated plug-in that can be set and operated easily. Plug-in body with basic functions such as theme optimization and script addition can be used for free. In addition, we also have some filtering functions for advanced WordPress customizers.', 'nishiki'); ?></p>
				<ul>
					<li><a target="_blank" href="https://support.animagate.com/manual/wp-nishiki-gb-optimize/"><?php esc_html_e( 'Theme Optimize(Free)', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/manual/wp-nishiki-gb-script/"><?php esc_html_e( 'Add Script(Free)', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/manual/wp-nishiki-gb-user-profile/"><?php esc_html_e( 'User Profile(Free)', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/manual/nishiki-gb-breadcrumbs/"><?php esc_html_e( 'Breadcrumbs(Free)', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/product/nishiki-gb-share/"><?php esc_html_e( 'Share Button', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/product/nishiki-gb-social/"><?php esc_html_e( 'Social Account', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/product/nishiki-gb-analytics/"><?php esc_html_e( 'Analytics', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/product/nishiki-gb-meta/"><?php esc_html_e( 'Schema.org,OGP[Open Graph Protocol]', 'nishiki' ); ?></a></li>
					<li><a target="_blank" href="https://support.animagate.com/product/nishiki-gb-content/"><?php esc_html_e( 'Content', 'nishiki' ); ?></a></li>
				</ul>
			<?php
		}

		/**
		 * Iconfont Page.
		 */
		public function iconfont() {
			?>
				<ul class="dashboard-icons">
					<li><i class="icomoon icon-500px"></i>500px</li>
					<li><i class="icomoon icon-accessibility"></i>accessibility</li>
					<li><i class="icomoon icon-address-book"></i>address-book</li>
					<li><i class="icomoon icon-aid-kit"></i>aid-kit</li>
					<li><i class="icomoon icon-airplane"></i>airplane</li>
					<li><i class="icomoon icon-alarm"></i>alarm</li>
					<li><i class="icomoon icon-amazon"></i>amazon</li>
					<li><i class="icomoon icon-android"></i>android</li>
					<li><i class="icomoon icon-angry"></i>angry</li>
					<li><i class="icomoon icon-angry2"></i>angry2</li>
					<li><i class="icomoon icon-appleinc"></i>appleinc</li>
					<li><i class="icomoon icon-arrow-down-left"></i>arrow-down-left</li>
					<li><i class="icomoon icon-arrow-down-left2"></i>arrow-down-left2</li>
					<li><i class="icomoon icon-arrow-down-right"></i>arrow-down-right</li>
					<li><i class="icomoon icon-arrow-down-right2"></i>arrow-down-right2</li>
					<li><i class="icomoon icon-arrow-down"></i>arrow-down</li>
					<li><i class="icomoon icon-arrow-down2"></i>arrow-down2</li>
					<li><i class="icomoon icon-arrow-down22"></i>arrow-down22</li>
					<li><i class="icomoon icon-arrow-left"></i>arrow-left</li>
					<li><i class="icomoon icon-arrow-left2"></i>arrow-left2</li>
					<li><i class="icomoon icon-arrow-left22"></i>arrow-left22</li>
					<li><i class="icomoon icon-arrow-right"></i>arrow-right</li>
					<li><i class="icomoon icon-arrow-right2"></i>arrow-right2</li>
					<li><i class="icomoon icon-arrow-right22"></i>arrow-right22</li>
					<li><i class="icomoon icon-arrow-up-left"></i>arrow-up-left</li>
					<li><i class="icomoon icon-arrow-up-left2"></i>arrow-up-left2</li>
					<li><i class="icomoon icon-arrow-up-right"></i>arrow-up-right</li>
					<li><i class="icomoon icon-arrow-up-right2"></i>arrow-up-right2</li>
					<li><i class="icomoon icon-arrow-up"></i>arrow-up</li>
					<li><i class="icomoon icon-arrow-up2"></i>arrow-up2</li>
					<li><i class="icomoon icon-arrow-up22"></i>arrow-up22</li>
					<li><i class="icomoon icon-attachment"></i>attachment</li>
					<li><i class="icomoon icon-backward"></i>backward</li>
					<li><i class="icomoon icon-backward2"></i>backward2</li>
					<li><i class="icomoon icon-baffled"></i>baffled</li>
					<li><i class="icomoon icon-baffled2"></i>baffled2</li>
					<li><i class="icomoon icon-barcode"></i>barcode</li>
					<li><i class="icomoon icon-basecamp"></i>basecamp</li>
					<li><i class="icomoon icon-behance"></i>behance</li>
					<li><i class="icomoon icon-behance2"></i>behance2</li>
					<li><i class="icomoon icon-bell"></i>bell</li>
					<li><i class="icomoon icon-bin"></i>bin</li>
					<li><i class="icomoon icon-bin2"></i>bin2</li>
					<li><i class="icomoon icon-binoculars"></i>binoculars</li>
					<li><i class="icomoon icon-blocked"></i>blocked</li>
					<li><i class="icomoon icon-blog"></i>blog</li>
					<li><i class="icomoon icon-blogger"></i>blogger</li>
					<li><i class="icomoon icon-blogger2"></i>blogger2</li>
					<li><i class="icomoon icon-bold"></i>bold</li>
					<li><i class="icomoon icon-book"></i>book</li>
					<li><i class="icomoon icon-bookmark"></i>bookmark</li>
					<li><i class="icomoon icon-bookmarks"></i>bookmarks</li>
					<li><i class="icomoon icon-books"></i>books</li>
					<li><i class="icomoon icon-box-add"></i>box-add</li>
					<li><i class="icomoon icon-box-remove"></i>box-remove</li>
					<li><i class="icomoon icon-briefcase"></i>briefcase</li>
					<li><i class="icomoon icon-brightness-contrast"></i>brightness-contrast</li>
					<li><i class="icomoon icon-bubble"></i>bubble</li>
					<li><i class="icomoon icon-bubble2"></i>bubble2</li>
					<li><i class="icomoon icon-bubbles"></i>bubbles</li>
					<li><i class="icomoon icon-bubbles2"></i>bubbles2</li>
					<li><i class="icomoon icon-bubbles3"></i>bubbles3</li>
					<li><i class="icomoon icon-bubbles4"></i>bubbles4</li>
					<li><i class="icomoon icon-bug"></i>bug</li>
					<li><i class="icomoon icon-bullhorn"></i>bullhorn</li>
					<li><i class="icomoon icon-calculator"></i>calculator</li>
					<li><i class="icomoon icon-calendar"></i>calendar</li>
					<li><i class="icomoon icon-camera"></i>camera</li>
					<li><i class="icomoon icon-cancel-circle"></i>cancel-circle</li>
					<li><i class="icomoon icon-cart"></i>cart</li>
					<li><i class="icomoon icon-checkbox-checked"></i>checkbox-checked</li>
					<li><i class="icomoon icon-checkbox-unchecked"></i>checkbox-unchecked</li>
					<li><i class="icomoon icon-checkmark"></i>checkmark</li>
					<li><i class="icomoon icon-checkmark2"></i>checkmark2</li>
					<li><i class="icomoon icon-chrome"></i>chrome</li>
					<li><i class="icomoon icon-circle-down"></i>circle-down</li>
					<li><i class="icomoon icon-circle-left"></i>circle-left</li>
					<li><i class="icomoon icon-circle-right"></i>circle-right</li>
					<li><i class="icomoon icon-circle-up"></i>circle-up</li>
					<li><i class="icomoon icon-clear-formatting"></i>clear-formatting</li>
					<li><i class="icomoon icon-clipboard"></i>clipboard</li>
					<li><i class="icomoon icon-clock"></i>clock</li>
					<li><i class="icomoon icon-clock2"></i>clock2</li>
					<li><i class="icomoon icon-close"></i>close</li>
					<li><i class="icomoon icon-cloud-check"></i>cloud-check</li>
					<li><i class="icomoon icon-cloud-download"></i>cloud-download</li>
					<li><i class="icomoon icon-cloud-upload"></i>cloud-upload</li>
					<li><i class="icomoon icon-cloud"></i>cloud</li>
					<li><i class="icomoon icon-clubs"></i>clubs</li>
					<li><i class="icomoon icon-codepen"></i>codepen</li>
					<li><i class="icomoon icon-cog"></i>cog</li>
					<li><i class="icomoon icon-cogs"></i>cogs</li>
					<li><i class="icomoon icon-coin-dollar"></i>coin-dollar</li>
					<li><i class="icomoon icon-coin-euro"></i>coin-euro</li>
					<li><i class="icomoon icon-coin-pound"></i>coin-pound</li>
					<li><i class="icomoon icon-coin-yen"></i>coin-yen</li>
					<li><i class="icomoon icon-command"></i>command</li>
					<li><i class="icomoon icon-compass"></i>compass</li>
					<li><i class="icomoon icon-compass2"></i>compass2</li>
					<li><i class="icomoon icon-confused"></i>confused</li>
					<li><i class="icomoon icon-confused2"></i>confused2</li>
					<li><i class="icomoon icon-connection"></i>connection</li>
					<li><i class="icomoon icon-contrast"></i>contrast</li>
					<li><i class="icomoon icon-cool"></i>cool</li>
					<li><i class="icomoon icon-cool2"></i>cool2</li>
					<li><i class="icomoon icon-copy"></i>copy</li>
					<li><i class="icomoon icon-credit-card"></i>credit-card</li>
					<li><i class="icomoon icon-crop"></i>crop</li>
					<li><i class="icomoon icon-cross"></i>cross</li>
					<li><i class="icomoon icon-crying"></i>crying</li>
					<li><i class="icomoon icon-crying2"></i>crying2</li>
					<li><i class="icomoon icon-css3"></i>css3</li>
					<li><i class="icomoon icon-ctrl"></i>ctrl</li>
					<li><i class="icomoon icon-database"></i>database</li>
					<li><i class="icomoon icon-delicious"></i>delicious</li>
					<li><i class="icomoon icon-deviantart"></i>deviantart</li>
					<li><i class="icomoon icon-diamonds"></i>diamonds</li>
					<li><i class="icomoon icon-dice"></i>dice</li>
					<li><i class="icomoon icon-display"></i>display</li>
					<li><i class="icomoon icon-download"></i>download</li>
					<li><i class="icomoon icon-download2"></i>download2</li>
					<li><i class="icomoon icon-download3"></i>download3</li>
					<li><i class="icomoon icon-drawer"></i>drawer</li>
					<li><i class="icomoon icon-drawer2"></i>drawer2</li>
					<li><i class="icomoon icon-dribbble"></i>dribbble</li>
					<li><i class="icomoon icon-drive"></i>drive</li>
					<li><i class="icomoon icon-dropbox"></i>dropbox</li>
					<li><i class="icomoon icon-droplet"></i>droplet</li>
					<li><i class="icomoon icon-earth"></i>earth</li>
					<li><i class="icomoon icon-edge"></i>edge</li>
					<li><i class="icomoon icon-eject"></i>eject</li>
					<li><i class="icomoon icon-ello"></i>ello</li>
					<li><i class="icomoon icon-embed"></i>embed</li>
					<li><i class="icomoon icon-embed2"></i>embed2</li>
					<li><i class="icomoon icon-enlarge"></i>enlarge</li>
					<li><i class="icomoon icon-enlarge2"></i>enlarge2</li>
					<li><i class="icomoon icon-enter"></i>enter</li>
					<li><i class="icomoon icon-envelop"></i>envelop</li>
					<li><i class="icomoon icon-equalizer"></i>equalizer</li>
					<li><i class="icomoon icon-equalizer2"></i>equalizer2</li>
					<li><i class="icomoon icon-evil"></i>evil</li>
					<li><i class="icomoon icon-evil2"></i>evil2</li>
					<li><i class="icomoon icon-exit"></i>exit</li>
					<li><i class="icomoon icon-eye-blocked"></i>eye-blocked</li>
					<li><i class="icomoon icon-eye-minus"></i>eye-minus</li>
					<li><i class="icomoon icon-eye-plus"></i>eye-plus</li>
					<li><i class="icomoon icon-eye"></i>eye</li>
					<li><i class="icomoon icon-eyedropper"></i>eyedropper</li>
					<li><i class="icomoon icon-facebook"></i>facebook</li>
					<li><i class="icomoon icon-facebook2"></i>facebook2</li>
					<li><i class="icomoon icon-feed"></i>feed</li>
					<li><i class="icomoon icon-file-empty"></i>file-empty</li>
					<li><i class="icomoon icon-file-excel"></i>file-excel</li>
					<li><i class="icomoon icon-file-music"></i>file-music</li>
					<li><i class="icomoon icon-file-openoffice"></i>file-openoffice</li>
					<li><i class="icomoon icon-file-pdf"></i>file-pdf</li>
					<li><i class="icomoon icon-file-picture"></i>file-picture</li>
					<li><i class="icomoon icon-file-play"></i>file-play</li>
					<li><i class="icomoon icon-file-text"></i>file-text</li>
					<li><i class="icomoon icon-file-text2"></i>file-text2</li>
					<li><i class="icomoon icon-file-video"></i>file-video</li>
					<li><i class="icomoon icon-file-word"></i>file-word</li>
					<li><i class="icomoon icon-file-zip"></i>file-zip</li>
					<li><i class="icomoon icon-files-empty"></i>files-empty</li>
					<li><i class="icomoon icon-film"></i>film</li>
					<li><i class="icomoon icon-filter"></i>filter</li>
					<li><i class="icomoon icon-finder"></i>finder</li>
					<li><i class="icomoon icon-fire"></i>fire</li>
					<li><i class="icomoon icon-firefox"></i>firefox</li>
					<li><i class="icomoon icon-first"></i>first</li>
					<li><i class="icomoon icon-flag"></i>flag</li>
					<li><i class="icomoon icon-flattr"></i>flattr</li>
					<li><i class="icomoon icon-flickr"></i>flickr</li>
					<li><i class="icomoon icon-flickr2"></i>flickr2</li>
					<li><i class="icomoon icon-flickr3"></i>flickr3</li>
					<li><i class="icomoon icon-flickr4"></i>flickr4</li>
					<li><i class="icomoon icon-floppy-disk"></i>floppy-disk</li>
					<li><i class="icomoon icon-folder-download"></i>folder-download</li>
					<li><i class="icomoon icon-folder-minus"></i>folder-minus</li>
					<li><i class="icomoon icon-folder-open"></i>folder-open</li>
					<li><i class="icomoon icon-folder-plus"></i>folder-plus</li>
					<li><i class="icomoon icon-folder-upload"></i>folder-upload</li>
					<li><i class="icomoon icon-folder"></i>folder</li>
					<li><i class="icomoon icon-font-size"></i>font-size</li>
					<li><i class="icomoon icon-font"></i>font</li>
					<li><i class="icomoon icon-forward"></i>forward</li>
					<li><i class="icomoon icon-forward2"></i>forward2</li>
					<li><i class="icomoon icon-forward3"></i>forward3</li>
					<li><i class="icomoon icon-foursquare"></i>foursquare</li>
					<li><i class="icomoon icon-frustrated"></i>frustrated</li>
					<li><i class="icomoon icon-frustrated2"></i>frustrated2</li>
					<li><i class="icomoon icon-gift"></i>gift</li>
					<li><i class="icomoon icon-git"></i>git</li>
					<li><i class="icomoon icon-github"></i>github</li>
					<li><i class="icomoon icon-glass"></i>glass</li>
					<li><i class="icomoon icon-glass2"></i>glass2</li>
					<li><i class="icomoon icon-google-drive"></i>google-drive</li>
					<li><i class="icomoon icon-google-plus"></i>google-plus</li>
					<li><i class="icomoon icon-google-plus2"></i>google-plus2</li>
					<li><i class="icomoon icon-google-plus3"></i>google-plus3</li>
					<li><i class="icomoon icon-google"></i>google</li>
					<li><i class="icomoon icon-google2"></i>google2</li>
					<li><i class="icomoon icon-google3"></i>google3</li>
					<li><i class="icomoon icon-grin"></i>grin</li>
					<li><i class="icomoon icon-grin2"></i>grin2</li>
					<li><i class="icomoon icon-hackernews"></i>hackernews</li>
					<li><i class="icomoon icon-hammer"></i>hammer</li>
					<li><i class="icomoon icon-hammer2"></i>hammer2</li>
					<li><i class="icomoon icon-hangouts"></i>hangouts</li>
					<li><i class="icomoon icon-happy"></i>happy</li>
					<li><i class="icomoon icon-happy2"></i>happy2</li>
					<li><i class="icomoon icon-headphones"></i>headphones</li>
					<li><i class="icomoon icon-heart-broken"></i>heart-broken</li>
					<li><i class="icomoon icon-heart"></i>heart</li>
					<li><i class="icomoon icon-hipster"></i>hipster</li>
					<li><i class="icomoon icon-hipster2"></i>hipster2</li>
					<li><i class="icomoon icon-history"></i>history</li>
					<li><i class="icomoon icon-home"></i>home</li>
					<li><i class="icomoon icon-home2"></i>home2</li>
					<li><i class="icomoon icon-home3"></i>home3</li>
					<li><i class="icomoon icon-hour-glass"></i>hour-glass</li>
					<li><i class="icomoon icon-html-five"></i>html-five</li>
					<li><i class="icomoon icon-html-five2"></i>html-five2</li>
					<li><i class="icomoon icon-IcoMoon"></i>IcoMoon</li>
					<li><i class="icomoon icon-IE"></i>IE</li>
					<li><i class="icomoon icon-image"></i>image</li>
					<li><i class="icomoon icon-images"></i>images</li>
					<li><i class="icomoon icon-indent-decrease"></i>indent-decrease</li>
					<li><i class="icomoon icon-indent-increase"></i>indent-increase</li>
					<li><i class="icomoon icon-infinite"></i>infinite</li>
					<li><i class="icomoon icon-info"></i>info</li>
					<li><i class="icomoon icon-insert-template"></i>insert-template</li>
					<li><i class="icomoon icon-instagram"></i>instagram</li>
					<li><i class="icomoon icon-italic"></i>italic</li>
					<li><i class="icomoon icon-joomla"></i>joomla</li>
					<li><i class="icomoon icon-key"></i>key</li>
					<li><i class="icomoon icon-key2"></i>key2</li>
					<li><i class="icomoon icon-keyboard"></i>keyboard</li>
					<li><i class="icomoon icon-lab"></i>lab</li>
					<li><i class="icomoon icon-lanyrd"></i>lanyrd</li>
					<li><i class="icomoon icon-laptop"></i>laptop</li>
					<li><i class="icomoon icon-last"></i>last</li>
					<li><i class="icomoon icon-lastfm"></i>lastfm</li>
					<li><i class="icomoon icon-lastfm2"></i>lastfm2</li>
					<li><i class="icomoon icon-leaf"></i>leaf</li>
					<li><i class="icomoon icon-library"></i>library</li>
					<li><i class="icomoon icon-libreoffice"></i>libreoffice</li>
					<li><i class="icomoon icon-lifebuoy"></i>lifebuoy</li>
					<li><i class="icomoon icon-ligature"></i>ligature</li>
					<li><i class="icomoon icon-ligature2"></i>ligature2</li>
					<li><i class="icomoon icon-link"></i>link</li>
					<li><i class="icomoon icon-linkedin"></i>linkedin</li>
					<li><i class="icomoon icon-linkedin2"></i>linkedin2</li>
					<li><i class="icomoon icon-list-numbered"></i>list-numbered</li>
					<li><i class="icomoon icon-list"></i>list</li>
					<li><i class="icomoon icon-list2"></i>list2</li>
					<li><i class="icomoon icon-location"></i>location</li>
					<li><i class="icomoon icon-location2"></i>location2</li>
					<li><i class="icomoon icon-lock"></i>lock</li>
					<li><i class="icomoon icon-loop"></i>loop</li>
					<li><i class="icomoon icon-loop2"></i>loop2</li>
					<li><i class="icomoon icon-ltr"></i>ltr</li>
					<li><i class="icomoon icon-magic-wand"></i>magic-wand</li>
					<li><i class="icomoon icon-magnet"></i>magnet</li>
					<li><i class="icomoon icon-mail"></i>mail</li>
					<li><i class="icomoon icon-mail2"></i>mail2</li>
					<li><i class="icomoon icon-mail3"></i>mail3</li>
					<li><i class="icomoon icon-mail4"></i>mail4</li>
					<li><i class="icomoon icon-make-group"></i>make-group</li>
					<li><i class="icomoon icon-man-woman"></i>man-woman</li>
					<li><i class="icomoon icon-man"></i>man</li>
					<li><i class="icomoon icon-map"></i>map</li>
					<li><i class="icomoon icon-map2"></i>map2</li>
					<li><i class="icomoon icon-menu"></i>menu</li>
					<li><i class="icomoon icon-menu2"></i>menu2</li>
					<li><i class="icomoon icon-menu22"></i>menu22</li>
					<li><i class="icomoon icon-menu3"></i>menu3</li>
					<li><i class="icomoon icon-menu4"></i>menu4</li>
					<li><i class="icomoon icon-meter"></i>meter</li>
					<li><i class="icomoon icon-meter2"></i>meter2</li>
					<li><i class="icomoon icon-mic"></i>mic</li>
					<li><i class="icomoon icon-minus"></i>minus</li>
					<li><i class="icomoon icon-mobile"></i>mobile</li>
					<li><i class="icomoon icon-mobile2"></i>mobile2</li>
					<li><i class="icomoon icon-move-down"></i>move-down</li>
					<li><i class="icomoon icon-move-up"></i>move-up</li>
					<li><i class="icomoon icon-mug"></i>mug</li>
					<li><i class="icomoon icon-music"></i>music</li>
					<li><i class="icomoon icon-neutral"></i>neutral</li>
					<li><i class="icomoon icon-neutral2"></i>neutral2</li>
					<li><i class="icomoon icon-new-tab"></i>new-tab</li>
					<li><i class="icomoon icon-newspaper"></i>newspaper</li>
					<li><i class="icomoon icon-next"></i>next</li>
					<li><i class="icomoon icon-next2"></i>next2</li>
					<li><i class="icomoon icon-notification"></i>notification</li>
					<li><i class="icomoon icon-npm"></i>npm</li>
					<li><i class="icomoon icon-office"></i>office</li>
					<li><i class="icomoon icon-omega"></i>omega</li>
					<li><i class="icomoon icon-onedrive"></i>onedrive</li>
					<li><i class="icomoon icon-opera"></i>opera</li>
					<li><i class="icomoon icon-opt"></i>opt</li>
					<li><i class="icomoon icon-pacman"></i>pacman</li>
					<li><i class="icomoon icon-page-break"></i>page-break</li>
					<li><i class="icomoon icon-pagebreak"></i>pagebreak</li>
					<li><i class="icomoon icon-paint-format"></i>paint-format</li>
					<li><i class="icomoon icon-paragraph-center"></i>paragraph-center</li>
					<li><i class="icomoon icon-paragraph-justify"></i>paragraph-justify</li>
					<li><i class="icomoon icon-paragraph-left"></i>paragraph-left</li>
					<li><i class="icomoon icon-paragraph-right"></i>paragraph-right</li>
					<li><i class="icomoon icon-paste"></i>paste</li>
					<li><i class="icomoon icon-pause"></i>pause</li>
					<li><i class="icomoon icon-pause2"></i>pause2</li>
					<li><i class="icomoon icon-paypal"></i>paypal</li>
					<li><i class="icomoon icon-pen"></i>pen</li>
					<li><i class="icomoon icon-pencil"></i>pencil</li>
					<li><i class="icomoon icon-pencil2"></i>pencil2</li>
					<li><i class="icomoon icon-phone-hang-up"></i>phone-hang-up</li>
					<li><i class="icomoon icon-phone"></i>phone</li>
					<li><i class="icomoon icon-pie-chart"></i>pie-chart</li>
					<li><i class="icomoon icon-pilcrow"></i>pilcrow</li>
					<li><i class="icomoon icon-pinterest"></i>pinterest</li>
					<li><i class="icomoon icon-pinterest2"></i>pinterest2</li>
					<li><i class="icomoon icon-play"></i>play</li>
					<li><i class="icomoon icon-play2"></i>play2</li>
					<li><i class="icomoon icon-play3"></i>play3</li>
					<li><i class="icomoon icon-plus"></i>plus</li>
					<li><i class="icomoon icon-podcast"></i>podcast</li>
					<li><i class="icomoon icon-point-down"></i>point-down</li>
					<li><i class="icomoon icon-point-left"></i>point-left</li>
					<li><i class="icomoon icon-point-right"></i>point-right</li>
					<li><i class="icomoon icon-point-up"></i>point-up</li>
					<li><i class="icomoon icon-power-cord"></i>power-cord</li>
					<li><i class="icomoon icon-power"></i>power</li>
					<li><i class="icomoon icon-previous"></i>previous</li>
					<li><i class="icomoon icon-previous2"></i>previous2</li>
					<li><i class="icomoon icon-price-tag"></i>price-tag</li>
					<li><i class="icomoon icon-price-tags"></i>price-tags</li>
					<li><i class="icomoon icon-printer"></i>printer</li>
					<li><i class="icomoon icon-profile"></i>profile</li>
					<li><i class="icomoon icon-pushpin"></i>pushpin</li>
					<li><i class="icomoon icon-qrcode"></i>qrcode</li>
					<li><i class="icomoon icon-question"></i>question</li>
					<li><i class="icomoon icon-quill"></i>quill</li>
					<li><i class="icomoon icon-quotes-left"></i>quotes-left</li>
					<li><i class="icomoon icon-quotes-right"></i>quotes-right</li>
					<li><i class="icomoon icon-radio-checked"></i>radio-checked</li>
					<li><i class="icomoon icon-radio-checked2"></i>radio-checked2</li>
					<li><i class="icomoon icon-radio-unchecked"></i>radio-unchecked</li>
					<li><i class="icomoon icon-reddit"></i>reddit</li>
					<li><i class="icomoon icon-redo"></i>redo</li>
					<li><i class="icomoon icon-redo2"></i>redo2</li>
					<li><i class="icomoon icon-renren"></i>renren</li>
					<li><i class="icomoon icon-reply"></i>reply</li>
					<li><i class="icomoon icon-road"></i>road</li>
					<li><i class="icomoon icon-rocket"></i>rocket</li>
					<li><i class="icomoon icon-rss"></i>rss</li>
					<li><i class="icomoon icon-rss2"></i>rss2</li>
					<li><i class="icomoon icon-rtl"></i>rtl</li>
					<li><i class="icomoon icon-sad"></i>sad</li>
					<li><i class="icomoon icon-sad2"></i>sad2</li>
					<li><i class="icomoon icon-safari"></i>safari</li>
					<li><i class="icomoon icon-scissors"></i>scissors</li>
					<li><i class="icomoon icon-search"></i>search</li>
					<li><i class="icomoon icon-section"></i>section</li>
					<li><i class="icomoon icon-share"></i>share</li>
					<li><i class="icomoon icon-share2"></i>share2</li>
					<li><i class="icomoon icon-shield"></i>shield</li>
					<li><i class="icomoon icon-shift"></i>shift</li>
					<li><i class="icomoon icon-shocked"></i>shocked</li>
					<li><i class="icomoon icon-shocked2"></i>shocked2</li>
					<li><i class="icomoon icon-shrink"></i>shrink</li>
					<li><i class="icomoon icon-shrink2"></i>shrink2</li>
					<li><i class="icomoon icon-shuffle"></i>shuffle</li>
					<li><i class="icomoon icon-sigma"></i>sigma</li>
					<li><i class="icomoon icon-sina-weibo"></i>sina-weibo</li>
					<li><i class="icomoon icon-skype"></i>skype</li>
					<li><i class="icomoon icon-sleepy"></i>sleepy</li>
					<li><i class="icomoon icon-sleepy2"></i>sleepy2</li>
					<li><i class="icomoon icon-smile"></i>smile</li>
					<li><i class="icomoon icon-smile2"></i>smile2</li>
					<li><i class="icomoon icon-sort-alpha-asc"></i>sort-alpha-asc</li>
					<li><i class="icomoon icon-sort-alpha-desc"></i>sort-alpha-desc</li>
					<li><i class="icomoon icon-sort-amount-asc"></i>sort-amount-asc</li>
					<li><i class="icomoon icon-sort-amount-desc"></i>sort-amount-desc</li>
					<li><i class="icomoon icon-sort-numberic-desc"></i>sort-numberic-desc</li>
					<li><i class="icomoon icon-sort-numeric-asc"></i>sort-numeric-asc</li>
					<li><i class="icomoon icon-soundcloud"></i>soundcloud</li>
					<li><i class="icomoon icon-soundcloud2"></i>soundcloud2</li>
					<li><i class="icomoon icon-spades"></i>spades</li>
					<li><i class="icomoon icon-spell-check"></i>spell-check</li>
					<li><i class="icomoon icon-sphere"></i>sphere</li>
					<li><i class="icomoon icon-spinner"></i>spinner</li>
					<li><i class="icomoon icon-spinner10"></i>spinner10</li>
					<li><i class="icomoon icon-spinner11"></i>spinner11</li>
					<li><i class="icomoon icon-spinner2"></i>spinner2</li>
					<li><i class="icomoon icon-spinner3"></i>spinner3</li>
					<li><i class="icomoon icon-spinner4"></i>spinner4</li>
					<li><i class="icomoon icon-spinner5"></i>spinner5</li>
					<li><i class="icomoon icon-spinner6"></i>spinner6</li>
					<li><i class="icomoon icon-spinner7"></i>spinner7</li>
					<li><i class="icomoon icon-spinner8"></i>spinner8</li>
					<li><i class="icomoon icon-spinner9"></i>spinner9</li>
					<li><i class="icomoon icon-spoon-knife"></i>spoon-knife</li>
					<li><i class="icomoon icon-spotify"></i>spotify</li>
					<li><i class="icomoon icon-stack"></i>stack</li>
					<li><i class="icomoon icon-stackoverflow"></i>stackoverflow</li>
					<li><i class="icomoon icon-star-empty"></i>star-empty</li>
					<li><i class="icomoon icon-star-full"></i>star-full</li>
					<li><i class="icomoon icon-star-half"></i>star-half</li>
					<li><i class="icomoon icon-stats-bars"></i>stats-bars</li>
					<li><i class="icomoon icon-stats-bars2"></i>stats-bars2</li>
					<li><i class="icomoon icon-stats-dots"></i>stats-dots</li>
					<li><i class="icomoon icon-steam"></i>steam</li>
					<li><i class="icomoon icon-steam2"></i>steam2</li>
					<li><i class="icomoon icon-stop"></i>stop</li>
					<li><i class="icomoon icon-stop2"></i>stop2</li>
					<li><i class="icomoon icon-stopwatch"></i>stopwatch</li>
					<li><i class="icomoon icon-strikethrough"></i>strikethrough</li>
					<li><i class="icomoon icon-stumbleupon"></i>stumbleupon</li>
					<li><i class="icomoon icon-stumbleupon2"></i>stumbleupon2</li>
					<li><i class="icomoon icon-subscript"></i>subscript</li>
					<li><i class="icomoon icon-subscript2"></i>subscript2</li>
					<li><i class="icomoon icon-sun"></i>sun</li>
					<li><i class="icomoon icon-superscript"></i>superscript</li>
					<li><i class="icomoon icon-superscript2"></i>superscript2</li>
					<li><i class="icomoon icon-svg"></i>svg</li>
					<li><i class="icomoon icon-switch"></i>switch</li>
					<li><i class="icomoon icon-tab"></i>tab</li>
					<li><i class="icomoon icon-table"></i>table</li>
					<li><i class="icomoon icon-table2"></i>table2</li>
					<li><i class="icomoon icon-tablet"></i>tablet</li>
					<li><i class="icomoon icon-target"></i>target</li>
					<li><i class="icomoon icon-telegram"></i>telegram</li>
					<li><i class="icomoon icon-terminal"></i>terminal</li>
					<li><i class="icomoon icon-text-color"></i>text-color</li>
					<li><i class="icomoon icon-text-height"></i>text-height</li>
					<li><i class="icomoon icon-text-width"></i>text-width</li>
					<li><i class="icomoon icon-ticket"></i>ticket</li>
					<li><i class="icomoon icon-tongue"></i>tongue</li>
					<li><i class="icomoon icon-tongue2"></i>tongue2</li>
					<li><i class="icomoon icon-tree"></i>tree</li>
					<li><i class="icomoon icon-trello"></i>trello</li>
					<li><i class="icomoon icon-trophy"></i>trophy</li>
					<li><i class="icomoon icon-truck"></i>truck</li>
					<li><i class="icomoon icon-tumblr"></i>tumblr</li>
					<li><i class="icomoon icon-tumblr2"></i>tumblr2</li>
					<li><i class="icomoon icon-tux"></i>tux</li>
					<li><i class="icomoon icon-tv"></i>tv</li>
					<li><i class="icomoon icon-twitch"></i>twitch</li>
					<li><i class="icomoon icon-twitter"></i>twitter</li>
					<li><i class="icomoon icon-underline"></i>underline</li>
					<li><i class="icomoon icon-undo"></i>undo</li>
					<li><i class="icomoon icon-undo2"></i>undo2</li>
					<li><i class="icomoon icon-ungroup"></i>ungroup</li>
					<li><i class="icomoon icon-unlocked"></i>unlocked</li>
					<li><i class="icomoon icon-upload"></i>upload</li>
					<li><i class="icomoon icon-upload2"></i>upload2</li>
					<li><i class="icomoon icon-upload3"></i>upload3</li>
					<li><i class="icomoon icon-user-check"></i>user-check</li>
					<li><i class="icomoon icon-user-minus"></i>user-minus</li>
					<li><i class="icomoon icon-user-plus"></i>user-plus</li>
					<li><i class="icomoon icon-user-tie"></i>user-tie</li>
					<li><i class="icomoon icon-user"></i>user</li>
					<li><i class="icomoon icon-users"></i>users</li>
					<li><i class="icomoon icon-video-camera"></i>video-camera</li>
					<li><i class="icomoon icon-vimeo"></i>vimeo</li>
					<li><i class="icomoon icon-vimeo2"></i>vimeo2</li>
					<li><i class="icomoon icon-vine"></i>vine</li>
					<li><i class="icomoon icon-vk"></i>vk</li>
					<li><i class="icomoon icon-volume-decrease"></i>volume-decrease</li>
					<li><i class="icomoon icon-volume-high"></i>volume-high</li>
					<li><i class="icomoon icon-volume-increase"></i>volume-increase</li>
					<li><i class="icomoon icon-volume-low"></i>volume-low</li>
					<li><i class="icomoon icon-volume-medium"></i>volume-medium</li>
					<li><i class="icomoon icon-volume-mute"></i>volume-mute</li>
					<li><i class="icomoon icon-volume-mute2"></i>volume-mute2</li>
					<li><i class="icomoon icon-warning"></i>warning</li>
					<li><i class="icomoon icon-whatsapp"></i>whatsapp</li>
					<li><i class="icomoon icon-wikipedia"></i>wikipedia</li>
					<li><i class="icomoon icon-windows"></i>windows</li>
					<li><i class="icomoon icon-windows8"></i>windows8</li>
					<li><i class="icomoon icon-wink"></i>wink</li>
					<li><i class="icomoon icon-wink2"></i>wink2</li>
					<li><i class="icomoon icon-woman"></i>woman</li>
					<li><i class="icomoon icon-wondering"></i>wondering</li>
					<li><i class="icomoon icon-wondering2"></i>wondering2</li>
					<li><i class="icomoon icon-wordpress"></i>wordpress</li>
					<li><i class="icomoon icon-wrench"></i>wrench</li>
					<li><i class="icomoon icon-xing"></i>xing</li>
					<li><i class="icomoon icon-xing2"></i>xing2</li>
					<li><i class="icomoon icon-yahoo"></i>yahoo</li>
					<li><i class="icomoon icon-yahoo2"></i>yahoo2</li>
					<li><i class="icomoon icon-yelp"></i>yelp</li>
					<li><i class="icomoon icon-youtube"></i>youtube</li>
					<li><i class="icomoon icon-youtube2"></i>youtube2</li>
					<li><i class="icomoon icon-zoom-in"></i>zoom-in</li>
					<li><i class="icomoon icon-zoom-out"></i>zoom-out</li>
				</ul>
			<?php
		}
	}

	$output = New Nishiki_About_Page();
}
