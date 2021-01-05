<?php require_once('Database.php');

class Tiket extends Database {

    /**
     * @return array
     */
    public function fetchAll(): array
    {
        $this->stmt = $this->dbh->query("SELECT *, stasiun1.nama_stasiun AS stasiun_berangkat, stasiun2.nama_stasiun AS stasiun_tiba FROM tiket JOIN kereta ON kereta.id_kereta = tiket.id_kereta JOIN penumpang ON penumpang.id_penumpang = tiket.id_penumpang JOIN stasiun AS stasiun1 ON tiket.id_stasiun_asal = stasiun1.id_stasiun JOIN stasiun AS stasiun2 ON tiket.id_stasiun_tujuan = stasiun2.id_stasiun");
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $id_stasiun
     */
    public function fetch(string $id_tiket)
    {
        $this->stmt = $this->dbh->prepare("SELECT *, stasiun1.nama_stasiun AS stasiun_berangkat, stasiun2.nama_stasiun AS stasiun_tiba FROM tiket JOIN kereta ON kereta.id_kereta = tiket.id_kereta JOIN penumpang ON penumpang.id_penumpang = tiket.id_penumpang JOIN stasiun AS stasiun1 ON tiket.id_stasiun_asal = stasiun1.id_stasiun JOIN stasiun AS stasiun2 ON tiket.id_stasiun_tujuan = stasiun2.id_stasiun WHERE id_tiket = :id_tiket");
        $this->stmt->bindValue('id_tiket', $id_tiket, PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // bindValue => Menghindari SQL Injection
    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('INSERT INTO tiket (id_penumpang,id_stasiun_asal,id_stasiun_tujuan,id_kereta,berangkat,tiba,durasi,harga) VALUES (:id_penumpang, :id_stasiun_asal, :id_stasiun_tujuan, :id_kereta, :berangkat, :tiba, :durasi, :harga)');
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun_asal', $data['id_stasiun_asal'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun_tujuan', $data['id_stasiun_tujuan'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_STR);
        $this->stmt->bindValue('berangkat', $data['berangkat'], PDO::PARAM_STR);
        $this->stmt->bindValue('tiba', $data['tiba'], PDO::PARAM_STR);
        $this->stmt->bindValue('durasi', $data['durasi'], PDO::PARAM_STR);
        $this->stmt->bindValue('harga', $data['harga'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('UPDATE tiket SET id_penumpang = :id_penumpang, id_stasiun_asal = :id_stasiun_asal, id_stasiun_tujuan = :id_stasiun_tujuan, id_kereta = :id_kereta, berangkat = :berangkat, tiba = :tiba, durasi = :durasi, harga = :harga  WHERE id_tiket = :id_tiket');
        $this->stmt->bindValue('id_tiket', $data['id_tiket'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun_asal', $data['id_stasiun_asal'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_stasiun_tujuan', $data['id_stasiun_tujuan'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_STR);
        $this->stmt->bindValue('berangkat', $data['berangkat'], PDO::PARAM_STR);
        $this->stmt->bindValue('tiba', $data['tiba'], PDO::PARAM_STR);
        $this->stmt->bindValue('durasi', $data['durasi'], PDO::PARAM_STR);
        $this->stmt->bindValue('harga', $data['harga'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function delete(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('DELETE FROM tiket WHERE id_tiket = :id_tiket');
        $this->stmt->bindValue('id_tiket', $data['id_tiket'], PDO::PARAM_INT);
        return $this->stmt->execute();
    }
} 