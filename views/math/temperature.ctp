<h2>Temperature</h2>

<div class="form">
<?php
	echo $this->Form->create('Math');
?>
<h3>Eingabe:</h3>
<?php
	echo $this->Form->input('value', array('label' => 'Temperatur:'));
?>
<?php
	echo $this->Form->input('unit', array('label' => 'Einheit:', 'options' => $units));
?>
<?php
	echo $this->Form->input('targetUnit',  array('label' => 'Zieleinheit:', 'options' => $units));
?>

<?php echo $this->Form->end(__('Submit',true));?>
</div>

<br />

<h3>Ergebnis</h3>
<?php
	echo $result;
?>