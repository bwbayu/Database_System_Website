<?php

require('config.php');

/* Baca data tabel */
function readQuery($table)
{
    global $conn;
    $query = "SELECT * FROM $table;";
    $result = mysqli_query($conn, $query);
    $records = [];
    while ($record = mysqli_fetch_assoc($result)) {
        $records[] = $record;
    }
    return $records;
}

/* Baca data tabel buku */
function readBook()
{
    global $conn;
    $query = "SELECT * FROM book JOIN author ON book.author_id=author.author_id JOIN category ON category.category_id=book.category_id ORDER BY book.book_id ASC;";
    $result = mysqli_query($conn, $query);
    $records = [];
    while ($record = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $records[] = $record;
    }
    return $records;
}

/* Baca data spesifik berdasarkan id */
function readDataSpec($search, $column, $table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE $column=$search;";
    $result = mysqli_query($conn, $query);
    $records = [];
    while ($record = mysqli_fetch_assoc($result)) {
        $records[] = $record;
    }
    return $records;
}

/* Tambah record baru */
function addNewBook($data, $file)
{
    // memanggil koneksi global
    global $conn;

    // menangkap data dari variabel $data dan $file
    $bookCoverName = htmlspecialchars($file['book-cover']['name']);
    $tempBookCoverName = htmlspecialchars($file['book-cover']['tmp_name']);
    $folder = 'assets/images/cover/' . $bookCoverName;
    $isMoved = move_uploaded_file($tempBookCoverName, $folder);
    if (!$isMoved) {
        $bookCoverName = 'default.jpg';
    }
    $bookTitle = htmlspecialchars($data['book-title']);
    $bookPrice = htmlspecialchars($data['book-price']);
    $authorId = htmlspecialchars($data['book-author']);
    $bookPublisher = htmlspecialchars($data['book-publisher']);
    $categoryId = htmlspecialchars($data['book-category']);
    $bookSynopsis = htmlspecialchars($data['book-synopsis']);

    // buat query untuk menambah data (INSERT DATA) ke tabel buku
    $query = "INSERT INTO book VALUES('', '$bookCoverName', '$bookTitle', '$bookPrice', $authorId, '$bookPublisher', '$categoryId', '$bookSynopsis');";

    // jalankan query
    $result = mysqli_query($conn, $query);
    // ...

    // mengecek baris yang terkena efek saat query dijalankan
    $isSucceed = mysqli_affected_rows($conn);

    // mengembalikan nilai sukses
    return $isSucceed;
}

/* Menghapus record */
function deleteBook($id)
{
    // memanggil koneksi global
    global $conn;

    // query menghapus data berdasarkan parameter id
    $query = "DELETE FROM book WHERE book_id=$id;";
    $result = mysqli_query($conn, $query);
    // perhatikan fungsi tambah data
    // jalankan fungsi untuk mengetahui baris yang terkena efek (mysqli_affected_rows)
    // simpan ke dalam variabel untuk menentukan sukses atau tidaknya
    $isSucceed = mysqli_affected_rows($conn);
    // ...

    // kembalikan nilai variabel sukses
    return $isSucceed;
    // ...
}

/* Mengedit record */
function updateBook($id, $data, $file)
{
    // panggil koneksi global
    global $conn;
    // ...

    // tangkap data dari variabel $data dan $file
    // sama seperti pada fungsi tambah
    $bookCoverName = htmlspecialchars($file['book-cover']['name']);
    $tempBookCoverName = htmlspecialchars($file['book-cover']['tmp_name']);
    $folder = 'assets/images/cover/' . $bookCoverName;
    $isMoved = move_uploaded_file($tempBookCoverName, $folder);
    if (!$isMoved) {
        $bookCoverName = 'default.jpg';
    }
    $bookTitle = htmlspecialchars($data['book-title']);
    $bookPrice = htmlspecialchars($data['book-price']);
    $authorId = htmlspecialchars($data['book-author']);
    $bookPublisher = htmlspecialchars($data['book-publisher']);
    $categoryId = htmlspecialchars($data['book-category']);
    $bookSynopsis = htmlspecialchars($data['book-synopsis']);
    // ...

    // query update
    $query = "UPDATE book SET 
                book_cover='$bookCoverName',
                book_title='$bookTitle',
                book_price=$bookPrice,
                author_id=$authorId,
                book_publisher='$bookPublisher',
                category_id=$categoryId,
                book_synopsis='$bookSynopsis'
            WHERE book_id=$id;";
    // uncomment query di atas

    // jalankan query update
    $result = mysqli_query($conn, $query);
    // ...

    // perhatikan fungsi tambah data
    // jalankan fungsi untuk mengetahui baris yang terkena efek (mysqli_affected_rows)
    // simpan ke dalam variabel untuk menentukan sukses atau tidaknya
    $isSucceed = mysqli_affected_rows($conn);
    // ...

    // kembalikan nilai variabel sukses
    return $isSucceed;
    // ...
}

/* Mencari data */
function searchBook($keyword)
{
    // panggil koneksi global
    global $conn;
    // buat query search buku berdasarkan judul/nama author/publisher/harga
    $query = "SELECT * FROM book JOIN author ON book.author_id=author.author_id JOIN category ON category.category_id=book.category_id WHERE book_title LIKE '$keyword' OR author_name LIKE '$keyword' OR book_publisher LIKE '$keyword' OR book_price LIKE '$keyword';";
    // $query = "SELECT * FROM book WHERE book_title LIKE '$keyword' OR book_publisher LIKE '$keyword' OR book_price LIKE '$keyword'";
    // jalankan query, tangkap ke variabel result
    $result = mysqli_query($conn, $query);
    // buat array records untuk menyimpan data
    $records = [];
    // fetch variabel result, masukkan datanya ke array records dengan while loop
    while ($record = mysqli_fetch_assoc($result)) {
        $records[] = $record;
    }
    // kembalikan variabel records
    return $records;
}