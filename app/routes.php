<?php


// Homepage
Route::get('/', function() {
    
    return View::make('index');

});


// List all books / search
Route::get('/list/{format?}', function($format = 'html') {

    $query = Input::get('query');

    $library = new Library();
    $library->setPath(app_path().'/database/books.json');
    $books = $library->getBooks();

    if($query) {
        $books = $library->search($query);
    }

    if($format == 'json') {
        return 'JSON Version';
    }
    elseif($format == 'pdf') {
        return 'PDF Version;';
    }
    else {
        return View::make('list')
            ->with('name','Susan')
            ->with('books', $books)
            ->with('query', $query);

    }

});


// Display the form for a new book
Route::get('/add', function() {

    return View::make('add');

});

// Process form for a new book
Route::post('/add', function() {


});


// Display the form to edit a book
Route::get('/edit/{title}', function() {


});

// Process form for a edit book
Route::post('/edit/', function() {


});


// Test route to load and output books
Route::get('/data', function() {

    $library = new Library();

    $library->setPath(app_path().'/database/books.json');
    
    $books = $library->getBooks();

    // Return the file
    echo Pre::render($books);

});




/*-------------------------------------------------------------------------------------------------
All debugging and testing routes go below here...
-------------------------------------------------------------------------------------------------*/

/* 
Test to make sure we can connect to MySQL
*/
Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});


/* 
When testing environments you can use this route to trigger an error to see what your debugging settings are doing.
*/
Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});


/* 
The best way to fill your tables with sample/test data is using Laravel's Seeding feature.
Before we get to that, though, here's a quick-and-dirty practice route that will
throw three books into the `books` table.
*/
Route::get('/seed', function() {

    # Build the raw SQL query
    $sql = "INSERT INTO books (author,title,published,cover,purchase_link) VALUES 
            ('F. Scott Fitzgerald','The Great Gatsby',1925,'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG','http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565'),
            ('Sylvia Plath','The Bell Jar',1963,'http://img1.imagesbn.com/p/9780061148514_p0_v2_s114x166.JPG','http://www.barnesandnoble.com/w/bell-jar-sylvia-plath/1100550703?ean=9780061148514'),
            ('Maya Angelou','I Know Why the Caged Bird Sings',1969,'http://img1.imagesbn.com/p/9780345514400_p0_v1_s114x166.JPG','http://www.barnesandnoble.com/w/i-know-why-the-caged-bird-sings-maya-angelou/1100392955?ean=9780345514400')
            ";

    # Run the SQL query
    echo DB::statement($sql);

    # Get all the books just to test it worked
    $books = DB::table('books')->get();

    # Print all the books
    echo Paste\Pre::render($books,'');

});















