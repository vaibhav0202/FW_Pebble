<?php
/**
 * @category    FW
 * @package     FW_Pebble
 * @copyright   Copyright (c) 2015 F+W Media, Inc. (http://www.fwcommunity.com)
 */

class FW_Pebble_Block_Tracking extends Mage_Core_Block_Text
{	
	/**
	 * Render the Google Adwords tracking scripts
	 * @return string
	 */
	protected function _toHtml() 
	{
		$return = '';
		
		// Load Google Adwords Helper
		$helper = Mage::helper('fw_pebble');
		
		$storeid = Mage::app()->getStore()->getStoreId();
		// Check if Google Adwords is available for use on page
		if ($helper->isPebbleAvailable($storeid)) {
            
            if (Mage::getSingleton('customer/session')->isLoggedIn()) {
                $customerData = Mage::getSingleton('customer/session')->getCustomer();
                $userId = $customerData->getId();

                $pebbleSiteId = $helper->getSiteId();

                $url = "//cdn.pbbl.co/r/";
                $return .= sprintf('<script>window._pp = window._pp || {};_pp.siteUId = "%1$s";_pp.siteId = "%2$s";(function() {var ppjs = document.createElement("script");ppjs.type = "text/javascript";ppjs.async = true;ppjs.src = ("https:" == document.location.protocol ? "https:" : "http:") + "%3$s" + _pp.siteId + ".js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ppjs, s);})();</script>',
                    $this->jsQuoteEscape($userId),                        // Google Adwords URL to send conversion data to
                    $this->jsQuoteEscape($pebbleSiteId),
                    $this->jsQuoteEscape($url)
                );

            }
        }

		return $return;
	}
}