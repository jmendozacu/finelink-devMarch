<?php
/**
 * All-In-One Checkout v1.0.15 : All-In-One Checkout v1.0.15 (CFM Unit)
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitcheckout / Aitoc_Aitcheckoutfields
 * @version      1.0.15 - 2.9.15
 * @license:     jC7sr77MwqoHj2SDR8w4YXR3o3w7irXLNFUdRYpgyc
 * @copyright:   Copyright (c) 2015 AITOC, Inc. (http://www.aitoc.com)
 */
/**
 * @copyright  Copyright (c) 2009 AITOC, Inc. 
 */

class Aitoc_Aitoptionstemplate_Block_Template_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
    	$model = Mage::registry('current_aitoptionstemplate_template');
    	
    	$form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('template_');
        
        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('aitoptionstemplate')->__('General Information')));

        if ($model->getId()) {
            $fieldset->addField('template_id', 'hidden', array(
                'name' => 'template_id',
            ));
        }
        
        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label' => Mage::helper('aitoptionstemplate')->__('Title'),
            'title' => Mage::helper('aitoptionstemplate')->__('Title'),
            'required' => true,
        ));
        
        $fieldset->addField('description', 'textarea', array(
            'name' => 'description',
            'label' => Mage::helper('aitoptionstemplate')->__('Description'),
            'title' => Mage::helper('aitoptionstemplate')->__('Description'),
            'style' => 'width: 98%; height: 100px;',
        ));
    	
         $fieldset->addField('is_active', 'select', array(
            'label'     => Mage::helper('salesrule')->__('Status'),
            'title'     => Mage::helper('salesrule')->__('Status'),
            'name'      => 'is_active',
            'required' => true,
            'options'    => array(
                '1' => Mage::helper('salesrule')->__('Active'),
                '0' => Mage::helper('salesrule')->__('Inactive'),
            ),
        ));

        $form->setValues($model->getData());

        $this->setForm($form);
        
        return parent::_prepareForm();
    }
}