# Rybbit Tracking - Nextcloud Plugin

A Nextcloud plugin that integrates Rybbit analytics tracking into your Nextcloud instance.

## Description

This plugin allows administrators to configure Rybbit tracking parameters and automatically loads the Rybbit analytics script on all Nextcloud pages. The tracking configuration is managed through the Nextcloud admin settings.

## Features

- Admin configuration interface for Rybbit tracking parameters
- Automatic injection of Rybbit tracking script
- API endpoint for retrieving tracking configuration
- Debug mode for troubleshooting
- Compatible with Nextcloud 25+ 

## Installation

### Manual Installation

1. Download or clone this repository
2. Copy the plugin folder to your Nextcloud `apps/` directory as `rybbit_tracking`
3. Set proper permissions:
   ```bash
   sudo chown -R www-data:www-data /path/to/nextcloud/apps/rybbit_tracking
   sudo chmod -R 755 /path/to/nextcloud/apps/rybbit_tracking
   ```
4. Enable the plugin in Nextcloud admin settings under "Apps"

### TrueNAS Scale Installation

1. Access your TrueNAS system
2. Navigate to the Nextcloud app dataset (usually `/mnt/pool/ix-applications/releases/nextcloud/volumes/`)
3. Copy plugin files to the apps directory:
   ```bash
   sudo cp -r rybbit_tracking /mnt/pool/ix-applications/releases/nextcloud/volumes/pvc-xxx/html/apps/
   sudo chown -R 568:568 /mnt/pool/ix-applications/releases/nextcloud/volumes/pvc-xxx/html/apps/rybbit_tracking
   ```
4. Enable the plugin through Nextcloud admin interface

### Docker Installation

A `docker-compose.yml` file is included for local development and testing.

## Configuration

1. Go to Nextcloud Admin Settings → Additional Settings → Rybbit Tracking
2. Configure the tracking parameters:
   - Enable/disable tracking
   - Set tracking parameters as needed
3. Save the configuration

## API

The plugin provides an API endpoint to retrieve the current configuration:

```
GET /ocs/v2.php/apps/rybbit_tracking/api/config
```

Response format:
```json
{
  "rybbit_enabled": true,
  "rybbit_param1": "value1",
  "rybbit_param2": "value2"
}
```

## Development

### Local Development with Docker

1. Clone the repository
2. Run `docker-compose up -d` to start a local Nextcloud instance
3. Access Nextcloud at `http://localhost:8080`
4. The plugin will be automatically mounted

### Testing

The plugin includes debug functionality. Check the browser console for tracking events and configuration loading.

## File Structure

```
rybbit_tracking/
├── appinfo/
│   ├── app.php           # App initialization
│   ├── info.xml          # App metadata and configuration
│   └── routes.php        # API routes
├── lib/
│   ├── AppInfo/
│   │   └── Application.php
│   ├── Controller/
│   │   └── ConfigController.php
│   └── Settings/
│       └── Admin.php     # Admin settings page
├── templates/
│   └── settings-admin.php # Admin settings template
├── js/
│   └── rybbit.js         # Frontend tracking script
└── composer.json         # PHP dependencies
```

## Compatibility

- Nextcloud 25+
- PHP 7.4+

## License

[Add your license information here]

## Support

[Add support information here]
