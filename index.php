<?php

require_once("./Models/Database.class.php");
require_once("./Models/Article.class.php");


$article = new Article();


if (isset($_GET['select']) && isset($_GET['search'])) {
    $option = $_GET['select'];
    $search = $_GET['search'];

    if ($search !== '') {
        switch ($option) {
            case "0":
                $researchs = $article->getByName($search);;
                break;
            case "1":
                $researchs = $article->getByContent($search);
                break;
            case "2":
                $researchs = $article->getByCategory($search);
                break;
            case "3":
                $researchs = $article->getByAuthor($search);
                break;
            case "4":
                $researchs = $article->getByPubDate($search);
                break;
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $showArticle = $article->getByID($id);
}

$page = $_GET["pg"] ?? "home";
if (!file_exists("./Views/" . $page . ".php")) {
    header("Location: index.php");
    exit();
};


include_once("./inc/header.php");
require_once("./Views/" . $page . ".php");
include_once("./inc/footer.php");
