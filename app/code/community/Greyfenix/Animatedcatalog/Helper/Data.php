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
class Greyfenix_Animatedcatalog_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * string path of the animated catalog configuration
     */
    const ANIMATED_CATALOG_WIDTH = 'catalog/animated/width';
    const ANIMATED_CATALOG_HEIGHT = 'catalog/animated/height';

    /**
     * Get the width of the configuration
     *
     * @return mixed|null
     */
    public function getWidth()
    {
        $width = Mage::getStoreConfig(self::ANIMATED_CATALOG_WIDTH);
        if ($width) {
            return $width;
        }
        return null;
    }

    /**
     * Get the height of configuration
     *
     * @return mixed|null
     */
    public function getHeight()
    {
        $height = Mage::getStoreConfig(self::ANIMATED_CATALOG_HEIGHT);
        if ($height) {
            return $height;
        }
        return null;
    }
}