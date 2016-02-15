Product Database Specification
==============================

The database file is of the XML format.
The encoding is UTF-8.

The root node has the name `list`.
It has zero or more nodes called `product`.

A `product` node has exactly one of the following nodes:

 * `name` (treated as a string)
 * `description` (treated as a string)
 * `price`
 * `vat`

A `product` node has at most one each of the following nodes:

 * `categories`

A `product` node has the following attributes:

 * `sku` (treated as a string)
 * `cc` (treated as a double)
 * `published` (treated as a boolean)

A `price` node has exactly one of the following nodes:

 * `whs` (treated as a double)

A `vat` node has exactly one the following nodes:

 * `id` (treated as an integer)

A `categories` node has at least one of the following nodes:

 * `category`

A `category` node has exactly one of the following nodes:

 * `name` (treated as a string)
 * `description` (treated as a string)

A `category` node has the following attributes:

 * `id` (treated as an integer)

