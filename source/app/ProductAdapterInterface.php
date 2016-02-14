<?php

namespace AProductList;

interface ProductAdapterInterface
{
	public function getName();
	public function getDescription();
	public function getSku();
	public function getCc();
	public function getPrice();
	public function getIsPublished();
	public function getCategories();
	public function getVatId();
}

