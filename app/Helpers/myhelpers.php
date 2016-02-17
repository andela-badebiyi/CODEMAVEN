<?php

namespace App\Helpers;

trait myhelpers{
    /**
     * Constructs the associative array that would supplied to the 
     * user model's update method.
     *
     * @param array $data
     *
     * @return array
     */
    private function generateUpdateData($data)
    {
        $output = [];
        foreach ($data as $key => $value) {
            if (($value !== '' || !isset($value)) && $key !== '_token') {
                $output[$key] = $value;
            }
        }

        return $output;
    }

    /**
     * Function to upload a user's avatar to cloudinary.
     *
     * @param string $filepath  the file path of the image to uploaded
     * @param string $public_id the unique cloudinary id of the uploaded image
     *
     * @return array uploaded image's info
     */
    private function upload($filepath, $public_id)
    {
        //set cloudinary config options
        $res = \Cloudinary::config([
          'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
          'api_key'    => env('CLOUDINARY_API_KEY'),
          'api_secret' => env('CLOUDINARY_API_SECRET')
        ]);

        //upload file
        $upload = \Cloudinary\Uploader::upload(
            $filepath,
            [
                'public_id' => $public_id,
                'crop'      => 'fill',
                'width'     => '300',
                'height'    => '300',
            ]
        );

        //return the uploaded file's meta
        return $upload;
    }
}

?>