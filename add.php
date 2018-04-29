
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add Item</title>
  </head>
  <body>
    <div class="container">
    	<div class="jumbotron">
    		<h1 class="display-4">Let's add an new item</h1>
    		<p class="lead">This is a Restful API Demo to Add an new item to back-end server by ajax and json</p>
    		<hr class="my-4">
    		<div class="form-group">
    			<label for="">Name:</label>
    			<input class="form-control" id ="name" placeholder="Enter Item Name" >
    			
    		</div>
            <div class="form-group">
                <label for="">Price:</label>
                <input class="form-control" id ="price" placeholder="Enter Item Price" >
                
            </div>
    		<div class="form-group">
    			<label for="">Image:</label>
    			<input type="text" class="form-control" id ="image_url" placeholder="Enter Image_url">	
    		</div>
    		<div class="form-group">
    			<label for="">Description</label>
    			<textarea type="text" class="form-control" id="description" placeholder="Enter Item Description" rows="8"></textarea>
    		</div>
    		<p class="lead">
    			<button class="btn btn-primary btn-lg" id="add_item">Add Item</button>
    		</p>
    		<h1 class="lead" id="info"></h1>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$('#add_item').click(function(){
    		var name =$('#name').val();
            var price =$('#price').val();
    		var image_url =$('#image_url').val();
    		var description =$('#description').val();
    		$.post(
    			"http://192.168.33.10/API-shop/manage/add",
    			{
    				"name":name,
                    "price":price,
    				"image_url":image_url,
    				"description":description
    			},
    			function(data){
    				$("#info").html(data.message);
    			},
    			"json"
    			);
    	});
    </script>
  </body>
</html>