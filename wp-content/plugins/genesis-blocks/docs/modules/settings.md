# Global Settings

The Global Settings Module adds an admin page to the WordPress dashboard under `Dashboard > Genesis Blocks`. It uses the WordPress Settings API to both register and save the fields, but uses a React App to display the Admin UI, which is a slight change from how the WP Settings API is used in WordPress handbook. See the WordPress handbook article here:
https://developer.wordpress.org/plugins/settings/settings-api/

To add sections and settings to the Genesis Blocks admin page in your own Genesis Blocks Module, first create your module class (see an existing `Module.php`), and add a method for registering your new settings. Set it so that method is hooked to run on `admin_init`. Then, add the following code pieces to that method.

## 1. Registering the setting(s).
Register each setting you need with WordPress using the `register_setting` function, and using `genesis_blocks_global_settings` as the first paramater, which is the Option Group. For example:
```
register_setting(
	'genesis_blocks_global_settings',
	'genesis_blocks_your_setting_here',
	[
		'type'              => 'string', // The type of data this is. Options are 'string', 'boolean', 'integer', 'number', 'array', and 'object'.
		'sanitize_callback' => 'sanitize_text_field', // The function to use for sanitizing this setting when entered by the user.
		'show_in_rest'      => true, // This is required in order for the option to be saved.
		'default'           => '', // A default value to use for this setting.
	]
);
```
In the example above, modify `your_setting_here` to be the name of your new setting. This will register your option so that it can be saved and retrieved through the WordPress settings API.

## 2. Adding the setting(s) section.
Next, add a section where your new setting (or settings) will display on the Genesis Blocks Global Settings admin page by doing the following:
```
add_settings_section(
	'genesis_blocks_settings_your_new_section_name_here',
	__( 'Your new section name here', 'genesis-blocks' ),
	null,
	'genesis_blocks_global_settings'
);
```
In the example above, replace `your_new_section_name_here` with the name you wish to use for your new section. When you register fields (see example below), they will reference this to indicate that they will show in this section. Replace `Your new section name here` with the title of the section to be displayed to the user when viewing the settings page. 

## 3. Adding the setting(s) field
To make the user-facing field show in that section, use the `add_settings_field` function. For example:
```
add_settings_field(
	'genesis_blocks_your_setting_here', // The registered setting for which this field exists.
	__( 'Your field title here', 'genesis-blocks' ), // This is shown to the user as the setting title.
	null, // This paramater (used by WordPress core to render the HTML of the field) is not needed, as the field will be automatically rendered by the React App.
	'genesis_blocks_global_settings', // This is the name of the group of settings to which this setting belongs.
	'genesis_blocks_settings_your_new_section_name_here', // This should match the first paramater in your add_settings_section call, which will make it appear in that section.
	[
		'description' => __( 'A description of your setting here.', 'genesis-blocks' ), // Enter some helpful text to explain the setting to the user here.
		'type'        => 'textarea' // This is the type of field to use. Options include checkbox, html, radio, select, text, textarea
	]
);
```
In the above example, replace each instance of `genesis_blocks_your_setting_here` with the name of your setting, which you registered in step 1. Replace `Your field title here` to set what will show as the setting title to the user. Change `genesis_blocks_settings_your_new_section_name_here` to match the name of your section from step 2, which is the first parameter in the call to `add_settings_section`.

## Render a React app inside settings tabs

If your settings are more complicated than basic fields, you can create a React app and mount it inside of an existing settings tab.

First, create a custom tab for your application by registering a settings section as described above. The code below assumes the section was registered as `genesis_blocks_your_new_section_name_here`.

### Display your React app with the Slot Fill API

Instead of rendering your React application with `ReactDOM.render`, wrap your React application in a `Fill` and pass the settings page tab name in the name prop:

```js
// Import the Fill component.
import { Fill } from '@wordpress/components';

// Wrap your component in the Fill:
const render = () => {
	let blocks = get_registered_gpb_blocks();
	let permissions = getBlockSettingsPermissions();

	return (
		<Fill name="GenesisBlocksSettings_your_new_section_name_here">
			<App
				blocks={ blocks }
				settings={ parseBlockSettings( blocks ) }
				roles={ getAllRoles() }
				permissions={ initialPermissions( permissions ) }
			/>
		</Fill>
	);
}
```

Then register a plugin and pass the render function:

```js
import { registerPlugin } from '@wordpress/plugins';

registerPlugin( 'your-plugin-prefix-any-unique-slug', { render } );

```

The application will then appear after registered fields for that tab.

### Update settings related to a wp_options row

Push state to the settings object in the settings app data store:

```js
import { dispatch } from '@wordpress/data';

const { updateSetting } = dispatch( 'genesis-blocks/global-settings' );

updateSetting({
    key: 'your_setting_key_from_the_wp_option_table',
    value: {},
});

```

The settings app will then save this to the `wp_options` table when the user clicks “Save All”.

This requires that you have registered the option using the WordPress PHP `register_setting` function.
 
The option group should be `genesis_blocks_global_settings` and `show_in_rest` should be true, or an array describing your object or array schema.

```php
<?php
register_setting(
    'genesis_blocks_global_settings',
    'your_setting_key_from_the_wp_option_table',
    [
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_key',
        'show_in_rest'      => true,
        'default'           => '',
    ]
);
```

### Push state to the settings app custom data store

To process data not directly linked to a key in the `wp_options` table, you can store state in the settings data store's custom object:

```js
import { dispatch } from '@wordpress/data';

const { updateCustom } = dispatch( 'genesis-blocks/global-settings' );

updateCustom({
    key: 'custom_key_for_your_app_data',
    value: {},
});

```

### Retrieve stored state from the settings app data store

Use `getCustom` to fetch state from the settings application data store:

```js
import { select } from '@wordpress/data'; 

const { getCustom } = select( 'genesis-blocks/global-settings' ); 

const data = getCustom();

// data.custom_key_for_your_app_data === {}

``` 

You can alternatively retrieve datastore settings (the `settings` object instead of the `custom` object) using `getSettings()` in the same way.

### Hook into the settings save process and make use of saved state

Run code when “Save All” is clicked by hooking into the `genesisBlocks.savingSettings` action:

```js
import apiFetch from '@wordpress/api-fetch';
import { addAction } from '@wordpress/hooks';

/**
 * Saves app settings when Genesis Blocks settings are saved.
 */
const saveSettings = ( settings, custom ) => {
	if ( ! custom.hasOwnProperty( 'custom_key_for_your_app_data' ) ) {
		return;
	}

	apiFetch( {
		path: '/your-rest-route/v1/rest-endpoint',
		method: 'PUT',
		data: custom.custom_key_for_your_app_data,
	} );
}
addAction( 'genesisBlocks.savingSettings', 'yourSlug', saveSettings );
```
