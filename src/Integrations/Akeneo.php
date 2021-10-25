<?php

namespace JustBetter\Akeneo\Integrations;

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use JustBetter\Akeneo\Concerns\BuildsClient;
use JustBetter\Akeneo\Exceptions\AkeneoConfigurationException;

/**
 * @method static \Akeneo\Pim\ApiClient\Api\ProductModelApi getProductModelApi()
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
            throw new \BadMethodCallException(
                message: __('Method ":method" does not exist on class ":class"', [
                    'method' => $name,
                    'class' => get_class($this->client)
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
                message: __('The connection ":connection" does not exist', ['connection' => $this->connection])
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
                    'connection' => $this->connection
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
