<?php require_once 'header.php'; ?>
    <div class="create-page">
        <div class="content-create">
            <div class="container-return">
                <button class="submit"><a href="./post-list.php">Return</a></button>
            </div>
                <div class="form-title-container">
                    <h2>Create your recipe</h2>
                    <form action="../scripts/createPost-script.php" method="POST">
                        <input type="text" class="title" placeholder="Title" name="name">
                        <textarea type="text" class="ingredients" placeholder="Ingredients" name="ingredients"></textarea>
                        <textarea type="text" class="content" placeholder="Steps of your recipe" name="steps"></textarea>
                        <input type="text" class="image" placeholder="url image" name="image_url">
                        <input type="submit" value="Envoyer" class="submit">
                    </form>
                </div> 
        </div>
    </div>

   