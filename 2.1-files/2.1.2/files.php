<?php 
    $saveimages = checkAndSaveImage($_FILES);

    function checkAndSaveImage(array $image) {
        $file = $image['file'];
        for($i=0; $i < count($file['name']); $i++) {
            $checkit = $file['name'][$i];
            if(!empty($checkit)) {
                if(exif_imagetype($file['tmp_name'][$i])) {
                    move_uploaded_file($file['tmp_name'][$i], "images/{$file['name'][$i]}");
                } 
            }
        }
        return true;
    }
    
    if($saveimages): 
        showImage();
    endif;
    
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            img {
                width: 300px;
                display: block;
                margin: 20px;
            }
        </style>
        <title>Document</title>
    </head>
    <body>
    <?php function showImage() {
        $path = __DIR__ . "/images";
        if($files = scandir($path, SCANDIR_SORT_NONE)):
            for($i=2; $i < count($files); $i++) { 
                ?>

            <img src="<?php echo "images/$files[$i]"?>">

            <?php }
        endif;
    }?>
    </body>
    
    </html>