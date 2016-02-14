<?php

namespace AProductList;

class Product
{
	protected $_name;
	protected $_description;
	protected $_sku;
	protected $_cc;
	protected $_isPublished;
	protected $_price;
	protected $_categories;
	protected $_vatFactor;

	public function __construct(ProductAdapterInterface $adapter, array $vatTable)
	{
		$this->_name = $adapter->getName();
		$this->_description = $adapter->getDescription();
		$this->_sku = $adapter->getSku();
		$this->_cc = $adapter->getCc();
		$this->_price = $adapter->getPrice();
		$this->_isPublished = $adapter->getIsPublished();
		$this->_categories = $adapter->getCategories();
		$this->_vatFactor = $vatTable[$adapter->getVatId()];
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getDescription()
	{
		return $this->_description;
	}

	public function getSku()
	{
		return $this->_sku;
	}

	public function getCc()
	{
		return $this->_cc;
	}

	public function isPublished()
	{
		return $this->_isPublished;
	}

	public function getPriceWithoutVat()
	{
		$value = $this->_price;

		return sprintf('%.2f', $value);
	}

	public function getPriceWithVat()
	{
		$value = $this->_price * $this->_vatFactor;

		return sprintf('%.2f', $value);
	}

	public function getCategories()
	{
		return $this->_categories;
	}

	public function hasCategories()
	{
		return (count($this->_categories) > 0);
	}

	public static function loadManyFromXmlDocument($xmlString, $vatTable)
	{
		$products = array();
		$document = new \SimpleXMLElement($xmlString);
		foreach ($document as $item) {
			$xmlAdapter = new XmlProductAdapter($item);
			$product = new Product($xmlAdapter, $vatTable);
			$products[] = $product;
		}

		return $products;
	}
}
