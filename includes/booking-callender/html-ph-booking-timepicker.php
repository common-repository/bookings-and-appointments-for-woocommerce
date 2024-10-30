<div class="time-picker-wraper">
	<input id="calender_type" value="time" type="hidden">
	<input type="hidden" id="book_interval_type" value="<?php echo $product->get_interval_type()?>">
	<input type="hidden" id="book_interval" value="<?php echo $product->get_interval()?>">

	<div class="callender-error-msg"></div>
	<?php 
		$this->phive_generate_date_calendar_for_timepicker($month_start_date); 
	?>
	

	<ul class="ph-calendar-days" id="ph-calendar-days">	<?php
		$timezone = get_option('timezone_string');
		if( empty($timezone) ){
			$time_offset = get_option('gmt_offset');
			$timezone= timezone_name_from_abbr( "", $time_offset*60*60, 0 );
		}
		date_default_timezone_set($timezone);
		
		$shop_opening_time 	= get_post_meta( $product->get_id(), "_phive_book_working_hour_start", 1 );

		$shop_opening_time = !empty( $shop_opening_time ) ? date( 'H:i',strtotime($shop_opening_time) ) : '00:00';
		
		// Start date
		$month_start_date = date('Y').'-'.date('m').'-01';
		$start_date = date('Y-m-d').' '.$shop_opening_time;
		// End date
		
		echo $this->phive_generate_days_for_period($month_start_date,'','','time-picker');
		?>
	</ul>
	<br>
	<div class="time-picker">
		<ul class="ph-calendar-days" id="ph-calendar-time">
			<center>
				<?php _e("Please Pick a Date", "bookings-and-appointments-for-woocommerce")?>
			</center>
		</ul>
	</div>
</div>
<div class="booking-info-wraper">
	<p id="booking_info_text"> </p>
	<p id="booking_price_text"> </p>
</div>
