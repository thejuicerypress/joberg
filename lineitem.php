
class LineItem implements JsonSerializable
{
    public $id;
    public $price;
        
	    public function jsonserialize()
	        {
		        return [
			            'item' => [
				                    'id' => $this->id
						          ]
						'price' => $this->price
						];   
			}
}
?>
