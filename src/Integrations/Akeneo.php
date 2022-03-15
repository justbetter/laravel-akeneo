<?php

namespace JustBetter\Akeneo\Integrations;

use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use Akeneo\Pim\ApiClient\Api\AssociationTypeApiInterface;
use Akeneo\Pim\ApiClient\Api\AttributeApiInterface;
use Akeneo\Pim\ApiClient\Api\AttributeGroupApiInterface;
use Akeneo\Pim\ApiClient\Api\AttributeOptionApiInterface;
use Akeneo\Pim\ApiClient\Api\CategoryApiInterface;
use Akeneo\Pim\ApiClient\Api\ChannelApiInterface;
use Akeneo\Pim\ApiClient\Api\CurrencyApiInterface;
use Akeneo\Pim\ApiClient\Api\FamilyApiInterface;
use Akeneo\Pim\ApiClient\Api\FamilyVariantApiInterface;
use Akeneo\Pim\ApiClient\Api\LocaleApiInterface;
use Akeneo\Pim\ApiClient\Api\MeasureFamilyApiInterface;
use Akeneo\Pim\ApiClient\Api\MeasurementFamilyApiInterface;
use Akeneo\Pim\ApiClient\Api\MediaFileApiInterface;
use Akeneo\Pim\ApiClient\Api\ProductApiInterface;
use Akeneo\Pim\ApiClient\Api\ProductModelApiInterface;
use BadMethodCallException;
use JustBetter\Akeneo\Exceptions\AkeneoConfigurationException;

/**
 * @method static ProductApiInterface getProductApi()
 * @method static CategoryApiInterface getCategoryApi()
 * @method static AttributeApiInterface getAttributeApi()
 * @method static AttributeOptionApiInterface getAttributeOptionApi()
 * @method static AttributeGroupApiInterface getAttributeGroupApi()
 * @method static FamilyApiInterface getFamilyApi()
 * @method static MediaFileApiInterface getProductMediaFileApi()
 * @method static LocaleApiInterface getLocaleApi()
 * @method static ChannelApiInterface getChannelApi()
 * @method static CurrencyApiInterface getCurrencyApi()
 * @method static MeasureFamilyApiInterface getMeasureFamilyApi()
 * @method static MeasurementFamilyApiInterface getMeasurementFamilyApi()
 * @method static AssociationTypeApiInterface getAssociationTypeApi()
 * @method static FamilyVariantApiInterface getFamilyVariantApi()
 * @method static ProductModelApiInterface getProductModelApi()
 */
class Akeneo
{
    protected ?AkeneoPimClientInterface $client = null;

    protected string $connection = 'default';

    public function connection(string $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

    public function __call(string $name, array $arguments)
    {
        if (! $this->client) {
            $this->buildClient();
        }

        if (! method_exists($this->client, $name)) {
            throw new BadMethodCallException(
                __('Method ":method" does not exist on class ":class"', [
                    'method' => $name,
                    'class'  => get_class($this->client),
                ])
            );
        }

        return call_user_func_array([$this->client, $name], $arguments);
    }

    protected function buildClient(): void
    {
        $config = config("akeneo.connections.{$this->connection}");

        if (! $config) {
            throw new AkeneoConfigurationException(
                __('The connection ":connection" does not exist', ['connection' => $this->connection])
            );
        }

        $errors = validator($config, [
            'url'       => 'required|url',
            'client_id' => 'required',
            'secret'    => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ])->errors();

        if ($errors->any()) {
            throw new AkeneoConfigurationException(
                __('The Akeneo connection is not configured correctly for connection ":connection"', [
                    'connection' => $this->connection,
                ])
            );
        }

        $this->client = app('clientBuilder')::create($config['url'])
            ->buildAuthenticatedByPassword(
                $config['client_id'],
                $config['secret'],
                $config['username'],
                $config['password']
            );
    }
}
