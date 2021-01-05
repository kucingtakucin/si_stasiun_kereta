<?php require_once('Database.php');

class Kereta extends Database {

    public function fetchAll()
    {
        $this->stmt = $this->dbh->query("SELECT * FROM kereta");  
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch(string $id_kereta)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM kereta WHERE id_kereta = :id_kereta");
        $this->stmt->bindValue('id_kereta', $id_kereta, PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insert(array $data)
    {
        $this->stmt = $this->dbh->prepare('INSERT INTO kereta (nama_kereta, kelas_kereta) VALUES (:nama_kereta, :kelas_kereta)');
        $this->stmt->bindValue('nama_kereta', $data['nama_kereta'], PDO::PARAM_STR);
        $this->stmt->bindValue('kelas_kereta', $data['kelas_kereta'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function update(array $data)
    {
        $this->stmt = $this->dbh->prepare('UPDATE kereta SET nama_kereta = :nama_kereta, kelas_kereta = :kelas_kereta WHERE id_kereta = :id_kereta');
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_INT);
        $this->stmt->bindValue('nama_kereta', $data['nama_kereta'], PDO::PARAM_STR);
        $this->stmt->bindValue('kelas_kereta', $data['kelas_kereta'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function delete(array $data) : bool
    {
        $this->stmt = $this->dbh->prepare('DELETE FROM kereta WHERE id_kereta = :id_kereta');
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_INT);
        return $this->stmt->execute();

    }
}