<?php // app/Models/Post.php
class Post extends Model
{
    protected $table = 'blogs';

    public function all()
    {
        $stmt = $this->db()->query('SELECT id, title, body FROM ' . $this->table . ' ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db()->prepare('SELECT id, title, body FROM ' . $this->table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($title, $body)
    {
        $stmt = $this->db()->prepare('INSERT INTO ' . $this->table . ' (title, body) VALUES (:title, :body)');
        $stmt->execute(['title' => $title, 'body' => $body]);
        return $this->db()->lastInsertId();
    }
}
