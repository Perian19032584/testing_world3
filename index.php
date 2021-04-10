<? error_reporting(0)?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
 <style>
 .ff{
	 margin-left: auto;
	 margin-right: auto;

 }
.modal-title img{
	width: 30px;
	height: 30px;
	cursor: pointer;
	float: right;
	position: relative;
	left: 280px;
}

.icon{
    width: 20px;
    cursor: pointer;
}
.read_file{
    height: 75px;
    background: mediumpurple;
    color: white;
    font-weight: 500;
    text-align: center;
    border-radius: 10px;
    margin-left: 15%;
    padding-top: 9px;
    cursor: pointer;
}

 </style> 
  
<body>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Добавить </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/Home.php" method="POST">
      <div class="modal-body">
		<input type="text" name="title" class="form-control" placeholder="Название">
          <input type="hidden" name="method" value="add_films">
          <select class="form-control mt-2" name="format">
              <option value="VHS">VHS</option>
              <option value="DVD">DVD</option>
              <option value="Blu-Ray">Blu-Ray</option>
          </select>
		<input type="text" name="actors" class="form-control mt-2" placeholder="Список актеров">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary call_form_white">Сохранить</button>
      </div>
      </form>

    </div>
  </div>
</div>

<!--        <input class="col-8 row ff form-control" type="text" placeholder="">-->

<div class="col-8 row ff">
    <div class="input-group-prepend">
        <button class="btn btn-outline-secondary search_by active" data-search="search_films" type="button">Фильмы</button>
        <button class="btn btn-outline-secondary search_by" data-search="search_actors" type="button">Актеры</button>
    </div>
    <input type="text" class="form-control search_input" placeholder="Поиск по фильмах" aria-label="" aria-describedby="basic-addon1">
</div>

		<div class="col-8 row ff mt-4">
		<table class="table table-dark">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th>Иконки</th>
			  <th>Название</th>
			  <th>Год выпуска</th>
			  <th>Формат</th>
			  <th>Список актеров</th>
			</tr>
		  </thead>
		  <tbody>

          <?
            $bd = new PDO('mysql:host=localhost;dbname=testing', "root", "root");
            $getActorsFilms = $bd->query("SELECT * FROM actors_films AF INNER JOIN films F ON AF.film_id = F.id INNER JOIN actors A ON AF.actor_id = A.id ORDER BY F.title");
            $getActorsFilms = $getActorsFilms->fetchAll(PDO::FETCH_ASSOC);


                foreach ($getActorsFilms as $item){
                    if($item['film_id'] != $fix_problem_uniqueness){
                        echo "<tr>";
                        echo "<th scope='col'>".$item['id']."</th>";
                        echo "<th>
                            <img class='icon button_delete_ajax' data-film_id='delete_id_{$item['film_id']}' src='delete.png'>
                            <a href='/films.php?film={$item["title"]}'><img class='icon' src='show.png'></a>
                        </th>";
                        echo "<th>{$item['title']}</th>";
                        echo "<th>{$item['year']}</th>";
                        echo "<th>{$item['format']}</th>";
                        echo "<th>{$item['actors']}";

                    }else{
                        echo ", " . $item['actors'];
                    }


                    $fix_problem_uniqueness = $item['film_id'];

                }


          ?>

		  </tbody>
		</table>
		</div>
<br>
        <center>
        <form enctype="multipart/form-data" action="Home.php" method="POST">
             <input type="file" name="files">
            <input type="hidden" name="method" value="load_file">
             <input type="submit">
        </form>
        </center>

    <?
    $file = array_diff(scandir("for_file"), [".", ".."]);
    foreach ($file as $show_file) {
        echo "<div class='col-3 mt-4 row d-inline-block read_file' data-read_file='{$show_file}'><h6>Прочитать</h6>{$show_file}</div>";
    }
    ?>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){
            $('body').on('click', '.button_delete_ajax', function () {
                var deletes = {};
                deletes['film_id'] = $(this).data('film_id');
                deletes['method'] = 'delete_film';

                $.ajax({
                    url: "Home.php",
                    type: "POST",
                    data: deletes,
                    success: () => {
                        var d = $(this).parent()[0];
                        $(d).addClass('dd');
                        $('.dd').parent()[0].remove();
                    }
                });
            });

            $('body').on('click', '.search_by', function () {
                $('.active').removeClass('active');
                $(this).addClass('active');
                var what_are_we_looking_for = $(this).data('search');

                if(what_are_we_looking_for == "search_films"){
                    $(".search_input").attr("placeholder", "Поиск по фильмам");
                }
                if(what_are_we_looking_for == 'search_actors'){
                    $(".search_input").attr("placeholder", "Поиск по актерам");
                }
            });

            $('body').on('input', '.search_input', function (){
               var search = {};
               search['search_input'] = $('.search_input').val();
               search['method'] = "search";
               search['selection_mode'] = $('.active').data('search');

               $.ajax({
                   url: "Home.php",
                   type: "POST",
                   data: search,
                   success: function (res){
                       $('tbody tr').remove();
                       $(".result_search").remove();

                       var res = JSON.parse(res);
                       if(res.length != 0){
                            for(var i = 0; i < res.length; i++){
                                if(res[i].film_id != fix_problem_uniqueness){
                                        $('tbody').append("<tr class='result_search'>" +
                                                "<th scope='col'>" + res[i].id + "</th>" +
                                                "<th><img class='icon button_delete_ajax' data-film_id='delete_id_"+res[i].film_id+"' src='delete.png'>" +
                                                "<a href='/films.php?film="+ res[i].title +"'><img class='icon' src='show.png'></a></th>"+
                                                "<th>"+ res[i].title  + "</th>" +
                                                "<th>"+ res[i].year   + "</th>" +
                                                "<th>"+ res[i].format + "</th>" +
                                                "<th>"+ res[i].actors + "</th>" +
                                                "</tr>");
                                }
                                var fix_problem_uniqueness = res[i].film_id;
                            }

                       }
                   }
               });
            });

            $('body').on('click', ".read_file", function (){
                var read_file = {};
                read_file['method'] = "read_file";
                read_file['parameter'] = $(this).data('read_file');
                $.ajax({
                   url: "Home.php",
                   type: "POST",
                   data: read_file,
                   success: function (){
                       alert('Успешно запарсено');
                       setTimeout(function (){
                           location.reload();
                       }, 1000);
                   }
                });
            });

        });




    </script>

  </body>
</html>
