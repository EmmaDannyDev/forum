function nav_animation(get_menu)
{
	if (get_menu != '')
	{
		if(get_menu == 'accueil')
		{
			document.getElementById('anim1').className = "etiquette_nav_anim_up";
            document.getElementById('fleche1').className = "glyphicon glyphicon-arrow-down fleche_down_glyphicon";
		}
        if(get_menu == 'forums')
		{
			document.getElementById('anim2').className = "etiquette_nav_anim_up";
            document.getElementById('fleche2').className = "glyphicon glyphicon-arrow-down fleche_down_glyphicon";
		}
        if(get_menu == 'contact')
		{
			document.getElementById('anim3').className = "etiquette_nav_anim_up";
            document.getElementById('fleche3').className = "glyphicon glyphicon-arrow-down fleche_down_glyphicon";
		}
        if(get_menu == 'msg_discussion')
		{
            document.getElementById('anim2').className = "etiquette_nav_anim_up";
            document.getElementById('fleche2').className = "glyphicon glyphicon-arrow-down fleche_down_glyphicon";
        }
	}
}
