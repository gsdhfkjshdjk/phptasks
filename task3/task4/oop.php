<?php

class Product{


    //объявление двух публичных свойств
    public $name;
    public $price;

    //в публичном методе-конструкторе эти два свойства инициализируются при создании объекта
    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;
    }
   
    //объявление метода для получения скидки
    public function getDiscountedPrice($percent) {
        return $this->price - ($this->price * $percent / 100);
    }
}


//создание трех объектов
    $product1 = new Product("Название первого товара", 100);
    $product2 = new Product("Название второго товара", 200);
    $product3 = new Product("Название третьего товара", 300);

    
//таблица
echo "<table border = '4px';>";
echo "<tr><th>Название</th><th>Цена</th><th>Цена со скидкой</th></tr>";

$discountedPercent = 25;

//выводим данные
foreach ([$product1, $product2, $product3] as $product){
    $discountedPrice = $product->getDiscountedPrice($discountedPercent );
    echo "<tr>";
        echo "<td>{$product->name}</td>";
        echo "<td>{$product->price}</td>";
        echo "<td>" . number_format($discountedPrice, 2) . "</td>";
    echo "</tr>";
}

echo "</table>";
