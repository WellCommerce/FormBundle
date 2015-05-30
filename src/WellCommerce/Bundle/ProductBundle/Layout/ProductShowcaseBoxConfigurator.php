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

namespace WellCommerce\Bundle\ProductBundle\Layout;

use WellCommerce\Bundle\FormBundle\Builder\FormBuilderInterface;
use WellCommerce\Bundle\FormBundle\Elements\FormInterface;
use WellCommerce\Bundle\LayoutBundle\Configurator\AbstractLayoutBoxConfigurator;
use WellCommerce\Bundle\LayoutBundle\Configurator\LayoutBoxConfiguratorInterface;

/**
 * Class ProductShowcaseBoxConfigurator
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductShowcaseBoxConfigurator extends AbstractLayoutBoxConfigurator implements LayoutBoxConfiguratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function addFormFields(FormBuilderInterface $builder, FormInterface $form, $defaults)
    {
        $fieldset = $this->getFieldset($builder, $form);
        $accessor = $this->getPropertyAccessor();

        $fieldset->addChild($builder->getElement('tip', [
            'tip' => '<p>' . $this->trans('Select view type used in template.') . '</p>'
        ]));

        $fieldset->addChild($builder->getElement('select', [
            'name'    => 'view_type',
            'label'   => $this->trans('View type'),
            'options' => [
                0 => $this->trans('List'),
                1 => $this->trans('Select'),
            ],
            'default' => $accessor->getValue($defaults, '[view_type]')
        ]));
    }
}
