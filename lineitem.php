
class LineItem implements JsonSerializable
{
    public $id;
        
	    public function jsonserialize()
	        {
		        return [
			            'item' => [
				                    'id' => $this->id
						          ]
						];   
			}
}
?>
