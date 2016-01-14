<?php

// this contains the application parameters that can be maintained via GUI
return array(
	// this is displayed in the header section
	'title'=>'',
	// this is used in error pages
	'adminEmail'=>'priyanka.rajpurohit@cgt.co.in',
	// number of posts displayed per page
	'postsPerPage'=>5,
	// maximum number of comments that can be displayed in recent comments portlet
	'recentCommentCount'=>10,
	// maximum number of tags that can be displayed in tag cloud portlet
	'tagCloudCount'=>20,
	// whether post comments need to be approved before published
	'commentNeedApproval'=>true,
	// the copyright information displayed in the footer section
	'copyrightInfo'=>'Copyright &copy; 2009 by My Company.',
	// recoeds per page drop down options
	'pageSizeOptions'=>array('5'=>'5','10'=>'10','15'=>'15','20'=>'20'),
	//super admin role
	'superAdminRole'=>1,
	//sub admin role
	'subAdminRole'=>2
);
