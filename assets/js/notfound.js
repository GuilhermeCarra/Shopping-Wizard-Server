var scene = document.getElementById('scene');
var parallaxInstance = new Parallax(scene);

window.addEventListener("resize", resizeWindow);
resizeWindow();

function resizeWindow(){
    
    document.querySelectorAll('.layer img').forEach(e=>{
        // var style = (window.innerWidth/window.innerHeight > 1) ? 'wide' : 'tall';
        // var style = (e.height/window.innerHeight > 1) ? 'tall' : 'wide';
        // var style = (e.width/window.innerWidth > 1) ? 'tall' : 'wide';
        // console.log(style);
        // e.className = style;
        //console.log(e.src);
    })
}
