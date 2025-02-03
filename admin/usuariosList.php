
<?php
include './home.php';
include "../sql/db.class.php";

session_start();

$logado = $_SESSION['email'];

if (empty($logado)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: login.php');
}

head();

$db = new db('usuarios');

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}
?>
<div class="col">
    <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Listagem de Usuários</h3>

    <div class="container-fluid mb-4">
        <form class="d-flex" method="post">
            <div class="col-2 px-1">
                <select name="tipo" class="form-select me-4" style="border: 1px solid #007bff;">
                    <option value="nome_usuario">Nome</option>
                    <option value="email">Email</option>
                    <option value="telefone">Telefone</option>
                </select>
            </div>
            <div class="col-4 px-1">
                <input class="form-control me-4" type="search" name="valor" placeholder="Pesquisar" aria-label="Search"
                    style="border: 1px solid #007bff;">
            </div>
            <div class="col-4">
                <button class="btn btn-success me-2" type="submit"
                    style="background-color: #28a745; border-color: #28a745; font-family: Arial, sans-serif;">
                    <i class="bi bi-search"></i> Pesquisar
                </button>
                <a class="btn btn-primary" href="./usuariosForm.php"
                    style="background-color: #007bff; border-color: #007bff; font-family: Arial, sans-serif;">
                    <i class="bi bi-plus-circle"></i> Novo
                </a>
            </div>
        </form>
    </div>

    <table class="table table-striped table-hover"
        style="border: 1px solid #007bff; border-radius: 5px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <thead style="background-color: #e9f1ff;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $item) {
                echo "<tr>
                    <th scope='row'>$item->id</th>
                    <td>$item->nome_usuario</td>
                    <td>$item->email</td>
                    <td>$item->telefone</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='usuariosForm.php?id=$item->id' style='background-color: #007bff; border-color: #007bff;'>Editar</a>
                        <a class='btn btn-danger btn-sm' onclick='return confirm(\"Deseja Excluir?\")' href='usuariosList.php?id=$item->id'>Excluir</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
footer();
?>