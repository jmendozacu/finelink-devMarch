<?php
/**
 * All-In-One Checkout v1.0.15 : All-In-One Checkout v1.0.15 (CC Unit)
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitcheckout / Aitoc_Aitconfcheckout
 * @version      1.0.15 - 2.1.29
 * @license:     jC7sr77MwqoHj2SDR8w4YXR3o3w7irXLNFUdRYpgyc
 * @copyright:   Copyright (c) 2015 AITOC, Inc. (http://www.aitoc.com)
 */
/* AITOC static rewrite inserts start */
/* $meta=%default,AdjustWare_Cartalert,AdjustWare_Notification,AdjustWare_Reminder% */
if(Mage::helper('core')->isModuleEnabled('AdjustWare_Reminder')){
    class Aitoc_Aitconfcheckout_Block_Rewrite_FrontCheckoutOnepage_Aittmp extends AdjustWare_Reminder_Block_Rewrite_FrontCheckoutOnepage {} 
 }elseif(Mage::helper('core')->isModuleEnabled('AdjustWare_Notification')){
    class Aitoc_Aitconfcheckout_Block_Rewrite_FrontCheckoutOnepage_Aittmp extends AdjustWare_Notification_Block_Rewrite_FrontCheckoutOnepage {} 
 }elseif(Mage::helper('core')->isModuleEnabled('AdjustWare_Cartalert')){
    class Aitoc_Aitconfcheckout_Block_Rewrite_FrontCheckoutOnepage_Aittmp extends AdjustWare_Cartalert_Block_Rewrite_FrontCheckoutOnepage {} 
 }else{
    /* default extends start */
    class Aitoc_Aitconfcheckout_Block_Rewrite_FrontCheckoutOnepage_Aittmp extends Mage_Checkout_Block_Onepage {}
    /* default extends end */
}

/* AITOC static rewrite inserts end */
class Aitoc_Aitconfcheckout_Block_Rewrite_FrontCheckoutOnepage extends Aitoc_Aitconfcheckout_Block_Rewrite_FrontCheckoutOnepage_Aittmp
{
    protected $_sShippingMethod = '';
    
    public function getSteps()
    {
        $steps = array();

        if (!$this->isCustomerLoggedIn()) {
            $steps['login'] = $this->getCheckout()->getStepData('login');
        }
        
        $stepCodes = $this->getStepHash();

    //// START AITOC CONFIGURABLE CHECKOUT CODE 

        $aDisabledSectionHash = Mage::helper('aitconfcheckout')->getDisabledSectionHash($this->getQuote());

        $stepCodes = array_diff($stepCodes, $aDisabledSectionHash);       
    
    //// FINISH AITOC CONFIGURABLE CHECKOUT CODE 

        foreach ($stepCodes as $step) {
            $steps[$step] = $this->getCheckout()->getStepData($step);
        }

        return $steps;
    }
    
    
    public function getStartSteps()
    {
        $originalCodes = $this->getStepHash();

        $aDisabledSectionHash = Mage::helper('aitconfcheckout')->getDisabledSectionHash($this->getQuote());

        $aStartSteps = array();
     
        foreach ($originalCodes as $iKey => $sStep)
        {
            if (in_array($sStep, $aDisabledSectionHash))
            {
                $aStartSteps[] = $originalCodes[$iKey - 1];
            }
        }
        
        return $aStartSteps;
    }
    
    
    public function getShippingMethodStrict()
    {
        return Mage::registry('sShippingMethodStrict');
    }
    
    public function getSubstituteCode()
    {
        return Aitoc_Aitconfcheckout_Model_Aitconfcheckout::SUBSTITUTE_CODE;
    }
    
    public function getDisabledSectionHash()
    {
        return Mage::getModel('aitconfcheckout/aitconfcheckout')->getDisabledSectionHash($this->getQuote());
    }    
    
    public function getStepHash()
    {
        $originalCodes = array('billing', 'shipping', 'shipping_method', 'payment', 'review');

        if ($this->getQuote()->isVirtual())
        {
            $originalCodes = array('billing', 'payment', 'review');
        }
        
        return $originalCodes;
    }    
    
    public function checkIsVirtual()
    {
        return $this->getQuote()->isVirtual();
    }    
    
}