<?php
include "./home.php";
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

if (!empty($_POST['id_destino'])) {
    $db->update([
        'nome_destino' => $_POST['nome_destino'],
        'pais_destino' => $_POST['pais_destino'],
        'cidade_destino' => $_POST['cidade_destino'],
        'id_destino' => $_POST['id_destino'],
    ]);
    header('location: destinosList.php');
    exit();
} else if (!empty($_POST)) {
    $db->insert([
        'nome_destino' => $_POST['nome_destino'],
        'pais_destino' => $_POST['pais_destino'],
        'cidade_destino' => $_POST['cidade_destino'],
    ]);
    header('location: destinosList.php');
    exit();
}

$data = null;

if (!empty($_GET['id_destino'])) {
    $data = $db->find($_GET['id_destino']);
}

?>

<div class="col">
    <form action="destinosForm.php" method="POST"
        style="border: 1px solid #007bff; border-radius: 10px; padding: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto;">
        <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Formulário de Destino</h3>

        <div class="mb-3">
            <input type="hidden" name="id_destino"
                value="<?php echo !empty($data->id_destino) ? $data->id_destino : '' ?>">

            <label for="nome_destino" class="form-label" style="color: #007bff; font-family: Arial, sans-serif;">Nome do
                Destino</label>
            <input type="text" class="form-control" name="nome_destino"
                value="<?php echo !empty($data->nome_destino) ? $data->nome_destino : '' ?>"
                placeholder="Nome do Destino" style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="pais_destino" class="form-label"
                style="color: #007bff; font-family: Arial, sans-serif;">País</label>
            <input type="text" class="form-control" name="pais_destino"
                value="<?php echo !empty($data->pais_destino) ? $data->pais_destino : '' ?>"
                placeholder="País do Destino" style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="cidade_destino" class="form-label"
                style="color: #007bff; font-family: Arial, sans-serif;">Cidade</label>
            <input type="text" class="form-control" name="cidade_destino"
                value="<?php echo !empty($data->cidade_destino) ? $data->cidade_destino : '' ?>"
                placeholder="Cidade do Destino" style="border: 1px solid #007bff;">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success"
                style="background-color: #28a745; border-color: #28a745; font-family: Arial, sans-serif; margin-right: 10px;">
                Salvar
            </button>
            <a class="btn btn-primary" href="./destinosList.php"
                style="background-color: #007bff; border-color: #007bff; font-family: Arial, sans-serif;">
                Voltar
            </a>
        </div>
    </form>
</div>


<?php
footer();
?>