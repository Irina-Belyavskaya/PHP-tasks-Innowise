<?php
class Student {
    protected string $firstName = "";
    protected string $lastName = "";
    protected string $group = "";
    protected float $averageMark = 0;

    public function __construct($firstName, $lastName, $group, $averageMark) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->averageMark = $averageMark;
    }

    public function getFirstName() : string {
        return $this->firstName;
    }

    public function getLastName() : string {
        return $this->lastName;
    }

    public function getGroup() : string {
        return $this->group;
    }

    public function setGroup($newGroup) : void {
        $this->group = $newGroup;
    }

    public function setAverageMark($newAverageMark) : void {
        $this->averageMark = $newAverageMark;
    }

    public function getScholarship() : int  {
        if ($this->averageMark == 5)
            return 100;
        else
            return 80;
    }

    public function getInformation() : string {
        return $this->firstName . " " . $this->lastName . " from group " . $this->group . " - " . $this->getScholarship() . "$\n";
    }
}

class Aspirant extends Student {
    public function __construct($firstName, $lastName, $group, $averageMark) {
        parent::__construct($firstName, $lastName, $group, $averageMark);
    }

    public function getScholarship() : int  {
        if ($this->averageMark == 5)
            return 200;
        else
            return 180;
    }
}

$aspirant = new Aspirant("John","Samos","012004",4);
$student = new Student("Ann","Williams","051004",5);
$student = $aspirant;
$student->setGroup("022004") ;
echo $student->getInformation();
echo $aspirant->getInformation();

$studentsArray = [new Student("Ann","Williams","051004",5),
                  new Aspirant("John","Samos","012004",5),
                  new Aspirant("Make","Grant","012012",3.5),
                  new Student("Rosy","Amber","051004",2)];

foreach ($studentsArray as $student) {
    echo $student->getInformation();
}