<?php
/**
 * 建造者模式
 * @description 建造者设计模式的目的是消除其他对象的复杂构建过程。
 */
namespace app;

use common\builder\Product;
use common\builder\ProductBuilder;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$productConfigs = ['type' => 'shirt', 'size' => 'XL', 'color' => 'red', 'cate' => 'XXX'];

//$product = new Product();
//$product->setType($productConfigs['type']);
//$product->setSize($productConfigs['size']);
//$product->setColor($productConfigs['red']);

$builder = new ProductBuilder($productConfigs);
$builder->build();
$product = $builder->getProduct();