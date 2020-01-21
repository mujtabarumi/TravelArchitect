<?php

function getEnumConstants($enumClass, $flip = false) {
    $class = new ReflectionClass($enumClass);

    if ($flip) {
        return array_flip($class->getConstants());
    }

    return $class->getConstants();
}

function getEnumValue($enumClass, $key, $flip = false) {
    $constants = getEnumConstants($enumClass, $flip);
    return $constants[$key];
}

function getActiveInactivePackageStep(array $stepMap, $currentStep, $jobData) {
    $steps = [];
    foreach ($stepMap as $step => $stepData) {
        $disabled = $step <= $currentStep ? false : true;
        if ($step > 1 && isset($jobData[$step - 1])) {
            $disabled = false;
        }
        $stepData['disabled'] = $disabled;
        $steps[$step] = $stepData;

    }
    return $steps;
}

function oldOrElse($oldKey, $array, $default = null, $elseKey = null) {
    return (blank($elseKey))
        ? old($oldKey, data_get($array, $oldKey, $default))
        : old($oldKey, data_get($array, $elseKey, $default));
}

function generateStars($rating) {
    $scale = 5;
    $fullRateStart = '<i class="fas fa-star"></i>';
    $halfRateStart = '<i class="fas fa-star-half-alt"></i>';
    $nonRateStart = '<i class="far fa-star"></i>';
    $haveHalf = true;

    if(!$rating){
        $stars = str_repeat($nonRateStart, 5);
        return $stars;
    }


    if(floor($rating) == $rating){
        $haveHalf = false;
    }

    $stars = str_repeat($fullRateStart, intval($rating));
    if($haveHalf){
        $stars .= $halfRateStart;
    }

    $stars .= str_repeat($nonRateStart, ($scale - ceil($rating)));

    return $stars;
}
function saveBase64ImageToTempDirectory($base64Text)
{
    $dirname = "temp_images";
    $dir = storage_path($dirname);

    if(!is_dir($dir)) {
        mkdir($dir);
    }

    $fileNameWithDir = $dirname.DIRECTORY_SEPARATOR.time().".png";
    $filePath = storage_path($fileNameWithDir);

    try {
        $image = \Intervention\Image\Facades\Image::make($base64Text)->save($filePath);
    } catch (Exception $exception) {
        return false;
    }

    return $filePath;
}

function deleteFileIfExist($path)
{
    if (file_exists($path)) {
        unlink($path);
        return true;
    }
    return false;
}

if(!function_exists('getNextKey')){
    function getNextKey($search, $array) {
        $keys = array_keys($array);
        return isset($keys[array_search($search,$keys)+1]) ? $keys[array_search($search,$keys)+1] : $keys[array_search($search,$keys)];
    }
}
function isValidPackageStep($stepEnum,$step) {
    return is_numeric($step)
        && in_array(
            $step,
            array_values(getEnumConstants($stepEnum))
        );
}



