<?php
class ViewApi
{
	private $Mysqli;
	private $Config;
	private $Auth;
	private $Model;

	public function __construct()
	{
		global $Mysqli, $Config, $Auth;

		$this->Mysqli = $Mysqli;
		$this->Config = $Config;
		$this->Auth = $Auth;
		$this->Model = new Model();
	}

	public function _view($name)
	{
		try {
			$action = $name . 'Api';
			if (is_callable(array($this, $action))) {
				$this->$action();
			} else exit('Метод не найден.');
		} catch (Exception $e) {
			exit($e->getMessage());
			//.print_r($_POST,!0)
		}
	}

	public function get_ymApi(){
		echo <<<CODE
		<!-- Yandex.Metrika counter -->
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter{$ym_id} = new Ya.Metrika({id:{$ym_id},
							webvisor:true,
							clickmap:true,
							trackLinks:true,
							accurateTrackBounce:true});
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
		<!-- /Yandex.Metrika counter -->
CODE;
	}

	public function get_custom_js(){

	}
}