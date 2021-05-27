<?php
include './layouts/header.php';
?>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4>Encuentra Nuestras Comidas</h4>
                <h2>FastFoodSpartan Restaurant</h2>
                <p>Servicio delivery de la comida que deseas</p>
                <div class="primary-button">
                    <a href="back-end/indexCarta.php" data-id="book-table">Ordenar Ahora</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cook-delecious">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="first-image">
                    <img src="img/cook_01.jpg" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="cook-content">
                    <h4>Comida Deliciosa</h4>
                    <div class="contact-content">
                        <span>Puedes Llamarnos:</span>
                        <h6>+51 917 078 016</h6>
                    </div>
                    <span>O</span>
                    <div class="primary-white-button">
                        <a href="back-end/indexCarta.php" data-id="book-table">Ordena Ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="second-image">
                    <img src="img/cook_02.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './layouts/footer.php'; ?>