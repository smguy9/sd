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

// Displays a sortable listing of all members registered on the forum.
function template_main()
{
	global $context, $settings, $scripturl, $txt;

	echo '
	<div class="main_section" id="memberlist">
		<div class="pagination">
			', template_button_strip($context['memberlist_buttons'], 'right'), '
			', $context['page_index'], '
		</div>
		<h3 class="catbg">
			<span class="pull-left">', $txt['members_list'], '</span>';
	if (!isset($context['old_search']))
			echo '
			<span class="pull-right">', $context['letter_links'], '</span>';
	echo '
		</h3>';

	echo '
		<div id="mlist" class="tborder topic_table">
			<table class="table table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr class="catbg">';

	// Display each of the column headers of the table.
	foreach ($context['columns'] as $key => $column)
	{
		// @TODO maybe find something nicer?
		if ($key == 'email_address' && !$context['can_send_email'])
			continue;

		// This is a selected column, so underline it or some such.
		if ($column['selected'])
			echo '
					<th scope="col"', (isset($column['clas']) ? ' class="' . $column['class'] . '"' : '') , (isset($column['colspan']) ? ' colspan="' . $column['colspan'] . '"' : ''), '>
						<a href="' . $column['href'] . '" rel="nofollow">' . $column['label'] . '</a><span class="icon-arrow-' . $context['sort_direction'] . '"></span></th>';
		// This is just some column... show the link and be done with it.
		else
			echo '
					<th scope="col" class="', isset($column['class']) ? ' ' . $column['class'] : '', '"', isset($column['width']) ? ' width="' . $column['width'] . '"' : '', isset($column['colspan']) ? ' colspan="' . $column['colspan'] . '"' : '', '>
						', $column['link'], '</th>';
	}
	echo '
				</tr>
			</thead>
			<tbody>';

	// Assuming there are members loop through each one displaying their data.
	$alternate = true;
	if (!empty($context['members']))
	{
		foreach ($context['members'] as $member)
		{
			echo '
				<tr class="windowbg', $alternate ? '2' : '', '"', empty($member['sort_letter']) ? '' : ' id="letter' . $member['sort_letter'] . '"', '>
					<td class="center">
						', $context['can_send_pm'] ? '<a href="' . $member['online']['href'] . '" title="' . $member['online']['text'] . '">' : '', $settings['use_image_buttons'] ? '<img src="' . $member['online']['image_href'] . '" alt="' . $member['online']['text'] . '" class="centericon" />' : $member['online']['label'], $context['can_send_pm'] ? '</a>' : '', '
					</td>
					<td class="left">', $member['link'], '</td>';
			if ($context['can_send_email'])
				echo '
					<td class="center">', $member['show_email'] == 'no' ? '' : '<a href="' . $scripturl . '?action=emailuser;sa=email;uid=' . $member['id'] . '" rel="nofollow"><img src="' . $settings['images_url'] . '/email_sm.png" alt="' . $txt['email'] . '" title="' . $txt['email'] . ' ' . $member['name'] . '" /></a>', '</td>';

		if (!isset($context['disabled_fields']['website']))
			echo '
					<td class="center">', $member['website']['url'] != '' ? '<a href="' . $member['website']['url'] . '" target="_blank" class="new_win"><img src="' . $settings['images_url'] . '/www.png" alt="' . $member['website']['title'] . '" title="' . $member['website']['title'] . '" /></a>' : '', '</td>';

		// Group and date.
		echo '
					<td class="left">', empty($member['group']) ? $member['post_group'] : $member['group'], '</td>
					<td class="left">', $member['registered_date'], '</td>';

		if (!isset($context['disabled_fields']['posts']))
		{
			echo '
					<td style="white-space: nowrap" width="15">', $member['posts'], '</td>
					<td width="120">';

			if (!empty($member['post_percent']))
				echo '
						<div class="progress">
							<div class="bar" style="width: ', $member['post_percent'], '%"></div>
						</div>';

			echo '
					</td>';
		}

		echo '
				</tr>';

			$alternate = !$alternate;
		}
	}
	// No members?
	else
		echo '
				<tr>
					<td colspan="', $context['colspan'], '" class="windowbg">', $txt['search_no_results'], '</td>
				</tr>';

				echo '
			</tbody>
			</table>
		</div>';

	// Show the page numbers again. (makes 'em easier to find!)
	echo '
		<div class="pagination">
			', $context['page_index'], '';

	// If it is displaying the result of a search show a "search again" link to edit their criteria.
	if (isset($context['old_search']))
		echo '
			<a class="button_link" href="', $scripturl, '?action=mlist;sa=search;search=', $context['old_search_value'], '">', $txt['mlist_search_again'], '</a>';
	echo '
		</div>
	</div>';

}

// A page allowing people to search the member list.
function template_search()
{
	global $context, $settings, $scripturl, $txt;

	// Start the submission form for the search!
	echo '
	<form action="', $scripturl, '?action=mlist;sa=search" method="post" accept-charset="', $context['character_set'], '">
		<div id="memberlist">
			<div class="clearfix">
				', template_button_strip($context['memberlist_buttons'], 'right'), '
			</div>
			<h3 class="catbg">
				', !empty($settings['use_buttons']) ? '<img src="' . $settings['images_url'] . '/buttons/search_hd.png" alt="" class="icon" />' : '', $txt['mlist_search'], '
			</h3>
			<div id="memberlist_search" class="clear">
				<div class="roundframe">
					<dl id="mlist_search" class="settings">
						<dt>
							<label><strong>', $txt['search_for'], ':</strong></label>
						</dt>
						<dd>
							<input type="text" name="search" value="', $context['old_search'], '" size="40" class="input_text" />
						</dd>
						<dt>
							<label><strong>', $txt['mlist_search_filter'], ':</strong></label>
						</dt>';

	foreach ($context['search_fields'] as $id => $title)
	{
		echo '
						<dd>
							<label for="fields-', $id, '"><input type="checkbox" name="fields[]" id="fields-', $id, '" value="', $id, '" ', in_array($id, $context['search_defaults']) ? 'checked="checked"' : '', ' class="input_check pull-right" />', $title, '</label>
						</dd>';
	}

	echo '
					</dl>
					<div class="flow_auto">
						<input type="submit" name="submit" value="' . $txt['search'] . '" class="btn" />
					</div>
				</div>
			</div>
		</div>
	</form>';
}

?>