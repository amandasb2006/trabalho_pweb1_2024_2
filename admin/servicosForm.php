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

if (!empty($_GET['id_pacote'])) {
    $db->destroy($_GET['id_pacote']);
    header('location: pacoteList.php');
    exit();
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}
?>

<div class="col">
    <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Listagem de Pacotes de Viagem</h3>

    <div class="container-fluid mb-4">
        <form class="d-flex" method="post">
            <div class="col-2 px-1">
                <select name="tipo" class="form-select me-4" style="border: 1px solid #007bff;">
                    <option value="nome_pacote">Nome</option>
                    <option value="valor_pacote">Valor</option>
                    <option value="dias_pacote">Dias</option>
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
                <a class="btn btn-primary" href="./pacoteForm.php"
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
                <th scope="col">Dias</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $item) {
                echo "<tr>
                    <th scope='row'>$item->id_pacote</th>
                    <td>$item->nome_pacote</td>
                    <td>R$ $item->valor_pacote</td>
                    <td>$item->dias_pacote</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='pacoteForm.php?id_pacote=$item->id_pacote' style='background-color: #007bff; border-color: #007bff;'>Editar</a>
                        <a class='btn btn-danger btn-sm' onclick='return confirm(\"Deseja Excluir?\")' href='pacoteList.php?id_pacote=$item->id_pacote'>Excluir</a>
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