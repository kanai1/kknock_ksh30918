function order_sql(option)
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

function toMain()
{
	destination = new URL('http://20.249.98.163:14150');
	now = new URL(location.href);

	option = now.searchParams.get('order');
	destination.searchParams.set('order', option);
	
	location.href = destination;
}