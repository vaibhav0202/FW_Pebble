<?php
/**
 * @category    FW
 * @package     FW_Pebble
 * @copyright   Copyright (c) 2015 F+W Media, Inc. (http://www.fwcommunity.com)
 */
class FW_Pebble_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
	 * Whether Pebble is enabled
	 * @param mixed $store
	 * @return bool
	 */
	public function isPebbleEnabled($store = null)
	{
		return Mage::getStoreConfig('thirdparty/pebble/active', $store);
	}

	/**
	 * Get the Pebble Post Site ID
	 * @param mixed $store
	 * @return string
	 */
	public function getSiteId($store = null)
	{
		return Mage::getStoreConfig('thirdparty/pebble/site_id', $store);
	}

	/**
	 * Whether Pebble is ready to use
	 * @param mixed $store
	 * @return bool
	 */
	public function isPebbleAvailable($store = null)
	{
		$enabled = $this->isPebbleEnabled($store);
		$siteId = $this->getSiteId($store);
		
		if($enabled == 1 && $siteId != NULL){
			return true;
		}else{
			return false;
		}
	}
}
