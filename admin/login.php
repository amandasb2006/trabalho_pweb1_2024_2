<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #007bff, #f0f0f0);
            color: rgb(17, 27, 63);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .left {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px; 
        }

        .right {
            width: 100%;
        }

        .right h1 {
            margin: 0 0 20px 0;
            color: #007bff;
            text-align: center;
        }

        input {
            padding: 12px;
            border: 2px solid #007bff;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            margin-bottom: 15px;
            width: calc(100% - 24px);
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #28a745;
        }

        .inputSubmit {
            background-color: #007bff;
            border: none;
            padding: 15px;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .inputSubmit:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">Agencia de Viagens</div>
        <div class="right">
            <h1>Login</h1>
            <form action="loginAccess.php" method="POST">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Senha">
                <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>
