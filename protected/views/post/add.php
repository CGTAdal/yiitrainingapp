<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'add-user'
)); ?>

    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->textField($model, 'name') ?>
    <?php echo $form->error($model,'name'); ?>

	<?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model, 'email') ?>
    <?php echo $form->error($model,'email'); ?>
	
    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->passwordField($model, 'password') ?>
    <?php echo $form->error($model,'password'); ?>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>
