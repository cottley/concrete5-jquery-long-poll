<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 

<div style="margin-top:8px;"> 
<label for="jsonURL"><?php echo t('URL of the service to long poll the JSON data')?></label>
<input name="jsonURL" type="text" value="<?php echo $bObj->jsonURL?>" maxlength="255" size="50"/><br/>
</div>
<br/>
<div style="margin-top:8px;">

<label for="jsonURLType"><?php echo t('Select the type of JSON the URL is accessing')?></label>
<select name="jsonURLType">
  <option value="json"  <?php if ($bObj->jsonURLType == "json")  echo "selected" ?> >JSON - Local server URL</option>
  <option value="jsonp" <?php if ($bObj->jsonURLType == "jsonp") echo "selected" ?> >JSONP - Remote server URL</option>
</select> 
<br/>
</div>
<div style="margin-top:8px;">

<label for="jscontent"><?php echo t('Enter the javascript that should be executed automatically after data is loaded')?></label>
 <?php echo $form->textarea("jscontent", $jscontent, array('rows' => 8, 'cols' => 50)); ?>
<br/>
</div>
<div style="margin-top:8px;"> 
<label for="jsontimeout"><?php echo t('Time in milliseconds for the timeout')?></label>
<input name="jsontimeout" type="text" value="<?php echo $bObj->jsontimeout?>" maxlength="255" /><br/>
</div>
<br/>
<div class="ccm-spacer" style="margin-bottom:16px;"></div>