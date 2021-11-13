<?php
 namespace App\Traits;

 trait ImageTrait{

    public function saveimage( $image , $folder )
    {
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $image->move($folder, $file_name);

        return $file_name;
    }
 }