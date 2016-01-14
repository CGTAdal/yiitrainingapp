<?php $form=$this->beginWidget('CActiveForm', array(
)); ?>
<table>
    <tr>
        <th>Fields</th>
        <th>Values</th>
    </tr>

    <tr>
        <td>
    		<?php echo $form->labelEx($model,'name'); ?>
		</td>
   		<td>
		    <?php echo $form->textField($model, 'name'); ?>
		    <br>
		    <?php echo $form->error($model, 'name'); ?>
		</td>
	</tr>

	<tr>
        <td>
            <?php echo $form->labelEx($model,'email'); ?>
        </td>
        <td>
            <?php echo $form->textField($model, 'email'); ?>
            <br>
            <?php echo $form->error($model, 'email'); ?>
        </td>
    </tr>
	
    <tr>
        <td>
            <?php echo $form->labelEx($model,'password'); ?>
        </td>
        <td>
            <?php echo $form->passwordField($model, 'password',array('value'=>'')); ?>
            <br>
            <?php echo $form->error($model, 'password'); ?>
        </td>
    </tr>
    
     <tr>
        <td>
            <?php echo $form->labelEx($model,'confirm password'); ?>
        </td>
        <td>
            <?php echo $form->passwordField($model, 'con_password'); ?>
            <br>
            <?php echo $form->error($model, 'con_password'); ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <div class="form-group">
                <?php echo CHtml::submitButton('Save'); ?>
            </div>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>