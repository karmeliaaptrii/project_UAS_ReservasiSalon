<?php

require_once __DIR__ . '/../config/Database.php';

class Treatment
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM treatments ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM treatments WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $deskripsi, $durasi, $harga)
    {
        $query = "INSERT INTO treatments
                  (nama_layanan, deskripsi, durasi, harga)
                  VALUES
                  (:nama, :deskripsi, :durasi, :harga)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":deskripsi", $deskripsi);
        $stmt->bindParam(":durasi", $durasi);
        $stmt->bindParam(":harga", $harga);

        return $stmt->execute();
    }

    public function update($id, $nama, $deskripsi, $durasi, $harga)
    {
        $query = "UPDATE treatments
                  SET
                  nama_layanan = :nama,
                  deskripsi = :deskripsi,
                  durasi = :durasi,
                  harga = :harga
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":deskripsi", $deskripsi);
        $stmt->bindParam(":durasi", $durasi);
        $stmt->bindParam(":harga", $harga);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM treatments WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}