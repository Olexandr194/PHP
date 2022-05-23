<?php

abstract class Creator
{
    /**Зауважте, що Творець також може надати деяку реалізацію заводського методу за замовчуванням.*/
    abstract public function factoryMethod(): Product;

    /**
     * Також зауважте, що, незважаючи на назву, головна відповідальність
     * Творця не полягає у створенні продуктів. Зазвичай він містить деяку основну бізнес-логіку,
     * яка спирається на об’єкти Product, повернуті заводським методом. Підкласи можуть опосередковано
     * змінити цю бізнес-логіку, перевизначивши заводський метод
     * і повернення з нього товару іншого типу.
     */
    public function someOperation(): string
    {
        // Call the factory method to create a Product object.
        $product = $this->factoryMethod();
        // Now, use the product.
        $result = "Creator: The same creator's code has just worked with " .
            $product->operation();

        return $result;
    }
}

/**
 * Concrete Creators замінюють заводський метод, щоб змінити тип продукту.
 */
class ConcreteCreator1 extends Creator
{
    /**
     * Зауважте, що в сигнатурі методу все ще використовується абстрактний тип продукту,
     * навіть якщо конкретний продукт фактично повертається методом.
     * Таким чином Творець може залишатися незалежним від конкретних класів продуктів.
     */
    public function factoryMethod(): Product
    {
        return new ConcreteProduct1();
    }
}

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}

/**
 * Інтерфейс продукту оголошує операції, які повинні виконувати всі конкретні продукти.

 */
interface Product
{
    public function operation(): string;
}

/**
 * Concrete Products забезпечують різні реалізації інтерфейсу продукту.
 */
class ConcreteProduct1 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct1}";
    }
}

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct2}";
    }
}

/**
 * Клієнтський код працює з екземпляром конкретного творця, хоча через його базовий інтерфейс.
 * Поки клієнт продовжує працювати з автором через базовий інтерфейс,
 * ви можете передати йому будь-який підклас творця.
 */
function clientCode(Creator $creator)
{
    // ...
    echo "Client: I'm not aware of the creator's class, but it still works.\n"
        . $creator->someOperation();
    // ...
}

/**
 * Програма вибирає тип творця залежно від конфігурації або середовища.
 */
echo "App: Launched with the ConcreteCreator1.\n";
clientCode(new ConcreteCreator1());
echo "\n\n";

echo "App: Launched with the ConcreteCreator2.\n";
clientCode(new ConcreteCreator2());