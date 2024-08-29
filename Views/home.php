<main class="home">
    <h1>MY SUPER BLOG</h1>
    <section class="finder">
        <form action="" method="get">
            <select name="select" id="select" value="<?php $_GET['select'] ?? '0' ?>">
                <option value="0">Titre article</option>
                <option value="1">Contenu</option>
                <option value="2">Category</option>
                <option value="3">Auteur</option>
                <option value="4">Date de publication</option>
            </select>
            <input type="text" name="search" value="<?php $_GET['search'] ?? '' ?>"><br>
            <button type="submit">Recherche</button>


        </form>
    </section>

    <section class="display">
        <?php
        if (isset($researchs)) {
            foreach ($researchs as $research) {
                $id = $research['id'];
                echo '<div class="card">
            <h2>' . $research['title'] . '</h2>
            <h3>Auteur : ' . $research['author'] . '</h3>
            <h3>Categorie : ' . $research['category'] . '</h3>
            <p>Résumé : <br>' . $research['resume'] . '</p>
            <a href="index.php?pg=article&id=' . $id . '"><button>ARTICLE</button></a>
            </div>';
            }
        }
        ?>
    </section>
</main>