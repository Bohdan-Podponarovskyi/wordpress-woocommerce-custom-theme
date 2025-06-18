<?php

defined( 'ABSPATH' ) || exit;

$heading    = get_field( 'heading' );
$subheading = get_field( 'subheading' );
$btn_text   = get_field( 'btn_text' );
$btn_link   = get_field( 'btn_link' );

if ( $btn_link ) {
    $btn_link = Avtocase\process_btn_link( $btn_link );
}

?>

<section class="seat">
    <div class="container">
        <div class="seat__inner">
			<?php if ( $heading ) { ?>
                <h3 class="seat__title heading--h3 heading--h2-desktop"><?php echo esc_html( $heading ) ?></h3>
			<?php } ?>
	        <?php if ( $subheading ) { ?>
                <p class="seat__label label-message"><?php echo esc_html( $subheading ) ?></p>
	        <?php } ?>
            <div class="seat__img-wrap">
                <img data-src="<?php echo esc_url( Avtocase\image_url('seat.webp') ); ?>" alt="Seat"
                     class="seat__img lazy">
            </div>
            <img data-src="<?php echo esc_url( Avtocase\image_url('wheel-left.webp') ); ?>" alt="Wheel left"
                 class="wheel wheel-left lazy">
            <img data-src="<?php echo esc_url( Avtocase\image_url('wheel-right.webp') ); ?>"
                 alt="Wheel right" class="wheel wheel-right lazy">
	        <?php if ( $btn_text && $btn_link ) { ?>
                <a href="<?php echo esc_url( $btn_link ) ?>" class="seat__link btn btn--primary">
                    <span class="btn__text"><?php echo esc_html( $btn_text ) ?></span>
                </a>
	        <?php } ?>
        </div>
    </div>
</section>