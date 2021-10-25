<?php

namespace JustBetter\Akeneo\Tests\Fakes;

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
use PHPUnit\Framework\Assert;

class FakeClientBuilder implements AkeneoPimClientInterface
{
    public string $url;

    public static function create(string $url): self
    {
        $instance = new self;
        $instance->url = $url;

        return $instance;
    }

    public function buildAuthenticatedByPassword(): self
    {
        return $this;
    }

    public function assertUrl(string $url): void
    {
        Assert::assertEquals($url, $this->url);
    }

    public function getToken(): ?string
    {
        //
    }

    public function getRefreshToken(): ?string
    {
        //
    }

    public function getProductApi(): ProductApiInterface
    {
        //
    }

    public function getCategoryApi(): CategoryApiInterface
    {
        //
    }

    public function getAttributeApi(): AttributeApiInterface
    {
        //
    }

    public function getAttributeOptionApi(): AttributeOptionApiInterface
    {
        //
    }

    public function getAttributeGroupApi(): AttributeGroupApiInterface
    {
        //
    }

    public function getFamilyApi(): FamilyApiInterface
    {
        //
    }

    public function getProductMediaFileApi(): MediaFileApiInterface
    {
        //
    }

    public function getLocaleApi(): LocaleApiInterface
    {
        //
    }

    public function getChannelApi(): ChannelApiInterface
    {
        //
    }

    public function getCurrencyApi(): CurrencyApiInterface
    {
        //
    }

    public function getMeasureFamilyApi(): MeasureFamilyApiInterface
    {
        //
    }

    public function getMeasurementFamilyApi(): MeasurementFamilyApiInterface
    {
        //
    }

    public function getAssociationTypeApi(): AssociationTypeApiInterface
    {
        //
    }

    public function getFamilyVariantApi(): FamilyVariantApiInterface
    {
        //
    }

    public function getProductModelApi(): ProductModelApiInterface
    {
        //
    }
}
