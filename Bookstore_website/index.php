<?php

// masukkan file kumpulan fungsi query
require_once('function.php');
// ..

// panggil fungsi membaca data tabel kategori
$categories = readQuery('category');
// ...
// panggil fungsi membaca data buku
$books = readBook();
// ...

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/style.css">
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
                        <a class="nav-link text-light" aria-current="page" href="admin.php">Admin Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#book">Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#category" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- foreach data kategori -->
                            <?php
                                  foreach ($categories as $category) :
                            ?>
                            <!-- ... -->
                            <!-- tampilkan data nama kategori -->
                            <li><a class="dropdown-item" href="#"><option value="<?php $category['category_name'];?>"><?php echo $category['category_name'];?></option></a></li>
                            <!-- ... -->
                            <?php
                                endforeach;
                            ?>
                            <!-- tutup foreach -->
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search book" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5 py-3">
        <div class="row" id="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/banner/banner2.jpg" class="d-block w-100" alt="Banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/banner/banner1.jpg" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/banner/banner5.jpg" class="d-block w-100" alt="Banner 5">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/banner/banner4.png" class="d-block w-100" alt="Banner 4">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/banner/banner6.png" class="d-block w-100" alt="Banner 6">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/banner/banner7.jpeg" class="d-block w-100" alt="Banner 7">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row mt-3" id="category">
            <!-- Foreach data kategori -->
            <?php
                foreach ($categories as $category) :
            ?>
            <!-- ... -->
            <div class="col gx-5 gy-3 justify-content-center">
                <div class="row justify-content-center">
                    <div class="category-wrapper text-center">
                        <img src="assets/images/icon/<?= $category['category_icon'];?>" alt="<?= $category['category_icon'];?>">
                    </div>
                    <p class="category-name text-center mt-2">
                        <!-- Tampilkan nama kategori -->
                        <?= $category['category_icon'];?>
                        <!-- ... -->
                    </p>
                </div>
            </div>
            <!-- ... -->
            <?php
                endforeach;
            ?>
            <!-- tutup foreach -->
        </div>
        <div class="row mt-3" id="book">
            <div class="row">
                <h3>See Our Books</h3>
            </div>
            <div class="row">
                <!-- Foreach data buku -->
                <?php
                    foreach ($books as $book) :
                ?>
                <!-- ... -->
                <div class="col gx-2 gy-3 justify-content-center">
                    <!-- tampilkan id buku -->
                    <a href="bookDetail.php?id=<?= $book['book_id'];?>">
                        <div class="card pt-4 px-2 book-thumbnail">
                            <div class="row justify-content-center">
                                <!-- tampilkan cover buku -->
                                <img src="assets/images/cover/<?= $book['book_cover']?>" alt="<?= $book['book_cover']?>">
                            </div>
                            <div class="card-body">
                                <p class="card-text book-title my-0">
                                    <!-- Tampilkan judul buku -->
                                    <?= $book['book_title']?>
                                </p>
                                <p class="card-text author-name">
                                    <!-- Tampilkan nama author -->
                                    <?= $book['author_name']?>
                                </p>
                                <p class="card-text book-price my-0">
                                    <!-- Tampilkan harga buku --> <?= $book['book_price']?> IDR
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ... -->
                <?php
                    endforeach;
                ?>
                <!-- Tutup foreach -->
            </div>
        </div>
    </div>
    <footer class="mt-5 py-3 bg-info text-white" id="footer">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <!-- Isi href dengan link yang mengarah ke profil instagram masing2 apabila NAMA di klik -->
                <p class="my-0">&copy; 2022 Copyright by <a href="https://instagram.com/username">NAMA</a> &#9475; Powered by <a href="https://getbootstrap.com/">Bootstrap.com</a></p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>