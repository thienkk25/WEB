let s=0;
const lenth=document.querySelectorAll('.container').length;
// console.log(lenth);
slide(s);
function next_pre(n){
    s+=n;
    slide(s);
}
function slide(n){
    if(n<0) s = lenth - 1;
    if(n>lenth-1) s = 0;
    for(let i=0 ;i<lenth;i++){
    document.getElementsByClassName('container')[i].style.display='none';
    }
    document.getElementsByClassName('container')[s].style.display='block';
}
function autosilde(){
    let a= setInterval(()=>{
        s+=1;
        slide(s);
    },10000);
    let t=false;
    const nx=document.querySelector('#dhnx');
    nx.addEventListener('click',()=>{
        if(!t){
        clearInterval(a);
        t=true;
        setTimeout(autosilde,1000);
        }
    });
    const pr=document.querySelector('#dhpr');
    pr.addEventListener('click',()=>{
        if(!t){
            clearInterval(a);
            t=true;
            setTimeout(autosilde,1000);
            }
    });
}
autosilde();
//Hi .how are you feel ?.Thanks
const size_slide=document.querySelectorAll('.slide_phim');
let show=8;
const Xem_them=document.querySelector('#Xemthem');
for(let i=show; i<size_slide.length;i++){
    size_slide[i].style.display='none';
}
Xem_them.addEventListener('click',()=>{
    for(let i=show; i<size_slide.length;i++){
        size_slide[i].style.display='block';
    }
    Xem_them.style.display='none';
});