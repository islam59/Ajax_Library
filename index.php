<!DOCTYPE html>
<html lang="en">
<head>
  <title>DT-Ajax Crud with rowPHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<!-------------------------------------------------------------------->  <br/>
  <h1 class="text-primary text-center">Ajax Crud with Row PHP</h1>
  <h4 class="text-center"><a href="http://dwinsteam.com/">www.DwinsTeam.com</a></h4>
  <hr/>
<!-------------------------------------------------------------------->
<!-------------------------------------------------------------------->       
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
   + Information
  </button>  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter Name !" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Name !" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" placeholder="Enter Name !" id="phone" name="phone">
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="AddInformation()" data-dismiss="modal">+ Add Information</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-------------------------------------------------------------------->    
<!--------------------------------------------------------------------> 
  <div class="" id="recordInformation">   
    <h3>Information Tables </h3>
    <div id="records_contant"></div>
  </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">

        $(document).ready(function(){
          readRecords(); 
        }); 

        //data fetch / get functions..
        function readRecords(){
          var readrecords = "readrecords"; 
          $.ajax({
            url:"Apps.php",
            type:"post",
            data:{readrecords:readrecords},
            success:function(data,status){
              $('#records_contant').html(data); 
            }
          });
        }

        //Information Add to Database..
        function AddInformation(){
            var name  = $('#name').val(); 
            var email = $('#email').val(); 
            var phone = $('#phone').val(); 

            $.ajax({
              url : 'Apps.php',
              type: 'post',
              data:{
                name : name,
                email: email, 
                phone: phone 
              },
              success: function(data,status){
                readRecords(); 
              }
            });
        }

        //data delete functions..
        function DeleteUser(deleteid){
          var conf = confirm("Are you sure to Delete ? "); 
          if(conf==true){
            $.ajax({
              url:"Apps.php",
              type:"post",
              data:{ deleteid:deleteid },
              success:function(data,status){
                readRecords(); 
              }
            });
          }
        }
  </script>
</body>
</html>