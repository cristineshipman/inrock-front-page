<?php if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'main-navigation' ] ) ): ?>
	<div class="nav-copy">
		<div class="navigation clearfix">
			<div class="navbar navbar-default" role="navigation">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<?php
							wp_nav_menu( array(
								'theme_location'  	=> 'main-navigation',
								'container'			=> false,
								'echo'          	=> true,
								'items_wrap'        => '%3$s',
								'walker' 			=> new wrapit_walker
							) );
						?>
						<li class="search-nav">
							<a href="javascript:;" class="search-trigger">
								<i class="ion-android-search"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>