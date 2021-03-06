<div class="wrap">
    <h1><?php _e( 'Add a User', 'video-conferencing-with-zoom-api' ); ?></h1>
    <div class="message">
		<?php
		$message = self::get_message();
		if ( isset( $message ) && ! empty( $message ) ) {
			echo $message;
		}
		?>
    </div>
	<?php if ( ZOOM_VIDEO_CONFERENCE_APIVERSION == 1 ) { ?>
        <div id="message" class="error">
            <p><strong>Version 1 of the Zoom API is being sunset and will no longer be supported after November 1st, 2018. It is recommended that you select version 2 from <a href="<?php echo admin_url( '/admin.php?page=zoom-video-conferencing-settings' ); ?>">settings</a> page.</strong></p>
        </div>
	<?php } ?>
    <form action="?page=zoom-video-conferencing-add-users" method="POST">
		<?php wp_nonce_field( '_zoom_add_user_nonce_action', '_zoom_add_user_nonce' ); ?>
        <table class="form-table">
            <tbody>
			<?php if ( ! empty( self::$api_version ) && self::$api_version == 2 ) { ?>
                <tr>
                    <th scope="row"><label for="action"><?php _e( 'Action (Required).', 'video-conferencing-with-zoom-api' ); ?></label></th>
                    <td>
                        <select name="action" id="action">
                            <option value="create"><?php _e( 'Create', 'video-conferencing-with-zoom-api' ); ?></option>
                            <option value="autoCreate"><?php _e( 'Auto Create', 'video-conferencing-with-zoom-api' ); ?></option>
                            <option value="custCreate"><?php _e( 'Cust Create', 'video-conferencing-with-zoom-api' ); ?></option>
                            <option value="ssoCreate"><?php _e( 'SSO Create', 'video-conferencing-with-zoom-api' ); ?></option>
                        </select>
                        <div id="type-description">
                            <p class="description"><?php _e( 'Type of User (Required)', 'video-conferencing-with-zoom-api' ); ?></p>
                            <p class="description">1. <strong>"Create"</strong> - User will get an email sent from Zoom. There is a confirmation link in this email. User will then need to click this link to activate their account to the Zoom service. The user can set or change their password in Zoom.</p>

                            <p class="description">2. <strong>"Auto Create"</strong> - This action is provided for enterprise customer who has a managed domain. This feature is disabled by default because of the security risk involved in creating a user who does not belong to your domain without notifying the user.</p>

                            <p class="description">3. <strong>"Cust Create"</strong> - This action is provided for API partner only. User created in this way has no password and is not able to log into the Zoom web site or client.</p>

                            <p class="description">4. <strong>"SSO Create"</strong> - This action is provided for enabled “Pre-provisioning SSO User” option. User created in this way has no password. If it is not a basic user, will generate a Personal Vanity URL using user name (no domain) of the provisioning email. If user name or pmi is invalid or occupied, will use random number/random personal vanity URL. </p></div>
                    </td>
                </tr>
			<?php } ?>
            <tr>
                <th scope="row"><label for="email"><?php _e( 'Email Address', 'video-conferencing-with-zoom-api' ); ?></label></th>
                <td><input name="email" type="email" required placeholder="john@doe.com" class="regular-text ltr">
                    <p class="description" id="email-description"><?php _e( 'This address is used for zoom (Required).', 'video-conferencing-with-zoom-api' ); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="first_name"><?php _e( 'First Name', 'video-conferencing-with-zoom-api' ); ?></label></th>
                <td>
                    <input type="text" name="first_name" required id="first_name" class="regular-text">
                    <p class="description" id="first_name-description"><?php _e( 'First Name of the User (Required).', 'video-conferencing-with-zoom-api' ); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="last_name"><?php _e( 'Last Name', 'video-conferencing-with-zoom-api' ); ?></label></th>
                <td><input type="text" name="last_name" required id="last_name" class="regular-text">
                    <p class="description" id="last_name-description"><?php _e( 'Last Name of the User (Required).', 'video-conferencing-with-zoom-api' ); ?></p></td>
            </tr>
            <tr>
                <th scope="row"><label for="type"><?php _e( 'User Type (Required).', 'video-conferencing-with-zoom-api' ); ?></label></th>
                <td>
                    <select name="type" id="type">
                        <option value="1"><?php _e( 'Basic User', 'video-conferencing-with-zoom-api' ); ?></option>
                        <option value="2"><?php _e( 'Pro User', 'video-conferencing-with-zoom-api' ); ?></option>
                    </select>
                    <p class="description" id="type-description"><?php _e( 'Type of User (Required)', 'video-conferencing-with-zoom-api' ); ?></p>
                </td>
            </tr>
			<?php if ( ! empty( self::$api_version ) && self::$api_version == 1 ) { ?>
                <tr>
                    <th scope="row"><label for="dept"><?php _e( 'Department ', 'video-conferencing-with-zoom-api' ); ?></label></th>
                    <td><input type="text" name="dept" id="dept" class="regular-text">
                        <p class="description" id="dept-description"><?php _e( 'Department (Optional).', 'video-conferencing-with-zoom-api' ); ?></p></td>
                </tr>
			<?php } ?>
            </tbody>
        </table>
        <p class="submit"><input type="submit" name="add_zoom_user" class="button button-primary" value="Create User"></p>
    </form>
</div>