<?php 
class FilmModel extends Model
	{
		static function all()
		{
			$res = self::$pdo->query('SELECT name, info FROM films');
			return $res->fetchAll(PDO::FETCH_ASSOC);

		}

		
// ДОПИСАТЬ !!!!!!!!
		static function addFilm($data)
		{
			// extract($data);
			//подготовленный запрос

			$st = self::$pdo->prepare("INSERT INTO films(name,info) VALUES(:name, :info)");
			//вернулся объект
			for ($i=0; $i < count($data['name']); $i++) { 
				$st->bindParam(':name', $data['name'][$i], PDO::PARAM_STR);
				$st->bindParam(':info', $data['info'][$i], PDO::PARAM_STR);
				$st->execute();
			}
		}

		

	}
	






 ?>