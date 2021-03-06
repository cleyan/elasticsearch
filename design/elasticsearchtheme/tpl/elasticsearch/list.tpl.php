<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Chat list')?></h1>

<ul class="nav nav-pills" role="tablist">
	<li role="presentation" <?php if ($tab == '' || $tab == 'chats') : ?> class="active" <?php endif;?>><a href="#chats" aria-controls="chats" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Chats');?></a></li>
	<li role="presentation" <?php if ($tab == 'messages') : ?>class="active"<?php endif;?>><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Messages');?></a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane <?php if ($tab == '' || $tab == 'chats') : ?>active<?php endif;?>" id="chats">
		<?php include(erLhcoreClassDesign::designtpl('elasticsearch/parts/filter.tpl.php')); ?>
	   	<?php if ($tab == 'chats') : ?>
            <?php if ($pages->items_total > 0): ?>           
            	<table class="table">
            		<thead>
            			<tr>
            			    <th width="15%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Chat ID')?></th>
            			    <th width="15%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Nick')?></th>
            			    <th width="30%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Time')?></th>
            			    <th width="30%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','IP')?></th>
            			    <th></th>
            			</tr>  
            		</thead>
            		<?php foreach ($items as $item) : ?>
            		    <tr>
            		        <td>
            		        <a class="action-image material-icons" data-title="<?php echo htmlspecialchars($item->nick,ENT_QUOTES);?>" onclick="lhinst.startChatNewWindow('<?php echo $item->chat_id;?>',$(this).attr('data-title'))" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/pendingchats','Open in a new window');?>">open_in_new</a>
                    	    <a href="#" onclick="lhc.previewChat(<?php echo $item->chat_id?>)"><i class="material-icons">info_outline</i></a>
            		        <a href="<?php echo erLhcoreClassDesign::baseurl('elasticsearch/listmsg')?>/<?php echo $item->chat_id?>"><?php echo $item->chat_id?></a></td>
            		        <td><?php echo htmlspecialchars($item->nick)?></td>
            		        <td><?php echo date(erLhcoreClassModule::$dateDateHourFormat, $item->time/1000)?></td>
            		        <td><?php echo htmlspecialchars($item->ip)?></td>
            		        <td>
            		            <a class="btn btn-danger btn-xs csfr-required" onclick="return confirm('<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('kernel/messages','Are you sure?');?>')" href="<?php echo erLhcoreClassDesign::baseurl('elasticsearch/delete')?>/<?php echo $item->id?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/userlist','Delete');?></a>
            		        </td>
            		    </tr>
            		<?php endforeach; ?>
            	</table>
            
            	<?php include(erLhcoreClassDesign::designtpl('lhkernel/secure_links.tpl.php')); ?>
            
            	<?php include(erLhcoreClassDesign::designtpl('lhkernel/paginator.tpl.php')); ?>
            
            <?php else: ?>
            	<p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('system/text','No records found')?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div role="tabpanel" class="tab-pane <?php if ($tab == 'messages') : ?>active<?php endif;?>" id="messages">
        <?php include(erLhcoreClassDesign::designtpl('elasticsearch/parts/filter_msg.tpl.php')); ?>
        
        <?php if ($tab == 'messages') : ?>
        
            <?php if ($pages->items_total > 0): ?>            
            <table class="table">
        		<thead>
        			<tr>
        			    <th width="30%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Chat ID')?></th>
        			    <th width="30%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Time')?></th>
        			    <th width="30%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','Message')?></th>
        			    <th width="30%"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('elasticsearch/admin','User ID')?></th>
        			</tr>  
        		</thead>
        		<?php foreach ($items as $item) : ?>
        		    <tr>
        		        <td>
        		        <a class="action-image material-icons" data-title="<?php echo htmlspecialchars('Visitor',ENT_QUOTES);?>" onclick="lhinst.startChatNewWindow('<?php echo $item->chat_id;?>',$(this).attr('data-title'))" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/pendingchats','Open in a new window');?>">open_in_new</a>
                    	      
        		        <a href="#" onclick="lhc.previewChat(<?php echo $item->chat_id?>)"><i class="material-icons">info_outline</i><?php echo $item->chat_id?>
        		        </td>
        		        <td><?php echo date(erLhcoreClassModule::$dateDateHourFormat, $item->time/1000)?></td>
        		        <td><?php echo htmlspecialchars($item->msg)?></td>
        		        <td><?php echo htmlspecialchars($item->user_id)?></td>        		       
        		    </tr>
        		<?php endforeach; ?>
        	</table>
        	
        	<?php include(erLhcoreClassDesign::designtpl('lhkernel/paginator.tpl.php')); ?>
            
            <?php else: ?>
            	<p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('system/text','No records found')?></p>
            <?php endif; ?>
        <?php endif; ?>
        
        
    </div>
</div>