<?php

use AProductList\VatTable;
use AProductList\Product;
use AProductList\FakeProductAdapter;
use AProductList\XmlProductAdapter;

class ProductsTest extends PHPUnit_Framework_TestCase
{
	public function testFakeProduct()
	{
		$fakeAdapter = new FakeProductAdapter();
		$product = new Product($fakeAdapter, VatTable::asAssociativeArray());

		$this->assertEquals('Test', $product->getName());
		$this->assertEquals(10.0, $product->getPriceWithoutVat());
		$this->assertEquals(11.2, $product->getPriceWithVat());
		$this->assertEquals(2, count($product->getCategories()));
	}

	public function testLoadedExampleProducts()
	{
		$xmlContent = file_get_contents('../data/example1.xml');
		$products = Product::loadManyFromXmlDocument($xmlContent, VatTable::asAssociativeArray());

		$product = reset($products);
		$firstCategory = reset($product->getCategories());

		$this->assertEquals('First!', $product->getName());
		$this->assertEquals(100.0, $product->getPriceWithoutVat());
		$this->assertEquals(106.0, $product->getPriceWithVat());
		$this->assertEquals(3, count($product->getCategories()));
		$this->assertEquals('A category', $firstCategory->getName());
		$this->assertEquals(298, $firstCategory->getId());
		$this->assertTrue($product->hasCategories());
	}
}

