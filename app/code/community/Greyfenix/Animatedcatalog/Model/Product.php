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
 * Greyfenix Animatedcatalog product model
 *
 * @package    Greyfenix_Animatedcatalog
 * @author     Dimas Putra <dp@greyfenix.com.au>
 */
class Greyfenix_Animatedcatalog_Model_Product extends Mage_Catalog_Model_Product
{
    /**
     * Get Animate Image url of the animate image
     *
     * @param null $product Product Information
     *
     * @return null|string
     */
    public function getAnimateImage($product)
    {
        // product object expected
        if (!$product->getAnimateImage()) {
            $item = Mage::getModel('catalog/product')->load($product->getEntityId());
        }
        if ($item->getAnimateImage()) {
            return $this->getAnimateFile($item->getAnimateImage());
        }

        return null;
    }

    /**
     * Get Animate File on folder structure
     *
     * @param $product Product information
     * 
     * @return string
     */
    public function getAnimateFile($filename)
    {
        return Mage::getBaseUrl('media') . 'catalog' . DS . 'product' . DS . $filename;
    }
}
