$snoopie = new Animal\Dog();
$snoopie->name = 'Snoopie';
$snoopie->persist();

$rex = new Animal\Dog();
$rex->name = 'Rex';
$rex->persist();

$dogs = Animal\Dog::findAll();
print_r($dogs);