<?php

class imgUpload
{

    public static function uploadFile(&$file)
    {
        if ($file['error'] != 0) {
            return;
        }
        $taget_dir = "../../imgs/";
        $maxfilesize = 1048576;
        $imageFileType = pathinfo($file['name'], PATHINFO_EXTENSION);
        $allowtypes    = array('jpg', 'png', 'jpeg');
        $allowUpload = true;
        $message = '';

        if ($file["size"] > $maxfilesize) {
            $message = "Không được upload ảnh lớn hơn 1 MB.";
            $allowUpload = false;
        }
        if (!in_array($imageFileType, $allowtypes)) {
            $message = "Chỉ được upload các định dạng JPG, PNG, JPEG";
            $allowUpload = false;
        }

        if (file_exists($taget_dir . $file['name'])) {
            unlink($taget_dir . $file['name']);
        }

        if ($allowUpload) {
            $file['name'] = substr(md5(rand()), 0, 10) . $file['name'];
            move_uploaded_file($file["tmp_name"], $taget_dir . $file['name']);
        }
        return $message;
    }
}
