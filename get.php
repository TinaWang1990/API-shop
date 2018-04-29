<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tina's Shop</title>

    

  </head>
  <body>

    <div class="container" > 
      <h1 class="text-center text-primary my-5">Welcome to Tina's Shop</h1>
      <h2 id="total" class="text-center text-danger my-1"></h2>
      
      <button id="getAll">Show All Items</button>
      <div class="form-group"> </div>
                 
      <button id="getItemById">Show Item By Id</button>
      <input type="text" name='itemID'placeholder="Enter Item ID">  
       

      <div class="row">
       </div> 

      <div id="des"  style="position:fixed; left:0; top:20%; width: 15vw; background-color: white;  "></div>
    
</div>


 	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script type="text/javascript">
      $('#getAll').click(function(){
     
        $.get(
          "http://192.168.33.10/API-shop/index/shop/all",
          function(data){
            // $('.row').html(data['0'].name);
          $.each(data, function(key,value){
            var name=value.name;
            var img=value.image_url;
            var price=value.price;
            var des=value.description;

            var htmlForEachItem=
            `
             <div class="col-4">
              <div class="card" style="width:18rem;">
              <img class="card-img-top" src="`+img+`" alt="Card image cap"  data-description="`+des+`">
            <div class="card-body">
              <h5 class="card-title" style="min-height: 5rem">
                `+name+`
              </h5>

              <p class="text-right text-primary">
                <b>
                  <span class="card-price">
                    `+price+`
                   ?>
                  </span>
                  
                </b>
              </p>
              <div class="text-right">
                
                <button class="btn btn-success purchase">
                  Purchase
                </button>
              </div>
            </div>
           </div>
        </div>
            
            `;
            $('.row').append(htmlForEachItem);
          });      

          });
        });


          $('#getItemById').click(function(e){
            var id=$("input[name='itemID']").val();
            $.post(
          "http://192.168.33.10/API-shop/shop/item/"+id,
          {
            "id":id
          },
          function(data){
            var html=`
              <ul>
              <li>`+data.name+`</li>
              <li>`+data.price+`</li>
              <li>`+data.image_url+`</li>
              <li>`+data.description+`</li>

            `;
          $('.row').append(html);

          },

          "json",
          );
          });
            
          
          
         
        




    </script>




  </body>
</html>