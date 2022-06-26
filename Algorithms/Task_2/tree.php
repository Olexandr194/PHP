<?php
abstract class Component
{
    protected $parent;

    public function setParent(Component $parent)
    {
        $this->parent = $parent;
    }

    public function getParent(): Component
    {
        return $this->parent;
    }

    public function add(Component $component): void { }

    public function remove(Component $component): void { }

    public function isComposite(): bool
    {
        return false;
    }

    abstract public function getData(): string;
}

class Leaf extends Component
{
    protected $leaf;

    public function __construct($leaf)
    {
        $this->leaf = $leaf;
    }

    public function getData(): string
    {
        return $this->leaf;
    }
}

class Composite extends Component
{
    protected $children;
    protected $branch;

    public function __construct($branch)
    {
        $this->branch = $branch;
        $this->children = new \SplObjectStorage();
    }

    public function add(Component $component): void
    {
        $this->children->attach($component);
        $component->setParent($this);
    }

    public function remove(Component $component): void
    {
        $this->children->detach($component);
        $component->setParent(null);
    }

    public function isComposite(): bool
    {
        return true;
    }

    public function getData(): string
    {
        $results = [];
        foreach ($this->children as $child) {
            $results[] = $child->getData();
        }

        return PHP_EOL . $this->branch . ': ' . implode("; ", $results);
    }
}

function clientCode(Component $component)
{
    return $component->getData();
}


$tree = new Composite('Tree');
$branch1 = new Composite('Branch1');
$branch1->add(new Leaf('2'));
$branch1->add(new Leaf('3'));

$branch2 = new Composite('Branch2');
$branch2->add(new Leaf('4'));

$tree->add($branch1);
$tree->add($branch2);



echo clientCode($tree);

