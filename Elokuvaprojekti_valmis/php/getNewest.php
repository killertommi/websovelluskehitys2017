<?php
if($mediat = getNewestMedia($DBH,1)){
    foreach($mediat as $media){
        ?>
            <figure>
                <a href="<?php echo("images/original/$media->mediaUrl");?>">
                    <img src="<?php echo("images/thumbs/$media->mediaThumb");?>"></a>
            </figure>
        <?php
    }
}else{
    echo("Haku meni plörinäks");
} ?>