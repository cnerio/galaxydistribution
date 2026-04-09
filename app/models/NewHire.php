<?php

class NewHire {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function generateNewHireId()
    {
        $prefix = 'NH' . date('mdy');

        $this->db->query('SELECT COUNT(*) AS total FROM newhires WHERE newhire_id LIKE :prefix');
        $this->db->bind(':prefix', $prefix . '%');
        $row = $this->db->single();

        $sequence = isset($row['total']) ? ((int)$row['total'] + 1) : 1;
        $candidate = $prefix . str_pad((string)$sequence, 4, '0', STR_PAD_LEFT);

        while ($this->newHireIdExists($candidate)) {
            $sequence++;
            $candidate = $prefix . str_pad((string)$sequence, 4, '0', STR_PAD_LEFT);
        }

        return $candidate;
    }

    public function saveLead($data)
    {
        return $this->db->insertQuery('newhires', $data);
    }

    private function newHireIdExists($newHireId)
    {
        $this->db->query('SELECT COUNT(*) AS total FROM newhires WHERE newhire_id = :newhire_id');
        $this->db->bind(':newhire_id', $newHireId);
        $row = $this->db->single();

        return isset($row['total']) && (int)$row['total'] > 0;
    }
}