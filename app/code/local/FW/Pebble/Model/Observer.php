<?php
/**
 * @category    FW
 * @package     FW_Pebble
 * @copyright   Copyright (c) 2015 F+W Media, Inc. (http://www.fwcommunity.com)
 */

class FW_Pebble_Model_Observer
{
    /**
     * Mercent Block
     * @var FW_Pebble_Tracking $_block
     */
    private $_block;

    /**
     * Add order information into FW_Google_Adwords_Block_Conversion to render on checkout success pages
     * @param Varien_Event_Observer $observer
     */
    public function onControllerActionBlocksAfter(Varien_Event_Observer $observer)
    {
        $layout = $observer->getLayout();							// Get the layout
        $beforeBodyEnd = $layout->getBlock('before_body_end');		// Get before_body_end
        if (empty($beforeBodyEnd)) return;							// before_body_end doesn't exist

        $this->_block = $layout->createBlock('fw_pebble/tracking','pebble');	// Create block
        if (empty($this->_block)) return 'TESTING';											// block doesn't exist
        $layout->getBlock('before_body_end')->append($this->_block);				// Add block to before_body_end
    }
}
