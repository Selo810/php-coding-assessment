<?php 

    //Models
    //TESTING 
    include '../model/book.php';
    
    // instantiate objects
    $book_model = new Book();
   
    $booksAPI = $book_model->getBooksAPI();
    
    
?>