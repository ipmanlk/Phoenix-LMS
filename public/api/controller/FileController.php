<?php
define("UPLOAD_PATH", "../uploads/");
class FileController
{
    public static function upload($fileTmp, $fileName)
    {
        if (move_uploaded_file($fileTmp, UPLOAD_PATH . $fileName)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkExtension($filename, $extension)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext !== $extension) {
            return false;
        }
        return true;
    }

    public static function delete($filename)
    {
        try {
            $path = UPLOAD_PATH . $filename;
            unlink($path);
            return 0;
        } catch (\Throwable $th) {
            return 1;
        }
    }
}
