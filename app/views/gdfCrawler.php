<?php
	foreach($biddings as $bidding):
?>

<p>Código: <?= $bidding->getCode() ?> </p>
<p>Detalhes: <?= $bidding->getUrl() ?> </p>
<p>Título: <?= $bidding->getTitle() ?> </p>
<p>Período de Inscrição: <?= $bidding->getRegistrationPeriod() ?> </p>
<p>Data de Abertura <?= $bidding->getDate() ?> </p> </br>

<?php
	endforeach;	
?>