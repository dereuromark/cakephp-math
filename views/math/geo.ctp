<script type="text/javascript">
var myObj = {};
myObj["pythagoras"] = ["A", "B"];
myObj["distance"] = ["X1", "Y1", "X2", "Y2"];
myObj["angleSum"] = ["Corners"];
myObj["circumferenceOfCircle"] = ["Radius"];
myObj["circumferenceOfRectangle"] = ["A", "B"];
myObj["circumferenceOfTriangle"] = ["A", "B", "C"];
myObj["areaOfCircle"] = ["Radius"];
myObj["areaOfRectangle"] = ["A", "B"];
myObj["areaOfTriangle"] = ["A", "B", "C"];

jQuery(document).ready(function(){

	jQuery("#FormSelect").change(function() {
		var selvalue = jQuery(this).val();
		
		var vars = myObj[selvalue];
		jQuery(".vars").parent('div').hide(100);
		for (var i = 0; i < vars.length; i++) {
			var id = vars[i];
  		jQuery("#Form" + id).parent('div').show(100);
		}

	}).change();
});

</script>
<style type="text/css">
div.variables div.input {
	display: none;
}
</style>

<div class="floatRight" style="float: right;">
</div>

<h2><?php __('Geometry')?></h2>

<h3><?php __('Basic Operations')?></h3>
<br />

<div class="form">
<?php echo $this->Form->create('Math', array('url'=>'/'.$this->params['url']['url']));?>

<?php
	echo $this->Form->input('Form.select', array('options'=>$selectOptions));
?>

<br />
<div class="variables">
<?php
	echo $this->Form->input('Form.corners', array('class'=>'vars'));
	echo $this->Form->input('Form.radius', array('class'=>'vars'));
	echo $this->Form->input('Form.a', array('class'=>'vars'));
	echo $this->Form->input('Form.b', array('class'=>'vars'));
	echo $this->Form->input('Form.c', array('class'=>'vars'));
	echo $this->Form->input('Form.x1', array('class'=>'vars'));
	echo $this->Form->input('Form.y1', array('class'=>'vars'));
	echo $this->Form->input('Form.z1', array('class'=>'vars'));
	echo $this->Form->input('Form.x2', array('class'=>'vars'));
	echo $this->Form->input('Form.y2', array('class'=>'vars'));
	echo $this->Form->input('Form.z2', array('class'=>'vars'));
?>

<?php echo $this->Form->end(__('Submit',true));?>
</div>

</div>

<br />
Hinweis: Leere Felder zählen als 0. Dezimaltrennzeichen ist der Punkt (kein Komma!).


<h3><?php __('Result')?></h3>
<?php
if ($result !== false) {
	echo pre($result);
} else {
	echo '---';
}
?>
