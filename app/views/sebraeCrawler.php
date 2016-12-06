<?php
	foreach($biddings as $bidding):
?>

<p>Nome: <?= $bidding->getName() ?> </p>
<p>Origem: <?= $bidding->getOrigin() ?> </p> </br>

<?php
	endforeach;
?>