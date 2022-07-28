function comment_edit(button_id)
{
	var comment_num = button_id.split('#');
	var comment_text = document.getElementById('text#'+comment_num);

	comment_text.removeAttribute('readonly');
	this.type = "summit";
}