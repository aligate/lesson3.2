<?php
header('Content-Type: text/html; charset=utf-8');

interface Commentable
{
	public function getComments($id);
	
}

class News implements Commentable
{
	
	private $title;
	private $comment;
	
	// Метод для создания списка новостей
	public function getAllNews()
	{
		
		$data = json_decode(file_get_contents('news.json'), true);
		return $data;
	}
	// Метод для извлечения одной новости
	public function getOneNews($id)
	{
		$data = $this->getAllNews();
		foreach($data as $key=>$value)
		{
			if($key==$id) return $key.' -- '.$value;
		}
			
	}
		
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	// Метод для вывода названия рубрики
	public function getTitle()
	{
		return $this->title;
	}
	
	// Метод для содания массива комментариев
	public function getComments($id)
	{
		$this->comment = new Comments();
		return $this->comment->getCommentsById($id);
		
	}
	
	// Метод для вывода одной новости
	public function renderOneNews($id)
	{
		$name = $this->getTitle();
		$content = $this->getOneNews($id);
		$comments = $this->getComments($id);
		require 'viewone.php';
		
	}
		
	// Метод для вывода всех новостей
	public function renderNewsList()
	{
		$name = $this->getTitle();
		$content = $this->getAllNews();
		require 'view.php';
		
	}
	
}

// Класс Комментариев

class Comments
{
	
	public function getCommentsById($id)
	{
	$data = json_decode(file_get_contents('comment.json'), true);
	return $data[$id];
	}
	
}

// Создаем объект

$obj = new News();
$obj->setTitle('Новости');

$id= $_GET['id'] ? $_GET['id'] : null;
if(isset($id)) $obj->renderOneNews($id);
else $obj->renderNewsList();




