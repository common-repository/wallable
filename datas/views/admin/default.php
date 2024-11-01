<h3><?php echo __('wallable - Wall social pages', 'searchfriend');?></h3>
<?php
$this->add_custom_javascript("
	(function($){
		  jQuery(document).ready(function(){
			  jQuery(\"#wallable-config-tabs\").tabs();
		  });				
	})(jQuery);
", 'jquery-ui-tabs')->burn_media();
?>
<div id="wallable-config-tabs">
  <ul>
    <li><a href="#tabs-1"><?php echo __('Dashboard', 'wallable');?></a></li>
    <li><a href="#tabs-2"><?php echo __('Profiles', 'wallable');?></a></li>
    <li><a href="#tabs-3"><?php echo __('Comments', 'wallable');?></a></li>
    <li><a href="#tabs-4"><?php echo __('Templates', 'wallable');?></a></li>
    <li><a href="#tabs-5"><?php echo __('Link Items', 'wallable');?></a></li>
    <li><a href="#tabs-6"><?php echo __('Configures', 'wallable');?></a></li>   
  </ul>
  <div id="tabs-1">
    <center><h1><?php echo __('Show statistic functionality', 'wallable');?></h1></center>
  </div>
  <div id="tabs-2">
    <center><h1><?php $this->loadView('profiles');?></h1></center>
  </div>
  <div id="tabs-3">
    <center><h1><?php $this->loadView('comments');?></h1></center>
  </div>
  <div id="tabs-4">
    <center><h1><?php $this->loadView('templates');?></h1></center>
  </div>
  <div id="tabs-5">
    <center><h1><?php $this->loadView('items');?></h1></center>
  </div>
  <div id="tabs-6">
  	<center><h1><?php $this->loadView('configures');?></h1></center>    
  </div>
</div>