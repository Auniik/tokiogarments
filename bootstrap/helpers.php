<?php
//use DIRECTORY_SEPARATOR for dynamic separator
function file_path($directory = null){
    if ($directory){
        return $path = 'uploads/' . $directory;
    }
    return 'files/' .$directory;
}

//publication status
function status($signal){
    if ($signal){

        return '<span class="badge badge-success">Active</span>';
    }
    return '<span class="badge badge-danger">Inactive</span>';
}
