<?php 

    //Models
    //TESTING 
    include '../model/book.php';
    
    // Set action for incoming requests (no curly braces for optomization)
    if ( isset($_GET['action']) ) $action = $_GET['action']; 
    else if( isset($_POST['action']) ) $action = $_POST['action'];
    
    include '../view/header_view.php';
    
    // instantiate objects
    $book_model = new Book();
    
    // Switch statement for possible requests
    switch ($action) {
        
        case 'books' :
            $books = $book_model->getBooks();
            include '../view/book_view.php';
            break;  
       
        // Works
        case 'delete_book':
            $id = $_POST['book_id'];
            
            $book_model->deleteBook($id);
             
            $books = $book_model->getBooks();
            include '../view/book_view.php';
            break;
            
          
        // Add Book 
        case 'add_book':
            $book_name =  $_POST['book_name'];
            $book_description = $_POST['book_description'];
            
            // need to add if statement 
        	$book_model->addBook($book_name, $book_description);
        	
        	 // display the books
	        header('Location: .?action=books');
        	
            break;
            
            default:
                 
            $books = $book_model->getBooks();
            include '../view/book_view.php';
            break;
                
    }
    
    
    include '../view/footer_view.php';
    //$book_model->addBook('php', 'description');
    
?>