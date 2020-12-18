<?php require_once('Database.php');

class Stasiun extends Database {

    public function fetchAll()
    {
        $this->stmt = $this->dbh->query("SELECT * FROM stasiun");  
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch(string $id_stasiun)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM stasiun WHERE id_stasiun = :id_stasiun");
        $this->stmt->bindValue('id_stasiun', $id_stasiun, PDO::PARAM_INT);
        return $this->stmt->execute();
    }

    public function insert(array $data)
    {
        $this->stmt = $this->dbh->prepare('INSERT INTO stasiun (nama_stasiun, alamat_stasiun) VALUES (:nama_stasiun, :alamat_stasiun)');
        $this->stmt->bindValue('nama_stasiun', $data['nama_stasiun'], PDO::PARAM_STR);
        $this->stmt->bindValue('alamat_stasiun', $data['alamat_stasiun'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function update(array $data)
    {
        $this->stmt = $this->dbh->prepare('UPDATE stasiun SET nama_stasiun = :nama_stasiun, alamat_stasiun = :alamat_stasiun WHERE id_stasiun = :id_stasiun');
        $this->stmt->bindValue('id_stasiun', $id_stasiun, PDO::PARAM_INT);
        $this->stmt->bindValue('nama_stasiun', $data['nama_stasiun'], PDO::PARAM_STR);
        $this->stmt->bindValue('alamat_stasiun', $data['alamat_stasiun'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function delete()
    {
        $this->stmt = $this->dbh->prepare('DELETE FROM stasiun WHERE id_stasiun = :id_stasiun');
        $this->stmt->bindValue('id_stasiun', $id_stasiun, PDO::PARAM_INT);
        return $this->stmt->execute();

    }
}