<?php

namespace thousandmonkeys\SocialButtons\Block;

class ProductAttributeBlock extends Magento\Catalog\Block\Product\View\abstractView {

	protected $_template = 'attributeBlock.phtml';
	protected $_scopeConfig;

	/**
	 * [__construct description]
	 * @param \Magento\Framework\View\Element\Template\Context                $context                 [description]
	 * @param array                                                           $data                    [description]
	 */
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		array $data = []
	) {
		parent::__construct($context, $data);
		$this->_scopeConfig = $context->getScopeConfig();

	}

	public function getAttributeID()
	{
		return $this->_scopeConfig->getValue('productAttributeSwap/attribute/attributeid', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	}

	public function getBlockID(){
		$attID = getAttributeID();
		$product = $this->getProduct();

		$value = $product->getResource()->getAttribute($attID)->getFrontend()->getValue($product); 
		echo $value;
		return value;
		//return $attID . $this->getProduct()->getAttributeText($attID);
	}
}
