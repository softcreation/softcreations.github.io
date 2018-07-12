<script type="text/javascript">
	function form_validator(form)
	{
        if (form.page.value == '')
		{
			alert('Страница должна иметь название!');
			form.page.focus();
			return false;
		}
        if (form.title.value == '')
		{
			alert('Страница осталась без заголовка!');
			form.title.focus();
			return false;
		}
		return true;
	}
</script>

<?=$bueditor?>

<form action="" method="post" class="form-horizontal" onsubmit="return form_validator(this);">
	<div class="well well-inverse">
		<p class="text-error"><strong>Двойных кавычек в полях быть не должно!</strong></p>
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="page-parent">ЧПУ (имя файла и адрес страницы в строке браузера)</label>
					<div class="controls">
						<input type="text" class="span12" name="page" value="<?= (isset($form['page'])) ? $form['page'] : '';?>"><br/>
						<p class="help-block span12"><span class="text-info">Только латинские буквы любого регистра, цифры, минус и подчёркивание</span></p>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="page-parent">Заголовок:</label>
					<div class="controls">
						<input type="text" class="span12" name="title" value="<?= (isset($form['title'])) ? $form['title'] : '';?>">
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="page-parent">Ключевые слова:</label>
					<div class="controls">
						<input type="text" class="span12" name="keywords" value="<?= (isset($form['keywords'])) ? $form['keywords'] : '';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Шаблон страницы:</label>
					<div class="controls">
						<select name="template" class="span12">
						<? foreach ($templates as $i => $tpl): ?>
						<option value="<?= $tpl ?>"<?=(isset($form['template']) && $tpl == $form['template'])?'selected="selected"':((!isset($form['template'])&& $tpl == $config['template'])?'selected="selected"':'')?>><?=$tpl?></option>
						<? endforeach ?>
						</select>				
					</div>
				</div>
				
			</div>
			<div class="span6">
				<div class="control-group">
				<label class="control-label" for="page-parent">Описание страницы:</label>
					<div class="controls">
						<input type="text" class="span12" name="description" value="<?= (isset($form['description'])) ? $form['description'] : '';?>">
					</div>
				</div>
				<? if (!empty($blocks)): ?>
				<div class="control-group">
					<label class="control-label" for="page-parent">Блоки:</label>
					<div class="controls">
						<select name="page_blocks[]" multiple="multiple" class="span12">
						<?foreach ($blocks as $i): ?>
						<?$tmp=false; if(isset($form['page_blocks']))
						{
							foreach ($form['page_blocks'] as $j)
							{
								$tmp=($i!=$j && $tmp!=true)?false:true;
							}
						}?>
						<option value="<?=$i?>" <?=($tmp)?'selected="selected"':''?>><?=$i?></option>					
						<? endforeach ?>
						</select>
						<p class="help-block span12"><span class="text-info">Для выделения нескольких блоков зажмите Ctrl</p></span>				
					</div>
				</div>
				<? endif ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label" for="page-parent">Текст страницы:</label>
				<div class="controls">
					<textarea class="span12 editor-textarea" rows="10" name="content" id="text"><?= (!empty($form['content'])) ? $form['content'] : ''; ?></textarea>
					<p class="help-block"><span class="text-info">Текст в HTML формате. Можно использовать переменные $page прямо в тексте.<br>
					Элементы массива {$config['sitelink']} оборачивайте фигурными скобками.<br>
					Можно добавлять блоки.</span>
					</p>
				</div>
			</div>
		</div>
		<?if(!empty($form['row'])):?>
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label" for="page-parent">Содержание файла <?=$page?>:</label>
				<div class="controls">
					<textarea class="span12" rows="10" name="script" id="text"><?= (!empty($form['row'])) ? $form['row'] : ''; ?></textarea>
				</div>
			</div>
		</div>
		<?endif?>
	</div>
	<div class="form-actions type2">
		<input type="hidden" name="oldpage" value="<?= (isset($form['oldpage'])) ? $form['oldpage'] : 'new';?>" >
		<input type="hidden" name="dir" value="<?= isset($_GET['dir']) ? $_GET['dir'] : '' ?>">
		<input type="submit" class="btn btn-success" name="save" value="Сохранить" title="Сохранить/создать страницу">
		<? if (isset($_GET['page'])): ?>
		<input type="submit" name="delete" class="btn btn-danger" value="Удалить" class="delete" onclick="return confirm('Вы действительно хотите удалить страницу?')">
		<?endif?>
	</div>	
</form>