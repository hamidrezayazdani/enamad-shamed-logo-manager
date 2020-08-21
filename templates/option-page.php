<div class="wrap">
	<h2>تنظیمات لوگوی اینماد و رسانه</h2>
	<form method="post" action="options.php">
		<?php settings_fields( 'ywp-esl-settings-group' ); ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">کد اینماد</th>
				<td>
					<textarea name="ywp_esl_e_code"><?php echo stripcslashes( get_option( 'ywp_esl_e_code' ) ); ?></textarea>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">کد رسانه (شامد)</th>
				<td>
					<textarea name="ywp_esl_s_code"><?php echo stripcslashes( get_option( 'ywp_esl_s_code') ); ?></textarea>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">کد زرین پال</th>
				<td>
					<textarea name="ywp_esl_z_code"><?php echo stripcslashes( get_option( 'ywp_esl_z_code') ); ?></textarea>
				</td>
			</tr>
		</table>

		<div class="ywp-legend">
			<h3>راهنما</h3>
			<p>از دو طریق میتوانید لوگوی اینماد و رسانه را در وبسایت خود قرار دهید:</p>
			<ul>
				<li>
					<p>
						<strong>کد کوتاه:</strong> 
						<span>از کد کوتاه 
							<kbd>[enamadlogo_shortcode]</kbd> 
							برای نمایش لوگوی اینماد، از کد کوتاه 
							<kbd>[shamedlogo_shortcode]</kbd> 
							برای لوگوی رسانه، از کد کوتاه
							<kbd>[zarrinpallogo_shortcode]</kbd> 
							برای لوگوی زرین پال و از کد کوتاه
							<kbd>[ywp_esl_logos]</kbd> 
							برای نمایش هر سه لوگو استفاده کنید.
						</span>
					</p>
				</li>

				<li>
					<strong>ابزارک:</strong>
					<span>از منوی 
						<a href="<?php echo get_admin_url( null, 'widgets.php' ); ?>" target="_blank">ابزارک‌ها</a>  
						ابزارک  
						<kbd>YWP - ابزارک لوگوی اینماد</kbd> 
						برای نمایش لوگوی اینماد، ابزارک 
						<kbd>YWP - ابزارک لوگوی رسانه</kbd> 
						برای نمایش لوگوی رسانه
						<kbd>YWP - ابزارک لوگوی زرین پال</kbd> 
						برای نمایش لوگوی زرین پال و ابزارک 
						<kbd>YWP - ابزارک اعتماد</kbd> 
						برای نمایش انتخابی لوگوها را به ناحیه ابزارک قالب خود کشیده و رها کنید.
					</span>
				</li>
			</ul>
		</div>

    	<p class="submit">
    		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    	</p>
	</form>
</div>
<style>
	textarea{
		padding: 10px;
		width: 100%;
		text-align: left;
		direction: ltr;
	}
	.ywp-legend{
		position: relative;
		background: white;
		padding: 10px 15px;
		border-radius: 15px;
		box-shadow: 0 0 9px 0 #808080b0;
	}
	.ywp-legend h3{
		position: absolute;
		top: -30px;
		right: 19px;
		background: white;
		padding: 7px 10px;
		border-radius: 10px;
		border: 1px solid #80808085;
		color: #007cba;
	}
</style>