<?php
/**
 * Created by PhpStorm.
 * User: khali
 * Date: 08/07/2020
 * Time: 14:30
 */

namespace App\Heleper;


use Illuminate\Support\Facades\File;

class helper
{
    /**
     * Created by PhpStorm.
     * User: khali
     * Date: 08/07/2020
     * Time: 14:04
     * @param String $name
     * @return String $path
     */
    function getPathToFakeImage(String $name)
    {
        $filesArray = [
            'images',
            'images/products',
        ];
        $pathToMove = 'images/products' . $name;
        array_push($filesArray, $pathToMove);
        foreach ($filesArray as $item) {
            $path = storage_path() . '/' . $item . '/';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
        }
        $path = storage_path() . '/' . $pathToMove;
        return $path;
    }
}
