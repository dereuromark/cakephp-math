<div class="floatRight" style="float: right;">
<?php echo $this->Html->link('1x1', array('m'=>1, 'n'=>1)); ?> <?php echo $this->Html->link('2x2', array('m'=>2, 'n'=>2)); ?> <?php echo $this->Html->link('3x3', array('m'=>3, 'n'=>3)); ?> <?php echo $this->Html->link('4x4', array('m'=>4, 'n'=>4)); ?>
</div>

<h2>Matrix</h2>

<h3>Basic Operations</h3>
<br />

<div class="form">
<?php echo $this->Form->create('Math', array('url'=>'/'.$this->request->url));?>

<?php
	for ($i = 0; $i < $matrix['m']; $i++) {
		for ($j = 0; $j < $matrix['n']; $j++) {
			echo $this->Form->text('Form.'.$i.'.'.$j, array('class'=>'matrix', 'style'=>'width: 80px; margin-right:2px;', 'maxlength'=>'12'));
		}
		echo BR;
		
	}

?>


<br />

<?php echo $this->Form->end(__('Submit'));?>
</div>

<br />
Hinweis: Leere Felder zählen als 0. Dezimaltrennzeichen ist der Punkt (kein Komma!).


<h3>Result</h3>
<?php
echo pre($matrix);
?>
