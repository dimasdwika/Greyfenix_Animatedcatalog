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
    public function getAnimateImage($product = null)
    {
        // product id params expected
        if (is_int($product)) {
            $item = $this->load($product);
            if ($item->getAnimateImage()) {
                return $this->getAnimateFile($item);
            }
        }
        // product object expected
        if (is_object($product) && $product->getAnimateImage()) {
            return $this->getAnimateFile($product);
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
    public function getAnimateFile($product)
    {
        return Mage::getBaseUrl('media') . 'catalog' . DS . 'product' . DS . $product->getAnimateImage();
    }
}
