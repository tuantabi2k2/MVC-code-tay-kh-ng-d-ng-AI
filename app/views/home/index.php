<form id="user-form">
    <label for="username">Tên</label>
    <input id="username" type="text" required>

    <label for="email">Email</label>
    <input id="email" type="email" required>

    <button type="submit">Nộp</button>
</form>

<script>
document.getElementById('user-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const username = encodeURIComponent(
        document.getElementById('username').value.trim()
    );
    const email = encodeURIComponent(
        document.getElementById('email').value.trim()
    );

    const url =
        '/MVC%20tu%20code%20tay/Public/home/create/' +
        username + '/' + email;

    window.location.href = url;
});
</script>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['users'] as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <form method="GET"
                          action="/MVC%20tu%20code%20tay/Public/home/edit/<?= (int) $user->id ?>">
                        <button type="submit">Sửa</button>
                    </form>

                    <form method="POST"
                          action="/MVC%20tu%20code%20tay/Public/home/delete/<?= (int) $user->id ?>"
                          onsubmit="return confirm('Bạn có chắc muốn xóa user này?')">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>