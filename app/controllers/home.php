<?php

class home extends Controller
{   

    public function index($name = '')
    {
    $users = User::all();

    $this->view('home/index', ['users' => $users]);
    }

    public function create($username = '', $email = '')
{
    User::create([
        'username' => $username,
        'email' => $email
    ]);

    header('Location: /MVC%20tu%20code%20tay/Public/home/index');
    exit;
}

   public function edit($id = '')
{
    $user = User::findOrFail($id);

    $this->view('home/edit', [
        'user' => $user
    ]);
}

public function update($id = '')
{
    $user = User::findOrFail($id);

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($username === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(422);
        exit('Vui lòng nhập tên và email hợp lệ.');
    }

    $user->update([
        'username' => $username,
        'email' => $email
    ]);

    header('Location: /MVC%20tu%20code%20tay/Public/home/index');
    exit;
}

public function delete($id = '')
{
    $user = User::findOrFail($id);
    $user->delete();

    header('Location: /MVC%20tu%20code%20tay/Public/home/index');
    exit;
}
}   