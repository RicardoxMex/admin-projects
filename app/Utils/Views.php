<?php
namespace App\Utils;
class Views
{
    private static $viewPath;
    private static $title;
    private static $data;
    private static $layout;

    public static function setViewPath(string $view) : void{
        $path = str_replace(".", "/", $view);
        self::$viewPath = $path;
    }

    public static function setTitle(string $title) : void{
        self::$title = $title;
    }

    public static function setData(array $data) : void{
        self::$data = $data;
    }
    public static function setLayout(string $layout){
        self::$layout = $layout;
    }

    private static function getChild(){
        $view = new Template('app/Views/pages/' . self::$viewPath . '.php', [self::$data, self::$title]);
        return $view;
    }

    public static function render(){
        $child = self::getChild();
        if(is_null(self::$layout)){
            $view = new Template('app/Views/app.php', [
                'title' => self::$title,
                'child' => $child,
            ]);
        } else {
            $view = new Template('app/Views/layouts/' . self::$layout . '.php', [
                'title' => self::$title,
                'child' => $child,
                'data' => self::$data
            ]);
        }

        echo $view;
    }
}
