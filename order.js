function order(option)
{
	url = new URL(location.href);

	if(option == 'DESC')
	{
		url.searchParams.set('order','DESC');
	}
	else if(option == 'ASC')
	{
		url.searchParams.set('order','ASC');
	}

	location.href = url;
}