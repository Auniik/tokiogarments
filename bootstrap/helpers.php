<?php
//use DIRECTORY_SEPARATOR for dynamic separator
function file_path($directory = null){
    if ($directory){
        return $path = 'uploads/' . $directory;
    }
    return $directory;
}