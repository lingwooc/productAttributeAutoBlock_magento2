<?php

namespace thousandmonkeys\ProductAttributeAutoBlock\Block;

use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Stdlib\ArrayUtils;

class ProductAttributeAutoBlock extends \Magento\Catalog\Block\Product\View\AbstractView {

	protected $_template = 'attributeBlock.phtml';
	protected $_scopeConfig;

    /**
     * CustomDescription constructor.
     *
     * @param Context $context
     * @param ArrayUtils $arrayUtils
     * @param array $data
     */
    public function __construct(
        Context $context,
        ArrayUtils $arrayUtils,
        array $data
    ) {
		$this->_scopeConfig = $context->getScopeConfig();
        parent::__construct($context, $arrayUtils, $data);
    }

	public function getAttributeID()
	{
		return $this->_scopeConfig->getValue('ProductAttributeAutoBlock/attribute/attributeid', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	}

	public function isSetup(){
		return !is_null($this->getAttributeID());
	}

	public function getBlockIDs(){
		$attIDs = $this->getAttributeID();
		$product = $this->getProduct();

		$blockCodes = array();

		foreach (trim(explode(',',$attIDs)) as $attID){
			$values = $product->getResource()->getAttribute($attID)->getFrontend()->getValue($product); 
			foreach (explode(',',$values) as $value)
				$blockCodes[] = $attID.'_'.trim($value);
		}
		return $blockCodes;
	}
}
