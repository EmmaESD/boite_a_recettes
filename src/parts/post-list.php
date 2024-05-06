<?php
session_start();
if(!isset($_POST['username'])&&!isset($_SESSION['username'])){
    header('Location: ./index.php?error=Veuillez entrer un pseudo');
} if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
};
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
<?php
    

     //script to get recipes
  

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// prepare request(SELECT * FROM posts)
$request = $connectDatabase->prepare("SELECT * FROM recipes WHERE author = :username");
// binParam
$request->bindParam(":username", $_SESSION['username']);
// execute request
$request->execute();
// fetch ALL data from table posts
$recipes = $request->fetchAll(PDO::FETCH_ASSOC);?>

<?php foreach ($recipes as $recipe): 

$ingredientsList = explode(";", $recipe["ingredients"]);
$stepsList = explode(";", $recipe["steps"]);
?>
<!-- 

//show recipes -->
    <div class="recipe-container">
        
        <div class="recipe-content" >
            <h1 class="title"><?php echo $recipe['name']; ?></h1>
            <h2 class="ingredients"><?php echo $recipe['ingredients']; ?></h2>
            <p class="content"><?php echo $recipe['steps']; ?></p>
            <img src="<?php echo $recipe['image_url']; ?>" alt="">
            <p>edit by <?php echo $_SESSION['username'];?></p>
            <button><a href="../scripts/delete-script.php?id=<?php echo htmlspecialchars ($recipe["id"]); ?>">Delete</a></button>
        </div>
        <?php endforeach ?>
    </div>
</section>

<?php require_once 'footer.php'; ?>