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

$db = new db('destinos');

if (!empty($_GET['id_destino'])) {
    $db->destroy($_GET['id_destino']);
    header('location: destinosList.php');
    exit();
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}
?>

<div class="col">
    <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Listagem de Destinos</h3>

    <div class="container-fluid mb-4">
        <form class="d-flex" method="post">
            <div class="col-2 px-1">
                <select name="tipo" class="form-select me-4" style="border: 1px solid #007bff;">
                    <option value="nome_destino">Nome</option>
                    <option value="pais_destino">País</option>
                    <option value="cidade_destino">Cidade</option>
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
                <a class="btn btn-primary" href="./destinosForm.php"
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
                <th scope="col">País</th>
                <th scope="col">Cidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $item) {
                echo "<tr>
                    <th scope='row'>$item->id_destino</th>
                    <td>$item->nome_destino</td>
                    <td>$item->pais_destino</td>
                    <td>$item->cidade_destino</td>
                    <td><a href='destinosForm.php?id_destino=$item->id_destino' class='btn btn-primary btn-sm' style='background-color: #007bff; border-color: #007bff;'>Editar</a></td>
                    <td><a onclick='return confirm(\"Deseja Excluir?\")' href='destinosList.php?id_destino=$item->id_destino' class='btn btn-danger btn-sm'>Deletar</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<?php
footer();
?>