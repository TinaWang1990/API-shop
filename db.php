<?php 
class DBConnection {
	protected $connection;

	public function getConnInstant(){
		if(!isset($this->connection)){
			$this->connection=new PDO('mysql:host=localhost;dbname=shop;charset=utf8mb4', 'root', 'root');
		}
		return $this->connection;
	}

	 public function getAllItemsReturnArr(){
		$this->getConnInstant();
		
		$stmt=$this->connection->query("SELECT * FROM Item");
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	
	public function getItemById($id){
	$this->getConnInstant();	
	$stmt=$this->connection->prepare("SELECT * FROM Item where id=:id");
	$stmt->execute(
		array(
			':id'=>$id
		)
	);
	$template=$stmt->fetch();

	$result=array(
		'id'=>$template['id'],
		'name'=>$template['name'],
		'price'=>$template['price'],
		'image_url'=>$template['image_url'],
		'description'=>$template['description']
	);
	return $result;
	}



	public function addItem($name,$price, $image_url,$description){
		$stmt=$this->getConnInstant()->prepare("INSERT INTO Item (name,price, image_url, description) VALUES (:name, :price, :image_url, :description)
			");
		$result=$stmt->execute(
		array(
			':name'=>$name,
			':price'=>$price,
			':image_url'=>$image_url,
			':description'=>$description
			)
		);
		return $result;
	}

}





 ?>