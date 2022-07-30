function order(option)
{
	if(option == 'DESC')
	{
		location.replace('/?order=DESC');
	}
	else if(option == 'ASC')
	{
		location.replace('/?order=ASC');
	}
}