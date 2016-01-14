<?php
/**
 * All-In-One Checkout v1.0.15 : All-In-One Checkout v1.0.15 (OPCB Unit)
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitcheckout / Aitoc_Aitcheckout
 * @version      1.0.15 - 1.4.15
 * @license:     jC7sr77MwqoHj2SDR8w4YXR3o3w7irXLNFUdRYpgyc
 * @copyright:   Copyright (c) 2015 AITOC, Inc. (http://www.aitoc.com)
 */
class Aitoc_Aitcheckout_Model_System_Config_Source_Design
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => Aitoc_Aitcheckout_Helper_Data::DESIGN_DEFAULT,    'label'=>Mage::helper('aitcheckout')->__('Default Design')),
            array('value' => Aitoc_Aitcheckout_Helper_Data::DESIGN_COMPACT,    'label'=>Mage::helper('aitcheckout')->__('Compact v1 Design')),
            array('value' => Aitoc_Aitcheckout_Helper_Data::DESIGN_COMPACT_V2, 'label'=>Mage::helper('aitcheckout')->__('Compact v2 Design')),
        );
    }

}