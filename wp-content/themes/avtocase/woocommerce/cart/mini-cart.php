<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;  ?>

<aside class="widget_shopping_cart_content mini-cart modal modal--right" id="mini-cart" role="dialog" aria-labelledby="mini-cart-title" aria-hidden="true">

	<?php do_action( 'woocommerce_before_mini_cart' ); ?>

    <header class="mini-cart__header">
        <button class="mini-cart__close btn btn--primary btn--icon btn--rounded" aria-label="<?php esc_attr_e( 'Закрити кошик', 'avtocase' ); ?>">
            <span class="svg-wrap">
                <svg>
                    <use href="<?php echo esc_url( Avtocase\sprite_url() ); ?>#cross"></use>
                </svg>
            </span>
        </button>
        <h2 class="mini-cart__title heavy" id="mini-cart-title"><?php _e( 'Кошик', 'avtocase' ); ?></h2>
        <span class="mini-cart__counter cart-counter heavy" id="mini-cart-counter" aria-live="polite" aria-label="<?php esc_attr_e( 'Кількість продуктів у кошику', 'avtocase' ); ?>">
            <?php echo esc_html( count( WC()->cart->get_cart() ) ); ?>
        </span>
    </header>

	<?php if ( WC()->cart && ! WC()->cart->is_empty() ) : ?>

        <ul class="woocommerce-mini-cart cart_list product_list_widget mini-cart__items <?php echo esc_attr( $args['list_class'] ); ?>">
			<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					/**
					 * This filter is documented in woocommerce/templates/cart/cart.php.
					 *
					 * @since 2.1.0
					 */
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
                    <li class="woocommerce-mini-cart-item mini-cart__item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <?php if ( empty( $product_permalink ) ) : ?>
                            <div class="mini-cart__item-img img-wrap">
                                <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </div>
                        <?php else : ?>
                            <div class="mini-cart__item-img">
                                <a href="<?php echo esc_url( $product_permalink ); ?>" class="img-wrap">
                                    <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="mini-cart__item-details">
                            <h3 class="mini-cart__item-title heavy">
		                        <?php if ( empty( $product_permalink ) ) : ?>
			                        <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		                        <?php else : ?>
                                    <a href="<?php echo esc_url( $product_permalink ); ?>">
				                        <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
		                        <?php endif; ?>
                            </h3>
						    <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>

                        <div class="mini-cart__item-totals">
                            <div class="mini-cart__item-price price"><?php echo $product_price ?></div>
                            <div class="mini-cart__item-controls">
	                            <?php
	                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		                            'woocommerce_cart_item_remove_link',
		                            sprintf(
			                            '<a href="%s" class="remove remove_from_cart_button mini-cart__item-remove" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-success_message="%s">
                                               <span class="svg-wrap">
                                                    <svg>
                                                        <use href="%s#trash"></use>
                                                    </svg>
                                                </span>
                                            </a>',
			                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
			                            /* translators: %s is the product name */
			                            esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
			                            esc_attr( $product_id ),
			                            esc_attr( $cart_item_key ),
			                            esc_attr( $_product->get_sku() ),
			                            /* translators: %s is the product name */
			                            esc_attr( sprintf( __( '&ldquo;%s&rdquo; has been removed from your cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
			                            esc_url( Avtocase\sprite_url() )
		                            ),
		                            $cart_item_key
	                            );
	                            ?>
                                <div class="mini-cart__item-qty qty">
                                    <button type="button" class="qty__btn qty__btn--minus">
                                    <span class="svg-wrap">
                                        <span class="svg-wrap">
                                            <svg>
                                                <use href="<?php echo esc_url( Avtocase\sprite_url() ) ?>#minus"></use>
                                            </svg>
                                        </span>
                                    </button>
	                                <?php
	                                $max_qty  = $_product->get_max_purchase_quantity();
	                                $max_value = ( $max_qty > 0 ) ? $max_qty : 99;
	                                $max_attr = 'max="' . ( $max_qty > 0 ) ? esc_attr( $max_qty ) : '99' . '"' ;
	                                ?>
                                    <input type="number" step="1" min="0"
                                           max="<?php echo esc_attr( $max_value ); ?>"
                                           name="cart[<?php echo esc_attr( $cart_item_key ); ?>][qty]"
                                           value="<?php echo esc_attr( $cart_item['quantity'] ); ?>"
                                           class="qty__input heavy"/>
                                    <button type="button" class="qty__btn qty__btn--plus">
                                        <span class="svg-wrap">
                                            <svg>
                                                <use href="<?php echo esc_url( Avtocase\sprite_url() ) ?>#plus"></use>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>

<!--						--><?php //echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </li>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
			?>
        </ul>

        <footer class="mini-cart__footer">
            <p class="woocommerce-mini-cart__total total">
		        <?php
		        /**
		         * Hook: woocommerce_widget_shopping_cart_total.
		         *
		         * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		         */
		        do_action( 'woocommerce_widget_shopping_cart_total' );
		        ?>
            </p>

	        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

            <div class="woocommerce-mini-cart__buttons buttons mini-cart__btn-wrap">
                <a href="<?php echo wc_get_checkout_url(); ?>" class="mini-cart__checkout-btn btn btn--primary">
                    <span class="btn__text"><?php _e( 'Перейти до оплати', 'avtocase' ); ?></span>
                </a>
            </div>

	        <?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
        </footer>

	<?php else : ?>

        <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'Кошик пустий', 'avtocase' ); ?></p>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_mini_cart' ); ?>

</aside>