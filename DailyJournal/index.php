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
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold" href="#Home">Daily Journal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#Article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#Gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- header end -->

    <!-- section hero-->
    <section id="hero" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="gambar/barcelonahero.jpeg" class="img-fluid" alt="Hero Image">
                </div>
                <div class="col-md-6 text-md-start">
                    <h1 class="fw-bold display-3">Barcelona</h1>
                    <p class="lead">Fútbol Club Barcelona, dikenal sebagai Barça, adalah klub sepak bola profesional dari Barcelona, Spanyol, yang bermain di La Liga.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->

    <!-- article begin -->
    <section id="Article" class="text-center p-5">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">Article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 

        while($row = $hasil->fetch_assoc()){
        ?>
            <div class="col">
            <div class="card h-100">
                <img src="gambar/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
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
    <section id="Gallery" class="text-center p-5">
        <div class="container">
            <h2 class="fw-bold display-6">Gallery</h2>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php
                $active = true;
                $sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
                $hasil2 = $conn->query($sql2);

                while($row = $hasil2->fetch_assoc()){
                    ?>
                    <div class="carousel-item<?= $active ? ' active' : '' ?>">
                      <img src="gambar/<?= $row['gambar'] ?>" class="d-block mx-auto w-75" alt="<?= $row['judul'] ?>">
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
            <div class="video text-center mt-5">
                <h2><b>Video</b></h2>
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/AU8QAxfzqsA?si=6AcCQUS2LxxvWvrQ" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <!-- Gallery end -->

    <!-- footer -->
    <footer class="text-center p-2 bg-primary">
        <div class="social-icons">
            <a href="https://www.instagram.com/berlian_ksyd" class="h2 p-2 text-dark" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://twitter.com" class="h2 p-2 text-dark" target="_blank">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://wa.me/+6285972531910" class="h2 p-2 text-dark" target="_blank">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
        <div class="copyright text-dark mt-2">
            <p>&copy; 2024 Daily Journal @Berlian Kusumayuda.</p>
        </div>
    </footer>
    <!-- footer end -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
