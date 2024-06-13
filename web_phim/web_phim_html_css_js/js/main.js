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
    },5000);
    let t=false;
    const nx=document.getElementById('dhnx');
    nx.addEventListener('click',()=>{
        if(!t){
        clearInterval(a);
        t=true;
        setTimeout(autosilde,1000);
        }
    });
    const pr=document.getElementById('dhpr');
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
