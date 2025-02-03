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

$db = new db('servicos');

if (!empty($_GET['id_servico'])) {
    $db->destroy($_GET['id_servico']);
    header('location: servicosList.php');
    exit();
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}
?>

<div class="col">
    <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Listagem de Serviços</h3>

    <div class="container-fluid mb-4">
        <form class="d-flex" method="post">
            <div class="col-2 px-1">
                <select name="tipo" class="form-select me-4" style="border: 1px solid #007bff;">
                    <option value="nome_servico">Nome</option>
                    <option value="descricao_servico">Descrição</option>
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
                <a class="btn btn-primary" href="./servicosForm.php"
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
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $item) {
                $descricao = strlen($item->descricao_servico) > 50 ? substr($item->descricao_servico, 0, 50) . '...' : $item->descricao_servico;
                echo "<tr>
                    <th scope='row'>$item->id_servico</th>
                    <td>$item->nome_servico</td>
                    <td>$item->valor_servico</td>
                    <td style='max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>$descricao</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='servicosForm.php?id_servico=$item->id_servico' style='background-color: #007bff; border-color: #007bff;'>Editar</a>
                        <a class='btn btn-danger btn-sm' onclick='return confirm(\"Deseja Excluir?\")' href='servicosList.php?id_servico=$item->id_servico'>Deletar</a>
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