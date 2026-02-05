<?php
namespace App\Validation;
use App\Models\UserModel;

class CredentialRules
{
    public function checkCredentials(string $str, string $fields, array $data): bool
    {
        $model = new UserModel();
        $user = $model->where('email', $data['email'] ?? null)->first();
        if (! $user) return false;
        return password_verify($data['password'] ?? '', $user['password']);
    }
}