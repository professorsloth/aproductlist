<?php

require '../vendor/autoload.php';

use AProductList\Product;
use AProductList\VatTable;

$xmlContent = file_get_contents('../../data/products.xml');
$products = Product::loadManyFromXmlDocument($xmlContent, VatTable::asAssociativeArray());

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A Product List</title>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
</head>
<body>

<div class="page-wrapper">

	<header>
		<h1>Produktlistan</h1>
	</header>

	<?php foreach ($products as $product): ?>
		<?php if ($product->isPublished()): ?>
			<article class="product">
				<h2 class="product--name"><?php echo $product->getName(); ?></h2>
				<div class="description">
					<p class="product--description"><?php echo $product->getDescription(); ?></p>
				</div>
				<div class="product--price-without-vat">Pris: <?php echo $product->getPriceWithoutVat(); ?> :-</div>
				<?php if ($product->getPriceWithVat() > 0): ?>
					<div class="product--price-with-vat">Inkl. moms: <?php echo $product->getPriceWithVat(); ?> :-</div>
				<?php endif; ?>
				<?php if ($product->getCc() > 0): ?>
					<div class="product--volume">Volym: <?php echo $product->getCc(); ?> cc</div>
				<?php endif; ?>
				<div class="product--sku">SKU: <?php echo $product->getSku(); ?></div>

				<?php if ($product->hasCategories()): ?>
					<div class="product--categories">
						<p>Ingår i:</p>
						<ul>
							<?php foreach ($product->getCategories() as $category): ?>
								<li><?php echo $category->getName(); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</article>
		<?php endif; ?>
	<?php endforeach; ?>

</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="description.js"></script>
</body>
</html>
