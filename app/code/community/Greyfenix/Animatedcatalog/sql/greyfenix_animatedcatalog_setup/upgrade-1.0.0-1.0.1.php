<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento
 *
 * DISCLAIMER
 *
 * This custom module is owned by Greyfenix Media and it licensed under greyfenix.com.au
 * Please do not modify this file cause you will lose the modified when upgrading it
 *
 * @category  Module
 * @package   Animatedcatalog
 * @author    Dimas Putra <dp@greyfenix.com.au>
 * @copyright Greyfenix adapt MIT license
 * @license   Greyfenix http://greyfenix.com.au/
 * @link      http://greyfenix.com.au/
 */

/**
 * Create Setup Script for animate_image on catalog product
 */
$installer = $this;

$installer->startSetup();

// create attribute set group for all attribute set available except 'Default'
$attributeSetCollection = Mage::getModel('eav/entity_attribute_set')->getCollection()
    ->addFieldToFilter('attribute_set_name', array('neq' => 'Default'));

foreach ($attributeSetCollection as $attributeSet) {
    $this->addAttributeGroup('catalog_product', $attributeSet->getAttributeSetName(), 'Animated Catalog', 11);
}

// update attribute set name to apply updated
$attributeId = $this->getAttribute('catalog_product', 'animate_image', 'attribute_id');
$installer->updateAttribute('catalog_product', $attributeId, array(), null, 10);

$installer->endSetup();