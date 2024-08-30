<?php

$delete->deleteArticle($_GET['id']);
header("Location: index.php");
