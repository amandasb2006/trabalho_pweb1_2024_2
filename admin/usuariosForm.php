<?php
include "./home.php";
include "../sql/db.class.php";

session_start();

$logado = $_SESSION['email'];
/*
if (empty($logado)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: login.php');
}
*/
head();

$db = new db(  "usuarios");

if (!empty($_POST['id'])) {
    $db->update([
        'nome_usuario' => $_POST['nome_usuario'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'id' => $_POST['id'],
    ]);
    header('location: usuariosList.php');

} else if (!empty($_POST)) {
    $db->insert([
        'nome_usuario' => $_POST['nome_usuario'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);
    header('location: usuariosList.php');
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

?>

<div class="col">
    <form action="usuariosForm.php" method="POST"
        style="border: 1px solid #007bff; border-radius: 10px; padding: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto;">
        <h3 style="color: #007bff; font-family: Arial, sans-serif; margin-bottom: 20px;">Formulário Usuário</h3>

        <div class="mb-3">
            <input type="hidden" name="id" value="<?php echo !empty($data->id) ? $data->id : "" ?>">

            <label for="nome_usuario" class="form-label"
                style="color: #007bff; font-family: Arial, sans-serif;">Nome</label>
            <input type="text" class="form-control" name="nome_usuario"
                value="<?php echo !empty($data->nome_usuario) ? $data->nome_usuario : "" ?>" placeholder="Nome"
                style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label" style="color: #007bff; font-family: Arial, sans-serif;">Email</label>
            <input type="email" class="form-control" name="email"
                value="<?php echo !empty($data->email) ? $data->email : "" ?>" placeholder="exemplo@dominio.com"
                style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label"
                style="color: #007bff; font-family: Arial, sans-serif;">Telefone</label>
            <input type="text" class="form-control" name="telefone"
                value="<?php echo !empty($data->telefone) ? $data->telefone : "" ?>" placeholder="(49) 98800-5500"
                style="border: 1px solid #007bff;">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label"
                style="color: #007bff; font-family: Arial, sans-serif;">Senha</label>
            <input type="password" class="form-control" name="password"
                value="<?php echo !empty($data->password) ? $data->password : "" ?>" placeholder="Senha"
                style="border: 1px solid #007bff;">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success"
                style="background-color: #28a745; border-color: #28a745; font-family: Arial, sans-serif; margin-right: 10px;">
                Salvar
            </button>
            <a class="btn btn-primary" href="./usuariosList.php"
                style="background-color: #007bff; border-color: #007bff; font-family: Arial, sans-serif;">
                Voltar
            </a>
        </div>
    </form>
</div>


<?php
footer();
?>