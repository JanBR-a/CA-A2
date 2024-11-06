<?php



$routes = [
    'home',
    'alumns',
    'professors',
    'subjects',
    'end'
];

function dd (){
    foreach(func_get_args() as $arg){
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
    }
    die();
}

function router(array $routes){
    $url = parse_url($_SERVER['REQUEST_URI'])['path'];
    $path = explode('/', $url);
    $uri = array_filter($path, function ($item) {
        return $item !== '';
    });
    $uri = array_values($uri);
    if (empty($uri[0])) {
        $uri[0] = 'home';
    }
    if (in_array($uri[0], $routes, true)) {
        return $uri[0];
    } 
    $_SESSION['error'] = "La ruta no existe";
    header("Location: /error", true, 404);
    exit();

    }
    
function validate(){
    $array_items = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($_POST['items'] as $item){
            $array_items[] = htmlspecialchars(trim($item));
        }
        return $array_items;
    }
    return null;
}

function escribirEnArchivo($professsors, $alumns, $subjects){
    $archive = 'data.txt';

    if(!file_exists("/")){
        file_put_contents("/","");
    }

    $professors_str = implode(",",$professsors);
    $alumns_str = implode(",",$alumns);
    $subjects_str = implode(",",$subjects);

    $content = "Professors: $professors_str, alumns: $alumns_str, Subjects: $subjects_str";

    file_put_contents($archive, $content, FILE_APPEND | LOCK_EX);

}


