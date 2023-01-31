<?php

function GetSettings()
{
    //Set the file path
    $path = __DIR__ . "/.env";
    if(!file_exists($path)) $path = ".env";

    //Read in the .env file
    if (file_exists($path))
    {
        //Explode the read string by EOL
        $settings = explode(PHP_EOL, file_get_contents($path));

        //Remove the empty lines
        $settings = array_filter($settings, function($item) { return !empty($item) && strpos($item, "#") !== 0; });

        foreach ($settings as $setting){
            //Explode the setting by the = sign
            $setting = explode("=", $setting);

            if(gethostname() == "plesk.remote.ac"){
                //Set the environment variable
                putenv($setting[0] . "=" . substr($setting[1], 0, -1));
                $_ENV[$setting[0]] = substr($setting[1], 0, -1);
            }
            else {
                putenv($setting[0] . "=" . $setting[1]);
                $_ENV[$setting[0]] = $setting[1];
            }
        }
    }
}
