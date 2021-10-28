<?php 

    class Products {
        public $title;
        public $description;
        public $price;
        public $category;
        public $amount;
        

        protected function __construct($title, $description, $price, $category, $amount){
            $this->title = $title;
            $this->description = $description;
            $this->price = $price;
            $this->category = $category;
            $this->amount = $amount;
        }

        protected function prezzoCadauno() {
            $prezzoCad = $this->price / $this->amount; 
            return $prezzoCad;
        }    
        
    }

    class Penna extends Products {

        public $colore;
        public $tipoPunta;
        public $spessorePunta;

        /**
        * Crea una penna
        *
        * @param string $colore Colore della penna.
        * @param string $tipoPunta tipo di punta della penna (a sfera, rollerball pen, stilografica, pennarello e penna a punta ceramica)
        * @param integer $spessorePunta spessore della punta
        * @param string $title nome della penna
        * @param boolean $description caratteristiche della penna e descrizione
        * @param boolean $price prezzo della penna
        * @param boolean $category categoria del prodotto penna
        * @param boolean $amount quantità di penne vendute
        */
    

        public function __construct($colore, $tipoPunta, $spessorePunta, $title, $description, $price, $category, $amount)
        {
            $this->colore = $colore;
            $this->tipoPunta = $tipoPunta;
            $this->spessorePunta = $spessorePunta;
            parent::__construct($title, $description, $price, $category, $amount);
        }

        public function getColore() {
            if ($this->colore == "rosso") {
                return $this->colore . " è il colore scelto";
            }
        }

        public function prezzoCadauno(){
            $prezzoCad = $this->price / $this->amount; 
            return "Il prezzo cadauno in euro è di: " . $prezzoCad ;
        }
    }



    class Customers {
        protected $name;
        protected $surname;
        protected $email;
        protected $cell;
        protected $payMethod;
        protected $adressShopping;
        protected $billingAdress;

        protected function __construct($name, $surname, $email, $cell, $payMethod, $billingAdress,  $adressShopping) {
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
            $this->cell = $cell;
            $this->payMethod = $payMethod;
            $this->billingAdress = $billingAdress;
            $this->adressShopping = $adressShopping;
        }

        public function addAdress(){
            if($this->billingAdress == $this->adressShopping){
                return $this->billingAdress;
            }
        }
    }

    class UtentePremium extends Customers {
        protected $typeUtent;
        protected $sconto = 0;

        /**
        * Crea un utente premium
        *
        * @param string $typeUtent array che mi indica il tipo di utente: premium o normale.
        * @param string $sconto tipo di sconto applicato all'tente premium
        * @param string $title nome della penna
        * @param boolean $description caratteristiche della penna e descrizione
        * @param boolean $price prezzo della penna
        * @param boolean $category categoria del prodotto penna
        * @param boolean $amount quantità di penne vendute
        *
        */

        public function __construct($typeUtent, $sconto = 0, $name, $surname, $email, $cell, $payMethod, $billingAdress, $adressShopping) {
            $this->typeUtent = $typeUtent;
            $this->sconto = $sconto;
            parent::__construct($name, $surname, $email, $cell, $payMethod, $billingAdress,  $adressShopping);
        }

        protected function setSconto(){
            if ($this->typeUtent == "premium") {
                $this->sconto = 10;
            }
        }

        public function getSconto(){
            return $this->sconto;
        }
    }

    
    $pennaRossa = new Penna("rosso", "a sfera", "1 mm", "penna rossa", "penna tratto deciso", 10, "cancelleria", 10);
    var_dump($pennaRossa);
    echo($pennaRossa->getColore() . "<br/>");
    echo($pennaRossa->prezzoCadauno() . "<br/>");
    $utenteUno = new UtentePremium("premium", "10", "paolo", "spitilli", "paolo@email.it", 22222222, "carta di credito", "via roma 54, roma, 00000", "via roma 54, roma, 00000");
    echo($utenteUno->addAdress() . "<br/>");
    echo($utenteUno->getSconto() . "<br/>");
   
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>

    <h1>Prodotto scelto:</h1>
    
    <h2> Prodotto: <?= $pennaRossa->title ?></h2>
    <h3> Colore: <?= $pennaRossa->colore; ?> </h3> 
    <h4> Prezzo:  <?= $pennaRossa->price; ?> Euro;  </h4>
    <p> Descrizione:  <?= $pennaRossa->description; ?>   </p>
    <p> Quantità:  <?= $pennaRossa->amount; ?>  </p>
    <p> Prezzo/Cadauno:  <?= $pennaRossa->prezzoCadauno(); ?> Euro </p>
     
    
</body>
</html>


