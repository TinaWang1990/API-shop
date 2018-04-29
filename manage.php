<?php 
class manage {
	// function __construct(){
	// 	echo "list obj is created";
	// }

	// public function addMethod(){
	// 	echo'using add method';
	// }

	// public function indexMethod(){
	// 	echo'using default method';
	// }

	public function indexMethod(){
		return 'template index action is working';
	}
	/*
	*method: post
	*url: templates/save
	*request body formate
	*req-post:
	*
	*{
	*"name":    "item 1",
	*"image_url":"http//",
	*"description":  "hahah"
	*}
	*
	*will  return format;
	*json:
	*{
	*"code":200,
	*"message":"success"
	*}
	*/
	public function addMethod(){
		$name=$_POST['name'];
		$image_url=$_POST['image_url'];
		$description=$_POST['description'];

		$conn= new DBConnection();
		$result=$conn->addItem($name,$image_url,$description);
		if($result){
			return json_encode(array(
				"code"=>200,
				"message"=>"Item add successfully"
			));
		}else{
			return json_encode(array(
				"code"=>500,
				"message"=>"Item add failed"
			));
		}
	}
	 
	
}



 ?>