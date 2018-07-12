<script type="text/javascript">
	function moreInputs(depth, offset, mark)
	{
		$(mark).parent().after('<div class="well well-small control-group"><input type="text" name="new_menu['+depth+'][0][]" class="span3" /><input type="text" name="new_menu['+depth+'][1][]" class="span4" /><input type="text" name="new_menu['+depth+'][2][]" class="span4" /><input type="hidden" name="new_menu['+depth+'][offset][]" class="span4" value="'+offset+'"/><a href="#" title="Удалить пункт меню" onclick="return deleteInputs(this);" class="delete">удалить</a></div><p><a href="#" onclick="return moreInputs('+depth+', '+offset+', (this))">Добавить ещё пункт</a></p>');
		
		$('.add_blocks').remove();
		
		return false;
	}
	function moreInputs1(depth, offset, mark)
	{
		$(mark).parent().after('<div class="well well-small control-group"><input type="text" name="new_menu_block['+depth+']['+offset+'][0][]" class="span3" /><input type="text" name="new_menu_block['+depth+']['+offset+'][1][]" class="span4" /><input type="text" name="new_menu_block['+depth+']['+offset+'][2][]" class="span4" /><a href="#" title="Удалить пункт меню" onclick="return deleteInputs(this);" class="delete">удалить</a></div><p><a href="#" onclick="return moreInputs1('+depth+', '+offset+', (this))">Добавить ещё пункт</a></p>');
		
		return false;
	}	
	function moreBlocks(depth, offset, mark)
	{
		$(mark).parent().after('<div class="well well-small"><div class="well well-small control-group"><input type="text" name="new_menu_block['+depth+']['+offset+'][0][]" class="span3" /><input type="text" name="new_menu_block['+depth+']['+offset+'][1][]" class="span4" /><input type="text" name="new_menu_block['+depth+']['+offset+'][2][]" class="span4" /><a href="#" title="Удалить пункт меню" onclick="return deleteInputs(this);" class="delete">удалить</a></div><p><a href="#" onclick="return moreInputs1('+depth+', '+offset+', (this))">Добавить ещё пункт</a></p></div>');
		
		$(mark).remove();
		
		$('.add_inputs').remove();
		$('.add_blocks').remove();
		
		return false;
		
	}

	function deleteInputs(a)
	{
		if($($(a).parent().parent().children('div')).size()==1){
			$(a).parent().parent().remove();
		}
		else {					
			if($(a).parent().prev().is('p'))
				$(a).parent().prev().remove();
			$(a).parent().next().remove();
			$(a).parent().remove();
		}
								
		return false;
	}
</script>

<form action="" method="post" class="form-horizontal">
	
	<? if (isset($_GET['menu'])): ?>
	<div class="control-group">
		<label class="control-label" for="page-parent">Название меню:</label>
		<div class="controls">
			<input type="text" class="span7" name="new_name" value="<?=$_GET['menu']?>">
			<input type="hidden" name="old_name" value="<?=$_GET['menu']?>">		
			<p class="help-block span7"><span class="text-info">Только латинские буквы любого регистра, цифры, минус и подчёркивание.<br>Первым символом ОБЯЗАТЕЛЬНО! должна быть буква латинского алфавита.</span></p>
		</div>
	</div>
	<div class="form-actions type2">
		<input type="submit" class="btn btn-success" name="save" value="Сохранить" title="Сохранить/создать страницу">
		<? if (isset($_GET['menu'])): ?>
		<input type="hidden" name="delete_menu" value="<?=$_GET['menu']?>" >
		<input type="submit" name="delete" class="btn btn-danger" value="Удалить" class="delete" onclick="return confirm('Вы действительно хотите удалить меню?')">
		<? endif ?>
	</div>
	<div class="well well-inverse">
	<?=$menu_items?>
	</div>
	<? endif ?>
	
	<?if(!isset($_GET['menu'])):?>
	<div class="well well-inverse">
		<div class="row-fluid">
			<div class="span12">
				<div class="control-group">
					<label class="control-label" for="page-parent">Название меню:</label>
					<div class="controls">
						<input type="text" class="span7" name="new_name" value="">
						<p class="help-block span12"><span class="text-info">Только латинские буквы любого регистра, цифры, минус и подчёркивание. Первым символом ОБЯЗАТЕЛЬНО! должна быть буква латинского алфавита.</span></p>
					</div>
				</div>
				<div class="well well-small well-inverse control-group">
					<div class="controls">
						<div class="span3 text-info">адрес страницы</div>
						<div class="span4 text-info">анкор ссылки (текстовая часть ссылки)</div>
						<div class="span4 text-info">заголовок (всплывающая подсказка)</div>
					</div>
				</div>

				<? for ($j=0; $j<5; $j++): ?>

					<div class="well well-small control-group">		
						<input type="text" name="menu[<?=$j?>][0]" class="span3" value="" />
						<input type="text" name="menu[<?=$j?>][1]" class="span4" value="" />
						<input type="text" name="menu[<?=$j?>][2]" class="span4" value="" />
						<a href="#" title="Удалить пункт меню" onclick="return deleteInputs(this);" class="delete">удалить</a>
					</div>

				<? endfor ?>
			</div>
		</div>
	</div>
	<? endif ?>
	<div class="form-actions type2">
		<input type="submit" class="btn btn-success" name="save" value="Сохранить" title="Сохранить/создать страницу">
		<? if (isset($_GET['menu'])): ?>
		<input type="hidden" name="delete_menu" value="<?=$_GET['menu']?>" >
		<input type="submit" name="delete" class="btn btn-danger" value="Удалить" class="delete" onclick="return confirm('Вы действительно хотите удалить меню?')">
		<? endif ?>
	</div>
</form>