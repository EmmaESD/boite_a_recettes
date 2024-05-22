<?php
session_start();
if(!isset($_POST['username'])&&!isset($_SESSION['username'])){
    header('Location: ./index.php?error=Veuillez entrer un pseudo');
} if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
};
?>

<?php require_once 'header.php'; ?>



<div class="recipe-page">
    <div class="content">
        <div class="disconnect-container">
            <button class="btn-disconnect"><a href="../scripts/disconnect-script.php">Disconnect</a></button>
        </div>
        <div class="title-btn">
            <h1>Your Recipes <?php echo $_SESSION['username'];?></h1>
            <button><a href="./create-recipe.php">Create your recipe</a></button>
        </div>
        <div class="recipes-container">
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

<?php foreach ($recipes as $recipe): 
$ingredientsList = explode(";", $recipe["ingredients"]);
$stepsList = explode(";", $recipe["steps"]);
?>
            <div class="card-recipe" >
                <div class="title-image-container">
                    <img src="<?php echo $recipe['image_url']; ?>" alt="">
                    <h2 class="title"><?php echo $recipe['name']; ?></h1>
                    
                </div>
                <div class="content-card">
                    <div class="ingredients-container">
                        <h3>Ingredients</h3>
                        <p class="ingredients"><?php echo $recipe['ingredients']; ?></p>
                    </div>
                    <div class="steps-container">
                        <h3>Steps</h3>
                        <p class="content"><?php echo $recipe['steps']; ?></p>
                    </div>
                </div>
                <div class="btn-container">
                <div class="btn"><a href="../scripts/delete-script.php?id=<?php echo htmlspecialchars ($recipe["id"]); ?>"><i class="fa-regular fa-trash-can"></i></a></div>
                <div class="btn"><a href="../scripts/cloneRecipe-script.php?id=<?php echo htmlspecialchars ($recipe["id"]); ?>"><i class="fa-regular fa-copy"></i></a></div>
                </div>
                
            </div>
            <?php endforeach ?>
       
        </div> 
        
    </div>
</div>


<?php require_once 'footer.php'; ?>