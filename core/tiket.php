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
        $this->stmt = $this->dbh->prepare('INSERT INTO tiket (id_tiket, id_penumpang,stasiun_asal,stasiun_tujuan,id_kereta,berangkat,tiba,durasi,harga,status,jumlah) VALUES (:id_tiket, :id_penumpang, :stasiun_asal, :stasiun_tujuan, :id_kereta, :berangkat, :tiba, :durasi, :harga, :statu, :jumlah)');
        $this->stmt->bindValue('id_tiket', $data['id_tiket'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('stasiun_asal', $data['stasium_tujuan'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_STR);
        $this->stmt->bindValue('berangkat', $data['berangkat'], PDO::PARAM_STR);
        $this->stmt->bindValue('tiba', $data['tiba'], PDO::PARAM_STR);
        $this->stmt->bindValue('durasi', $data['durasi'], PDO::PARAM_STR);
        $this->stmt->bindValue('harga', $data['harga'], PDO::PARAM_STR);
        $this->stmt->bindValue('status', $data['status'], PDO::PARAM_STR);
        return $this->stmt->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool
    {
        $this->stmt = $this->dbh->prepare('UPDATE tiket SET id_penumpang = :id_penumpang, stasiun_asal = :stasiun_asal, stasiun_tujuan = :stasiun_tujuan, id_kereta = :id_kereta, status = :status  WHERE id_stasiun = :id_stasiun');
        $this->stmt->bindValue('id_stasiun', $data['id_stasiun'], PDO::PARAM_INT);
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('stasiun_asal', $data['stasiun_asal'], PDO::PARAM_STR);
        $this->stmt->bindValue('stasiun_tujuan', $data['stasiun_tujuan'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_penumpang', $data['id_penumpang'], PDO::PARAM_STR);
        $this->stmt->bindValue('id_kereta', $data['id_kereta'], PDO::PARAM_STR);
        $this->stmt->bindValue('status', $data['status'], PDO::PARAM_STR);
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