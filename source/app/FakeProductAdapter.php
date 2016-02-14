<?php

namespace AProductList;

class FakeProductAdapter implements ProductAdapterInterface
{
	public function getName()
	{
		return 'Test';
	}

	public function getDescription()
	{
		return 'A test description.';
	}

	public function getSku()
	{
		return '42';
	}

	public function getCc()
	{
		return 2.2;
	}

	public function getPrice()
	{
		return 10.0;
	}

	public function getIsPublished()
	{
		return true;
	}

	public function getCategories()
	{
		return array(
			new Category(1, 'A category'),
			new Category(2, 'Another category', 'With a description.'),
		);
	}

	public function getVatId()
	{
		return 2;
	}
}

