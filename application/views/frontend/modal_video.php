<iframe id="player_vimeo" src="//player.vimeo.com/video/<?php echo $post[0]->link_vimeo?>?color=9be0b7&autoplay=1" width="920" height="518" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
<script type="application/javascript">
  $('#mymodal').on('hidden', function () {
    $('iframe#player_vimeo').attr('src','');
})

</script>