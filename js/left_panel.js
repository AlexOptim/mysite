var Shown = false;
function Slide()  // Функция показа/cкрытия панели
{
	if (Shown==false)
	{
		document.getElementById('right_small_div').style.marginLeft= "257px"; // сдвиг блока вправо
		Shown = true;
		$('#SlideButton').text("CLOSE");
	}
	else
	{
		document.getElementById('right_small_div').style.marginLeft = "0px"; // сдвиг блока обратно - влево
		Shown = false;
		$('#SlideButton').text("REGISTRATION");
	}
}