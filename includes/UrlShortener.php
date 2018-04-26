<?php
/**
* UrlShortener Class
* 
* @author Saeed Moghadam Zade
* @author URL : http://phpro.ir
* 
* 
* Database Create :
* CREATE TABLE `url_shortener`.`urls` (
* `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
* `url` VARCHAR( 500 ) NOT NULL ,
* `short_code` VARCHAR( 15 ) NOT NULL ,
* `visits` int NOT NULL ,
* `create_time` TIMESTAMP NOT NULL
* ) ENGINE = MYISAM ;
*/

class UrlShortener
{

	private $pdo;
	
	public function __construct()
	{
		$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
		
	}
	
	/**
	* Create short code
	* 
	*/
	public function createShortCode()
	{
		$chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";
		$short_code = '';
		while(strlen($short_code) < 7) {
			$short_code .= $chars[rand(0,strlen($chars))];
		}
		// check in db
		$stm = $this->pdo->prepare('select * from urls where short_code = :short');
		$stm->execute(array('short'=>$short_code));
		$res = $stm->fetch();
		print_r($res);
		
		return $short_code;
	}
	
	/**
	* return true if url format valid
	* 
	*/
	public function validUrl($url)
	{
		return filter_var($url , FILTER_VALIDATE_URL , FILTER_FLAG_HOST_REQUIRED);
	}
	
	/**
	* Check url exist in db
	* @param $url String
	*/
	public function existInDb($url)
	{
		$stm = $this->pdo->prepare('select * from urls where url = \''.$url.'\'');
		$stm->execute();
		$res = $stm->fetch();
			
		return ( empty($res['short_code']) ? false : $res['short_code']);
	}
	
	public function insertInDb($url)
	{
		// if url exist in db return short code
		if(($short_code = $this->existInDb($url)) !== false) {
			return $short_code;
		}
		// insert in db and return short code
		if($this->validUrl($url)) {
		    $short_code = $this->createShortCode($url);
			$stm = $this->pdo->prepare('insert into urls (url , short_code,create_time,visits)values(:url,:short_code,:time,:visits)');
			$param = array('url'=>$url,'short_code'=>$short_code,'time'=>date("Y-m-d H:i:s"),'visits'=>0);
			$stm->execute($param);
			return $short_code;
		} else {
			return 'invalid';
		}
		
		return false;
	}
	
	/**
	* return url
	*/
	public function getUrl($short_code)
	{
		$stm = $this->pdo->prepare('select * from urls where short_code = :short');
		$stm->execute(array('short'=>$short_code));
		$result = $stm->fetch();
		
		return $result['url'];
	}
	
	
	public function addCount($url)
	{
		$stm = $this->pdo->prepare('update urls set visits = visits +1 where url = :url');
		$stm->execute(array('url'=>$url));
	}
		
	public function getAll()
	{
		$stm = $this->pdo->prepare('select * from urls');
		$stm->execute();
		return $stm->fetchAll();
	}



	// helper function to use keyword as generated URL
    public function insertWithOutGenerating($url, $keyword)
    {
        // if url exist in db return short code
        if(($short_code = $this->existInDb($url)) !== false) {
            return $short_code;
        }

        // insert in db and return short code
        if($this->validUrl($url)) {
            $short_code = $keyword;
            $stm = $this->pdo->prepare('insert into urls (url , short_code,create_time,visits)values(:url,:short_code,:time,:visits)');
            $param = array('url'=>$url,'short_code'=>$short_code,'time'=>date("Y-m-d H:i:s"),'visits'=>0);
            $stm->execute($param);
            return $short_code;
        } else {
            return 'invalid';
        }

        return false;
    }
}
