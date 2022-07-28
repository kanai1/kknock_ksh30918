function comment_edit(button_id)
{
	var button = document.getElementById(button_id);
	var comment_num = button_id.split('#')[1];
	var comment_text = document.getElementById('text#'+comment_num);

	comment_text.removeAttribute('readonly');
	button.type = "summit";
}