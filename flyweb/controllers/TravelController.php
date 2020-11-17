<?php

namespace controllers;

use model\Travel;

class TravelController extends BaseController {

    public $travel;

    public function __construct(int $travelId) {
        parent::__construct();
        $this->getTravelDetail($travelId);
    }

    private function getTravelDetail(int $travelId) {
        $query = 'SELECT * FROM Viaggio WHERE ID_Viaggio = ?;';
        $this->travel = new Travel($this->db->runQuery($query, $travelId)[0]);
    }

    public function getTravelReviewsList() {
        $query = 'SELECT Recensione.* FROM Recensione,RecensioneViaggio WHERE RecensioneViaggio.ID_Viaggio = ? AND Recensione.ID_Recensione= RecensioneViaggio.ID_Recensione ORDER BY Recensione.Data DESC;';
        return $this->db->runQuery($query, $this->travel->id_viaggio);
    }

    public function haveReviews(){
        $query = 'SELECT Recensione.* FROM Recensione,RecensioneViaggio WHERE RecensioneViaggio.ID_Viaggio = ? AND Recensione.ID_Recensione= RecensioneViaggio.ID_Recensione;';
        return ! empty($this->db->runQuery($query, $this->travel->id_viaggio));
    }

    public function haveModReview(){
        $query = 'SELECT Recensione.* FROM Recensione,RecensioneViaggio WHERE RecensioneViaggio.ID_Viaggio = ? AND Recensione.ID_Recensione= RecensioneViaggio.ID_Recensione AND Recensione.Mod=1;';
        return ! empty($this->db->runQuery($query, $this->travel->id_viaggio));
    }
}