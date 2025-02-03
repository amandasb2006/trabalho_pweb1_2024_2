<?php

include "./paginas/home.php";

session_start();

$logado = $_SESSION['email'];

if (empty($logado)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: paginas/login.php');
}

head();

echo <<<HTML
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6" style="padding: 20px;">
            <h2 style="color: #007bff; font-family: Arial, sans-serif;">Sobre a Horizoentes - Agência de Viagens</h2>
            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                A Horizoentes é uma renomada agência de viagens, nascida do sonho de proporcionar experiências inesquecíveis para famílias ao redor do mundo. Fundada em 2005, a Horizoentes começou como uma pequena agência local, mas rapidamente cresceu graças ao seu compromisso com a qualidade e a satisfação do cliente.
            </p>
            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                Nossa missão é oferecer pacotes de viagem que combinam aventura, conforto e diversão para todas as idades. Cada um de nossos pacotes é cuidadosamente planejado para garantir que as famílias possam desfrutar de momentos preciosos juntas, criando memórias que durarão para sempre.
            </p>
        </div>
        <div class="col-md-6" style="padding: 20px;">
            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                Desde as emocionantes expedições em destinos exóticos até os relaxantes retiros em praias paradisíacas, a Horizoentes oferece uma ampla gama de opções para atender aos desejos e necessidades de cada família. Nossos pacotes são especialmente projetados para proporcionar diversão e conforto a todos os membros da família, com atividades variadas e acomodações de alta qualidade.
            </p>
            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                Junte-se a nós e descubra como a Horizoentes pode transformar suas férias em uma experiência extraordinária. Com uma equipe dedicada e apaixonada pelo que faz, estamos aqui para tornar cada viagem um momento inesquecível para você e sua família.
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <h3 class="text-center mb-4" style="color: #007bff; font-family: Arial, sans-serif;">Feedbacks de Clientes</h3>

        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: Arial, sans-serif;">Ana Paula</h5>
                    <p class="card-text" style="font-family: Arial, sans-serif; font-size: 16px;">"Nossa experiência com a Horizoentes foi maravilhosa! Cada detalhe foi cuidadosamente planejado e nossa família adorou cada momento."</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: Arial, sans-serif;">Carlos Alberto</h5>
                    <p class="card-text" style="font-family: Arial, sans-serif; font-size: 16px;">"Recomendo a Horizoentes para qualquer família que queira viver aventuras inesquecíveis. O serviço foi impecável do início ao fim."</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: Arial, sans-serif;">Mariana Oliveira</h5>
                    <p class="card-text" style="font-family: Arial, sans-serif; font-size: 16px;">"A viagem dos nossos sonhos se tornou realidade graças à Horizoentes. Não poderíamos estar mais felizes com o atendimento e a organização."</p>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;


footer();

?>