<?php
// connect to a database
class Connect
{
    public $pdo = NULL;
    public function __construct()
    {
        $this->pdo = new PDO('sqlite:' . __DIR__ . '/data/users.db');
    }
    /**
     * Saves to the database
     * @param array : $data
     * @return bool
     */
    public function put(array $data) : bool
    {
        $sql = 'INSERT INTO users (first_name,last_name,dob) VALUES (:first_name,:last_name,:dob);';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }
    /**
     * Reads the database
     * @return array
     */
    public function get() : array
    {
        $stmt = $this->pdo->query('SELECT * FROM users ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
