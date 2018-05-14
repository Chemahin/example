 <?php 

	class BookModel extends Model
	{
		static function all($page=0)
		{
			$res = self::$pdo->query('SELECT name, price FROM books');
			#return $res->fetchAll(PDO::FETCH_NUM); // вернет двумерныйн нумерованный массив
			#return $res->fetchAll(PDO::FETCH_OBJ); // вернет данные в виде объекта
			
			#$res = self::$pdo->query('SELECT name FROM books');
			#return $res->fetchAll(PDO::FETCH_COLUMN);//простой одномерный массив , если в подборе всего 1 столбец
			
			#$res = self::$pdo->query('SELECT id, name FROM books');
			#return $res->fetchAll(PDO::FETCH_KEY_PAIR); //первое значение - ключ, второе - его значение

			#$res = self::$pdo->query('SELECT id, name, price FROM books');
			#return $res->fetchAll(PDO::FETCH_UNIQUE); // первое значение ушле в ключ, остальные в ассоциативном массиве (но дублируются колонки)

			//вывести первые 20 книг
			$res = self::$pdo->query('SELECT id, name, price, new, category, themes FROM books ORDER BY id DESC LIMIT '.($page*30).', 30 ');
			return $res->fetchAll(PDO::FETCH_ASSOC);

		}

		static function deleteById($id)
		{
			self::$pdo->query('DELETE FROM books WHERE id='.$id);
		}


		static function getCatrgories()
		{
			return self::$pdo->query('SELECT DISTINCT category FROM books WHERE category IS NOT NULL')->fetchAll(PDO::FETCH_COLUMN);
		}

		static function getThemes()
		{
			return self::$pdo->query('SELECT DISTINCT themes FROM books WHERE themes IS NOT NULL')->fetchAll(PDO::FETCH_COLUMN);
		}
// ДОПИСАТЬ !!!!!!!!
		static function addBook($data)
		{
			extract($data);
			//подготовленный запрос

			$st = self::$pdo->prepare("INSERT INTO books(name,price,category,themes,new) VALUES(:name, :price, :category, :themes, :new)");
			//вернулся объект
			$st->bindParam(':name', $name, PDO::PARAM_STR);
			$st->bindParam(':price', $price, PDO::PARAM_INT);
			$st->bindParam(':category', $category, PDO::PARAM_STR);
			$st->bindParam(':themes', $themes, PDO::PARAM_STR);
			$st->bindParam(':new', $new, PDO::PARAM_INT);

			$st->execute();
		}

		static function changeNew($id, $new)
		{
			$new = ($new==1)?'0':'1';
			$st = self::$pdo->prepare("UPDATE books SET new=:new WHERE id=:id");
			$st->bindParam(':new', $new, PDO::PARAM_STR);
			$st->bindParam(':id', $id, PDO::PARAM_INT);
			
			$st->execute();

			return $st->rowCount();// вернет количество затронутых строк последним запросом
			
		}

	}
	




 ?>