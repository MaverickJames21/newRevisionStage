<?php







class Personnage{

    #LES ATTRIBUTS
    private $_force  = 100;
    private $_classe = 'plombier';
    private $_casquette = 'rouge';
    private $_vie = 100;
    private $_nom = 'unknow';


    #LES CONSTRUCTEURS

    public function __construct($nom, $force, $casquette){

        $this->_nom = $nom;
        $this->setForce($force);
        $this->setCasquette($casquette);


    }

    #LES METHODES

    public function getForce(){

        return $this->_force;


    }

    public function setForce($force) {

        $this->_force = $force;


    }

    public function getClasse(){

        return $this->_classe;

    }

    public function getCasquette(){

        return $this->_casquette;

    }


    public function setCasquette($casquette){

        $this->_casquette = $casquette;

    }

    public function getInfo(){

        return  "<p> ".$this->_nom.
                " est : " .$this->_classe.
                " il porte une casquette : " .$this->_casquette.
                " et à une force de : " .$this->_force ."</p>" ;


    }


    public function Frapper(Personnage $personnage){

        return $personnage->recevoirDegats($this->_force);

    }

    public function recevoirDegats($force){

        $this->_vie = $this->_vie - $force;

        if ($this->_vie <= 0) {
            echo "<p>" .$this->_nom." a perdu ".$force." Il est mort." ."</p>";

        }else {
            echo "<p>" .$this->_nom." a perdu ".$force." points de vie. Il lui reste ".$this->_vie." points de vie." ."</p>";
        }

    }


}

$mario = new Personnage("Mario", 20,'rouge');
$luigi = new personnage("Luigi", 30,'vert');


// $mario->setForce(10);
// $mario->setCasquette('bleu');


// AU LIEU D APPELER GETCASQUETTE/GETCLASSE/GETFORCE ON APELLE GETINFO
// echo $mario->getcasquette();
// echo $mario->getForce();
// echo $mario->getClasse();

echo $mario->getInfo();
echo $luigi->getInfo();


$mario->Frapper($luigi);
$luigi->Frapper($mario);

$luigi->Frapper($mario);
$luigi->Frapper($mario);
$luigi->Frapper($mario);
$luigi->Frapper($mario);


