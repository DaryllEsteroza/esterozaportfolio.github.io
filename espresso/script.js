let calcScrolValue = () => {
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight =
    document.documentElement.scrollHeight - 
    document.documentElement.clientHeight;
let scrollValue = Math.round((pos * 100)/ calcHeight);
if (pos > 100){
    scrollProgress.style.display = "grid";
}else{
    scrollProgress.style.display = "none";
}
    scrollProgress.addEventListener("click", () => {
        document.documentElement.scrollTop = 0;
    });
    scrollProgress.style.background = `conic-gradient(#FC6A03 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};

window.onscroll = calcScrolValue;
window.onload = calcScrolValue;