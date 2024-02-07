<?php

// Obtém os dias e horários de trabalho do usuário a partir do banco de dados
$userWorkingDays = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
$userWorkingHours = array('09:00', '18:00');

// Calcula o tempo de resolução com base na prioridade do chamado
function calculateResolutionTime($priority) {
    $resolutionTime = 0;

    switch ($priority) {
        case 'alta':
            $resolutionTime = 44; // 24 horas
            break;
        case 'media':
            $resolutionTime = 48; // 48 horas
            break;
        case 'baixa':
            $resolutionTime = 72; // 72 horas
            break;
        default:
            $resolutionTime = 24; // 24 horas por padrão
            break;
    }

    return $resolutionTime;
}

// Verifica se o chamado foi criado durante o horário de trabalho do usuário
function isDuringWorkingHours($createdDateTime) {
    global $userWorkingDays, $userWorkingHours;

    $dayOfWeek = $createdDateTime->format('l');
    $time = $createdDateTime->format('H:i');

    if (in_array($dayOfWeek, $userWorkingDays) && $time >= $userWorkingHours[0] && $time <= $userWorkingHours[1]) {
        return true;
    }

    return false;
}

// Calcula a data e hora de resolução com base no tempo de resolução e no horário de trabalho do usuário
function calculateResolutionDateTime($createdDateTime, $priority) {
    $resolutionTime = calculateResolutionTime($priority);

    // Verifica se o chamado foi criado durante o horário de trabalho
    if (isDuringWorkingHours($createdDateTime)) {
        $resolutionDateTime = clone $createdDateTime;
        $resolutionDateTime->modify("+$resolutionTime hours");
    } else {
        // Encontra o próximo horário de trabalho disponível
        $nextWorkingDay = $createdDateTime;
        $nextWorkingDay->modify('tomorrow');

        while (!isDuringWorkingHours($nextWorkingDay)) {
            $nextWorkingDay->modify('tomorrow');
        }

        $resolutionDateTime = clone $nextWorkingDay;
        $resolutionDateTime->setTime($userWorkingHours[0], 0);
        $resolutionDateTime->modify("+$resolutionTime hours");
    }

    return $resolutionDateTime;
}

// Exemplo de uso
$createdDateTime = new DateTime('2023-07-26 12:30');
$priority = 'alta';

$resolutionDateTime = calculateResolutionDateTime($createdDateTime, $priority);

echo 'Data e hora de criação do chamado: ' . $createdDateTime->format('Y-m-d H:i') . '<br>';
echo 'Data e hora de resolução do chamado: ' . $resolutionDateTime->format('Y-m-d H:i');

$dataAbertura = '2023-09-11 16:00:00';
$tempoResolucao = '02:00:00';
$dataFinalizacao = '2023-09-11 18:01:00';

$abertura = new DateTime($dataAbertura);
$finalizacao = new DateTime($dataFinalizacao);

$diferenca = $abertura->diff($finalizacao);

$tempoDecorrido = $diferenca->format('%d dias, %h horas, %i minutos, %s segundos');

echo "Tempo decorrido: $tempoDecorrido";

$tempoResolucaoObj = DateTime::createFromFormat('H:i:s', $tempoResolucao);

$tempoDecorridoTotal = $diferenca->days * 24 * 60 * 60 + $diferenca->h * 60 * 60 + $diferenca->i * 60 + $diferenca->s;
$tempoResolucaoTotal = $tempoResolucaoObj->format('H') * 60 * 60 + $tempoResolucaoObj->format('i') * 60 + $tempoResolucaoObj->format('s');

if ($tempoDecorridoTotal > $tempoResolucaoTotal) {
    echo " - Passou do prazo";
} else {
    echo " - Não passou do prazo";
}

