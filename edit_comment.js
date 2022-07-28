function comment_edit(button_id)
{
	var comment_num = button_id.split('#')[1];

	var button = document.getElementById(button_id);
	var comment_text = document.getElementById('text#'+comment_num);
	var form = document.getElementById('form#'+comment_num);

	if(button.innerText == '제출')
	{
		button.type = "summit";
	}
	
	comment_text.removeAttribute('readonly');
	button.innerText = "제출";
}