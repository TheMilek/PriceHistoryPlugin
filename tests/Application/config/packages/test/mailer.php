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

use Sylius\Bundle\CoreBundle\Application\Kernel as SyliusKernel;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

if (SyliusKernel::VERSION_ID < 11200) {
    return;
}

return static function (ContainerConfigurator $containerConfigurator) {
    $containerConfigurator->extension('framework', [
        'cache' => [
            'pools' => [
                'test.mailer_pool' => [
                    'adapter' => 'cache.adapter.filesystem',
                ],
            ],
        ],
    ]);
};
