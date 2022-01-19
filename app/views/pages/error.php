<?php require_once APP_ROOT . "/views/includes/header.php" ?>
<div class="error-page">
    <div class="error-main">
        <p>OOPS!</p> 
    </div>
    <div class="error-msg">

        <pre>4 0 4 - P A G E   N O T   F O U N D</pre> 
    </div>
    <div class="error-desc">
        <p>The page you are looking for might had been removed , had its name <br>changed or temporarily unavailable.</p>
    </div>
    <div class="error-button">
    <a href="<?= URL_ROOT; ?>/pages/index" id="home-page" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">GO TO HOMEPAGE</a>
    </div>
</div>

<?php require_once APP_ROOT . "/views/includes/footer.php" ?>

