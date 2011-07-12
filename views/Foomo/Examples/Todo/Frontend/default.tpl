<?

// something to make life for your IDE better

/* @var $view Foomo\MVC\View */
/* @var $model Foomo\Examples\Todo\Frontend\Model */

?>
<h1><?= $view->_e('TODO') ?></h1>

<div class="greyBox">
	<form action="<?= $view->escape($view->url('addTodo')) ?>" method="post">
		<div class="formBox">
			<div class="formTitle"><?= $view->_e('Description') ?>:</div>
			<input type="text" name="text"/><br />
		</div>
		<div class="formBox">
			<input type="submit" value="<?= $view->_e('Add todo') ?>"/>
		</div>
	</form>
</div>

<!-- incomplete -->
<? if (count($model->getOpenTodos()) > 0): ?>
<br />
<h2><?= $view->_e('OPEN') ?></h2>
<ul>
	<? foreach($model->getOpenTodos() as $todo): ?>
		<li class="toggleBox" style="padding:0;">
			<div class="toogleButton">
				<div class="toggleOpenIcon">+</div>
				<div class="toggleOpenContent">
					<div class="floatLeftBox" style="width:800px;"><?= $view->escape($todo->getText()) ?></div>
					<form class="floatLeftBox" action="<?= $view->escape($view->url('markTodoComplete')) ?>" method="post">
						<input type="hidden" name="id" value="<?= $view->escape($todo->getId()) ?>"/>
						<input type="checkbox" onchange="this.form.submit()"/> <?= $view->_e('Complete') ?>
					</form>
				</div>
			</div>
			<div class="toggleContent">
				<form action="<?= $view->escape($view->url('updateTodo')) ?>" method="post">
					<input type="hidden" name="id" value="<?= $view->escape($todo->getId()) ?>"/>
					<input type="text" value="<?= $view->escape($todo->getText()) ?>" name="text"/>
					<input type="submit" value="update"></input>
				</form>
			</div>
		</li>
	<? endforeach; ?>
</ul>
<? endif; ?>

<!-- complete -->
<? if (count($model->getCompleteTodos()) > 0): ?>
<br />
<h2><?= $view->_e('COMPLETE') ?></h2>
<ul>
	<? foreach($model->getCompleteTodos() as $todo): ?>
		<li class="greyBox" style="padding:0;">
			<div class="innerBox">
				<?= $view->escape($todo->getText()) ?>
			</div>
		</li>
	<? endforeach; ?>
</ul>

<p><?= $view->link($view->_('Clear') , 'removeCompleteTodos', array(), array('class' => 'linkButtonRed')) ?></p>

<? endif; ?>

<!--

%stats%

-->