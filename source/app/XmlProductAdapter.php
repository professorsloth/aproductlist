<?php

namespace AProductList;

class XmlProductAdapter implements ProductAdapterInterface
{
	protected $_element;

	public function __construct(\SimpleXMLElement $productElement)
	{
		$this->_element = $productElement;
	}

	public function getName()
	{
		return (string)$this->_element->name;
	}

	public function getDescription()
	{
		return (string)$this->_element->description;
	}

	public function getSku()
	{
		return (string)$this->_element->attributes()->sku;
	}

	public function getCc()
	{
		return (double)$this->_element->attributes()->cc;
	}

	public function getPrice()
	{
		return (double)$this->_element->price->whs;
	}

	public function getIsPublished()
	{
		return (boolean)$this->_element->attributes()->published;
	}

	public function getCategories()
	{
		$categories = array();

		if ($this->_element->categories->category) {
			foreach ($this->_element->categories->category as $category) {
				$categories[] = new Category(
					$category->attributes()->id,
					$category->name,
					$category->description
				);
			}
		}

		return $categories;
	}

	public function getVatId()
	{
		return (int)$this->_element->vat->id;
	}

}

