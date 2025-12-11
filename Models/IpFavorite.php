<?php

namespace Hubleto\App\Custom\IpInfoTest\Models;

class IpFavorite
{
    private $db;
    private $table = 'custom_ip_favorites';

    public function __construct()
    {
            try {
            $this->db = new \PDO(
                'mysql:host=localhost;dbname=hubleto_db;charset=utf8mb4',
                'root',
                ''
            );
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Chyba pripojenia k DB: " . $e->getMessage());
        }
    }

    public function add(string $ip, string $country, string $city, string $isp): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table} (ip, country, city, isp, created_at) VALUES (?, ?, ?, ?, NOW())"
        );
        return $stmt->execute([$ip, $country, $city, $isp]);
    }
    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }
}