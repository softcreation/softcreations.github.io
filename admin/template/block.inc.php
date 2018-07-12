
<?=$bueditor?>

<form action="" method="post" class="form-horizontal">
<?php foreach ($vars as $i => $var) : ?>
	<div class="well well-inverse<?=(!isset($_GET['block']) || $_GET['block']!=$i)?' hide':''?>">
		<div class="row-fluid">
			<div class="span12">
				<div class="control-group">
					<label class="control-label" for="page-parent">Название блока:</label>
					<div class="controls">
						<input type="text" class="span8" name="block[<?= $i?>][name]" value="<?= $i?>">
						<p class="help-block span8"><span class="text-info">Только латинские буквы любого регистра, цифры, минус и подчёркивание</span></p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"  for="page-parent">Текст блока:</label>
					<div class="controls">
						<textarea name="block[<?= $i?>][content]" <?=(!isset($_GET['block']) || $_GET['block']!=$i)?'':'class="span8 editor-textarea" rows="10"'?> id="text_<?= $i?>"><?= $var ?></textarea>
						<p class="help-block"><span class="text-info">Текст в HTML формате.<br>
						Элементы массива {$config['sitelink']} оборачивайте фигурными скобками.<br>
						Можно добавлять меню с помощью конструкции {$get_menu_items($this_page, $название меню)}</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?endforeach?>
	<?if(!isset($_GET['block'])):?>
	<div class="well well-inverse">
		<div class="row-fluid">
			<div class="span12">
				<div class="control-group">
					<label class="control-label" for="page-parent">Название блока:</label>
					<div class="controls">
						<input type="text" class="span8" name="block[add_new_block][name]" value="">
						<p class="help-block span8"><span class="text-info">Только латинские буквы любого регистра, цифры, минус и подчёркивание</span></p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Текст блока</label>
					<div class="controls">
						<textarea class="span8 editor-textarea" rows="10" name="block[add_new_block][content]" id="text"></textarea>
						<p class="help-block"><span class="text-info">Текст в HTML формате. Можно использовать переменные $page прямо в тексте.<br>
						Элементы массива {$config['sitelink']} оборачивайте фигурными скобками.<br>
						Можно добавлять меню с помощью конструкции {$get_menu_items($this_page, $название меню)}</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?endif?>
	<div class="form-actions type2">		
		<input type="submit" class="btn btn-success" name="save" value="Сохранить" title="Сохранить/создать страницу">
		<?if(isset($_GET['block'])):?>
		<input type="hidden" name="delete_block" value="<?=$_GET['block']?>" >
		<input type="submit" name="delete" class="btn btn-danger" value="Удалить" class="delete" onclick="return confirm('Вы действительно хотите удалить блок?')">
		<?endif?>
	</div>
</form>