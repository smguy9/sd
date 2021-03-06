<?php

/**
 * ProjectGLS
 *
 * @copyright 2013 ProjectGLS
 * @license http://next.mmobrowser.com/projectgls/license.txt
 *
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines
 * @copyright 2012 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 1.0 Alpha 1
 */

function template_search_members()
{
	global $context, $scripturl, $txt;

	echo '
	<div id="admincenter">
		<form action="', $scripturl, '?action=admin;area=viewmembers" method="post" accept-charset="', $context['character_set'], '">
			<h3 class="titlebg">
				<span class="pull-left">', $txt['search_for'], '</span>
				<span class="smalltext pull-right">', $txt['wild_cards_allowed'], '</span>
			</h3>
			<input type="hidden" name="sa" value="query" />
			<div class="well">
				<div class="content">
					<div class="flow_hidden">
						<div class="msearch_details pull-left">
							<dl class="settings right">
								<dt>
									<strong><label for="mem_id">', $txt['member_id'], ':</label></strong>
									<select name="types[mem_id]" class="input-mini">
										<option value="--">&lt;</option>
										<option value="-">&lt;=</option>
										<option value="=" selected="selected">=</option>
										<option value="+">&gt;=</option>
										<option value="++">&gt;</option>
									</select>
								</dt>
								<dd>
									<input type="text" name="mem_id" id="mem_id" value="" class="input-mini" />
								</dd>
								<dt class="righttext">
									<strong><label for="age">', $txt['age'], ':</label></strong>
									<select name="types[age]" class="input-mini">
										<option value="--">&lt;</option>
										<option value="-">&lt;=</option>
										<option value="=" selected="selected">=</option>
										<option value="+">&gt;=</option>
										<option value="++">&gt;</option>
									</select>
								</dt>
								<dd>
									<input type="text" name="age" id="age" value="" class="input-mini" />
								</dd>
								<dt class="righttext">
									<strong><label for="posts">', $txt['member_postcount'], ':</label></strong>
									<select name="types[posts]" class="input-mini">
										<option value="--">&lt;</option>
										<option value="-">&lt;=</option>
										<option value="=" selected="selected">=</option>
										<option value="+">&gt;=</option>
										<option value="++">&gt;</option>
									</select>
								</dt>
								<dd>
									<input type="text" name="posts" id="posts" value="" class="input-mini" />
								</dd>
								<dt class="righttext">
									<strong><label for="reg_date">', $txt['date_registered'], ':</label></strong>
									<select name="types[reg_date]" class="input-mini">
										<option value="--">&lt;</option>
										<option value="-">&lt;=</option>
										<option value="=" selected="selected">=</option>
										<option value="+">&gt;=</option>
										<option value="++">&gt;</option>
									</select>
								</dt>
								<dd>
									<input type="text" name="reg_date" id="reg_date" value="" class="input-small" /><span class="smalltext">', $txt['date_format'], '</span>
								</dd>
								<dt class="righttext">
									<strong><label for="last_online">', $txt['viewmembers_online'], ':</label></strong>
									<select name="types[last_online]" class="input-mini">
										<option value="--">&lt;</option>
										<option value="-">&lt;=</option>
										<option value="=" selected="selected">=</option>
										<option value="+">&gt;=</option>
										<option value="++">&gt;</option>
									</select>
								</dt>
								<dd>
									<input type="text" name="last_online" id="last_online" value="" class="input-small" /><span class="smalltext">', $txt['date_format'], '</span>
								</dd>
							</dl>
						</div>
						<div class="msearch_details pull-right">
							<dl class="settings right">
								<dt class="righttext">
									<strong><label for="membername">', $txt['username'], ':</label></strong>
								</dt>
								<dd>
									<input type="text" name="membername" id="membername" value="" class="input_text" />
								</dd>
								<dt class="righttext">
									<strong><label for="email">', $txt['email_address'], ':</label></strong>
								</dt>
								<dd>
									<input type="text" name="email" id="email" value="" class="input_text" />
								</dd>
								<dt class="righttext">
									<strong><label for="website">', $txt['website'], ':</label></strong>
								</dt>
								<dd>
									<input type="text" name="website" id="website" value="" class="input_text" />
								</dd>
								<dt class="righttext">
									<strong><label for="location">', $txt['location'], ':</label></strong>
								</dt>
								<dd>
									<input type="text" name="location" id="location" value="" class="input_text" />
								</dd>
								<dt class="righttext">
									<strong><label for="ip">', $txt['ip_address'], ':</label></strong>
								</dt>
								<dd>
									<input type="text" name="ip" id="ip" value="" class="input_text" />
								</dd>
							</dl>
						</div>
					</div>
					<div class="flow_hidden">
						<div class="msearch_details pull-left">
							<fieldset>
								<legend>', $txt['gender'], '</legend>
								<label for="gender-0" class="checkbox"><input type="checkbox" name="gender[]" value="0" id="gender-0" checked="checked" class="input_check" /> ', $txt['undefined_gender'], '</label>&nbsp;&nbsp;
								<label for="gender-1" class="checkbox"><input type="checkbox" name="gender[]" value="1" id="gender-1" checked="checked" class="input_check" /> ', $txt['male'], '</label>&nbsp;&nbsp;
								<label for="gender-2" class="checkbox"><input type="checkbox" name="gender[]" value="2" id="gender-2" checked="checked" class="input_check" /> ', $txt['female'], '</label>
							</fieldset>
						</div>
						<div class="msearch_details pull-right">
							<fieldset>
								<legend>', $txt['activation_status'], '</legend>
								<label for="activated-0" class="checkbox"><input type="checkbox" name="activated[]" value="1" id="activated-0" checked="checked" class="input_check" /> ', $txt['activated'], '</label>&nbsp;&nbsp;
								<label for="activated-1" class="checkbox"><input type="checkbox" name="activated[]" value="0" id="activated-1" checked="checked" class="input_check" /> ', $txt['not_activated'], '</label>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<h3 class="titlebg">', $txt['member_part_of_these_membergroups'], '</h3>
			<div class="flow_hidden well">
				<table style="width: 49%" class="table table-striped table-bordered pull-left">
					<thead>
						<tr class="titlebg">
							<th scope="col" class="first_th">', $txt['membergroups'], '</th>
							<th scope="col" class="centercol">', $txt['primary'], '</th>
							<th scope="col" class="last_th centercol">', $txt['additional'], '</th>
						</tr>
					</thead>
					<tbody>';

			foreach ($context['membergroups'] as $membergroup)
				echo '
						<tr class="windowbg">
							<td>', $membergroup['name'], '</td>
							<td class="centercol">
								<input type="checkbox" name="membergroups[1][]" value="', $membergroup['id'], '" checked="checked" class="input_check" />
							</td>
							<td class="centercol">
								', $membergroup['can_be_additional'] ? '<input type="checkbox" name="membergroups[2][]" value="' . $membergroup['id'] . '" checked="checked" class="input_check" />' : '', '
							</td>
						</tr>';

			echo '
						<tr class="windowbg2">
							<td>
								<em>', $txt['check_all'], '</em>
							</td>
							<td class="centercol">
								<input type="checkbox" onclick="invertAll(this, this.form, \'membergroups[1]\');" checked="checked" class="input_check" />
							</td>
							<td class="centercol">
								<input type="checkbox" onclick="invertAll(this, this.form, \'membergroups[2]\');" checked="checked" class="input_check" />
							</td>
						</tr>
					</tbody>
				</table>

				<table style="width: 49%" class="table table-striped table-bordered pull-right">
					<thead>
						<tr class="titlebg">
							<th scope="col" class="first_th">
								', $txt['membergroups_postgroups'], '
							</th>
							<th class="last_th">&nbsp;</th>
						</tr>
					</thead>
					<tbody>';

			foreach ($context['postgroups'] as $postgroup)
				echo '
						<tr class="windowbg2">
							<td>
								', $postgroup['name'], '
							</td>
							<td width="40" class="centercol">
								<input type="checkbox" name="postgroups[]" value="', $postgroup['id'], '" checked="checked" class="input_check" />
							</td>
						</tr>';

			echo '
						<tr class="windowbg2">
							<td>
								<em>', $txt['check_all'], '</em>
							</td>
							<td class="centercol">
								<input type="checkbox" onclick="invertAll(this, this.form, \'postgroups[]\');" checked="checked" class="input_check" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<input type="submit" value="', $txt['search'], '" class="btn" />
			<span class="clearfix"></span>
		</form>
	</div>';
}

