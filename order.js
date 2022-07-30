function order(option)
{
	url = new URL(location.href);

	if(option == 'DESC')
	{
		url.searchParams('order','DESC');
	}
	else if(option == 'ASC')
	{
		url.searchParams('order','ASC');
	}

	location.href = url;
}