<?php

//Setting options page
/*******************************
 * Callback function to add the menu
 *******************************/
function show_settngs_page_callback_func()
{
	add_submenu_page(
		'edit.php?post_type=sld',
		'Settings',
		'Settings',
		'manage_options',
		'sld_settings',
		'qcsettings_page_callback_func'
	);
	add_action( 'admin_init', 'sld_register_plugin_settings' );
} //show_settings_page_callback_func
add_action( 'admin_menu', 'show_settngs_page_callback_func');

function sld_register_plugin_settings() {
	//register our settings
	//general Section
	register_setting( 'qc-sld-plugin-settings-group', 'sld_enable_top_part' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_enable_upvote' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_add_new_button' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_add_item_link' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_enable_click_tracking' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_embed_credit_title' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_embed_credit_link' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_enable_scroll_to_top' );
	//Language Settings
	register_setting( 'qc-sld-plugin-settings-group', 'sld_lan_add_link' );
	register_setting( 'qc-sld-plugin-settings-group', 'sld_lan_share_list' );
	//custom css section
	register_setting( 'qc-sld-plugin-settings-group', 'sld_custom_style' );
	//custom js section
	register_setting( 'qc-sld-plugin-settings-group', 'sld_custom_js' );
	//help sectio
	
}

function qcsettings_page_callback_func(){
	
	?>
	<div class="wrap swpm-admin-menu-wrap">
		<h1>SLD Settings Page</h1>
	
		<h2 class="nav-tab-wrapper sld_nav_container">
			<a class="nav-tab sld_click_handle nav-tab-active" href="#general_settings">General Settings</a>
			<a class="nav-tab sld_click_handle" href="#language_settings">Language Settings</a>
			<a class="nav-tab sld_click_handle" href="#custom_css">Custom Css</a>
			<a class="nav-tab sld_click_handle" href="#custom_js">Custom Javascript</a>
			<a class="nav-tab sld_click_handle" href="#help">Help</a>
		</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'qc-sld-plugin-settings-group' ); ?>
			<?php do_settings_sections( 'qc-sld-plugin-settings-group' ); ?>
			<div id="general_settings">
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Enable Top Area</th>
						<td>
							<input type="checkbox" name="sld_enable_top_part" value="on" <?php echo (esc_attr( get_option('sld_enable_top_part') )=='on'?'checked="checked"':''); ?> />
							<i>Top area includes Embed button (more options coming soon)</i>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Enable Upvote</th>
						<td>
							<input type="checkbox" name="sld_enable_upvote" value="on" <?php echo (esc_attr( get_option('sld_enable_upvote') )=='on'?'checked="checked"':''); ?> />
							<i>Turn ON to visible Upvote feature for all templates.</i>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Enable Add New Button</th>
						<td>
							<input type="checkbox" name="sld_add_new_button" value="on" <?php echo (esc_attr( get_option('sld_add_new_button') )=='on'?'checked="checked"':''); ?> />
							<i>The button will link to a page of your choice where you can place a contact form or instructions to submit links to your directory. Links have to be manually added by the admin.</i>
						</td>
					</tr>
					
					
					<tr valign="top">
						<th scope="row">Add Button Link</th>
						<td>
							<input type="text" name="sld_add_item_link" size="100" value="<?php echo esc_attr( get_option('sld_add_item_link') ); ?>"  />
							<i>Example: http://www.yourdomain.com</i>
						</td>
					</tr>
					 
					<tr valign="top">
						<th scope="row">Track Outbound Clicks</th>
						<td>
							<input type="checkbox" name="sld_enable_click_tracking" value="on" <?php echo (esc_attr( get_option('sld_enable_click_tracking') )=='on'?'checked="checked"':''); ?> />
							<i>You need to have the analytics.js [<a href="https://support.google.com/analytics/answer/1008080#GA" target="_blank">Analytics tracking code in every page of your site</a>].</i>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Embed Credit Title</th>
						<td>
							<input type="text" name="sld_embed_credit_title" size="100" value="<?php echo esc_attr( get_option('sld_embed_credit_title') ); ?>"  />
							<i>This text will be displayed below embedded list in other sites.</i>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Embed Credit Link</th>
						<td>
							<input type="text" name="sld_embed_credit_link" size="100" value="<?php echo esc_attr( get_option('sld_embed_credit_link') ); ?>"  />
							<i>This text will be displayed below embedded list in other sites.</i>
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">Enable Scroll to Top Button</th>
						<td>
							<input type="checkbox" name="sld_enable_scroll_to_top" value="on" <?php echo (esc_attr( get_option('sld_enable_scroll_to_top') )=='on'?'checked="checked"':''); ?> />
							<i>Show Scroll to Top.</i>
						</td>
					</tr>
					
					
					
				</table>
			</div>
			<div id="language_settings" style="display:none">
				<table class="form-table">

					<tr valign="top">
						<th scope="row">Add New</th>
						<td>
							<input type="text" name="sld_lan_add_link" size="100" value="<?php echo esc_attr( get_option('sld_lan_add_link') ); ?>"  />
							<i>Change the language for Add New</i>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Share List</th>
						<td>
							<input type="text" name="sld_lan_share_list" size="100" value="<?php echo esc_attr( get_option('sld_lan_share_list') ); ?>"  />
							<i>Change the language for Share List</i>
						</td>
					</tr>

				</table>
			</div>
			<div id="custom_css" style="display:none">
				<table class="form-table">

					<tr valign="top">
						<th scope="row">Custom Css (Use *!important* flag if the changes does not take place)</th>
						<td>
							
							<textarea name="sld_custom_style" rows="10" cols="100"><?php echo esc_attr( get_option('sld_custom_style') ); ?></textarea>
							<i>Write your custom CSS here. Please do not use <b>style</b> tag in this textarea.</i>
						</td>
					</tr>

				</table>
			</div>
			<div id="custom_js" style="display:none">
				<table class="form-table">

					<tr valign="top">
						<th scope="row">Custom Javascript</th>
						<td>
							
							<textarea name="sld_custom_js" rows="10" cols="100"><?php echo esc_attr( get_option('sld_custom_js') ); ?></textarea>
							<i>Write your custom JS here. Please do not use <b>script</b> tag in this textarea.</i>
						</td>
					</tr>

				</table>
			</div>
			<div id="help" style="display:none">
				<table class="form-table">

					<tr valign="top">
						<th scope="row">Help</th>
						<td>
							<div class="wrap">
		
			<div id="poststuff">
			
				<div id="post-body" class="metabox-holder columns-2">
				
					<div id="post-body-content" style="position: relative;">
				
						<!--<div>
							<img style="width: 200px;" src="<?php echo QCOPD_IMG_URL; ?>/simple-link-directory.png" alt="Simple Link Directory">
						</div>
						
						<div class="clear">
							<?php do_action('buypro_promotional_link'); ?>
						</div>-->
						<div class="clear"></div>
						
						
						<h1>Welcome to the Simple Link Directory! You are <strong>awesome</strong>, by the way <img draggable="false" class="emoji" alt="🙂" src="<?php echo QCOPD_IMG_URL; ?>/1f642.svg"></h1>
						<h3>Getting Started</h3>
														
						<p>Getting started with Simple Link Directory is super easy but the plugin works a little different from others - so an introduction is necessary. The most important thing to remember is that the <strong>base pillars of this plugin are Lists</strong>, not individual links or categories. A list is simply a niche or subtopic to group your relevant links together. The most common use of SLD is to create and display multiple Lists of Links on specific topics or subtopics on the same page. Everything revolves around the Lists. Once you create a few Lists, you can then display them in many different ways.</p>

						<p>With that in mind you should start with the following simple steps.</p>

						<p><br><span style="font-weight:bold;">1.</span> Go to New List and create one by giving it a name. Then simply start adding List items or links by filling up the fields you want. Use the <strong>Add New</strong> button to add more Listings in your list.</p>

						<p><br><span style="font-weight:bold;">2.</span> Though you can just create one list and use the Single List mode. This directory plugin works the best when you <strong>create a few Lists</strong> each conatining about <strong>15-20 List items</strong>. This is the most usual use case scenario. But you can do differently once you get the idea.</p>

						<p><br><span style="font-weight:bold;">3.</span> Now go to a page or post where you want to display the directory. On the right sidebar you will see a <strong>ShortCode Generator</strong> block. Click the button and a Popup LightBox will appear with all the options that you can select. Choose All Lists, and select a Style. Then Click Add Shortcode button. Shortcode will be generated. Simply <strong>copy paste</strong> that to a location on your page where you want the <strong>directory to show up</strong>.</p>
						<br>
						<p>That’s it! The above steps are for the basic usages. There are a lot of advanced options available with the <a href="https://www.quantumcloud.com/products/simple-link-directory/">Professional version</a> if you ever feel the need. If you had any specific questions about how something works, do not hesitate to contact us from the <a href="<?php echo get_site_url().'/wp-admin/edit.php?post_type=sld&page=qcpro-promo-page-sld-free-page-123za'; ?>">Support Page</a>. <img draggable="false" class="emoji" alt="🙂" src="<?php echo QCOPD_IMG_URL; ?>/1f642.svg"></p>
						
						<h3>Please take a quick look at our <a href="http://dev.quantumcloud.com/sld/tutorials/" class="button button-primary" target="_blank">Video Tutorials</a></h3>
						
						<h3>Note</h3>
						<p><strong>If you are having problem with adding more items or saving a list or your changes in the list are not getting saved then it is most likely because of a limitation set in your server. Your server has a limit for how many form fields it will process at a time. So, after you have added a certain number of links, the server refuses to save the List. The server’s configuration that dictates this is max_input_vars. You need to Set it to a high limit like max_input_vars = 15000. Since this is a server setting - you may need to contact your hosting company's support for this.</strong></p>

						<h3>Shortcode Generator</h3>
						<p>
						We encourage you to use the ShortCode generator found in the toolbar of your page/post editor in visual mode.</p> 
						
						<img src="<?php echo QCOPD_IMG_URL; ?>/classic.jpg" alt="shortcode generator" />
						
						<p>See sample below for where to find it for Gutenberg.</p>

						<img src="<?php echo QCOPD_IMG_URL; ?>/gutenburg.jpg" alt="shortcode generator" />						
						<img src="<?php echo QCOPD_IMG_URL; ?>/gutenburg2.jpg" alt="shortcode generator" />	<p>This is how the shortcode generator will look like.</p>				
						<img src="<?php echo QCOPD_IMG_URL; ?>/shortcode-generator1.jpg" alt="shortcode generator" />						
						

						<div>
							<h3>Shortcode Example</h3>
							
							<p>
								<strong>You can use our given SHORTCODE GENERATOR to generate and insert shortcode easily, titled as "SLD" with WordPress content editor.</strong>
							</p>

							<p>
								<strong><u>For all the lists:</u></strong>
								<br>
								[qcopd-directory mode="all" column="2" style="simple" orderby="date" order="DESC" enable_embedding="false"]
								<br>
								<br>
								<strong><u>For only a single list:</u></strong>
								<br>
								[qcopd-directory mode="one" list_id="75"]
								<br>
								<br>
								<strong><u>Available Parameters:</u></strong>
								<br>
							</p>
							<p>
								<strong>1. mode</strong>
								<br>
								Value for this option can be set as "one" or "all".
							</p>
							<p>
								<strong>2. column</strong>
								<br>
								Avaialble values: "1", "2", "3" or "4".
							</p>
							<p>
								<strong>3. style</strong>
								<br>
								Avaialble values: "simple", "style-1", "style-2", "style-3".
								<br>
								<strong style="color: red;">
									Only 4 templates are available in the free version. For more styles or templates, please purchase the <a href="https://www.quantumcloud.com/simple-link-directory/" target="_blank" target="_blank">premium version</a>.
								</strong>
							</p>
							<p>
								<strong>4. orderby</strong>
								<br>
								Compatible order by values: 'ID', 'author', 'title', 'name', 'type', 'date', 'modified', 'rand' and 'menu_order'.
							</p>
							<p>
								<strong>5. order</strong>
								<br>
								Value for this option can be set as "ASC" for Ascending or "DESC" for Descending order.
							</p>
							<p>
								<strong>6. item_orderby</strong>
								<br>
								Value for this option are "title", "upvotes", "timestamp" that will be set as "ASC" & others will be "DESC" order.
							</p>
							<p>
								<strong>7. list_id</strong>
								<br>
								Only applicable if you want to display a single list [not all]. You can provide specific list id here as a value. You can also get ready shortcode for a single list under "Manage List Items" menu.
							</p>
							
							<p>
								<strong>8. enable_embedding</strong>
								<br>
								Allow visitors to embed list in other sites. Supported values - "true", "false".
								<br>
								Example: enable_embedding="true"
							</p>
							<p>
								<strong>8. upvote</strong>
								<br>
								Allow visitors to list item. Supported values - "on", "off".
								<br>
								Example: upvote="on"
							</p>
						</div>

						<div style="padding: 15px 10px; border: 1px solid #ccc; text-align: center; margin-top: 20px;">
							 Crafted By: <a href="http://www.quantumcloud.com" target="_blank">Web Design Company</a> - QuantumCloud 
						</div>
						
					  </div>
					  <!-- /post-body-content -->	
					  
					  

					</div>
					<!-- /post-body-->

				</div>
				<!-- /poststuff -->

			</div>
							
						</td>
					</tr>

				</table>
			</div>
			
			<?php submit_button(); ?>

		</form>
		
	</div>

	
	<?php
	
}