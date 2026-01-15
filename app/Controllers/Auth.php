<?php /** @var \CodeIgniter\Validation\ValidationInterface $validation */ ?>
<?php $validation = $validation ?? \Config\Services::validation(); ?>

<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="h3 mb-3 font-weight-normal text-center">Login</h1>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                    <?php if ($validation->hasError('email')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <?php if ($validation->hasError('password')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <p class="mt-3 text-center">
                Don't have an account? <a href="<?= route_to('register') ?>">Register</a>
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?php
public function login()
{
    if ($this->request->getMethod() !== 'post') {
        return view('auth/login');
    }

    $rules = [
        'email'    => 'required|valid_email',
        'password' => 'required|min_length[6]',
    ];

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('email', $email)->first();

    if (! $user || ! password_verify($password, $user['password'])) {
        return redirect()->back()->withInput()->with('error', 'Credenciales inválidas');
    }

    session()->set('user_id', $user['id']);
    return redirect()->to('/dashboard');
}