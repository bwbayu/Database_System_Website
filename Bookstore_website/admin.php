<?php

require_once('function.php');

/* Panggil data */
// panggil fungsi membaca data buku
$books = readBook();
// panggil fungsi membaca data tabel kategori
$categories = readQuery('category');
// panggil fungsi membaca data tabel author
$authors = readQuery('author');
// ...

/* Jika tombol add data ditekan */
if (isset($_POST['btn-book-add'])) {
    // jalankan query tambah record baru
    $isAddSucceed = addNewBook($_POST, $_FILES);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "<script> alert('New book successfully added!'); document.location.href = 'admin.php'; </script>";
    } else {
        // jika penambahan gagal, tampilkan alert
        echo "<script> alert('Add failed!'); document.location.href = 'admin.php'; </script>";
    }
}

// mengambil id dari url
$id = $_GET['id'];

// jika id nya ada atau lebih dari nol
// maka artinya ada data yang dikirimkan
if ($id > 0) {
    // jalankan query menghapus data -> deleteBook($id)
    // simpan ke dalam variable untuk mengecek sukses atau gagalnya
    $isDeleteSucceed = deleteBook($id);
    // ...
    if ($isDeleteSucceed > 0) {
        // jika penghapusan sukses, tampilkan alert
        echo "<script>alert('Book successfully deleted!');document.location.href = 'admin.php';</script>";
        // ...
    } else {
        // jika penghapusan gagal, tampilkan alert
        echo "<script> alert('Delete failed!'); document.location.href = 'admin.php'; </script>";
        // ...
    }
}

/* jika tombol edit di tekan */
if (isset($_POST['btn-book-edit'])) {
    // ambil data id yang dikirim melalui method POST pada tombol edit
    $id = $_POST['id'];
    // ...
    // jalankan query mengedit data
    // simpan ke dalam variable untuk mengecek sukses atau gagalnya
    $isUpdateSucceed = updateBook($id, $_POST, $_FILES);
    // ...
    if ($isUpdateSucceed > 0) {
        // jika pengupdate an sukses, tampilkan alert
        echo "<script>alert('Book successfully Edited!');document.location.href = 'admin.php';</script>";
        // ...
    } else {
        // jika pengupdate an gagal, tampilkan alert
        echo "<script> alert('Edit failed!'); document.location.href = 'admin.php'; </script>";
        // ...
    }
}

