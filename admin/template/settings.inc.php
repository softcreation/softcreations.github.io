
<form action="" method="post" class="form-horizontal" onsubmit="return form_validator(this);">
	<div class="well well-inverse">
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="page-parent">Заголовок сайта:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[sitename]"><?= (isset($settings['sitename'])) ? $settings['sitename'] : '' ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Слоган:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[slogan]" value="<?= (isset($settings['slogan'])) ? $settings['slogan'] : '' ?>" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Кодировка:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[encoding]" value="<?= (isset($settings['encoding'])) ? $settings['encoding'] : '' ?>" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Шаблон по умолчанию:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[template]" value="<?= (isset($settings['template'])) ? $settings['template'] : '' ?>" >
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="page-parent">Логин:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[login]" value="<?= (isset($settings['login'])) ? $settings['login'] : '' ?>" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Пароль:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[password]" value="<?= (isset($settings['password'])) ? $settings['password'] : '' ?>" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">Секретное слово для генерации антиспама:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[secretWord]" value="<?= (isset($settings['secretWord'])) ? $settings['secretWord'] : '' ?>" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="page-parent">E-mail адрес, на который отправляется сообщение:</label>
					<div class="controls">
						<input type="text" class="span12" name="settings[email][receiver]" value="<?= (isset($settings['email']['receiver'])) ? $settings['email']['receiver'] : '' ?>" >
					</div>
				</div>
			
			
				<div class="control-group">
					<label class="control-label" for="page-parent">Тема письма обратной связи:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[email][subject]"><?= (isset($settings['email']['subject'])) ? $settings['email']['subject'] : '';?></textarea>
					</div>
				</div>
				
			</div>
			<div class="span6">
				
				<div class="control-group">
					<label class="control-label" for="page-parent"> Обязательно ли поле «Тема письма»:</label>
					<div class="controls">
						<select name="settings[form][feedback][subject]" class="span12">
						<option value="true" <?=($settings['form']['feedback']['subject']== 'true')?'selected="selected"':''?>>Да</option>
						<option value="false" <?=($settings['form']['feedback']['subject']== 'false')?'selected="selected"':''?>>Нет</option>
						</select>				
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">Сообщение отправлено:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][feedbackSent]"><?= (isset($settings['form']['feedbackSent'])) ? $settings['form']['feedbackSent'] : '';?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">Неудачная отправка:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][notSent]"><?= (isset($settings['form']['notSent'])) ? $settings['form']['notSent'] : '';?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">СПАМ?!:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][isSpam]"><?= (isset($settings['form']['isSpam'])) ? $settings['form']['isSpam'] : '';?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">Нет мыла!:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][emptyEmail]"><?= (isset($settings['form']['emptyEmail'])) ? $settings['form']['emptyEmail'] : '';?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">Нет имени!:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][emptyName]"><?= (isset($settings['form']['emptyName'])) ? $settings['form']['emptyName'] : '';?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">Нет темы!:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][emptyTopic]"><?= (isset($settings['form']['emptyTopic'])) ? $settings['form']['emptyTopic'] : '';?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="page-parent">Нет сообщения!:</label>
					<div class="controls">
						<textarea class="span12" rows="2" name="settings[form][emptyMessage]"><?= (isset($settings['form']['emptyMessage'])) ? $settings['form']['emptyMessage'] : '';?></textarea>
					</div>
				</div>
			</div>			
		</div>
		<?if(isset($file)):?>
		<div class="row-fluid">
			<div class="control-group">
				<label class="control-label" for="page-parent">Содержание файла config.ini.php:</label>
				<div class="controls">
					<textarea class="span12" rows="10"><?= (isset($file)) ? $file : ''; ?></textarea>
				</div>
			</div>
		</div>
		<?endif?>
	</div>
	<div class="form-actions type2">
		<input type="submit" class="btn btn-success" name="save" value="Сохранить" title="Сохранить/создать страницу">
	</div>	
</form>