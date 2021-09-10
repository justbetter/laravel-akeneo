<?php

namespace JustBetter\Akeneo\Integrations;

use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use JustBetter\Akeneo\Exceptions\AkeneoConfigurationException;

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
            $class = get_class($this->client);
            throw new \BadMethodCallException("Method '$name' does not exist on class '$class'");
        }

        return call_user_func_array([$this->client, $name], $arguments);
    }

    protected function buildClient(): void
    {
        $config = config("akeneo.connections.$this->connection");

        if (! $config) {
            throw new AkeneoConfigurationException("The connection '$this->connection' does not exist");
        }

        $errors = validator($config, [
            'url'       => 'required|url',
            'client_id' => 'required',
            'secret'    => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ])->errors();


        throw_if(
            $errors->any(),
            AkeneoConfigurationException::class,
            "The Akeneo connection is not configured correctly for connection '$this->connection'"
        );

        $this->client = (new AkeneoPimClientBuilder($config['url']))
            ->buildAuthenticatedByPassword(
                $config['client_id'],
                $config['secret'],
                $config['username'],
                $config['password']
            );

    }
}
