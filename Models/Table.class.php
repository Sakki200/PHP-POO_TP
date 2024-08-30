<?php

class Table extends Database
{

    public function addCategory($name)
    {

        $request = $this->db->prepare("INSERT INTO category (name) VALUES(:name)");
        $request->execute([
            'name' => $name
        ]);
    }
    public function addPost($categoryId, $title, $author, $content, $resume)
    {
        $request = $this->db->prepare("INSERT INTO  blog (category_id, title, author, content, resume) VALUES(:category, :title, :author, :content, :resume)");
        $request->execute([
            'category' => $categoryId,
            'title' => $title,
            'author' => $author,
            'content' => $content,
            'resume' => $resume
        ]);
    }
}
