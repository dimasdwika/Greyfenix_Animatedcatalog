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

$this->addAttributeGroup('catalog_product', 'Default', 'Animated Catalog', 11);

$this->addAttribute(
    'catalog_product',
    'animate_image',
    array(
        'group'             => 'Animated Catalog',
        'type'              => 'varchar',
        'label'             => 'Animated Image',
        'input'             => 'image',
        'backend'           => 'greyfenix_animatedcatalog/product_attribute_backend_image',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
    )
);

$installer->endSetup();