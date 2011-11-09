<script type="text/javascript">
$(document).ready(function(){

	$("#MathSelection").change(function () {
		var selvalue = $(this).val();
		if (selvalue == 2) {
			$(".age").hide(100);
			$(".pca").hide(100);
			$(".hlife").show(100);
		} else if (selvalue == 1) {
			$(".age").hide(100);
			$(".hlife").hide(100);
			$(".pca").show(100);
		} else {
			$(".pca").hide(100);
			$(".hlife").hide(100);
			$(".age").show(100);
		}
	}).change();

});

</script>

<h2>Half Life</h2>

<div class="form">
<?php
	echo $this->Form->create('Math');
?>

<?php
	echo $this->Form->input('selection', array('label' => __('Type'), 'options' => array(0 => __('Age'), 1 => __('Activity'), 2 => __('Half Life'))));
?>

<h3>Altersbestimmung:</h3>
<div class="age pca">
<?php
	echo $this->Form->input('hlife', array('label' => __('Half Life')));
?>
</div>
<div class="age hlife">
<?php
	echo $this->Form->input('pca', array('label' => __('Activity:')));
?>
</div>
<div class="hlife pca">
<?php
	echo $this->Form->input('age', array('label' => __('Age:')));
?>
</div>
<?php echo $this->Form->end(__('Submit'));?>
</div>

<br />

<h3>Ergebnis</h3>
<?php
	echo $result;
?>