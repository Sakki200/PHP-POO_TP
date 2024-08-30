<?php

class Delete extends Database
{

    public function deleteArticle($id)
    {
        $request = $this->db->prepare("DELETE FROM blog WHERE id = :id");
        $request->execute([
            'id' => $id
        ]);
    }
}
