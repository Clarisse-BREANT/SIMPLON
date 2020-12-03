<?php
// CREATION D'UNE CLASSE AFIN D'INSTANCIER LES ARTICLES EN FONCTION DE CELLE CI

class Enchere implements JsonSerializable {
    //private $m_id = 0;
    private $m_name = "";
    private $m_price = 0;
    private $m_time = "";
    private $m_image = "";
    private $m_desc = "";
    private $m_steptime = 0;
    private $m_stepprice = 0;

    public function __construct(/*$id,*/ $name, $price, $time, $image, $desc, $steptime, $stepprice) {
        $this->m_name      = $name;
        //$this->m_id        = $id;
        $this->m_price     = $price;
        $this->m_time      = $time;
        $this->m_image     = $image;
        $this->m_desc      = $desc;
        $this->m_steptime  = $steptime;
        $this->m_stepprice = $stepprice;
    }

    public function display() {
        include '../encheres/card.php';
    }

    public function getId() {
        return $this->m_id;
    }

    public function enchere() {
        $this->m_prix += $this->m_stepprice /100;
        $this->m_time += $this->m_steptime;
    }

    public function jsonSerialize() {
        return array(
            //"m_id"        => $this->m_id,
            "m_name"      => $this->m_name,
            "m_price"     => $this->m_price,
            "m_time"      => $this->m_time,
            "m_image"     => $this->m_image,
            "m_desc"      => $this->m_desc,
            "m_steptime"  => $this->m_steptime,
            "m_stepprice" => $this->m_stepprice
        );
    }
}




?>