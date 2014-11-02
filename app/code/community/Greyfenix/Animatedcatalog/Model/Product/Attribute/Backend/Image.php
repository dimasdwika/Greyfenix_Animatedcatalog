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
 * Greyfenix Animatedcatalog image attribute backend model
 *
 * @package    Greyfenix_Animatedcatalog
 * @author     Dimas Putra <dp@greyfenix.com.au>
 */
class Greyfenix_Animatedcatalog_Model_Product_Attribute_Backend_Image
    extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{
    /**
     * Save uploaded file and set its name to product attribute
     *
     * @param Varien_Object $object
     */
    public function afterSave($object)
    {
        $value = $object->getData($this->getAttribute()->getName());

        if (is_array($value) && !empty($value['delete'])) {
            $object->setData($this->getAttribute()->getName(), '');
            $this->getAttribute()->getEntity()
                ->saveAttribute($object, $this->getAttribute()->getName());
            return;
        }
        $path = $this->_calculatePath();

        try {
            $uploader = new Mage_Core_Model_File_Uploader($this->getAttribute()->getName());
            $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
            $uploader->setAllowRenameFiles(true);
            $result = $uploader->save($path);

            $object->setData($this->getAttribute()->getName(), $result['file']);
            $this->getAttribute()->getEntity()->saveAttribute($object, $this->getAttribute()->getName());
        } catch (Exception $e) {
            if ($e->getCode() != Mage_Core_Model_File_Uploader::TMP_NAME_EMPTY) {
                Mage::logException($e);
            }
            return;
        }
    }

    /**
     * Calculating path of the image
     *
     * @return string
     */
    protected function _calculatePath()
    {
        return Mage::getBaseDir('media') . DS . 'catalog' . DS . 'product' . DS;
    }
}
