
<?php require_once 'parts/header.php'; ?>

<section class="login d-flex justify-content-center align-items-center ">
    <div class="bg-color container d-flex justify-content-center align-items-center w-100 p-5">
    <div class="container d-flex flex-column col justify-content-center align-items-center gap-4 w-100"><h1>Welcome to <span>Recipe Vault</span></h1></div>
    <div class="container d-flex flex-column col justify-content-center align-items-center gap-4 w-100 mb-5">
    <i class="fa-solid fa-cookie-bite fa-5x fa-spin" style="color: #7d4f4f;"></i>

    <?php if(isset($_GET['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>

        <!-- //input pseudo -->

        <form action="parts/post-list.php" method="POST" class="container d-flex flex-column gap-3 w-50">
            <input type="text" placeholder="Enter your pseudo" name="username" class="form-control">
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>

        

    </div>
</div>
</section>

<?php require_once 'parts/footer.php'; ?>