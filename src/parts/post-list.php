<?php require_once 'parts/header.php'; ?>


<section id="userPage">
    <div class="form-recipe">
        <form action="../scripts/createPost-script.php" method="POST">
            <input type="text" class="title" placeholder="Title" name="title">
            <input type="text" class="ingredients" placeholder="Ingredients" name="ingredients">
            <input type="text" class="content" placeholder="Steps of your recipe" name="content">
            <input type="text" class="image" placeholder="url image" name="image_url">
            <input type="submit" value="Envoyer">
        </form>
    </div>

   <?php $connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// prepare request(SELECT * FROM posts)
$request = $connectDatabase->prepare("SELECT * FROM posts");
// execute request
$request->execute();

// fetch ALL data from table posts
$posts = $request->fetchAll(PDO::FETCH_ASSOC);?>

    <div class="recipe-container">
    <?php foreach($posts as $post) : ?>
        <div class="recipe-content" >
            <h1 class="title"><?php echo htmlspecialchars ($post['title']); ?></h1>
            <h2 class="ingredients"><?php echo htmlspecialchars ($post['ingredients']); ?></h2>
            <p class="content"><?php echo htmlspecialchars ($post['content']); ?></p>
            <img src="<?php echo htmlspecialchars ($post['image_url']); ?>" alt="">
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once 'parts/footer.php'; ?>