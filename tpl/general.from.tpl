<form method="post" action="">
	<div class="panel-body" style="font-family: Franklin Gothic Medium;text-transform: uppercase;color: #9f9f9f;">Настройки плагина</div>
	<div class="table-responsive">
	<table class="table table-striped">
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Выберите каталог из которого плагин будет брать шаблоны для отображения</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Шаблон сайта</b> - плагин будет пытаться взять шаблоны из общего шаблона сайта; в случае недоступности - шаблоны будут взяты из собственного каталога плагина<br /><b>Плагин</b> - шаблоны будут браться из собственного каталога плагина</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
		  {{ localsource }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Введите размер изображения аватара</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Высота</b>x<b>Ширина</b> - размер в пикселях (по умолчанию 50px)</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group mb-3">
				<input type="number" name="save_con[height]" value="" class="form-control" style="max-width:80px; text-align: center;">
					<div class="input-group-prepend input-group-append">
						<label class="input-group-text">x</label>
					</div>
				<input type="number" name="save_con[width]" value="" class="form-control" style="max-width:80px; text-align: center;">
			</div>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Обрезка сообщения</h6>
		  <span class="text-muted text-size-small hidden-xs">Укажите количество символов сообщения при показе (по умолчанию 200 символов)</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<input type="number" name="save_con[cunt]" value="" class="form-control" style="max-width:80px; text-align: center;">
        </td>
      </tr>	
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Интервал показа уведомления</h6>
		  <span class="text-muted text-size-small hidden-xs">Выберите, через какое время будет отображаться уведомление (по умолчанию 5сек)</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="limit">{{ limit }}</select>
        </td>
      </tr>						
	</table>
	</div>
	<div class="panel-footer" align="center">
		<button type="submit" name="submit" class="btn btn-outline-primary">Сохранить</button>
	</div>
</form>