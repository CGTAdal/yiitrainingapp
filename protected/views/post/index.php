<span style="align:right;"><?php echo CHtml::link('Add New', $this->createUrl('post/add',array())); ?></span>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
));*/ ?>
<?php //$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']); ?>
<?php /*echo CHtml::dropDownList(
        'pageSize',
        $pageSize,
        Yii::app()->params['pageSizeOptions'],
        array('class'=>'change-pageSize'));*/ ?>
<?php

if(!Yii::app()->user->isGuest){
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->search(),
        'filter'=>$model, 
        'columns'=>array(   
                   /* array(
                            'name' => 'name',
                            'value' => '$data->name',
                            'filter'=>false
                    ), */
           /* 'name',
            'email',*/
            array(
                'name' => 'name',
                'type' => 'raw',
            ),
            array(
                'name' => 'email',
                'type' => 'raw',
            ),



            array(            // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
                //'header'=>CHtml::dropDownList('pageSize',$pageSize,array(2=>2,4=>4,6=>6,8=>8),array()),
        ),
    )));
}else{
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->search(),
        'filter'=>$model, 
        'columns'=>array(   
                   /* array(
                            'name' => 'name',
                            'value' => '$data->name',
                            'filter'=>false
                    ), */
           /* 'name',
            'email',*/
            array(
                'name' => 'name',
                'type' => 'raw',
            ),
            array(
                'name' => 'email',
                'type' => 'raw',
            )
        ),
    ));
}


    
?>
<script type="text/javascript">
   /* $(function(){
        $('.change-pageSize').live('change', function() {
            alert(1);
           // $.fn.yiiGridView.update('category-grid',{ data:{ pageSize: $(this).val() }});
        });
    });*/
</script>