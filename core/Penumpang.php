<?php require_once('Database.php');

class Penumpang extends Database {

    public function fetchAll()
    {
        $this->stmt = $this->dbh->query("SELECT * FROM penumpang JOIN stasiun ON penumpang.id_stasiun = stasiun.id_stasiun JOIN kereta ON penumpang.id_kereta = kereta.id_kereta");  
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch(string $id_penumpang)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM penumpang WHERE id_penumpang = :id_penumpang");
        $this->stmt->bindValue('id_penumpang', $id_penumpang, PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insert(array $data)
    {
        $this->stmt = $this->dbh->prepare('INSERT INTO penumpang (NIK, nama_penumpang, id_stasiun, id_kereta, tgl_lahir) VALUES (:NIK, :nama_penumpang, :id_stasiun, :id_kereta, :tgl_lahir)');
        $this->stmt->bindValue('NIK', $data['NIK'], PDO::PARAM_INT);
        $this->stmt->bindValue('nama_penumpang', $data['nama_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun', $data['id_stasiun'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_INT);
        $this->stmt->bindValue('tgl_lahir', $data['tgl_lahir'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function update(array $data)
    {
        $this->stmt = $this->dbh->prepare('UPDATE penumpang SET NIK = :NIK, nama_penumpang = :nama_penumpang, id_stasiun = :id_stasiun, id_kereta = :id_kereta, tgl_lahir = :tgl_lahir WHERE id_penumpang = :id_penumpang');
        $this->stmt->bindValue('NIK', $data['NIK'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_INT);
        $this->stmt->bindValue('nama_penumpang', $data['nama_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun', $data['id_stasiun'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_INT);
        $this->stmt->bindValue('tgl_lahir', $data['tgl_lahir'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function delete(array $data)
    {
        $this->stmt = $this->dbh->prepare('DELETE FROM penumpang WHERE id_penumpang = :id_penumpang');
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_INT);
        return $this->stmt->execute();

    }
}