if (isset($_POST['search'])){
    $keyword = "%" . $_POST['search'] . "%";
}
else{
    $keyword = "%%";
}
/* jika tombol search ditekan */
if (isset($_POST['btn-search'])) {
    // jalankan query pencarian data
    $books = searchBook($keyword);
} else {
    // jika tombol search tidak ditekan
    // jalankan query pencarian data
    $books = searchBook($keyword);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-info" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">
                <img src="assets/images/icon/gramedia-logo.png" height="40" alt="" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="index.php">User Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="admin.php">Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="author.php">Author List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="category.php">Category List</a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search book" aria-label="Search" size="40" autofocus>
                    <button class="btn btn-outline-light" type="submit" name="btn-search" id="btn-search">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="card my-5">
            <div class="card-header text-center">
                <h3 class="my-0">List of Books</h3>
            </div>
            <div class="card-body text-end">
                <button type="button" class="btn btn-info mb-3 text-white show-add-modal" data-bs-toggle="modal" data-bs-target="#formModal">Add New Data</button>
                <div class="table-responsive">
                    <table class="table table-hover table-stripped table-bordered text-center">
                        <thead class="table-info">
                            <tr>
                                <th scope="row">No.</th>
                                <th scope="row">Cover</th>
                                <th scope="row">Title</th>
                                <th scope="row">Category</th>
                                <th scope="row">Author</th>
                                <th scope="row">Publisher</th>
                                <th scope="row">Price</th>
                                <th scope="row">Synopsis</th>
                                <th scope="row">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach data buku -->
                            <?php
                            $no = 1;
                            foreach ($books as $book) :
                            ?>
                            <tr>
                                <th scope="row">
                                    <!-- tampilkan nomor -->
                                    <?= $no; ?>
                                    <!-- ... -->
                                </th>
                                <!-- tampilkan data cover buku -->
                                <td><img src="assets/images/cover/<?= $book['book_cover']?>" alt="<?= $book['book_cover']?>" width="50"></td>
                                <td>
                                    <!-- tampilkan data judul buku -->
                                    <?= $book['book_title']?>
                                </td>
                                <td>
                                    <!-- tampilkan data nama kategori -->
                                    <?= $book['category_name']?>
                                </td>
                                <td>
                                    <!-- tampilkan data nama author -->
                                    <?= $book['author_name']?>
                                </td>
                                <td>
                                    <!-- tampilkan data publisher -->
                                    <?= $book['book_publisher']?>
                                </td>
                                <td>
                                    <!-- tampilkan data harga buku -->
                                    <?= $book['book_price']?> IDR
                                </td>
                                <td>
                                    <!-- tampilkan data sinopsis buku -->
                                    <?= $book['book_synopsis']?>
                                </td>
                                <td style="font-size: 22px;">
                                    <!-- tampilkan data id buku -->
                                  <a href="#" title="Edit Data" data-bs-toggle="modal" data-bs-target="#formModal" class="show-edit-modal" data-id="<?= $book['book_id']; ?>"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;
                                  <!-- tampilkan data id buku, untuk dikirim ke url -->
                                  <a href="admin.php?id=<?= $book['book_id']?>" title="Delete Data" onclick="return confirm('Delete book?')"><i class="bi bi-trash-fill text-danger"></i></a>
                                </td>
                            </tr>
                            <!-- ... -->
                            <?php
                                $no++;
                                endforeach;
                            ?>
                            <!-- tutup foreach -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-5 py-3 bg-info text-white" id="footer">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <!-- Isi href dengan link yang mengarah ke profil instagram masing2 apabila NAMA di klik -->
                <p class="my-0">&copy; 2022 Copyright by <a href="https://www.instagram.com/bwbayu/">NAMA</a> &#9475; Powered by <a href="https://getbootstrap.com/">Bootstrap.com</a></p>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="formModalLabel">Add New Book Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="form-book" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="book-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="book-title" name="book-title" placeholder="Input book title here.." required>
                        </div>
                        <div class="mb-3">
                            <label for="book-cover" class="form-label">Cover</label>
                            <input class="form-control" type="file" id="book-cover" name="book-cover" required>
                        </div>
                        <div class="mb-3">
                            <label for="book-category">Category</label>
                            <select class="form-select" aria-label="Category" id="book-category" name="book-category" required>
                                <!-- foreach data kategori -->
                                <?php
                                  foreach ($categories as $category) :
                                ?>
                                <!-- ... -->
                                <option value="" disabled selected hidden></option>
                                <option value="<?= $category['category_id']?>"><?= $category['category_name'] ?>
                                    <!-- tampilkan data nama kategori -->
                                </option>
                                <!-- ... -->
                                <?php
                                  endforeach;
                                ?>
                                <!-- tutup foreach -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="book-author">Author</label>
                            <select class="form-select" aria-label="Author" id="book-author" name="book-author" required>
                                <!-- foreach data author -->
                                <?php
                                  foreach ($authors as $author) :
                                ?>
                                <!-- ... -->
                                <option value="" disabled selected hidden></option>
                                <option value="<?= $author['author_id']?>"><?= $author['author_name'] ?>
                                    <!-- tampilkan data nama author -->
                                </option>
                                <!-- ... -->
                                <?php
                                  endforeach;
                                ?>
                                <!-- Tutup foreach -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="book-publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="book-publisher" name="book-publisher" placeholder="Input book publisher here.." required>
                        </div>
                        <div class="mb-3">
                            <label for="book-price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="book-price" name="book-price" placeholder="Book price e.g 98000" required>
                        </div>
                        <div class="mb-3">
                            <label for="book-synopsis" class="form-label">Synopsis</label>
                            <textarea class="form-control" id="book-synopsis" name="book-synopsis" rows="5" placeholder="Input book synopsis here.." required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info text-white" name="btn-book-add" id="btn-book-add" form="form-book">Add</button>
                    <button type="submit" class="btn btn-info text-white" name="btn-book-edit" id="btn-book-edit" form="form-book">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/scripts/script.js"></script>
</body>

</html>