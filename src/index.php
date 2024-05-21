<?php require_once 'parts/header.php'; ?>

<section class="homepage">
    <div class="content-homepage">
        <div class="pseudo-input-container">
            <h1>Welcome to <span>Savory Swap</span></h1>
            <div class="pseudo-btn-container">
                <form action="parts/post-list.php" method="POST">
                    <input type="text" placeholder="Enter your pseudo" name="username" class="pseudo">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div class="image-home"></div>
    </div>
</section>

<?php require_once 'parts/footer.php'; ?>