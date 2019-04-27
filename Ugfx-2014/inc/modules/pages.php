<?php

class Pages{
	private $Config;
	private $Mysqli;
	private $Auth;
	public $Document;
	
	public function __construct($filepath){
		global $Mysqli, $Auth, $Config;
		require_once('/var/www/ugfx/data/www/ugfx.ru/inc/lib/phpQuery/phpQuery.php');
		$content = file_get_contents($filepath);
	
		$this->Config = $Config;
		$this->Mysqli = $Mysqli;
		$this->Auth = $Auth;
		$this->Document = phpQuery::newDocument($content);
	}
	
	public function verifyDocument($project_id, $ym_id){
		if(!$this->checkMeta('description')) $this->addMeta('description', '');
		if(!$this->checkMeta('keywords')) $this->addMeta('keywords', '');
		$this->addOldBrowsersScript();
		if($ym_id != 1337 && $ym_id != 0){
			$this->Document->find('body')->append($this->YMcode($ym_id));
			
			$ym_custom_goals = $this->Document->find('[data-uvee-ym]');
			foreach($ym_custom_goals as $el){
				$el = pq($el);
				$attr = $el->attr('data-uvee-ym');
				$el->attr('onclick',"yaCounter{$ym_id}.reachGoal('{$attr}');");
			}
		}
		
		$this->Mysqli->query("UPDATE `project_forms_ym` SET `f1_name`='',`f1_value`='',`f2_name`='',`f2_value`='',`f3_name`='',`f3_value`='',`f4_name`='',`f4_value`='',`f5_name`='',`f5_value`='',`f6_name`='',`f6_value`='',`f7_name`='',`f7_value`='',`f8_name`='',`f8_value`='' WHERE `project_id`='{$project_id}';");
		
		$forms = $this->Document->find('form[data-name]');
		$uniq_forms = array();
		$incr = 0;
		foreach($forms as $el){
			$form = pq($el);
			$form_name = $this->Mysqli->real_escape_string(trim($form->attr('data-name')));
			/*if(($key = array_search($form_name, $uniq_forms)) !== false){
				$form->attr('onsubmit', "yaCounter%ya_id%.reachGoal('{$key}'); return true;");
				continue;
			}elseif($incr == 8) continue;*/
			if($incr == 8) continue;
			
			$incr++;
			$uniq_name = 'form'.$incr;
			
			if($ym_id != 1337 && $ym_id != 0){
				$form->attr('onsubmit', "yaCounter{$ym_id}.reachGoal('{$uniq_name}');");
				//$button_code = "yaCounter{$ym_id}.reachGoal('button_{$uniq_name}');";
				//pq($form->find('button'))->attr('onclick',$button_code);
				//pq($form->find('input[type=submit]'))->attr('onclick',$button_code);
			}
			$this->Mysqli->query("UPDATE `project_forms_ym` SET `f{$incr}_name`='{$uniq_name}', `f{$incr}_value`='{$form_name}' WHERE `project_id`='{$project_id}';");
		}
	}
	
	public function checkMeta($name){
		$meta = $this->Document->find('meta[name='.$name.']');
		$meta_name = pq($meta)->attr('name');
		return empty($meta_name)?false:true;
	}
	
	public function addMeta($name, $content){
		$this->Document->find('head')->append('<meta name="'.$name.'" content="'.$content.'">');
	}

	public function addOldBrowsersScript(){
		$this->Document->find('head')->append('<script>var $buoop = {c:2};function $buo_f(){var e = document.createElement("script");e.src = "//browser-update.org/update.min.js";document.body.appendChild(e);};try {document.addEventListener("DOMContentLoaded", $buo_f,false)}catch(e){window.attachEvent("onload", $buo_f)}</script>');
	}
	
	public function Title($title=null){
		return $this->Document->find('title')->text($title);
	}
	
	public function Description($description=null){
		return $this->Document->find('head')->find('meta[name=description]')->attr('content', $description);
	}
	
	public function Keywords($keywords=null){
		return $this->Document->find('head')->find('meta[name=keywords]')->attr('content', $keywords);
	}
	
	private function YMcode($ym_id){
		return <<<CODE
		<script type="text/javascript" src="http://ugfx.ru/api/js-ip.php"></script>
		<!-- Yandex.Metrika counter -->
		<script type="text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter{$ym_id} = new Ya.Metrika({
						id:{$ym_id},
						params:{
							ip_adress:IP
						},
						webvisor:true,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
					});
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
		</script>
		<noscript><div><img src="//mc.yandex.ru/watch/{$ym_id}" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
CODE;
	}
}	

?>