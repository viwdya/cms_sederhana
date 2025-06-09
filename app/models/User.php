<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function register($data) {
        $this->db->query('INSERT INTO admin (username, password, photo) VALUES (:username, :password, :photo)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':photo', $data['photo']);
        return $this->db->execute();
    }
    public function login($username, $password) {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        if($row && password_verify($password, $row->password)) {
            return $row;
        } else {
            return false;
        }
    }
    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM admin WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        return $row ? true : false;
    }
    public function getUserById($id) {
        $this->db->query('SELECT * FROM admin WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
} 