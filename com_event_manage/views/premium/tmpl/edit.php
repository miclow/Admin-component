<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Event_manage
 * @author     jainik <jainik@raindropsinfotech.com>
 * @copyright  Copyright (C) 2015. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JPATH_ROOT . 'media/com_event_manage/css/edit.css');
// GET gst value;
$gst = $this->gst;
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {

		js("#jform_brokerfee").blur(function() {
			var bf = js('#jform_brokerfee').val();
			var gstpercentage = parseInt('<?php echo $gst[0]->price; ?>');
			var gstfee = (bf * gstpercentage)/100;
			var n = gstfee.toFixed(2);
			if(gstfee != 0){
				js('#jform_disgstfee').val( n );
				js('#jform_gstfee').val( n );
			}

		});
		
	});


	Joomla.submitbutton = function (task) {
		if (task == 'premium.cancel') {
			Joomla.submitform(task, document.getElementById('premium-form'));
		}
		else {
			
			if (task != 'premium.cancel' && document.formvalidator.isValid(document.id('premium-form'))) {
				
				Joomla.submitform(task, document.getElementById('premium-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_event_manage&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="premium-form" class="form-validate">

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_EVENT_MANAGE_TITLE_PREMIUMS', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">

				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('performers'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('performers'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('postalstate'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('postalstate'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('premium'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('premium'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('brokerfee'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('brokerfee'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label">GST Fee</div>
				<div class="controls">
					<input type="text" readonly="true" id="jform_disgstfee" value="<?php echo $this->item->gstfee; ?>" name="jform[disgstfee]" aria-invalid="false">
					<?php echo $this->form->getInput('gstfee'); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('create_date'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('create_date'); ?></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('description'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('activity'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('activity'); ?></div>
			</div>
			
				</fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>