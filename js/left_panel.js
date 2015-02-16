var Shown = false;
function Slide()  // Функция показа/cкрытия панели
{
	if (Shown==false)
	{
		document.getElementById('right_small_div').style.marginLeft= "257px"; // сдвиг блока вправо
		Shown = true;
		document.getElementById('SlideButton').src= "images/close.png";
	}
	else
	{
		document.getElementById('right_small_div').style.marginLeft = "0px"; // сдвиг блока обратно - влево
		Shown = false;
		document.getElementById('SlideButton').src= "images/feedback.png";
	}
}