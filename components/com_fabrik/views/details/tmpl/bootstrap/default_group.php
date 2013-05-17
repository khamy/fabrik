<?php
/**
 * Bootstrap Details Template
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       3.1
 */
 ?>
<div class="row-striped">
<?php
foreach ($this->elements as $element) :
	$this->element = $element;
	$this->class = 'fabrikErrorMessage';
	$element->fullWidth = $element->span == 'span12' || $element->span == '';
	if (trim($element->error) !== '') :
		$element->error = $this->errorIcon . ' ' . $element->error;
		$element->containerClass .= ' error';
		$this->class .= ' help-inline';
	endif;
	if ($element->fullWidth) :
		 $element->containerClass .= ' row-fluid';
	endif;

	if ($element->startRow) : ?>
			<div class="row-fluid"><!-- start element row -->
		<?php
		endif;
		if ($this->params->get('labels_above', 0) == 1) :
			echo $this->loadTemplate('group_labels_above');
		else :

			if ($element->fullWidth || $this->params->get('labels_above', 0) == 0) :
				echo $this->loadTemplate('group_labels_side');
			else :

				// Multi columns - best to use simplified layout with labels above field
				echo $this->loadTemplate('group_labels_above');
			endif;
		endif;
		if ($element->endRow) :?>
		</div><!-- end row-fluid -->
	<?php endif;
endforeach;

// If the last element was not closing the row add an additional div (only if elements are in columns
if (!$element->endRow && !($element->span == 'span12' || $element->span == '')) :?>
</div><!-- end row-fluid for open row -->
<?php endif;?>
</div>

