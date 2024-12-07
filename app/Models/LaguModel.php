<?php

namespace App\Models;

use CodeIgniter\Model;

class LaguModel extends Model
{
    protected $table = 'lagu';
    protected $useTimesStamps = true;
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'slug', 'penyanyi', 'link', 'sampul', 'created_at', 'updated_at'];
    public function search($keyword) {
        return $this->table('lagu')->like('judul', $keyword)->orLike('penyanyi', $keyword);
    }
    
    public function getDetailLagu($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
