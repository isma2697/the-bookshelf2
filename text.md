
    ## utilizar la tabla user  añadir columnas necesarias para cada user 
    libros ------
    tablas libros y users  





    ##dia 23

    cree la migracion users (falta añadir los que necesito) la idea esta



    dia 03 abril 
    tengo hecho los cruds faltan las validaciones en create y edits

    fallos de auth en book 
    y
    en users la opcion admin no funciona



    borrar libros sin title y thumbnail
    php artisan books:delete

    tests 3
    php artisan test --filter BooksSeederTest
    php artisan test --filter ApiBookControllerTest
    php artisan test --filter BooksControllerTest




    run npm intall alpinejs     para panel user
    

    
    tabla users:
    id 
    name
    surname
    dni
    phone 
    is_admin
    email
    password

    tabla books:
    id 
    title
    subtitle
    publish_date
    page_count
    description
    authors
    categories
    thumbnail
    identifier


    tabla loans:
    id
    users_id
    books_id
    loan_date
    due_date
    return_data

    tabla likes:
    id 
    users_id 
    book_id

    tabla comments:
    id
    users_id
    book_id
    comments

    tabla bookmarks:
    id
    users_id
    book_id

    tablas reservas:
    id
    users_id
    book_id
    fecha_reserva
    fecha_vencimientos

    //falta las pruebas de test unitarias.
    


