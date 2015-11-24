<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\AppBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WellCommerce\AppBundle\DependencyInjection\Compiler;

/**
 * Class WellCommerceAppBundle
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class WellCommerceAppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new Compiler\RouteGeneratorPass());
        $container->addCompilerPass(new Compiler\LayoutBoxConfiguratorPass());
        $container->addCompilerPass(new Compiler\ThemeCompilerPass());
        $container->addCompilerPass(new Compiler\TemplateResourcesPass());
        $container->addCompilerPass(new Compiler\RegisterCartVisitorPass());
        $container->addCompilerPass(new Compiler\RegisterOrderVisitorPass());
        $container->addCompilerPass(new Compiler\RegisterShippingMethodCalculatorPass());
        $container->addCompilerPass(new Compiler\RegisterPaymentMethodProcessorPass());
    }
}
