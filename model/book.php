<?php 
    include 'db.php';
    
    class Book {
        // get all books
        function getBooks(){
            global $dbh;
            $query = 'SELECT * FROM books';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
         // get all books API
        function getBooksAPI(){
            global $dbh;
            $query = 'SELECT * FROM books';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            //$result = mysql_fetch_row($result);
            
            echo  json_encode($result);
        }
        
        
        //work
        function addBook($book_name, $book_description){
            global $dbh;
                   $query = 'INSERT INTO books(book_name, book_description) VALUES';
                   $query .= "('$book_name', '$book_description')";
                   $dbh->exec($query);
        }
        
        //remove book
        function deleteBook($book_id){
            global $dbh;
            $query = "DELETE FROM books WHERE id = '$book_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        // get one book
        function getOneBook($book_id){
            global $dbh;
            $query = "SELECT * FROM books WHERE id = ".intval($book_id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
        // Edit book
        function editBook($book_id, $book_name, $book_description){
            global $dbh;
            $query = "UPDATE books 
                    SET book_name = '$book_name', book_description = '$book_description' 
                    WHERE id = '$book_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
    }
?>