function template_admin_browse()
{
	global $context, $scripturl, $txt;

	echo '
	<div id="admincenter">';

	template_show_list('approve_list');

	// If we have lots of outstanding members try and make the admin's life easier.
	if ($context['approve_list']['total_num_items'] > 20)
	{
		echo '
		<br />
		<form id="admin_form_wrapper" action="', $scripturl, '?action=admin;area=viewmembers" method="post" accept-charset="', $context['character_set'], '" name="postFormOutstanding" id="postFormOutstanding" onsubmit="return onOutstandingSubmit();">
				<h3 class="catbg">', $txt['admin_browse_outstanding'], '</h3>
			<script><!-- // --><![CDATA[
				function onOutstandingSubmit()
				{
					if (document.forms.postFormOutstanding.todo.value == "")
						return;

					var message = "";
					if (document.forms.postFormOutstanding.todo.value.indexOf("delete") != -1)
						message = "', $txt['admin_browse_w_delete'], '";
					else if (document.forms.postFormOutstanding.todo.value.indexOf("reject") != -1)
						message = "', $txt['admin_browse_w_reject'], '";
					else if (document.forms.postFormOutstanding.todo.value == "remind")
						message = "', $txt['admin_browse_w_remind'], '";
					else
						message = "', $context['browse_type'] == 'approve' ? $txt['admin_browse_w_approve'] : $txt['admin_browse_w_activate'], '";

					if (confirm(message + " ', $txt['admin_browse_outstanding_warn'], '"))
						return true;
					else
						return false;
				}
			// ]]></script>

			<div class="windowbg">
				<div class="content">
					<dl class="settings">
						<dt>
							', $txt['admin_browse_outstanding_days_1'], ':
						</dt>
						<dd>
							<input type="text" name="time_passed" value="14" maxlength="4" size="3" class="input_text" /> ', $txt['admin_browse_outstanding_days_2'], '.
						</dd>
						<dt>
							', $txt['admin_browse_outstanding_perform'], ':
						</dt>
						<dd>
							<select name="todo">
								', $context['browse_type'] == 'activate' ? '
								<option value="ok">' . $txt['admin_browse_w_activate'] . '</option>' : '', '
								<option value="okemail">', $context['browse_type'] == 'approve' ? $txt['admin_browse_w_approve'] : $txt['admin_browse_w_activate'], ' ', $txt['admin_browse_w_email'], '</option>', $context['browse_type'] == 'activate' ? '' : '
								<option value="require_activation">' . $txt['admin_browse_w_approve_require_activate'] . '</option>', '
								<option value="reject">', $txt['admin_browse_w_reject'], '</option>
								<option value="rejectemail">', $txt['admin_browse_w_reject'], ' ', $txt['admin_browse_w_email'], '</option>
								<option value="delete">', $txt['admin_browse_w_delete'], '</option>
								<option value="deleteemail">', $txt['admin_browse_w_delete'], ' ', $txt['admin_browse_w_email'], '</option>', $context['browse_type'] == 'activate' ? '
								<option value="remind">' . $txt['admin_browse_w_remind'] . '</option>' : '', '
							</select>
						</dd>
					</dl>
					<input type="submit" value="', $txt['admin_browse_outstanding_go'], '" class="btn" />
					<input type="hidden" name="type" value="', $context['browse_type'], '" />
					<input type="hidden" name="sort" value="', $context['approve_list']['sort']['id'], '" />
					<input type="hidden" name="start" value="', $context['approve_list']['start'], '" />
					<input type="hidden" name="orig_filter" value="', $context['current_filter'], '" />
					<input type="hidden" name="sa" value="approve" />', !empty($context['approve_list']['sort']['desc']) ? '
					<input type="hidden" name="desc" value="1" />' : '', '
				</div>
			</div>
			<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
		</form>';
	}

	echo '
	</div>';
}

?>