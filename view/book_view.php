<html><body>

<div class="container">
    <form method="POST" action="../controller/index.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_book" />
        
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="book_name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="book_description">Description</label>
            <textarea name="book_description" class="form-control" required></textarea>
        </div>    
    
        <input class="btn btn-success" type="submit" value="Submit"/>
    </form> 
    
    
    
    
    <div id="output-container">
    <h2>PHP Book Listing</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Book Description</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $b) : ?>
            <tr>
                <td><?= $b['book_name'] ?></td>
                <td><?= $b['book_description'] ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_book">
                        <input type="hidden" name="book_id" value="<?= $b['id'] ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
            
            
        </tbody>
    </table>
    
</div>
<script src=”http://code.jquery.com/jquery-3.1.1.min.js”></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>   


<hr>
 <!-------------------------------------------------------------------------
  1) Create some html content that can be accessed by jquery
  -------------------------------------------------------------------------->
  <h2> AJAX jQuery Request </h2>
  <h3>Output: </h3>
  <div class="output"></div>
  <div class="output0"></div>
  <div class="output1"></div>
  <div class="output2"></div>
  <div class="output3"></div>
  <div class="output4"></div>
  <div class="output5"></div>

  <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX ../controller/ajaxController.php
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: '../controller/ajaxController.php',                          
      data: "",                       
                                       
      dataType: 'json',               
      success: function(data)          //on recieve of reply
      {
        
          for(var i = 0; i < 5; i++) {
              
              $('.output' + i).html("<b>Book Name: </b>"+data[i]["book_name"] + "<br>" + "<b> Book Description: </b>"+data[i]["book_description"] + "<hr>" );
              
            }
          
      } 
    });
  }); 

  </script>

</div>
</body>
</html>