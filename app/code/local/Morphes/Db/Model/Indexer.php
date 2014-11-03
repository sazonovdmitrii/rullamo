<?php
/**
 * @category    Morphes
 * @package     Morphes_Db
 * @copyright   Copyright (c) http://www.morphes.ru
 * @license     http://www.morphes.ru/license  Proprietary License
 */

/**
 * Entry points for cron and index processes
 * @author Morphes Team
 *
 */
class Morphes_Db_Model_Indexer extends Mage_Index_Model_Indexer_Abstract {
	// INDEXING ITSELF
	
    protected function _construct()
    {
        $this->_init('morphes_db/replicate');
    }
    public function getName()
    {
        return Mage::helper('morphes_db')->__('Default Values');
    }
    public function getDescription()
    {
        return Mage::helper('morphes_db')->__('Propagate default values throughout the system');
    }
    protected function _registerEvent(Mage_Index_Model_Event $event)
    {
    }
    protected function _processEvent(Mage_Index_Model_Event $event)
    {
    }
	public function reindexAll() {
		Mage::helper('morphes_db')->replicate();
	}
    
    public function runCronjob()
    {
        $this->reindexAll();
    }
}