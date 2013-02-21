<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); 

 $url = $jsonURL;
 preg_match_all('/%%.+?%%/', $url, $matches);
 if (count($matches) == 1) {
   for ($i=0; $i<count($matches[0]); $i++)
   {
     $vartoprocess = substr(substr($matches[0][$i], 0, strlen($matches[0][$i]) - 2), 2);
     $valuetoreplace = isset($_GET[$vartoprocess]) ? urlencode($_GET[$vartoprocess]) : ""; 
     $url = str_replace($matches[0][$i], $valuetoreplace, $url);     
   }
 }
 
if (!$isEditMode) {
?>
<script language="javascript">
<?php $uniqueid = mt_rand(5, 15); ?>
(function poll<?php echo $uniqueid; ?>(){
    $.ajax({ url: "<?php echo $url; ?>", success: function(data){
        //Update your display with new data
        <?php echo $jscontent; ?>

    }, dataType: "<?php echo $jsonURLType; ?>", complete: poll<?php echo $uniqueid; ?>_withpause, timeout: <?php echo $jsontimeout; ?> });
})();

function poll<?php echo $uniqueid; ?>_withpause(){
  setTimeout("poll<?php echo $uniqueid; ?>()", 1000);
}
</script>
<?php
} else {
?><b>jQuery long poll - Not activated in edit mode</b>
<?php 
}
?>