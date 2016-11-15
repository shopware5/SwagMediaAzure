# Azure Adapter for Shopware

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

The Azure adapter allows you to manage your media files in shopware on Azure Blob Storage.

## Building a package

Just run `./build.sh`.

## Install

Download the plugin from the release page and enable it in shopware.

## Usage

Update your `config.php` in your root directory and fill in your own values

```php
'cdn' => [
    'backend' => 'azure',
    'adapters' => [
        'azure' => [
            'type'          => 'azure',
            'mediaUrl'      => 'https://example.blob.core.windows.net/media/',
            'accountName'   => 'youraccount',
            'apiKey'        => 'yourapikey',
            'containerName' => 'media'
        ]
    ]
],
```


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
