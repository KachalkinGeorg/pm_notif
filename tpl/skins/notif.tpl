<link href="{{ admin_url }}/plugins/pm_notif/tpl/skins/css/style.css" type="text/css" rel="stylesheet"/>
<div id="pm_notifier_new" class="pm-notify">
<div class="pm-notify-message pm-notify-message-style">
	<a class="pm-notify-close" href="#" onclick="this.parentNode.style.display='none';"><span class="pm-notify_close" style="float:right"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span></a>
	{{ foto }}
	<h1>Новое сообщение от: {{ user }}</h1>
	<div style="color:red;">{{ sabj }}</div>
	<p>{{ text }}</p>
	<br>У Вас {{ pm }} в ЛС - {{ link }} 
</div>
</div>
<script>
var pm_notifier_new = {{ limit }};
setTimeout("document.getElementById('pm_notifier_new').style.display='block'", pm_notifier_new);
setInterval("document.getElementById('pm_notifier_new').style.display='none'", 15000);
</script>