<?php require_once('Database.php');

class Penumpang extends Database {

    public function fetchAll()
    {
        $this->stmt = $this->dbh->query("SELECT *, stasiun1.nama_stasiun AS berangkat, stasiun2.nama_stasiun AS tiba FROM penumpang JOIN stasiun AS stasiun1 ON penumpang.id_stasiun_keberangkatan = stasiun1.id_stasiun JOIN stasiun AS stasiun2 ON penumpang.id_stasiun_tiba = stasiun2.id_stasiun JOIN kereta ON penumpang.id_kereta = kereta.id_kereta");
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch(string $id_penumpang)
    {
        $this->stmt = $this->dbh->prepare("SELECT *, stasiun1.nama_stasiun AS berangkat, stasiun2.nama_stasiun AS tiba FROM penumpang JOIN stasiun AS stasiun1 ON penumpang.id_stasiun_keberangkatan = stasiun1.id_stasiun JOIN stasiun AS stasiun2 ON penumpang.id_stasiun_tiba = stasiun2.id_stasiun JOIN kereta ON penumpang.id_kereta = kereta.id_kereta WHERE id_penumpang = :id_penumpang");
        $this->stmt->bindValue('id_penumpang', $id_penumpang, PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insert(array $data)
    {
        $this->stmt = $this->dbh->prepare('INSERT INTO penumpang (NIK, nama_penumpang, id_stasiun_keberangkatan, id_stasiun_tiba, id_kereta, tgl_lahir) VALUES (:NIK, :nama_penumpang, :id_stasiun_keberangkatan, :id_stasiun_tiba, :id_kereta, :tgl_lahir)');
        $this->stmt->bindValue('NIK', $data['NIK'], PDO::PARAM_INT);
        $this->stmt->bindValue('nama_penumpang', $data['nama_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun_keberangkatan', $data['id_stasiun_keberangkatan'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_stasiun_tiba', $data['id_stasiun_tiba'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_INT);
        $this->stmt->bindValue('tgl_lahir', $data['tgl_lahir'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    public function update(array $data)
    {
        $this->stmt = $this->dbh->prepare('UPDATE penumpang SET NIK = :NIK, nama_penumpang = :nama_penumpang, id_stasiun_keberangkatan = :id_stasiun_keberangkatan, id_stasiun_tiba = :id_stasiun_tiba, id_kereta = :id_kereta, tgl_lahir = :tgl_lahir WHERE id_penumpang = :id_penumpang');
        $this->stmt->bindValue('NIK', $data['NIK'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_INT);
        $this->stmt->bindValue('nama_penumpang', $data['nama_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun_keberangkatan', $data['id_stasiun_keberangkatan'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_stasiun_tiba', $data['id_stasiun_tiba'], PDO::PARAM_INT);
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