<?php
/**
 * MageParts
 *
 * NOTICE OF LICENSE
 *
 * This code is copyrighted by MageParts and may not be reproduced
 * and/or redistributed without a written permission by the copyright
 * owners. If you wish to modify and/or redistribute this file please
 * contact us at info@mageparts.com for confirmation before doing
 * so. Please note that you are free to modify this file for personal
 * use only.
 *
 * If you wish to make modifications to this file we advice you to use
 * the "local" file scope in order to aviod conflicts with future updates.
 * For information regarding modifications see http://www.magentocommerce.com.
 *
 * DISCLAIMER
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF
 * USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
 * OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   MageParts
 * @package    MageParts_Ddq
 * @copyright  Copyright (c) 2009 MageParts (http://www.mageparts.com/)
 * @author     MageParts Crew
 */

class MageParts_Ddq_Model_System_Config_Source_Layout extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{

    /**
     * Options available for this model.
     *
     * @var array
     */
    protected $_options;

    /**
     * Get all options.
     *
     * This is required when using the model for an attribute.
     *
     * @param boolean $includeEmpty
     * @return array
     */
    public function getAllOptions($includeEmpty=true)
    {
        if (!$this->_options) {
            $this->_options = array(
                array(
                    'value' => 'select',
                    'label' => Mage::helper('ddq')->__('Drop-Down List (Select Box)')
                ),
                array(
                    'value' => 'table',
                    'label' => Mage::helper('ddq')->__('Table with Radio Buttons')
                )
            );
        }

        return $this->_options;
    }

    /**
     * Get options as associative array.
     *
     * @param boolean $includeEmpty
     * @return array
     */
    public function toOptionArray($includeEmpty=true)
    {
        return $this->getAllOptions($includeEmpty);
    }

    /**
     * Get options as array.
     *
     * @param boolean $includeEmpty
     * @return array
     */
    public function toArray($includeEmpty=false)
    {
        $result = array();

        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] != '' || $includeEmpty) {
                $result[$option['value']] = $option['label'];
            }
        }

        return $result;
    }

}
