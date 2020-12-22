<?php require_once('Database.php');

class Stasiun extends Database {

    /**
     * @return array
     */
    public function fetchAll(): array
    {
        $this->stmt = $this->dbh->query("SELECT * FROM stasiun");  
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $id_stasiun
     * @return object
     */
    public function fetch(string $id_stasiun): object
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM stasiun WHERE id_stasiun = :id_stasiun");
        $this->stmt->bindValue('id_stasiun', $id_stasiun, PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('INSERT INTO stasiun (nama_stasiun, alamat_stasiun) VALUES (:nama_stasiun, :alamat_stasiun)');
        $this->stmt->bindValue('nama_stasiun', $data['nama_stasiun'], PDO::PARAM_STR);
        $this->stmt->bindValue('alamat_stasiun', $data['alamat_stasiun'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('UPDATE stasiun SET nama_stasiun = :nama_stasiun, alamat_stasiun = :alamat_stasiun WHERE id_stasiun = :id_stasiun');
        $this->stmt->bindValue('id_stasiun', $data['id_stasiun'], PDO::PARAM_INT);
        $this->stmt->bindValue('nama_stasiun', $data['nama_stasiun'], PDO::PARAM_STR);
        $this->stmt->bindValue('alamat_stasiun', $data['alamat_stasiun'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('DELETE FROM stasiun WHERE id_stasiun = :id_stasiun');
        $this->stmt->bindValue('id_stasiun', $data['id_stasiun'], PDO::PARAM_INT);
        return $this->stmt->execute();
    }
}