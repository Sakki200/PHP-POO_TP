<?php

require_once("./Models/Database.class.php");
require_once("./Models/Article.class.php");
require_once("./Models/Table.class.php");
require_once("./Models/Delete.class.php");

$page = $_GET["pg"] ?? "home";
if (!file_exists("./Views/" . $page . ".php")) {
    header("Location: index.php");
    exit();
};

$article = new Article();
$table = new Table();
$delete = new Delete();


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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['textCate'])) {

    $table = new Table();
    $table->addCategory($_POST['textCate']);
    header("Location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['postCate']) && isset($_POST['postTitle']) && isset($_POST['postAuthor']) && isset($_POST['postContent']) && isset($_POST['postResume'])) {

    $postCate = $_POST['postCate'];
    $postTitle = $_POST['postTitle'];
    $postAuthor = $_POST['postAuthor'];
    $postContent = $_POST['postContent'];
    $postResume = $_POST['postResume'];

    $table = new Table();
    $table->addPost($postCate, $postTitle, $postAuthor, $postContent, $postResume);
    header("Location: index.php");
}

include_once("./inc/header.php");
require_once("./Views/" . $page . ".php");
include_once("./inc/footer.php");
