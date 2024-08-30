<?php

$categories = $article->getAllCategories()
?>

<main class="addTable">
    <h2>CRÉER VOTRE CATÉGORIE</h2>
    <form method="POST">
        <label for="textCate">Entrez le nom de la catégorie :</label><br>
        <input type="text" name="textCate" value="<?= htmlspecialchars($_POST['textCate'] ?? '') ?>"><br>
        <button type="submit">Ajouter Catégorie</button>
    </form>
    <h2>CRÉER VOTRE ARTICLE</h2>
    <form method="POST">
        <label for="postTitle">Entrez le titre</label><br>
        <input type="text" name="postTitle" value="<?= htmlspecialchars($_POST['postTitle'] ?? '') ?>"><br>
        <label for="postAuthor">Entrez le nom de l'auteur</label><br>
        <input type="text" name="postAuthor" value="<?= htmlspecialchars($_POST['postAuthor'] ?? '') ?>"><br>
        <label for="textAuthor">Selecitonnez la bonne catégorie</label><br>
        <select name="postCate" id="postCate" value="<?= htmlspecialchars($_POST['postCate'] ?? '') ?>">
            <?php
            if (isset($categories)) {
                foreach ($categories as $categorie) {
                    echo '<option value="' . $categorie['id'] . '">' . $categorie['name'] . '</option>';
                }
            }
            ?>
        </select><br>
        <label for="postContent">Entrez le contenu de l'article</label><br>
        <input type="text" name="postContent" value="<?= htmlspecialchars($_POST['postContent'] ?? '') ?>"><br>
        <label for="postResume">Entrez le résumé du contenu</label><br>
        <input type="text" name="postResume" value="<?= htmlspecialchars($_POST['postResume'] ?? '') ?>"><br>
        <button type="submit">Ajouter votre post</button>
    </form>
</main>