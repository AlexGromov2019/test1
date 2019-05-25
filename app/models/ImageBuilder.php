<?php

namespace App\models;
use Intervention\Image\ImageManager;

class ImageBuilder
{
    public function saveImageAvatar(){
        $dirname = '../assets/images/avatars/';
        $filename = rand(0, 999999);
        $extension = '.jpg';
        $quality = '100';
        $path = $dirname . $filename . $extension;

        //создать объект и указать драйвер изображений
        $manager = new ImageManager(['driver' => 'Gd']);
        //Взять изображение из временной папки
        $img = $manager->make($_FILES['pictures']['tmp_name'])
            //Уменьшить и Обрезать изображение
            ->fit(169)
            //Сохранить в папке, имя файла, расширение, качество
            ->save($path, $quality);
        //Вернуть имя загруженного файла
        return $filename.$extension;
    }

    public function saveImagePost(){
        $dirname = '../assets/images/posts/';
        $filename = rand(0, 999999);
        $extension = '.jpg';
        $quality = '100';
        $path = $dirname . $filename . $extension;

        //создать объект и указать драйвер изображений
        $manager = new ImageManager(['driver' => 'Gd']);
        //Взять изображение из временной папки
        $img = $manager->make($_FILES['pictures']['tmp_name'])
            //Уменьшить и Обрезать изображение
            ->fit(750, 469)
            //Сохранить в папке, имя файла, расширение, качество
            ->save($path, $quality);
        //Вернуть имя загруженного файла
        return $filename.$extension;
    }
}