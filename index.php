<?php 
    // maintain sesssion
    
    // Model Includes 
    require_once('model/book.php');
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
    // action
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';    
    
    include $rootDir.'/view/header_view.php';

    
    switch($action) {
        default: 
            $book_model = new Book();
            
            $books = $book_model->getBooks();
            include 'view/book_view.php';
            break;
    }
    
include $rootDir.'/view/footer_view.php';

?>