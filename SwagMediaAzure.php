<?php
/*
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace SwagMediaAzure;

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use League\Flysystem\AdapterInterface;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use Shopware\Components\Plugin;

class SwagMediaAzure extends Plugin
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Collect_MediaAdapter_azure' => 'createAzureAdapter'
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     * @return AdapterInterface
     */
    public function createAzureAdapter(\Enlight_Event_EventArgs $args)
    {
        $config = $args->get('config');

        $endpoint = sprintf(
            'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s',
            $config['accountName'],
            $config['apiKey']
        );

        $client = BlobRestProxy::createBlobService($endpoint);

        return new AzureBlobStorageAdapter($client, $config['containerName']);
    }
}
