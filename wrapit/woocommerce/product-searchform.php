<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form method="get" class="searchform" action="<?php echo esc_url( site_url('/') ); ?>">
	<div class="wrapit-form">
		<input type="text" value="" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search for...', 'wrapit' ); ?>">
		<a class="btn btn-default submit_form"><i class="ion-ios-search"></i></a>
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>