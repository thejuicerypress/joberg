<?php

class Order implements JsonSerializable
{
    public $note;
    public $title;
    public $taxRemoved;
    public $orderTypeId;
    
    public function jsonserialize()
    {
        return [
            'note' => $this->note,
            'orderType' => [
                'id' => $this->orderTypeId
            ],
            'title' => $this->title,
            'taxRemoved' => $this->taxRemoved
        ];   
    }
}

?>