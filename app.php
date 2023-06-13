<?php
declare(strict_types=1);
class humano{
    public function __construct(public string $color, private float $huella, protected string $alias){}
    public function __set(string $name, mixed $value): void{
        $this->{$name} = $value;
    }
    public function get(string $name, int $tipo = 1): mixed{
        return property_exists($this, $name)
            ? ($tipo && method_exists($this, $name) ? $this->{$name}() : $this->{$name})
            : "no existe";
    }
    protected function saludar(): string{
        return "Hola, mi alias es " . $this->alias;
    }
}
$extruct = array(
    "huella" => 12.5,
    "color" => "Piel",
    "alias" => "Trainer"
);

$obj = new humano(...$extruct);
$obj->__set("alias", "TRAINER");

print_r($obj);
echo "<br>";
print_r($obj->get("huella"));
echo "<br>";
print_r($obj->get("saludar"));
