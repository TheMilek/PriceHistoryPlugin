<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Sylius\PriceHistoryPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Tests\Sylius\PriceHistoryPlugin\Behat\Element\Admin\Product\ShowPage\PricingElementInterface;
use Tests\Sylius\PriceHistoryPlugin\Behat\Page\Admin\Product\ShowPageInterface;

final class ProductShowPageContext implements Context
{
    public function __construct(
        private ShowPageInterface $productShowPage,
        private PricingElementInterface $pricingElement,
    ) {
    }

    /**
     * @When I access the price history of a simple product for :channelName channel
     */
    public function iAccessThePriceHistoryIndexPageOfSimpleProductForChannel(string $channelName): void
    {
        $pricingRow = $this->pricingElement->getSimpleProductPricingRowForChannel($channelName);
        $this->productShowPage->showPriceHistory($pricingRow);
    }

    /**
     * @When I access the price history of a product variant :variantName for :channelName channel
     */
    public function iAccessThePriceHistoryIndexPageOfVariantForChannel(string $variantName, string $channelName): void
    {
        $pricingRow = $this->pricingElement->getVariantPricingRowForChannel($variantName, $channelName);
        $this->productShowPage->showPriceHistory($pricingRow);
    }
}