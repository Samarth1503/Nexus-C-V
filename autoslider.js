var slides= document.querySelectorAll('.slide');
var btns=document.querySelectorAll('.btn');
let currentSlide=1;

var manualNav = function(manual)
{  
    
    slides.forEach((slide) =>{
        slide.classList.remove('sliderActive');

        btns.forEach((btn)=> {
        btn.classList.remove('sliderActive');    
        })
    })


    slides[manual].classList.add('sliderActive');
    btns[manual].classList.add('sliderActive');
    
}

btns.forEach((btn, i) => 
{
    btn.addEventListener('click',() =>
    {
        manualNav(i);
        currentSlide =i;
    });
});


//javascript for autoplay:

var repeat = function(sliderActiveClass)
{
   let sliderActive = document.getElementsByClassName('sliderActive');
   let i = 1;

   var repeater = () =>{
    autoSliderTime= setTimeout(function(){

        [...sliderActive].forEach((sliderActiveSlide) => {
            sliderActiveSlide.classList.remove('sliderActive');
        })



        slides[i].classList.add('sliderActive');
        btns[i].classList.add('sliderActive');
        i++;
        if(slides.length == i)
        {
            i=0;
        }

        if(i>=slides.length)
        {
            return;
        }
        repeater();


    },5000);
   }
   repeater();
}
repeat();





