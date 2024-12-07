<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['level','nama', 'username', 'password', 'email', 'reset_password_token', 'token_expires_at', 'created_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function search($keyword) {
        return $this->table('user')->like('nama', $keyword)->orLike('username', $keyword);
    }
    
    public function getDetailUser($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
