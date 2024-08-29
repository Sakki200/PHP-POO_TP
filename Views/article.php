<?php foreach ($showArticle as $article) {
    echo ('
    <main class="showArticle">
    <h1>' . $article['title'] . '</h1>
    <h2>' . ucfirst($article['category']) . ' de ' . $article['author'] . '</h2>
    <h3>Publié le ' . $article['publication_date'] . '</h3>
    <p>' . $article['content'] . '</p>
    </main>');
}
