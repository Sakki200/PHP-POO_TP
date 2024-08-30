<?php

class Article extends Database
{
    private $base = "SELECT blog.*, category.name AS category, user.name as user
                    FROM blog
                    LEFT JOIN category ON blog.category_id = category.id 
                    LEFT JOIN user ON blog.user_id = user.id ";

    public function getByID($id)
    {
        $request = $this->db->prepare($this->base . "WHERE blog.id = :id");

        $request->execute([
            'id' => $id
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getByName($name)
    {
        $request = $this->db->prepare($this->base . "WHERE title LIKE :name LIMIT 3");

        $request->execute([
            'name' => '%' . $name . '%'
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getByContent($content)
    {
        $request = $this->db->prepare($this->base . "WHERE content LIKE :content LIMIT 3");

        $request->execute([
            'content' => '%' . $content . '%'
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getAllCategories()
    {
        $request = $this->db->prepare("SELECT * FROM category");

        $request->execute();

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getByCategory($category)
    {
        $request = $this->db->prepare($this->base . "WHERE category LIKE :category LIMIT 3");

        $request->execute([
            'category' => '%' . $category . '%'
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getByAuthor($author)
    {
        $request = $this->db->prepare($this->base . "WHERE author LIKE :author LIMIT 3");

        $request->execute([
            'author' => '%' . $author . '%'
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getByPubDate($PubDate)
    {
        $request = $this->db->prepare($this->base . "WHERE publication_date LIKE :date LIMIT 3");

        $request->execute([
            'date' => '%' . $PubDate . '%'
        ]);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
