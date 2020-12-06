<?php
// CREATION D'UNE CLASSE AFIN D'INSTANCIER LES ARTICLES EN FONCTION DE CELLE CI

class Enchere implements JsonSerializable {
    private $m_id = 0;
    private $m_name = "";
    private $m_price = 0;
    private $m_time = "";
    private $m_image = "";
    private $m_desc = "";
    private $m_steptime = 0;
    private $m_stepprice = 0;
    private $m_status = "";

    public function __construct($id, $name, $price, $time, $image, $desc, $steptime, $stepprice, $status='active') {
        $this->m_id        = $id;
        $this->m_name      = $name;
        $this->m_price     = $price;
        $this->m_time      = $time;
        $this->m_image     = $image;
        $this->m_desc      = $desc;
        $this->m_steptime  = $steptime;
        $this->m_stepprice = $stepprice;
        $this->m_status    = $status;
    }

    public function display($card) {
        include ('../encheres/' . $card . '.php');
    }

    public function getId() {
        return $this->m_id;
    }

    public function enchere() {
        $this->m_price += $this->m_stepprice /100;
        $this->m_time += $this->m_steptime;
    }

    public function getStatus() {
        return $this->m_status;
    }
    
    public function changeStatus(){
            if ($this->m_status == 'active') {
                $this->m_status = 'innactive';
            }
            elseif ($this->m_status == 'innactive') {
                $this->m_status = 'active';
            }
        }
    
    public function deleteCard(){
        if (isset($_POST['delete'])) {
            $this->m_status = 'deleted';
        }
    }

    //public function editCard(){
    //
    //}

    public function jsonSerialize() {
        return array(
            "m_id"        => $this->m_id,
            "m_name"      => $this->m_name,
            "m_price"     => $this->m_price,
            "m_time"      => $this->m_time,
            "m_image"     => $this->m_image,
            "m_desc"      => $this->m_desc,
            "m_steptime"  => $this->m_steptime,
            "m_stepprice" => $this->m_stepprice,
            "m_status"    => $this->m_status
        );
    }
}
?>