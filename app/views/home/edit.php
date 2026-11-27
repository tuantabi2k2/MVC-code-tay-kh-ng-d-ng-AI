<h1>Sửa người dùng</h1>

<form
    method="POST"
    action="/MVC%20tu%20code%20tay/Public/home/update/<?= (int) $data['user']->id ?>"
>
    <label for="username">Tên</label>
    <input
        id="username"
        name="username"
        type="text"
        value="<?= htmlspecialchars($data['user']->username, ENT_QUOTES, 'UTF-8') ?>"
        required
    >

    <label for="email">Email</label>
    <input
        id="email"
        name="email"
        type="email"
        value="<?= htmlspecialchars($data['user']->email, ENT_QUOTES, 'UTF-8') ?>"
        required
    >

    <button type="submit">Lưu thay đổi</button>
</form>