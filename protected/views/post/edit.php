<?php $form=$this->beginWidget('CActiveForm', array(
)); ?>

    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->textField($model, 'name'); ?>
    <?php echo $form->error($model, 'name'); ?>

	<?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model, 'email',array('readonly'=>true)); ?>
    <?php echo $form->error($model, 'email'); ?>
	
    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->passwordField($model, 'password',array('value'=>'')); ?>
    <?php echo $form->error($model, 'password'); ?>
    
    <?php echo $form->labelEx($model,'confirm password'); ?>
    <?php echo $form->passwordField($model, 'con_password'); ?>
    <?php echo $form->error($model, 'con_password'); ?>

    <div class="form-group">
        <?php echo CHtml::submitButton('Save'); ?>
    </div>

<?php $this->endWidget(); ?>