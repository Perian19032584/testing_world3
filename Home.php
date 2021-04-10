<?php
error_reporting(0);
//ini_set('memory_limit','-1');

class Home {

    private $title;
    private $format;
    private $method;
    private $actors;
    private $year;

    protected $bd;

    public static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function run($data){ // Пускай будет нашим главным контроллером

        if(empty($this->bd)) {
            $this->bd = new PDO('mysql:host=localhost;dbname=testing', "root", "root");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        $this->setMethod($data['method']);

        $this->routing($data);
    }

    private function setTitle($title){
        $this->title = $title;
    }
    private function getTitle(){
        return $this->title;
    }

    private function setFormat($format){
        $this->format = $format;
    }
    private function getFormat(){
        return $this->format;
    }

    private function setActors($actors){
        $this->actors = $actors;
    }
    private function getActors(){
        return $this->actors;
    }

    private function getYear(){
        return !empty($this->year) ? $this->year : date('Y');
    }
    private function setYear($year){
        $this->year = !empty($year) ? $year : date('Y');
    }
    private function setMethod($method){
        $this->method = $method;
    }
    private function getMethod(){
        return $this->method;
    }

    private function routing($data){
        switch($this->getMethod()){
            case "add_films":
                $this->setTitle($data['title']);
                $this->setFormat($data['format']);
                $this->setActors($data['actors']);

                    if($data['year'] != null){
                    $this->setYear($data['year']);
                }
                $this->add_films();
            break;
            case "search":
                $this->search(ucfirst(mb_substr(preg_replace("/search_/", "", $data['selection_mode']), 0, 1)), $data['search_input']);
            break;
            case "load_file":
                $this->load_file($_FILES['files']);
            break;
            case "delete_film":
                $this->delete_films(preg_replace("/delete_id_/", "", $data['film_id']));
            break;
            case "read_file":
                $this->read_file($data['parameter']);
            break;
            default:
                var_dump('Произошла ошибка');
                exit;
            break;
        }
    }

    private function load_file($file){
        move_uploaded_file($file["tmp_name"], "for_file/" . $file['name']);
        header('Location: /');
    }

    public function read_docx($filename){ $striped_content = ''; $content = ''; if(!$filename || !file_exists($filename)) return false; $zip = zip_open($filename); if (!$zip || is_numeric($zip)) return false; while ($zip_entry = zip_read($zip)) { if (zip_entry_open($zip, $zip_entry) == FALSE) continue; if (zip_entry_name($zip_entry) != "word/document.xml") continue; $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)); zip_entry_close($zip_entry); } zip_close($zip); $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content); $content = str_replace('</w:r></w:p>', "\r\n", $content); $striped_content = strip_tags($content); return $striped_content; }

    private function read_file($name_file){

        $file = explode(PHP_EOL, $this->read_docx("for_file/". $name_file));

        unset($file[0]);

        foreach($file as $val_array){
            preg_match_all('/(([a-z ])+)[\:]([^\:]+)/i',trim($val_array), $result);
            if($result[1][0]){

                if($result[1][0] == 'Title'){
                    $key = 'title';
                    $data[$key]=trim($result[3][0]);
                }
                if($result[1][0] == "Release Year"){
                    $key = "year";
                    $data[$key]=trim($result[3][0]);
                }
                if($result[1][0] == "Format"){
                    $key = "format";
                    $data[$key]=trim($result[3][0]);
                }
                if($result[1][0] == "Format"){
                    $key = "format";
                    $data[$key]=trim($result[3][0]);
                }
                if($result[1][0] == "Stars"){
                    $key = "actors";
                    $data[$key]=trim($result[3][0]);
                }

                $array2[$key]=trim($result[3][0]);

                if(count($array2)==4){
                    $array_out[]=$array2;
                    $array2=null;
                }
            foreach($array_out as $add_films){
                $this->setMethod('add_films');
                $this->routing($add_films);
            }

            }
        }
    }

    protected function search($table, $search){
        if($search != "") {
            $column = ($table == "F") ? 'title' : 'actors';
            $data = $this->bd->query("SELECT * FROM actors_films AF INNER JOIN films F ON AF.film_id = F.id INNER JOIN actors A ON AF.actor_id = A.id WHERE {$table}.{$column} LIKE '{$search}' ORDER BY F.title");
            echo json_encode($data->fetchAll());
        }else{
            $data = $this->bd->query("SELECT * FROM actors_films AF INNER JOIN films F ON AF.film_id = F.id INNER JOIN actors A ON AF.actor_id = A.id ORDER BY F.title");
            echo json_encode($data->fetchAll());
        }
    }

    private function delete_films($film_id){
        $data = $this->bd->prepare("DELETE FROM actors_films WHERE film_id = :film_id");
        $data->bindParam(":film_id", $film_id);
        $data->execute();

        $data = $this->bd->prepare("DELETE FROM films WHERE id = :film_id");
        $data->bindParam(":film_id", $film_id);
        $data->execute();
    }

    protected function uniqueness($table, $column, $seach){
        $uniqueness = $this->bd->query("SELECT id FROM {$table} WHERE {$column} = '{$seach}'");
        return $uniqueness->fetchAll()[0]['id'];
    }

    private function add_films(){

        $uniqueness_film = $this->uniqueness('films', 'title', $this->getTitle());

        if (empty($uniqueness_film)) {

            $data = $this->bd->prepare("INSERT INTO films(title, year, format) VALUES(:title, :year, :format)");

            $data->bindParam(':title', $this->getTitle());
            $data->bindParam(':year', $this->getYear());
            $data->bindParam(':format', $this->getFormat());
            $data->execute();

            $uniqueness_film = $this->uniqueness('films', 'title', $this->getTitle());
        }

        $actors = explode(" ", $this->getActors());

        foreach ($actors as $add_actor) {

            $processed_actor = preg_replace("/,/", "", $add_actor);
            $uniqueness_actor = $this->uniqueness('actors', 'actors', $processed_actor);

            if (empty($uniqueness_actor)) {

                $data = $this->bd->prepare("INSERT INTO actors(actors) VALUES(:actors)");
                $data->bindParam(':actors', $processed_actor);
                $data->execute();

                $uniqueness_actor = $this->uniqueness('actors', 'actors', $processed_actor);

            }


            $no_repetitions = $this->bd->query("SELECT id FROM actors_films WHERE film_id = '{$uniqueness_film}' AND actor_id = '{$uniqueness_actor}'");
            $no_repetitions = $no_repetitions->fetchAll()[0]['id'];

                if(empty($no_repetitions)) {
                    $data = $this->bd->prepare("INSERT INTO actors_films(film_id, actor_id) VALUES(:film_id, :actor_id)");
                    $data->bindParam(':film_id', $uniqueness_film);
                    $data->bindParam(':actor_id', $uniqueness_actor);
                    $data->execute();
                }

        }
        header('Location: /');
    }


}

$home = Home::instance();
$home->run($_POST);


