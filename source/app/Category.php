<?php

namespace AProductList;

class Category
{
	protected $_id;
	protected $_name;
	protected $_description;

	public function __construct($id, $name, $description = '')
	{
		$this->_id = (int)$id;
		$this->_name = (string)$name;
		$this->_description = (string)$description;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getDescription()
	{
		return $this->_description;
	}
}
