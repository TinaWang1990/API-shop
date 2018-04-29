<?php 
class shop {
	// function __construct(){
	// 	echo "list obj is created";
	// }

	// public function allMethod(){
	// 	echo'using select all method';
	// }

	
	// *@Method selectMethod
	// *@input int id input id to select
	// *@Output boolen if true select

	
	// public function itemMethod($id){
	// 	echo'using item method'.$id;
	// }
	// public function indexMethod(){
	// 	echo'using default method';
	// }

	public function indexMethod(){
		return ' index action is working';
	}
	/*
	*method:get
	*url: templates/save
	*will return:
	*json:
	*[
	*  {
	*	"id":			1,
	*	'name': 		'hello',
	*	"image_url":    "http://",
	*	"description":   "haha"	
	*	}
	*  {
	*	"id":			2,
	*	'name': 		'hello2',
	*	"image_url":    "http://",
	*	"description":   "haha2"
	*	}

	*]
	*/
	public function allMethod(){
		$conn= new DBConnection();
		$results=$conn->getAllItemsReturnArr();

		if ($results){
			return json_encode($results);
		}else{
			return json_encode(array(
				'code'=>400,
				'message'=>'No Item exists'
			));
		}
	}

	public function itemMethod($id){
		$conn= new DBConnection();
		$results=$conn->getItemById($id);
		if ($results){
			return json_encode($results);
		}else{
			return json_encode(array(
				'code'=>400,
				'message'=>'No Item exists'
			));
		}
	}


	
}



 ?>