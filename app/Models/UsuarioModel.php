<?php namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table = 'usuarios_admin'; // Tu tabla de admin
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'password'];
}