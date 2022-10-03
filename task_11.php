<?php
class FindShortestPath {
    private array $field = [];
    private int $rows = 10;
    private int $columns = 10;
    private array $aCoordinates = [];
    private array $bCoordinates = [];

    public function __construct() {}

    public function getField() : array {
        return $this->field;
    }

    public function setField($field) : void {
        $this->field = $field;
    }

    public function setCoordinates($a, $b) : bool {
        if ($b["x"] < $this->rows && $b["y"] < $this->columns)
            $this->aCoordinates = $b;
        else
            return false;
        if ($a["x"] < $this->rows && $a["y"] < $this->columns)
            $this->bCoordinates = $a;
        else
            return false;
        return true;
    }

    public function setSize($rows, $columns) : void {
        $this->rows = $rows;
        $this->columns = $columns;
    }

    public function showPath() : void {
        if (!$this->field || !$this->aCoordinates || !$this->bCoordinates) {
            echo "Set field and coordinates\n";
            return;
        }
        $paths = $this->findShortestPath();
        if ($paths) {
            $cur_node = $this->bCoordinates;
            echo "\nPath from A:({$this->bCoordinates["x"]},{$this->bCoordinates["y"]}) to B:({$this->aCoordinates["x"]},{$this->aCoordinates["y"]}): \n({$cur_node["x"]},{$cur_node["y"]}) ";
            while ($cur_node != $this->aCoordinates) {
                $cur_node = $this->getNode($paths, $cur_node);
                echo "--> ({$cur_node["x"]},{$cur_node["y"]})";
            }
            echo "\n\n";
        } else {
            echo "\nNo ways from A to B \n";
        }
    }

    public function generatingArray() : void {
        if (!$this->aCoordinates || !$this->bCoordinates) {
            echo "Set coordinates\n";
            return;
        }
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $this->field[$i][$j] = rand(0,1);
            }
        }
        $this->field[$this->bCoordinates["x"]][$this->bCoordinates["y"]] = 0;
    }

    public function printField($field) : void {
        if (!$this->field){
            echo "Set field\n";
            return;
        }

        foreach ($field as $row) {
            foreach ($row as $cell) {
                echo $cell . " ";
            }
            echo "\n";
        }
    }

    private function findShortestPath() : array {
        $queue[] = $this->aCoordinates;
        $cameFrom[] = ["from" => 0, "to" => $this->aCoordinates];

        while ($queue) {
            $cur_node = array_pop($queue);

            if ($cur_node === $this->bCoordinates)
                return $cameFrom;

            $next_nodes = $this->getNeighbours($cur_node,$this->field);
            foreach ($next_nodes as $next_node) {
                if (!$this->inArray($next_node,$cameFrom)) {
                    $queue[] = $next_node;
                    $cameFrom[] = ["from" => $cur_node, "to" => $next_node];
                }
            }
        }
        return [];
    }

    private function getNode ($array, $cur_node) : array {
        foreach ($array as $item) {
            if ($item["to"] === $cur_node)
                return $item["from"];
        }
        return [];
    }

    private function inArray ($next_node,$visited) : bool {
        foreach ($visited as $item) {
            if ($item["from"] == $next_node)
                return true;
        }
        return false;
    }

    private function getNeighbours($curr,$field) : array {
        $x = $curr["x"];
        $y = $curr["y"];
        $res = [];
        if ($x !== 0) {
            if ($field[$x - 1][$y] === 0)
                $res[] = ["x" => $x - 1, "y" => $y];
        }
        if ($x !== count($field) - 1) {
            if ($field[$x + 1][$y] === 0)
                $res[] = ["x" => $x + 1, "y" => $y];
        }
        if ($y !== 0) {
            if ($field[$x][$y - 1] === 0)
                $res[] = ["x" => $x, "y" => $y - 1];
        }
        if ($y !== count($field[0]) - 1) {
            if ($field[$x][$y + 1] === 0)
                $res[] = ["x" => $x, "y" => $y + 1];
        }
        return $res;
    }

    public static function serializeObject($obj, $filename) : void {
        if (!$fd = fopen($filename, 'a+')) {
            echo "Cannot open file ($filename)";
            exit;
        }
        $serializedObject = serialize($obj);
        if (fwrite($fd, $serializedObject) === false) {
            echo "Cannot write to file ($filename)";
            exit;
        }
        fclose($fd);
    }

    public static function deserializeObject($filename) : array {
        if (!$fd = fopen($filename, 'r')) {
            echo "Cannot open file ($filename)";
            exit;
        }
        $objects = [];
        while(!feof($fd))
        {
            $objects[] = unserialize(fgets($fd));
        }
        fclose($fd);
        return $objects;
    }
}
// A (2,0)
// B (1,2)
$field = [[0,0,0,0],
          [0,1,0,0],
          [0,1,0,0]];
$findPath = new FindShortestPath();

$findPath->setSize(3,4);
$findPath->setCoordinates(array("x" => 2, "y" => 0),array("x" => 1, "y" => 2));

$findPath->setField($field);
$findPath->printField($findPath->getField());
$findPath->showPath();

const FILENAME = "data";

FindShortestPath::serializeObject($findPath, FILENAME);
$objects = FindShortestPath::deserializeObject(FILENAME);

$findPath->generatingArray();
$findPath->printField($findPath->getField());
$findPath->showPath();

foreach ($objects as $object) {
    $object->showPath();
}



