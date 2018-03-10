<?php


interface StudentGroupInterface {
	

	public function __construct($name);
	public function all($offset, $limit);
	public function get($id);
}
	

class StudentGroup {


	public $name;
	public $id;
	public $fio;
	public $birthday;
	public $tel;
	public $group = [];
	public $param;

	private $handler;

	private $content = false;

		public function __construct($name = false) {
			if($name)
				$this->name = $name;
				$this->open('r+');
		}

	public function open($mode) //Функця открытия файла
	{
		$this->handler = fopen($this->name, $mode); 
		if($this->handler === FALSE)
			throw new Exception('Unable to open file');
	}

	public function close()
	{
		fclose($this->handler); //Закрываем обработчик
	}

	public function all($offset = null, $limit)
		{
			$this->content = '';
			$this->limit = $limit;
			$this->offset = $offset;
			$this->group = $group = [];
			// $group = [];
			$groupItem = array ('id', 'fio', 'birthday', 'tel');

			while (!feof($this->handler)) {

				$group[] = explode(',', fgets($this->handler, 10000));

				foreach ($group as $key => $value) {	
					$group[$key] = array_combine($groupItem, $group[$key]);
					// $group11[0][$groupItem[$key]]=$value;
				}
			}	

			if($offset != 0)
			{
				for ($i = $offset; $i <= count($group)-1; $i++)
				{
					if ($i == $limit)
						break;

					echo '<pre>';
					var_dump($group[$i]);
					echo '</pre>';

				}
				return;
			}

			return $group;

		}
/*
	public function get($param){
		$this->group = $group = [];
		$this->param = $param;

		$id = preg_grep($param, $group);
		echo $id;


	}*/


}



