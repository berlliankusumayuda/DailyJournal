<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    /* Tombol carousel */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(29%) sepia(37%) saturate(1614%) hue-rotate(308deg) brightness(93%) contrast(94%);
    }

    button {
        background-color: #F08080; /* Light Coral */
        color: #fff;
        border: none;
    }

    button:hover {
        color: #36454F; /* Charcoal Grey */
    }
    
    #Gallery .carousel-item img {
        max-width: 100%; /* Atur ukuran gambar */
        height: auto;
    }
    #Gallery .carousel {
        max-width: 50%; /* Atur ukuran keseluruhan carousel */
        margin: 0 auto; /* Tengah-tengahkan carousel */
    }
</style>

</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #B0E0E6;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#hero">My <span class="text-dark">Daily Journal</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" aria-current="page" href="#hero" style="color: #36454F;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#Article" style="color: #36454F;">Article</a>
                    </li>
                    <li class="nav-item fw-bold">
                        <a class="nav-link" href="#Gallery" style="color: #36454F;">Gallery</a>
                    </li>
                    <li class="nav-item fw-bold">
                        <a class="nav-link" href="login.php" style="color: #36454F;">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- header end -->

    <section id="hero" class="py-5" style="background-color: #FFF0F5;">
    <div class="container">
        <div class="d-flex vh-100 row align-items-center justify-content-center">
            <!-- Gambar Hero -->
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <img src="img/LogoHacker.jpg" class="img-fluid rounded-4 shadow-lg" alt="Hero Image" style="max-width: 80%; height: auto;">
            </div>
            <!-- Teks Hero -->
            <div class="col-md-6 text-center text-md-start mt-4 mt-md-0">
                <h1 class="fw-bold display-3 mb-3" style="color: #36454F;">Welcome to My Daily Journal</h1>
                <a href="login.php" class="btn btn-primary px-4 py-2 fs-5">Login Here</a> <!-- Tombol Login -->
            </div>
        </div>
    </div>
</section>



    <!-- article begin -->
    <section id="Article" class="text-center p-5" style="background-color: #FFF0F5;">
    <div class="container">
        <h1 class="fw-bold display-6 pb-3" style="color: #36454F;">Article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 

        while($row = $hasil->fetch_assoc()){
        ?>
            <div class="col">
            <div class="card h-100">
                <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                <div class="card-body">
                <h5 class="card-title"><?= $row["judul"]?></h5>
                <p class="card-text">
                    <?= $row["isi"]?>
                </p>
                </div>
                <div class="card-footer">
                <small class="text-body-secondary">
                    <?= $row["tanggal"]?>
                </small>
                </div>
            </div>
            </div>
        <?php
        }
        ?> 
        </div>
    </div>
    </section>
    <!-- article end -->

    <!-- section gallery-->
    <section id="Gallery" class="text-center p-5" style="background-color: #FFF0F5;">
        <div class="container">
            <h2 class="fw-bold display-6" style="color: #36454F;">Gallery</h2>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php
                $active = true;
                $sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
                $hasil2 = $conn->query($sql2);

                while($row = $hasil2->fetch_assoc()){
                    ?>
                    <div class="carousel-item<?= $active ? ' active' : '' ?>">
                      <img src="img/<?= $row['gambar'] ?>" class="d-block mx-auto w-75" alt="<?= $row['judul'] ?>">
                      <div class="carousel-caption d-none d-md-block">
                        <h5><?= $row['judul'] ?></h5>
                        <p><?= $row['tanggal'] ?></p>
                      </div>
                    </div>
                  <?php
                    $active = false;
                }
            ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="video text-center p-5">
                <h2 class="fw-bold display-6" style="color: #36454F;">Vidio</h2>
                <iframe width="90%" height="500" src="https://www.youtube.com/embed/AU8QAxfzqsA?si=6AcCQUS2LxxvWvrQ" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <!-- Gallery end -->

    <!-- footer -->
    <footer class="text-center p-2" style="background-color: #B0E0E6;">
        <div class="social-icons">
            <a href="https://www.instagram.com/berlian_ksyd" class="h2 p-2" target="_blank" style="color: #36454F;">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://twitter.com" class="h2 p-2" target="_blank" style="color: #36454F;">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://wa.me/+6285972531910" class="h2 p-2" target="_blank" style="color: #36454F;">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
        <div class="copyright mt-2" style="color: #36454F;">
            <p>Copyright &copy; 2025 Berlian Kusumayuda. All Rights Reserved</p>
        </div>
    </footer>
    <!-- footer end -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>