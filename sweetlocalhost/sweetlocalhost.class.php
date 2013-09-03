<?php
	class SweetLH{
		private $dir,
				$ext,
				$phpver,
				$sqlver,
				$googlelib,
				$jquery,
				$linkStag,
				$linkEtag,
				$linkMtag,
				$newsurl,
				$title,
				$credits
				;
		public function __construct(){
			$this->dir 			= getcwd();
			$this->ext 			= $arr = get_loaded_extensions();
			$this->phpver 		= phpversion();
			$this->sqlver 		= mysql_get_server_info();
			$this->googlelib 	= "<a href='http://developers.google.com/speed/libraries/'>Google libs</a>";
			$this->jquery 		= "<a href='http://jquery.com'>jQuery website</a>";
			$this->linkStag 	= "<span class='usefull_link_txt'>";
			$this->linkMtag 	= "<span class='usefull_link'>";
			$this->linkEtag 	= "</span></span><br>";
			$this->newsurl 		= "http://www.webmonkey.com/feed/";
			$this->title		= "<h1>Sweet LocalHost</h1>";
			$this->credits		= "<h3>Made by Dayvi Schuster  if you like it Follow me on 
								   <a href='http://twitter.com/DayviSchuster'>Twitter</a> or Email me at:  Dayvi1990@gmail.com</h3>";
		}
		public function __destruct(){
			$this->dir 			= NULL;
			$this->ext 			= NULL;
			$this->phpver		= NULL;
			$this->sqlver 		= NULL;
			$this->googlelib	= NULL;
			$this->jquery 		= NULL;
			$this->linkStag 	= NULL;
			$this->linkMtag 	= NULL;
			$this->linkEtag 	= NULL;
			$this->newsurl		= NULL;
			$this->title		= NULL;
			$this->credits		= NULL;
		}
		public function loadTitle(){
			$title = $this->title;
			echo $title;
		}
		public function loadArr(){
			$dir = $this->dir;
			//scan that dir.
			$arr = scandir($dir);
			echo "<h2>Your working directories</h2>";
			echo "<ul id='localhost_dirs'>";
			foreach($arr as $key=>$val){
				//and now we limit this motherfucker.
				if(is_dir($val)){
				if($val != "."){
					if($val != ".."){
						if($val != "sweetlocalhost"){
							echo "<li><input class='d_chk' name='dir_chk' type='checkbox' value='".$val."'/> <a href='".$val."'>" . $val . "</a></li>";
						}
					}
				}
				}
			}//end of foreach statement
			//echo "<button class='del_btn' id='del_dirs'>Delete</button>";
			echo "</ul>";
			
		}
		public function loadExt(){
			$arr = $this->ext;
			$splitArr = array_chunk($arr, 10);
			echo "<h2>Installed PHP extensions: </h2>";
			echo "<div id='php_extensions'>";
			foreach($splitArr as $kay => $array){
				echo "<ul>";
				foreach($array as $value){
					echo "<li><div id='ext_icon'></div>".$value."</li>";
				}
				echo "</ul>";
			}
			echo "</div>";
		}
		public function loadPHPver(){
			echo $this->linkStag."Your PHP version is: ".$this->linkMtag.$this->phpver.$this->linkEtag;
		}
		public function loadSQLver(){
			echo $this->linkStag."Your MySQL version is: ".$this->linkMtag.$this->sqlver.$this->linkEtag;
		}
		public function loadphpmyadmin(){
			echo $this->linkStag."phpmyadmin: <a href='phpmyadmin'>phpmyadmin</a>".$this->linkMtagM.$this->linkEtag;
		}
		public function loadphpinfo(){
			echo $this->linkStag."PHP info: <a href='sweetlocalhost/phpinfo.php'>phpinfo()</a>".$this->linkMtagM.$this->linkEtag; 
		}
		public function loadGoogle_lib_link(){
			echo $this->linkStag."Google hosted Libraries: ".$this->linkMtag.$this->googlelib.$this->linkEtag;
		}
		public function loadJQuery_lib_link(){
			echo $this->linkStag."Google hosted Libraries: ".$this->linkMtag.$this->jquery.$this->linkEtag;
		}
		public function loadNews(){
			$url = $this->newsurl;
			$feed = file_get_contents($url);
			$x = new SimpleXMLElement($feed);
			$i = 0;
			foreach($x->channel->item as $key=>$elem){
				$arr[$i]['title'] = $elem->title;
				$arr[$i]['link'] = $elem->link;
				$i++;
			}
			return $arr;
		}
		public function dispNews($num){
			$arr = $this->loadNews();
			echo $arr[$num]['title'];
			echo "... read more <a href='".$arr[$num]['link']."'>here</a>";
		}
		public function loadCred(){
			$cred = $this->credits;
			echo "<div id='cred_wrap'>";
			echo $cred;
			echo "</div>";
		}
		public function makeFolder($dir_name){
			//$e = mkdir(getcwd().$dir_name);
			$dir = getcwd().$dir_name;
			if(strpos($dir, "sweetlocalhost")){
				$dir = str_replace("sweetlocalhost", "", $dir);
			}
			$e = mkdir($dir);
		}
	}
?>