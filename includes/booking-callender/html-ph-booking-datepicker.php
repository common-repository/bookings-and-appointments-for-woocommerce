<div class="date-picker-wraper">
	<input type="hidden" id="book_interval_type" value="<?php echo $product->get_interval_type()?>">
	<input type="hidden" id="book_interval" value="<?php echo $product->get_interval()?>">

	<div class="callender-error-msg"><?php _e('Please pick a booking period', 'bookings-and-appointments-for-woocommerce')?></div>
	<div class="ph-calendar-month">
		<ul>
			<li class="ph-prev">&#10094;</li>
			<li class="ph-next">&#10095;</li>
			<li>
				<div class="month-year-wraper">
					<span class="span-month"><?php echo date_i18n('F');?></span>
					<span class="span-year"><?php echo date_i18n('Y');?></span>

					<input type="text" readonly size="12" class="callender-month" value="<?php echo date('F');?>" style="opacity: 0 !important; filter: alpha(opacity=0)!important;">
					<input type="text" readonly size="5" class="callender-year" value="<?php echo date('Y');?>" style="opacity: 0 !important; filter: alpha(opacity=0)!important;">
				</div>
			</li>
		</ul>
	</div>

	<ul class="ph-calendar-weekdays">
		<li><?php _e("Mo", "bookings-and-appointments-for-woocommerce")?></li>
		<li><?php _e("Tu", "bookings-and-appointments-for-woocommerce")?></li>
		<li><?php _e("We", "bookings-and-appointments-for-woocommerce")?></li>
		<li><?php _e("Th", "bookings-and-appointments-for-woocommerce")?></li>
		<li><?php _e("Fr", "bookings-and-appointments-for-woocommerce")?></li>
		<li><?php _e("Sa", "bookings-and-appointments-for-woocommerce")?></li>
		<li><?php _e("Su", "bookings-and-appointments-for-woocommerce")?></li>
	</ul>

	<ul class="ph-calendar-days" id="ph-calendar-days"><?php
		$timezone = get_option('timezone_string');
		if( empty($timezone) ){
			$time_offset = get_option('gmt_offset');
			$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
		}
		date_default_timezone_set($timezone);

		// Start date
		$start_date = date('Y').'-'.date('m').'-01';
		echo $this->phive_generate_days_for_period($start_date);
		?>
	</ul>
</div>
<div class="booking-info-wraper">
	<p id="booking_info_text"> </p>
	<p id="booking_price_text"> </p>
</div>
