<?php // no direct access
/**
 * Default Template for Fajnij Slider Module
 *
 * @package	Fajnij Slider Module
 * @subpackage	Modules
 * @link		
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license	GNU General Public License, see LICENSE.php
 * Displays Fajnij Slider 
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

$image_path = rtrim(JURI::base(),'/') .'/images/fajnijslideshow/';
$app = JFactory::getApplication();

?>

<!-- Galleria Slider START -->
<div id="gallery">
<?php 
for($i=1;$i<=count($slides);$i++) {
    if($slides[$i]['img'] != '') {
?>
    <div class="image">
        <?php if($slides[$i]['full'] != '') { ?>
        <a href="<?php echo ($slides[$i]['img']!=''?$image_path.$slides[$i]['img']:''); ?>" rel="<?php echo $image_path.$slides[$i]['full']; ?>">
        <?php } ?>
        <img src="<?php echo ($slides[$i]['thumb']!=''?$image_path.$slides[$i]['thumb']:$image_path.$slides[$i]['img']); ?>" />
        <span class="share_url"><?php echo ($slides[$i]['full'] != ''?$slides[$i]['full']:$slides[$i]['img']);?></span>
        <?php if($slides[$i]['full'] != '') { ?>   
        </a>
        <?php } ?>        
    </div>
<?php 
    }
} 
?>    
</div>

<!-- Add Extra Buttons - START -->
<div id="galleria-bar">
<!-- FullScreen Button BEGIN -->
<div id="fullscreen"><img class="tool-ico" alt="Full-screen" src="/templates/meriwethers/images/fullscreen-menu-ico.png" /></div>
<!-- FullScreen Button END -->

<!-- AddThis Button BEGIN -->
<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script>
<script type="text/javascript">
    var addthis_config = {
        pubid : 'xa-4f1027fd46a54273',
        data_track_clickback: false,
        data_track_addressbar: false, 
        data_track_linkback: false                
    }
    var l_addthis_share = {}
</script>
<div id="sharebutton">
   <a id="sharebutton_id" addthis:url="" addthis:title="<?php echo $page_title.' - '.$app->getCfg('sitename');?>" addthis:description="" class="addthis_button_compact"><img class="tool-ico" alt="Favorite" src="/templates/meriwethers/images/share-menu-ico.png" /></a>
</div>
<!-- AddThis Button END -->    
</div>
<!-- Add Extra Buttons - END -->

<script src="/templates/meriwethers/js/galleria/galleria-1.2.6.min.js"></script>
<script>
jQuery(document).ready(function($) {
    Galleria.loadTheme('/templates/meriwethers/js/galleria/themes/classic/galleria.classic.min.js');

    jQuery("#gallery").galleria({
        width: <?php echo $slidewidth; ?>,
        height: <?php echo $slideheight?>,
        imageCrop: true,
        thumbCrop: false,
        fullscreenCrop: false,
        autoplay: <?php echo $transitionSpeed;?>,
        transition: "<?php echo $transition;?>",
        showCounter: false,
        lightbox: false,
        
        // Toggles the fullscreen button
        _showFullscreen: true,
        
        _toggleInfo: true,
        
        dataConfig: function(img) {
            return {
                //title: '<?php //echo $page_title;?>',
                //description: jQuery(img).siblings('.desc').html(), // tell Galleria to grab the content from the .desc div as caption
                share_url: '<?php echo $image_path."share_image.php?share=" ?>' + jQuery(img).siblings('.share_url').text() + '|<?php echo $page_title;?>'
            };                                               
        } ,             
            
        extend: function() {
            
            var gallery = this;
            
            // Pause on slider hover
            jQuery('.galleria-stage').hover(function() {
                gallery.pause();                
            }, function() {
                gallery.play();
            });

            // Add Extra Buttons - START
            gallery.addElement('bar').appendChild('container','bar');
            gallery.addElement('fullscreen').appendChild('bar','fullscreen');
            gallery.addElement('share').appendChild('bar','share');
            
            // Add FullScreen Button
            gallery.$('fullscreen').html($('#fullscreen').html()).click(function() {
                gallery.toggleFullscreen();
            });
            
            gallery.bind('fullscreen_enter', function() {
                gallery.$('fullscreen').addClass('exit');
            });
            gallery.bind('fullscreen_exit', function() {
                gallery.$('fullscreen').removeClass('exit');
            });            
            
            // Add AddThis Button
            gallery.$('share').html($('#sharebutton').html()).hover(function() {
                gallery.pause();                
            }, function() {
                gallery.play();
            });
            
            gallery.bind(Galleria.IMAGE, function(e) {
                 //l_addthis_share.url = gallery.getData(gallery.getIndex()).big;
                 l_addthis_share.url = gallery.getData(gallery.getIndex()).share_url;                 
                 addthis.button('#sharebutton_id',addthis_config,l_addthis_share);
            });
            // Add Extra Buttons - END            
        }
        
    });
}); 
</script>
<!-- Galleria Slider - END -->