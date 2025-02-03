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

$db = new db('pacotesviagem');

if (!empty($_POST['id_pacote'])) {
    $db->update([
        'nome_pacote' => $_POST['nome_pacote'],
        'valor_pacote' => $_POST['valor_pacote'],
        'dias_pacote' => $_POST['dias_pacote'],
        'id_pacote' => $_POST['id_pacote'],
    ]);
    header('location: pacoteList.php');
    exit();
} else if (!empty($_POST)) {
    $db->insert([
        'nome_pacote' => $_POST['nome_pacote'],
        'valor_pacote' => $_POST['valor_pacote'],
        'dias_pacote' => $_POST['dias_pacote'],
    ]);
    header('location: pacoteList.php');
    exit();
}

$data = null;
if (!empty($_GET['id_pacote'])) {
    $data = $db->find($_GET['id_pacote']);
}
?>

<div class="col">
    <form action="pacoteForm.php" method="POST"
        style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #007bff; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Formulário de Pacote de Viagem
        </h3>

        <div class="mb-3">
            <input type="hidden" name="id_pacote"
                value="<?php echo !empty($data->id_pacote) ? $data->id_pacote : "" ?>">

            <label for="nome_pacote" class="form-label" style="font-family: Arial, sans-serif;">Nome do Pacote</label>
            <input type="text" class="form-control" name="nome_pacote"
                value="<?php echo !empty($data->nome_pacote) ? $data->nome_pacote : "" ?>" placeholder="Nome do Pacote"
                style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="valor_pacote" class="form-label" style="font-family: Arial, sans-serif;">Valor</label>
            <input type="number" step="0.01" class="form-control" name="valor_pacote"
                value="<?php echo !empty($data->valor_pacote) ? $data->valor_pacote : "" ?>"
                placeholder="Valor do Pacote" style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="dias_pacote" class="form-label" style="font-family: Arial, sans-serif;">Dias</label>
            <input type="number" class="form-control" name="dias_pacote"
                value="<?php echo !empty($data->dias_pacote) ? $data->dias_pacote : "" ?>" placeholder="Número de Dias"
                style="border: 1px solid #007bff;">
        </div>

        <button type="submit" class="btn btn-success"
            style="background-color: #28a745; border-color: #28a745; font-family: Arial, sans-serif; margin-right: 10px;">
            Salvar
        </button>
        <a class="btn btn-primary" href="./pacoteList.php"
            style="background-color: #007bff; border-color: #007bff; font-family: Arial, sans-serif;">
            Voltar
        </a>
    </form>
</div>


<?php
footer();
?>