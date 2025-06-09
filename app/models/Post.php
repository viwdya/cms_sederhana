<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT * FROM posts ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)');
        
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data) {
        $this->db->query('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id) {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function deletePost($id) {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
} 