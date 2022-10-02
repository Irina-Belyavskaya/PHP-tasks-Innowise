<?php
class  MyCalculator {
    private int $num1 = 0;
    private int $num2 = 0;
    private float $result = 0;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function __toString() : string {
        return $this->result;
    }

    public function add() : MyCalculator{
        $this->result = $this->num1 + $this->num2;
        return $this;
    }

    public function subtract() : MyCalculator {
        $this->result = $this->num1 - $this->num2;
        return $this;
    }

    public function multiply() : MyCalculator {
        $this->result = $this->num1 * $this->num2;
        return $this;
    }

    public function divide() : MyCalculator {
        $this->result = $this->num1 / $this->num2;
        return $this;
    }

    public function addBy($num) : MyCalculator {
        $this->result += $num;
        return $this;
    }

    public function subtractBy($num) : MyCalculator {
        $this->result -= $num;
        return $this;
    }

    public function multiplyBy($num) : MyCalculator {
        $this->result *= $num;
        return $this;
    }

    public function divideBy($num) : MyCalculator {
        $this->result /= $num;
        return $this;
    }
}

$calc = new MyCalculator(12,5);

echo "Add " . $calc->add() . "\n";
echo "Subtract " . $calc->subtract() . "\n";
echo "Multiply " . $calc->multiply() . "\n";
echo "Divide " . $calc->divide() . "\n";

echo $calc->add()->subtractBy(3)->multiplyBy(10) . "\n";