

<?php if($_POST['username']){
    session_start();
    $_SESSION['username'] = $_POST['username'];
    header('Location: ../userPage.php?success=Bienvenue');  
} else {
    header('Location: ../index.php?error=Veuillez entrer un pseudo');
}
        ?>

 
<?php require_once 'header.php'; ?>

<section id="userPage">
    <div class="form-recipe">
        <form action="../scripts/createPost-script.php" method="POST">
            <input type="text" class="title" placeholder="Title" name="name">
            <input type="text" class="ingredients" placeholder="Ingredients" name="ingredients">
            <input type="text" class="content" placeholder="Steps of your recipe" name="steps">
            <input type="text" class="image" placeholder="url image" name="image_url">
            <input type="submit" value="Envoyer">
        </form>
    </div>

    

    <!-- //script to get recipes -->
   <?php 

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// prepare request(SELECT * FROM posts)
$request = $connectDatabase->prepare("SELECT * FROM recipes WHERE author = :username");
// binParam
$request->bindParam(":username", $_SESSION['username']);
// execute request
$request->execute();
// fetch ALL data from table posts
$recipes = $request->fetchAll(PDO::FETCH_ASSOC);?>
<!-- 

//show recipes -->
    <div class="recipe-container">
    <?php foreach($recipes as $recipe) :?>
        
        <div class="recipe-content" >
            <h1 class="title"><?php echo $recipe['name']; ?></h1>
            <h2 class="ingredients"><?php echo $recipe['ingredients']; ?></h2>
            <p class="content"><?php echo $recipe['steps']; ?></p>
            <img src="<?php echo $recipe['image_url']; ?>" alt="">
            <p>edit by <?php echo $_POST['username']?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once 'footer.php'; ?>